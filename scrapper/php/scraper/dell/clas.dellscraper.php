<?php

/**
 * DellScraper - Scraper for Dell manufacturer site
 * @author Alex Austin
 */
/**
 * This class is responsible for pulling and loading the site's html document
 * locally and pulling current prices for associated laptop types.
 */
//include("../../clas.product.php");
//include("../../utils/util.curl.php");

include __DIR__ . "/../../clas.product.php";
include __DIR__ . "/../inter.pagemanager.php";
include "clas.dellpagemanager.php";
require_once __DIR__ . "/../../utils/util.curl.php";
require_once __DIR__ . "/../../phpmanager.php";

class DellScraper
{
    public static $root = 'https://www.dell.com';
    private static $address = 'https://www.dell.com/en-us/member/shop?~ck=mn';
    /* @var DOMDocument $document */
    private $document;
    /* @var PageManager $pageManager */
    private $pageManager;

    function __construct()
    {
        $this->document = Curl::loadDocument(self::$address);
        $this->pageManager = new DellPageManager();
    }

    public function buildProfiles()
    {
        session_start();
        /** @var ProductManager $productManager */
        $productManager = $_SESSION["product_manager"];
        $pages = self::getProductPages();
        foreach ($pages as $page) {
            $doc = Curl::loadDocument($page);
            $p_s = $this->pageManager->getPage($doc);
            if (!isset($p_s)) {
                continue;
            }
            $result = $p_s->scrape($doc, $page);
            foreach ($result as $product) {
                if (isset($product)) {
                    $productManager->addProducts($product);
                }
            }
        }
    }

    /**
     * @return DOMDocument[]
     */
    private function getProductPages()
    {
        $sites = array();
        $a_tags = $this->document->getElementsByTagName('a');
        /* @var DOMNode $a */
        foreach ($a_tags as $a) {
            if ($a->hasAttribute('data-testid') && $a->getAttribute('data-testid') == "subCategory") {
                if ($a->getAttribute('href') != null) {
                    $addr = self::$root . $a->getAttribute('href');
                    array_push($sites, $addr);
                }
            }

        }
        return $sites;
    }
}