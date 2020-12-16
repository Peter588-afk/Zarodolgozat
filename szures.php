<?php
require_once "config.php";

$stmt=$db->query($sql);
$strTable="";
$strKosar="";
while($row=$stmt->fetch()){
  //print_r($row);
  //echo "<br>";
  $strTable.="<div class='col-md-4'><h4>{$row['name']}</h4></p><img src='{$row['picture']}' class='images'><p class='price text-success'>{$row['price']}<br><button class='btn btn-success' name='gomb' value='{$row['id']}'>Kosárba</button></div>";
}

?>