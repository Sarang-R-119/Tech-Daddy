<?php


class ProductMeta
{

    private $image_address;

    function ProductMeta() {
    }

    public function setImage($address) {
        $this->image_address = $address;
    }

    public function getImageAddress() {
        return $this->image_address;
    }

}