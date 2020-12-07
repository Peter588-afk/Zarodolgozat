<?php
/*$strTable="";
if(isset($_POST['btn'])){
    $nev=$_POST
$strTable="<tr><td>{$nev}</td><td>{$ar}</td></tr>";
}*/
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="webshop.js"></script>
    <link rel="stylesheet" href="webshop.css">
    <title>Webshop</title>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
  <div class="container">
      <a href="webshop.php" class="navbar-brand" id="text">WebShop</a>
    <ul class="nav navbar-nav">

    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text">Cipő<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li>
            <a href="cipo.php" id="kosar">Kosárlabda cipők</a>
        </li>
        <li>
            <a href="utcai.php" id="utcai">Utcai cipők</a>
        </li>
        <li>
            <a href="papucs.php" id="papucs">Papucsok</a>
        </li>
    </ul>
    </li>

    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text">Ruházat<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li>
            <a href="polo.php" id="polo">Pólók</a>
        </li>
        <li>
            <a href="pulcsi.php" id="pulover">Pulóverek</a>
        </li>
        <li>
            <a href="nadrag.php" id="nadrag">Nadrágok</a>
        </li>
    </ul>
    </li>

    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text">Kiegészítők<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li>
            <a href="sapka.php" id="sapka">Sapkák</a>
        </li>
        <li>
            <a href="taska.php" id="taska">táskák</a>
        </li>
        <li>
            <a href="labda.php"  id="labda">labdák</a>
        </li>
    </ul>
    </li>

    <li>
      <a href="#"id="text">Űrlap</a>
    </li>

    </ul>
</nav>

<div id="background-image">
  
</div>

<!--termékek-->

<div class="col-md-12">
  <div class="row">
    <h2 class="text-center">Egy kis ízelítő a termékekből</h2>
    <div class="col-md-4">
        <h4 name="concord">Concord</h4>
        <img src="images/utcai1.jpg" id="images">
        <p class="price text-success">Ár: 10.000Ft</p>
        <button type="button" name="btn" class="btn btn-success" data-toggle="modal" data-target="details-1">Megveszem</button>
    </div>
    <div class="col-md-4">
        <h4 name="freak">Freak 2</h4>
        <img src="images/kosar1.jpg" id="images">
        <p class="price text-success">Ár: 10.000Ft</p>
        <button type="button" name="btn" class="btn btn-success" data-toggle="modal" data-target="details-1">Megveszem</button>
    </div>
    <div class="col-md-4">
        <h4 name="papucs">Jordan papucs</h4>
        <img src="images/papucs1.jpg" id="images">
        <p class="price text-success">Ár: 10.000Ft</p>
        <button type="button" name="btn" class="btn btn-success" data-toggle="modal" data-target="details-1">Megveszem</button>
    </div>

  </div>
  <div class="row">
    <div class="col-md-4">
        <h4>Póló</h4>
        <img src="images/polo1.jpg" id="images">
        <p class="price text-success">Ár: 10.000Ft</p>
        <button type="button" name="btn" class="btn btn-success" data-toggle="modal" data-target="details-1">Megveszem</button>
    </div>
    <div class="col-md-4">
        <h4>Pulóver</h4>
        <img src="images/pulcsi1.jpg" id="images">
        <p class="price text-success">Ár: 10.000Ft</p>
        <button type="button" name="btn" class="btn btn-success" data-toggle="modal" data-target="details-1">Megveszem</button>
    </div>
    <div class="col-md-4">
        <h4>Nadrág</h4>
        <img src="images/nadrag1.jpg" id="images">
        <p class="price text-success">Ár: 10.000Ft</p>
        <button type="button" name="btn" class="btn btn-success" data-toggle="modal" data-target="details-1">Megveszem</button>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
        <h4>Sapka</h4>
        <img src="images/sapka1.jpg" id="images">
        <p class="price text-success">Ár: 10.000Ft</p>
        <button type="button" name="btn" class="btn btn-success" data-toggle="modal" data-target="details-1">Megveszem</button>
    </div>
    <div class="col-md-4">
        <h4>Táska</h4>
        <img src="images/taska1.jpg" id="images">
        <p class="price text-success">Ár: 10.000Ft</p>
        <button type="button" name="btn" class="btn btn-success" data-toggle="modal" data-target="details-1">Megveszem</button>
    </div>
    <div class="col-md-4">
        <h4>labda</h4>
        <img src="images/labda1.jpg" id="images">
        <p class="price text-success">Ár: 10.000Ft</p>
        <button type="button" name="btn" class="btn btn-success" data-toggle="modal" data-target="details-1">Megveszem</button>
    </div>

</div>

<div>
<table><thead><th>Termék neve</th><th>Ára</th></thead>
        
</table>
</div>

</div>
</body>
</html>