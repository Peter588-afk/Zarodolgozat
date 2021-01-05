<?php
session_start();
include_once "config.php";
require_once "cart.class.php";

$cart=new Cart();

$delete_item=$cart->remove($_GET['id']);
header("Location:cart.php");
?>