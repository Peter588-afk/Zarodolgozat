<?php
session_start();
include_once "config.php";
include_once "cart.class.php";

$cart=new Cart();

$updateItem=$cart->updateQty($_GET['id'],$_GET['qty']);
?>