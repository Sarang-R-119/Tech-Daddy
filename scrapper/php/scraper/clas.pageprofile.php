<?php

class PageProfile
{

    private $page;
    private $identifiers = array();

    function __construct($page, ...$identifiers) {
        $this->page = $page;
        $this->identifiers = $identifiers;
        foreach($identifiers as $identifier) {
            if($identifier instanceof Identifier) {
                $identifier->getTag();
            }
        }
    }

    public function getPage() {
        return $this->page;
    }

    public function isPage($doc) {
        if(!($doc instanceof DOMDocument))
            return false;
        foreach($this->identifiers as $identifier) {
            if(!($identifier instanceof Identifier))
                continue;
            $tags = $doc->getElementsByTagName($identifier->getTag());
            foreach($tags as $tag) {
                if($tag->hasAttribute($identifier->getAttribute()) && $tag->getAttribute($identifier->getAttribute()) == $identifier->getValue()) {
                    continue 2; //jumps to external loop
                }
            }
            return false;
        }
        return true;
    }

}

class Identifier {

    private $tag;
    private $attr;
    private $val;

    function Identifier($tag, $attr, $val) {
        $this->tag = $tag;
        $this->attr = $attr;
        $this->val = $val;
    }

    public function getTag() {
        return $this->tag;
    }

    public function getAttribute() {
        return $this->attr;
    }

    public function getValue() {
        return $this->val;
    }

}