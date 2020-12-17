<?php
require_once "config.php";

$sql="SELECT a.id,a.leiras as leiras ,b.picture FROM kategoria as a, products as b WHERE a.id=b.kategId AND b.picture=CONCAT('images/',leiras,'1.jpg')";
$stmt=$db->query($sql);
$strCarousel="";
while($row=$stmt->fetch()){
  extract($row);
  $strCarousel.="<div class='carousel-item active'> <img src='{$picture}' alt='{$picture}' width='1100' height='500'> </div>";
}

?>
<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
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
   