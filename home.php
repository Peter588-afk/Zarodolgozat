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
          $strCarousel.="<div class='carousel-item active center'> <a href='web.php?id={$id}'> <img src='{$picture}' alt='{$picture}'></a> </div>";
    }else $strCarousel.="<div class='carousel-item center'> <a href='web.php?id={$id}'>  <img src='{$picture}' alt='{$picture}'> </a> </div>";

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
<!--<div class="slidershow middle">

      <div class="slides">
        <input type="radio" name="r" id="r1" checked>
        <input type="radio" name="r" id="r2">
        <input type="radio" name="r" id="r3">
        <input type="radio" name="r" id="r4">
        <input type="radio" name="r" id="r5">
        <div class="slide s1">
          <img src="images/11.jpg" alt="">
        </div>
        <div class="slide">
          <img src="images/22.jpg" alt="">
        </div>
        <div class="slide">
          <img src="images/33.jpg" alt="">
        </div>
        <div class="slide">
          <img src="images/44.jpg" alt="">
        </div>
        <div class="slide">
          <img src="images/55.jpg" alt="">
        </div>
      </div>

      <div class="navigation">
        <label for="r1" class="bar"></label>
        <label for="r2" class="bar"></label>
        <label for="r3" class="bar"></label>
        <label for="r4" class="bar"></label>
        <label for="r5" class="bar"></label>
      </div>
    </div>

    <div class="gallery-section">
      <div class="inner-width">
        <h1>My Gallery</h1>
        <div class="border"></div>
        <div class="gallery">

          <a href="images/utcai1.jpg" class="image">
            <img src="images/utcai1.jpg" alt="">
          </a>

          <a href="images/kosar1.jpg" class="image">
            <img src="images/kosar1.jpg" alt="">
          </a>

          <a href="images/papucs1.jpg" class="image">
            <img src="images/papucs1.jpg" alt="">
          </a>

          <a href="images/polo1.jpg" class="image">
            <img src="images/4.jpg" alt="">
          </a>

          <a href="images/pulcsi1.jpg" class="image">
            <img src="images/pulcsi1.jpg" alt="">
          </a>

          <a href="images/nadrag1.jpg" class="image">
            <img src="images/nadrag1.jpg" alt="">
          </a>

          <a href="images/taska1.jpg" class="image">
            <img src="images/taska1.jpg" alt="">
          </a>

          <a href="images/sapka1.jpg" class="image">
            <img src="images/sapka1.jpg" alt="">
          </a>
          <a href="images/lapbda1.jpg" class="image">
            <img src="images/labda1.jpg" alt="">
          </a>

        </div>
      </div>
    </div>


  <script>
    $(".gallery").magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery:{
        enabled: true
      }
    });
  </script>-->
<!-- 

<div class="slidershow middle">

      <div class="slides">
        <input type="radio" name="r" id="r1" checked>
        <input type="radio" name="r" id="r2">
        <input type="radio" name="r" id="r3">
        <input type="radio" name="r" id="r4">
        <input type="radio" name="r" id="r5">
        <div class="slide s1">
          <img src="images/1.jpg" alt="" class="images">
        </div>
        <div class="slide">
          <img src="images/2.jg" alt="" class="images">
        </div>
        <div class="slide">
          <img src="images/3.jpg" alt="" class="images">
        </div>
        <div class="slide">
          <img src="images/4.jpg" alt="" class="images">
        </div>
        <div class="slide">
          <img src="images/5.jpg" alt="" class="images">
        </div>
        <div class="slide">
          <img src="images/6.jpg" alt="" class="images">
        </div>
        <div class="slide">
          <img src="images/7.jpg" alt="" class="images">
        </div>
        <div class="slide">
          <img src="images/8.jpg" alt="" class="images">
        </div>
        <div class="slide">
          <img src="images/9.jpg" alt="" class="images">
        </div>
      </div>

      <div class="navigation">
        <label for="r1" class="bar"></label>
        <label for="r2" class="bar"></label>
        <label for="r3" class="bar"></label>
        <label for="r4" class="bar"></label>
        <label for="r5" class="bar"></label>
        <label for="r6" class="bar"></label>
        <label for="r7" class="bar"></label>
        <label for="r8" class="bar"></label>
        <label for="r9" class="bar"></label>
      </div>
    </div>-->
   