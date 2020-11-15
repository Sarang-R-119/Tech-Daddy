<?php

require_once __DIR__ . "/../clas.product.php";

interface Page
{

    /**
     * @param DOMDocument $doc
     * @return Product[]
     */
    public function scrape($doc, $url);



}