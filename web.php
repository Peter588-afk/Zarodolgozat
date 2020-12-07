<?php
session_start();
require_once "config.php";

//Kulcs ellenőrzés
if(!isset($_SESSION['kulcs'])){
    header("Location:index.php");
}

$foto=$_SESSION['foto']!=null ? $_SESSION['foto'] : "avatar/avatar.png";
$fnev=$_SESSION['kulcs'];

//logout
if(isset($_POST['logout'])){
    session_destroy();
    $_SESSION['kulcs']="";
    header("Location:index.php");
}

require_once "config2.php";

$sql="SELECT * FROM termekek";
$stmt=$db->query($sql);
$strTable="";
$strKosar="";
while($row=$stmt->fetch()){
  //print_r($row);
  //echo "<br>";
  $strTable.="<div class='col-md-4'><h4>{$row['nev']}</h4></p><img src='{$row['foto']}' class='images'><p class='price text-success'>{$row['ar']}<br><button class='btn btn-success' name='gomb' value='{$row['id']}'>Kosárba</button></div>";
}
//print_r($_POST);
if(isset($_POST['gomb'])){
  $id=$_POST['gomb'];
  $kosarId=session_id();
  $sql="INSERT INTO kosar values('{$kosarId}', {$id}, 1)";
  //echo $sql;
  $stmt=$db->exec($sql);
  if($stmt){
    $sql="SELECT a.id, a.nev, a.ar, sum(b.darab) darab from termekek a, kosar b WHERE a.id=b.idTermek GROUP BY b.idTermek";
    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
      $strKosar.="<tr><td>{$row['nev']}</td><td>{$row['ar']}</td><td>{$row['darab']}</td>";
      $strKosar.="<td><a href='edit.php'>EDIT</a></td><td><a href='delete.php?id={$row['id']}'>DELETE</a></td></tr>";
    }
  }
}
//torles utan frissites
if(isset($_SESSION['msg'])){
  $strKosar="";
  $sql="SELECT a.id, a.nev, a.ar, sum(b.darab) darab from termekek a, kosar b WHERE a.id=b.idTermek GROUP BY b.idTermek";
    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
      $strKosar.="<tr><td>{$row['nev']}</td><td>{$row['ar']}</td><td>{$row['darab']}</td>";
      $strKosar.="<td><a href='edit.php'>EDIT</a></td><td><a href='delete.php?id={$row['id']}'>DELETE</a></td></tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="webshop.js"></script>
    <link rel="stylesheet" href="webshop.css">
</head>
<body>
<div >
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end fixed-top">

    <a class="navbar-brand" href="#">Webshop</a>

    <ul class="nav navbar-nav text-left">
    
    <div class="dropdown nav-item">
    <button class="btn btn-danger btn-lg dropdown-toggle" type="button" data-toggle="dropdown">Cipők
    <span class="caret"></span></button>
    <ul class="dropdown-menu bg-secondary">
      <li>
            <a href="cipo.php" id="kosar" class="text-white">Kosárlabda cipők</a>
        </li>
        <li>
            <a href="utcai.php" id="utcai" class="text-white">Utcai cipők</a>
        </li>
        <li>
            <a href="papucs.php" id="papucs" class="text-white">Papucsok</a>
        </li>
    </ul>
</div>

  <div class="dropdown nav-item">
    <button class="btn btn-danger btn-lg dropdown-toggle" type="button" data-toggle="dropdown">Ruházat
    <span class="caret"></span></button>
    <ul class="dropdown-menu bg-secondary">
      <li>
            <a href="polo.php" id="polo" class="text-white">Pólók</a>
        </li>
        <li>
            <a href="pulcsi.php" id="pulover" class="text-white">Pulóverek</a>
        </li>
        <li>
            <a href="nadrag.php" id="nadrag" class="text-white">Nadrágok</a>
        </li>
    </ul>
</div>

<div class="dropdown nav-item">
    <button class="btn btn-danger btn-lg dropdown-toggle" type="button" data-toggle="dropdown">Kiegészítők
    <span class="caret"></span></button>
    <ul class="dropdown-menu bg-secondary">
    <li>
            <a href="sapka.php" id="sapka" class="text-white">Sapkák</a>
        </li>
        <li>
            <a href="taska.php" id="taska" class="text-white">táskák</a>
        </li>
        <li>
            <a href="labda.php"  id="labda" class="text-white">labdák</a>
        </li>
    </ul>
</div>

</ul>


    <button class="btn btn-success ml-auto mr-1"><img src="<?=$foto?>" alt="Avatar" width="30px" title="<?=$fnev?>"></button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
        <ul class="navbar-nav text-right">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <form method="post">    
                    <input type="submit" class="btn btn-success btn-block" value="Kijelentkezés" name="logout">
                    </form>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Right Link 2</a>
            </li>
        </ul>
    </div>
</nav>
</div>
    <div class="container">
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
        
    </div>
</body>
</html>
