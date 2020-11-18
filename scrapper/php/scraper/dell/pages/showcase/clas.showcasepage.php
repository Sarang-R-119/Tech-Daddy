<?php

require_once __DIR__ . "/../../clas.dellscraper.php";
require_once "clas.tabshowcasepage.php";
require_once __DIR__ . "/../../../../utils/util.curl.php";
require_once __DIR__ . "/../../../../clas.product.php";
require_once __DIR__ . "/../../../../clas.brand.php";

class ShowcasePage implements Page
{
    private $s_tab;

    function __construct() {
        $this->s_tab = new TabularShowcasePage();
    }

    public function scrape($doc, $url)
    {
        $products = array();
        $sections = $doc->getElementsByTagName("section");
        $m_section = null;
        foreach ($sections as $section) {
            if ($section->getAttribute("id") === "merchandizing-section") {
                $m_section = $section;
                break;
            }
        }
        if (!isset($m_section)) {
            return $products;
        }

        $lh3 = $m_section->getElementsByTagName("h3");
        foreach ($lh3 as $h3) {
            if ($h3->getAttribute("class") === "merchandizing-category-title") {
                $la = $h3->getElementsByTagName("a");
                $a = null;
                if (isset($la) && count($la) > 0) {
                    $a = $la[0];
                    $addr = $a->getAttribute("href");
                    $page = Curl::loadDocument($addr);
                    $result = $this->s_tab->scrape($page, $addr);
                    foreach($result as $product) {
                        array_push($products, $product);
                    }
                    continue;
                }
            }
        }
        return $products;
    }
}