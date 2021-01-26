<?php
require_once "config.php";
include "product.class.php";
//print_r ($_GET);

$product=new Product($db);
$stmt=$product->read();
$nr=$stmt->rowCount();

$sql="SELECT * from products where kategId={$_GET['id']}";
//echo $sql;
echo "<br>";
$stmt=$db->query($sql);
$strTable="";

if($nr>0){

while($row=$stmt->fetch()){
  //print_r($row);
  //echo "<br>";
  $strTable.="<div class='box'>
  <img src='{$row['picture']}' class='imagess'>
  <p class='price text-success'>{$row['price']}
 <br> <a href='cart.php?id={$row['id']}' class='links'>Kosárba</a>
</div>";  }
}
include "megjelenit.php";
//include "kosarba.php";
?>