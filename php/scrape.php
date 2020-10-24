<?php
/**
 * Handles scrape requests
 * @author Alex Austin
 */
include "phpmanager.php";

$val = $_POST['value'];
$out = $dellScraper->scrape($val);
$data = null;

if (!isset($out)) {
    $data = array("Product not found 404", "", "");
} else {
    $data = array($out->getName(), $out->getPrice(), $out->getProductMeta()->getImageAddress());
}
echo json_encode($data);
?>