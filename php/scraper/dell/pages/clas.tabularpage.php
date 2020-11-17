<?php

require_once __DIR__ . "/../../../scraper/inter.pagemanager.php";
require_once __DIR__ . "/../../../utils/util.curl.php";
require_once __DIR__ . "/../../../clas.product.php";
require_once __DIR__ . "/../../../clas.brand.php";

class TabularPage implements Page
{
    public function scrape($doc, $url)
    {
        $products = array();
        $articles = self::getArticles($doc);
        /* @var DOMNode $article */
        foreach ($articles as $article) {
            $product = null;
            //scrape name
            $h3_tags = $article->getElementsByTagName('h3');
            /** @var DOMNode $h3 */
            foreach ($h3_tags as $h3) {
                if ($h3->getAttribute("class") === "ps-title") {
                    /** @var DOMNode $a */
                    $a = $h3->getElementsByTagName('a')[0];
                    $product = new Product(Brand::$DELL, $a->nodeValue);
                    $addr = $a->getAttribute("href");
                    if (!isset($addr))
                        $addr = $url;
                    $product->getProductMeta()->setAddress($addr);
                    break;
                }
            }


            if (!isset($product))
                continue;

            //scrape description
            /* @var DOMNodeList $sections */
            $sections = $article->getElementsByTagName('section');
            /* @var DOMNode $section */
            foreach ($sections as $section) {
                if ($section->getAttribute('class') === "ps-show-hide") {
                    $divs = $section->getElementsByTagName('div');
                    /* @var DOMNode $div */
                    foreach ($divs as $div) {
                        if ($div->getAttribute('class') === "ps-desc") {
                            /* @var DOMNode $p */
                            $p = $div->getElementsByTagName('p');
                            if (!isset($p) || count($p) == 0 || !isset($p[0])) {
                                goto end;
                            } else {
                                $desc = $p[0]->nodeValue;
                                $product->setDescription($desc);
                            }
                            goto end;
                        }
                    }
                }
            }
            end:
            //scrape price
            /** @var DOMNodeList $divs */
            $divs = $article->getElementsByTagName("div");
            /* @var DOMNode $div */
            foreach ($divs as $div) {
                if ($div->getAttribute('class') === 'ps-dell-price ps-simplified') {
                    $price = $div->nodeValue;
                    $price = str_replace("\n", "", $price);
                    $price = str_replace(" ", "", $price);
                    $product->updatePrice($price);
                    break;
                }
            }
            //scrape image
            $img = $article->getElementsByTagName('img')[0];
            $img_src = $img->getAttribute("data-src");
            $product->getProductMeta()->setImage($img_src);

            array_push($products, $product);
        }
        return $products;
    }

    /**
     * @param DOMDocument $doc
     * @return DOMNodeList
     */
    private function getArticles($doc)
    {
        return $doc->getElementsByTagName('article');
    }
}