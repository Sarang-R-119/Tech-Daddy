<?php

require_once "inter.page.php";

interface PageManager
{

    /**
     * @param string $doc
     * @return Page
     */
    public function getPage($doc);

}