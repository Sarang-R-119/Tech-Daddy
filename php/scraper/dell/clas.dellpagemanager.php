<?php

include __DIR__ . "/../../scraper/clas.pageprofile.php";
include "pages/clas.tabularpage.php";
include "pages/clas.showcasepage.php";
require_once __DIR__ . "/../../scraper/inter.pagemanager.php";

class DellPageManager implements PageManager
{
    /** @var $PAGE_PROFILES PageProfile[] */
    private $PAGE_PROFILES;

    public function __construct()
    {
        $this->PAGE_PROFILES = array();
        $tabular_profile = new PageProfile(new TabularPage(), new Identifier("div", "id", "ps-wrapper"));
        array_push($this->PAGE_PROFILES, $tabular_profile);
    }

    /**
     * @param DOMDocument $doc
     * @return PageProfile
     */
    public function getPage($doc)
    {
        foreach ($this->PAGE_PROFILES as $profile) {
            if ($profile->isPage($doc))
                return $profile->getPage();
        }
        return null;
    }

}