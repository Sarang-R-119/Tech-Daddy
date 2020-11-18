<?php
/**
 * Manages essential php class instances
 * @author Alex Austin
 */
include "phpmanager.php";

ini_set('memory_limit', '128M');
set_time_limit(60 * 35); //2 minute time limit

session_start();

$_SESSION["product_manager"] = new ProductManager();

$_SESSION["product_manager"]->run();
echo "Done!";
?>
