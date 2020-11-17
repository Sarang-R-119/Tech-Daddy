<?php
/**
 * Handles scrape requests
 * @author Alex Austin
 */

include "phpmanager.php";
require_once "clas.product.php";

session_start();

$offset = intval($_POST['offset']);
$length = intval($_POST['length']);

/** @var ProductManager $productManager */
$productManager = $_SESSION['product_manager'];
$product_array = array_slice($productManager::$products, $offset, $length);
$out = array();

/** @var Product $product */
foreach ($product_array as $product) {
    array_push($out, $product->toArray());
}
echo json_encode($out);
?>