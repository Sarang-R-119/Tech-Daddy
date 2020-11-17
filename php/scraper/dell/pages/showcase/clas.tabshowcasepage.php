<?php

require_once __DIR__ . "/../../../../clas.product.php";
require_once __DIR__ . "/../../../../clas.brand.php";
require_once __DIR__ . "/../../clas.dellscraper.php";
require_once __DIR__ . "/../../../../utils/util.curl.php";
require_once "clas.productpage.php";

class TabularShowcasePage implements Page
{
    private $s_product;

    function __construct() {
        $this->s_product = new ProductPage();
    }

    public function scrape($doc, $url)
    {
        $products = array();
        $l_h4 = $doc->getElementsByTagName("h4");
        foreach($l_h4 as $h4) {
            $l_a = $h4->getElementsByTagName("a");
            foreach($l_a as $a) {
                if($a->getAttribute("class") === "fast-deliver-point-cursor  ") {
                    $addr = DellScraper::$root . $a->getAttribute("href");
                    $result = $this->s_product->scrape(Curl::loadDocument($addr), $addr);
                    foreach($result as $product) {
                        array_push($products, $product);
                    }
                    break;
                }
            }
        }
        return $products;
    }
}