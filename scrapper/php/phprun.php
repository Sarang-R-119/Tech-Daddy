<?php
/**
 * Manages essential php class instances
 * @author Alex Austin
 */
include "phpmanager.php";

session_start();
set_time_limit(60 * 2); //2 minute time limit

if(isset(ProductManager::$products) && count(ProductManager::$products) > 0) {
    echo "Product Size: " . count(ProductManager::$products);
    return;
}

ProductManager::run();
$_SESSION['products'] = ProductManager::$products;
echo "Product Size: " . count(ProductManager::$products);
?>
