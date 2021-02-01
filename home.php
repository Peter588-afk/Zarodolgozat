<?php
require_once "config.php";

$sql="SELECT a.id,a.leiras as leiras ,b.picture FROM kategoria as a, products as b WHERE a.id=b.kategId AND b.picture=CONCAT('images/',leiras,'1.jpg')";
$stmt=$db->query($sql);
$strCarousel="";
$i=0;
while($row=$stmt->fetch()){
  extract($row);
    $i++;
    if($i==1){
          $strCarousel.="<div class='carousel-item active center'> <div class='d-block w-100'><a href='web.php?id={$id}'> <img src='{$picture}' alt='{$picture}'></a> </div></div>";
    }else $strCarousel.="<div class='carousel-item center'> <div class='d-block w-100'> <a href='web.php?id={$id}'>  <img src='{$picture}' alt='{$picture}'> </a> </div> </div>";

}



?>
<center>
<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
  <li data-target="#demo" data-slide-to="3"></li>
  <li data-target="#demo" data-slide-to="4"></li>
  <li data-target="#demo" data-slide-to="5"></li>
  <li data-target="#demo" data-slide-to="6"></li>
  <li data-target="#demo" data-slide-to="7"></li>
  <li data-target="#demo" data-slide-to="8"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <?=$strCarousel?>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>
</center>
