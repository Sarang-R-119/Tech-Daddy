<?php
/**
 * Manages essential php class instances
 * @author Alex Austin
 */
require_once "scraper/dell/clas.dellscraper.php";
require_once "utils/util.jproductserializer.php";

class ProductManager
{
    private static $dellScraper;

    public function addProducts(...$products)
    {
        foreach ($products as $product) {
            JSONProductSerializer::serialize($product);
        }
    }

    public function run()
    {
        self::$dellScraper = new DellScraper();
        self::$dellScraper->buildProfiles();
    }
}

?>
