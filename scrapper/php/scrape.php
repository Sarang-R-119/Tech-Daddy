<?php
/**
 * Handles scrape requests
 * @author Alex Austin
 */

include "phpmanager.php";
require_once "clas.product.php";

$offset = intval($_POST['offset']);
$length = intval($_POST['length']);

$out = array();
echo json_encode($out);
?>