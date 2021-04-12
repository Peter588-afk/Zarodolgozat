<style>
.disable {
   pointer-events: none;
   cursor: default;
   background-color: gray;
}
</style>

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
  if($row["db"]==0){
    $nincs="disable";
    $szoveg="Nincs Raktáron";
  }else{
    $nincs="";
    $szoveg="";
  }  
  $strTable.="<div class='col-lg-3 col-md-4 mb-4'>
  <div class='card h-100 justify-content-center text-center'>
    <a href='#'><img class='card-img-top img-thumbnail img-fluid proba-img' src='{$row['picture']}' alt=''></a>
    <div class='card-body'>
    </div>
    <div class='card-footer'>
    <h4 class='card-title'>{$row['name']}</h4>
      <h5>{$row['price']}<span class='font-weight-bold'> Ft</span></h5>
      <a href='cart/cart.php?id={$row['id']}' class='links {$nincs} '>Kosárba</a>
      <p class='text-danger'>{$szoveg}</p>
    </div>
  </div>
</div>
";   }
}
include "megjelenit.php";
//include "kosarba.php";
?>