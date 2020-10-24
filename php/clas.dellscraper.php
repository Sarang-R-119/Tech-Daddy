<?php

/**
 * DellScraper - Scraper for Dell manufacturer site
 * @author Alex Austin
 */
/**
 * This class is responsible for pulling and loading the site's html document
 * locally and pulling current prices for associated laptop types.
 */
include "clas.product.php";

class DellScraper
{

    private static $root = 'https://www.dell.com';
    private static $address = 'https://www.dell.com/en-us/member/shop?~ck=mn';
    private $document;

    function DellScraper() {
        $this->document = self::loadDocument(self::$address);
    }

    public function scrape($name) {
        $pages = self::getProductPages();
        foreach($pages as $page) {
            $article = self::getArticle($page, $name);
            if(isset($article)) {
                $product = new Product($name);
                $tags = $article->getElementsByTagName('h4');
                foreach($tags as $tag) {
                    if($tag->getAttribute('class') === 'ps-simple-dell-price') {
                        $product->updatePrice($tag->nodeValue);
                        break;
                    }
                }
                $img = $article->getElementsByTagName('img')[0];
                $img_src = $img->getAttribute("data-src");
                $product->getProductMeta()->setImage($img_src);
                return $product;
            }
        }
        return null;
    }

    private static function loadDocument($addr) {
        $content = self::file_get_contents_curl($addr);
        $doc = new DOMDocument();

        libxml_use_internal_errors(true);
        $doc->loadHTML($content);
        libxml_use_internal_errors(false);

        return $doc;
    }

    private function getProductPages() {
        $a_tags = $this->document->getElementsByTagName('a');
        $sites = array();
        foreach($a_tags as $a) {
            if($a->hasAttribute('data-testid') && $a->getAttribute('data-testid') == "subCategory") {
                if($a->getAttribute('href') != null) {
                    $addr = self::$root . $a->getAttribute('href');
                    array_push($sites, $addr);
                }
            }

        }
        return $sites;
    }

    private function getArticle($page, $laptop) {
        $doc = self::loadDocument($page);
        $articles = $doc->getElementsByTagName('article');
        $article = null;
        foreach($articles as $artcle) {
            $a_tags = $artcle->getElementsByTagName('a');
            $a_tag = null;
            foreach($a_tags as $a) {
                if($a->getAttribute('class') === 'dellmetrics-iclickthru' && $a->nodeValue === $laptop) {
                    $a_tag = $a;
                    break;
                }
            }
            if(isset($a_tag)) {
                $article = $artcle;
                break;
            }
        }
        return $article;
    }

    private static function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
}