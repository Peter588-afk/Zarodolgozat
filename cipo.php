<?php
session_start();
//print_r ($_SESSION);
require_once "config2.php";

$sql="SELECT * FROM cipok";
$stmt=$db->query($sql);
$strTable="";
$strKosar="";
while($row=$stmt->fetch()){
  //print_r($row);
  //echo "<br>";
  $strTable.="<div class='col-md-4'><h4>{$row['cipoNev']}</h4></p><img src='{$row['cipoFoto']}' class='images'><p class='price text-success'>{$row['cipoAr']}<br><button class='btn btn-success' name='gomb' value='{$row['id']}'>Kosárba</button></div>";
}
//print_r($_POST);
if(isset($_POST['gomb'])){
  $id=$_POST['gomb'];
  $kosarId=session_id();
  $sql="INSERT INTO kosar values('{$kosarId}', {$id}, 1)";
  //echo $sql;
  $stmt=$db->exec($sql);
  if($stmt){
    $sql="SELECT c.cipoId, c.cipoNev, c.cipoAr, sum(b.darab) darab from cipok a, kosar b WHERE c.cipoId=a.id GROUP BY b.idTermek";
    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
      $strKosar.="<tr><td>{$row['cipoNev']}</td><td>{$row['cipoAr']}</td><td>{$row['darab']}</td>";
      $strKosar.="<td><a href='edit.php'>EDIT</a></td><td><a href='delete.php?id={$row['cipoId']}'>DELETE</a></td></tr>";
    }
  }
}
//torles utan frissites
if(isset($_SESSION['msg'])){
  $strKosar="";
  $sql="SELECT c.cipoId, c.cipoNev, c.cipoAr, sum(b.darab) darab from cipok a, kosar b WHERE c.cipoId=a.id GROUP BY b.idTermek";
    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
      $strKosar.="<tr><td>{$row['cipoNev']}</td><td>{$row['cipoAr']}</td><td>{$row['darab']}</td>";
      $strKosar.="<td><a href='edit.php'>EDIT</a></td><td><a href='delete.php?id={$row['id']}'>DELETE</a></td></tr>";
    }
}
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
    <title>Web</title>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
  <div class="container">
      <a href="webshop.html" class="navbar-brand" id="text">WebShop</a>
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

<hr>
<form method="post">
<div class="container border p-3">
    <h2 class="text-center">Egy kis ízelítő a termékekből</h2>
      <div class="row shadow p-1 bg-light">
        <div class="col-md-12">
           <div class="table-responsive">
                <div class="row" id="sor">
                  <?=$strTable?>
                </div>
          </div>
        </div>
      </div>
</form>
  <div class="container border p-3">
    <h2 class="text-center">Kosárba rakott termékek</h2>
      <div class="row shadow p-1 bg-light">
        <div class="col-md-12">
           <div class="table-responsive">
            <table class="table table-hover table-fixed-border table-striped" >
                <thead><tr><th scope="col">Termék neve</th><th scope="col">Ára</th></tr></thead>
                <tbody id="tablazat"><?=$strKosar?></tbody>
                
           </table>
          </div>
        </div>
      </div>

</div>
</body>
</html>