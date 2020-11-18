<?php

require_once __DIR__ . "/../../../../clas.product.php";
require_once __DIR__ . "/../../../../clas.brand.php";
require_once __DIR__ . "/../../clas.dellscraper.php";

class ProductPage implements Page
{

    public function scrape($doc, $url)
    {
        $products = array();

        $name = null;
        $description = null;
        $image_url = null;
        $price = null;

        $metas = $doc->getElementsByTagName("meta");
        /** @var DOMNode $div */
        foreach ($metas as $meta) {
            if (isset($image_url) && isset($description) && isset($name))
                break;
            if ($meta->getAttribute("property") === "og:title") {
                $name = $meta->getAttribute("content");
            } else if ($meta->getAttribute("property") === "og:image") {
                $image_url = $meta->getAttribute("content");
            } else if ($meta->getAttribute("property") === "og:description") {
                $description = $meta->getAttribute("content");
            }
        }

        if (!isset($name))
            return $products;

        $sections = $doc->getElementsByTagName("section");
        foreach ($sections as $section) {
            if ($section->getAttribute("class") === "ps-top") {
                $l_div = $section->getElementsByTagName("div");
                foreach ($l_div as $div) {
                    if ($div->getAttribute("class") === "ps-dell-price ps-simplified") {
                        $price = $div->nodeValue;
                        $price = str_replace("\n", "", $price);
                        $price = str_replace(" ", "", $price);
                        break;
                    }
                }
                if (isset($price))
                    break;
            }
        }

        $product = new Product(Brand::$DELL, $name);
        $product->updatePrice($price);
        $product->setDescription($description);
        $product->getProductMeta()->setImage($image_url);
        $product->getProductMeta()->setAddress($url);

        array_push($products, $product);
        return $products;
    }
}