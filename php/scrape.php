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

$products = array_slice($_SESSION['products'], $offset, $length);
$out = array();

/** @var Product $product */
foreach ($products as $product) {
    array_push($out, $product->toArray());
}
echo json_encode($out);
?>