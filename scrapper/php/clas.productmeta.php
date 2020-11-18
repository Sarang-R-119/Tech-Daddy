<?php


class ProductMeta
{
    private $product_address;
    private $image_address;

    public function setAddress($address)
    {
        $this->product_address = $address;
    }

    public function setImage($address)
    {
        $this->image_address = $address;
    }

    public function getAddress()
    {
        return $this->product_address;
    }

    public function getImageAddress()
    {
        return $this->image_address;
    }

    public function toArray()
    {
        return array(
            "address" => $this->getAddress(),
            "image_address" => $this->getImageAddress());
    }

}