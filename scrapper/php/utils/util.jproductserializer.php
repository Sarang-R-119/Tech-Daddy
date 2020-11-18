<?php

require_once "util.uuid.php";

class JSONProductSerializer
{

    private static $DIR = __DIR__ . "/../../json/";

    /**
     * @param Product $product
     */
    public static function serialize($product)
    {
        if (file_exists(self::$DIR . uniqid($product->getName()) . "json"))
            return;
        $fp = fopen(__DIR__ . "/../../json/" . UUID::v3('1546058f-5a25-4334-85ae-e68f2a44bbaf', $product->getName()) . ".json", 'w');
        fwrite($fp, json_encode($product->toArray()));
        fclose($fp);
    }

}