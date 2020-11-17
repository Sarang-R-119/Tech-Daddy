<?php

require_once __DIR__ . "/../../../../clas.product.php";
require_once __DIR__ . "/../../../../clas.brand.php";
require_once __DIR__ . "/../../clas.dellscraper.php";

class ProductPage implements Page
{

    public function scrape($doc, $url)
    {
        $products = array();
        $sections = $doc->getElementsByTagName("section");

        $name = null;
        $description = null;
        $image_url = null;
        $price = null;

        foreach ($sections as $section) {
            if (isset($name) && isset($price))
                break;
            if ($section->getAttribute("id") === "page-title") {
                $l_span = $section->getElementsByTagName("span");
                if (isset($l_span) && count($l_span) > 0) {
                    $name = $l_span[0]->nodeValue;
                    continue;
                }
            } else if ($section->getAttribute("class") === "ps-top") {
                $l_div = $section->getElementsByTagName("div");
                foreach ($l_div as $div) {
                    if ($div->getAttribute("class") === "ps-dell-price ps-simplified") {
                        $price = $div->nodeValue;
                        break;
                    }
                }
            }
        }

        if (!isset($name))
            return $products;

        $l_div = $doc->getElementsByTagName("div");
        foreach ($l_div as $div) {
            if ($div->getAttribute("id") === "long-description") {
                $l_span = $div->getElementsByTagName("span");
                if (isset($l_span) && count($l_span) > 0) {
                    $description = $l_span[0]->nodeValue;
                }
            } else if ($div->getAttribute("id") === "heroImage") {
                $figures = $div->getElementsByTagName("figure");
                foreach ($figures as $figure) {
                    if ($figure->getAttribute("id") === "mgal-img-1") {
                        $images = $div->getElementsByTagName("img");
                        if (isset($images) && count($images) > 0) {
                            $image_url = $images[0]->getAttribute("data-full-img");
                            break;
                        }
                    }
                }
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