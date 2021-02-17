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

<div class="row">

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="images/1.jpg" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="web.php?id=1">Utcai cipők</a>
      </h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="images/2.jpg" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="web.php?id=2">Kosárlabda cipők</a>
      </h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="images/3.jpg" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="web.php?id=3">Papucsok</a>
      </h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="images/4.jpg" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="web.php?id=4">Polok</a>
      </h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="images/5.jpg" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="web.php?id=5">Pulóverek</a>
      </h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="images/6.jpg" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="web.php?id=6">Nadrágok</a>
      </h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="images/7.jpg" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="web.php?id=7">Sapkák</a>
      </h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="images/1.jpg" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="web.php?id=8">Táskák</a>
      </h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="images/1.jpg" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="web.php?id=9">Labdák</a>
      </h4>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
    </div>
  </div>
</div>

</div>
<!-- /.row -->

</div>
<!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
<div class="container">
<p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
</div>
<!-- /.container -->
</footer>
