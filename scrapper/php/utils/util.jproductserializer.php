<?php


class JSONProductSerializer
{

    /**
     * @param Product $product
     */
    public static function serialize($product)
    {
        $fp = fopen(__DIR__ . "/../../json/" . $product->getUID() . ".json", 'w');
        fwrite($fp, json_encode($product->toArray()));
        fclose($fp);
    }

}