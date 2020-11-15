<?php

require_once "clas.productmeta.php";

class Product
{
    private $id;
    private $brand;
    private $name;
    private $price;
    private $product_meta;
    private $description;

    function __construct($brand, $name)
    {
        $this->id = uniqid();
        $this->brand = $brand;
        $this->name = $name;
        $this->description = "No description for this item exists yet.";
        $this->product_meta = new ProductMeta();
    }

    public function updatePrice($price)
    {
        $this->price = $price;
    }

    public function getUID() {
        return $this->id;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getProductMeta() {
        return $this->product_meta;
    }

    public function toArray() {
        return array(
            "id" => $this->id,
            "brand" => $this->getBrand(),
            "name" => $this->getName(),
            "price" => $this->getPrice(),
            "description" => $this->getDescription(),
            "meta" => $this->getProductMeta()->toArray());
    }

    public function __toString()
    {
        return "{" . $this->brand . "," . $this->name. "," . $this->description . "," . $this->price . "}";
    }

}