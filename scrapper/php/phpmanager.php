<?php
/**
 * Manages essential php class instances
 * @author Alex Austin
 */
require_once "scraper/dell/clas.dellscraper.php";
require_once "utils/util.jproductserializer.php";

class ProductManager {
    public static $products = array();
    private static $dellScraper;

    public static function run()
    {
        self::$dellScraper = new DellScraper();
        self::$products = self::$dellScraper->buildProfiles();
        foreach (self::$products as $product) {
            JSONProductSerializer::serialize($product);
        }
    }
}

?>
