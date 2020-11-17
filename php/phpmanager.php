<?php
/**
 * Manages essential php class instances
 * @author Alex Austin
 */
require_once "scraper/dell/clas.dellscraper.php";
require_once "utils/util.jproductserializer.php";

class ProductManager
{
    public static $products = array();
    private static $dellScraper;

    public function addProducts(...$products)
    {
        foreach ($products as $product) {
            array_push(self::$products, $product);
        }
    }

    public function run()
    {
        self::$dellScraper = new DellScraper();
        self::$products = self::$dellScraper->buildProfiles();
        foreach (self::$products as $product) {
            JSONProductSerializer::serialize($product);
        }
    }
}

?>
