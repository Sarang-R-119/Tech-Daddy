<?php

include "clas.product_meta.php";

class Product
{
    private $name;
    private $price;
    private $product_meta;

    function Product($name)
    {
        $this->name = $name;
        $this->product_meta = new ProductMeta();
    }

    public function updatePrice($price)
    {
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getProductMeta() {
        return $this->product_meta;
    }

}