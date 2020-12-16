<?php
session_start();

require_once "config.php";

//Kulcs ellenőrzés
if(!isset($_SESSION['kulcs'])){
    header("Location:index.php");
}

$foto=$_SESSION['avatar']!=null ? $_SESSION['avatar'] : "avatar/avatar.png";
$fnev=$_SESSION['kulcs'];

//logout
if(isset($_POST['logout'])){
    session_destroy();
    $_SESSION['kulcs']="";
    header("Location:index.php");
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
<div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end fixed-top">

    <a class="navbar-brand" href="web.php">Webshop</a>

    <ul class="nav navbar-nav text-left">
    
    <div class="dropdown nav-item">
    <button class="btn btn-danger btn-lg dropdown-toggle" type="button" data-toggle="dropdown">Cipők
    <span class="caret"></span></button>
    <ul class="dropdown-menu bg-secondary">
      <li>
            <a href="web.php?p=kosarCipo.php" id="kosar" class="text-white">Kosárlabda cipők</a>
        </li>
        <li>
            <a href="web.php?p=utcai.php" id="utcai" class="text-white">Utcai cipők</a>
        </li>
        <li>
            <a href="web.php?p=papucs.php" id="papucs" class="text-white">Papucsok</a>
        </li>
    </ul>
</div>

  <div class="dropdown nav-item">
    <button class="btn btn-danger btn-lg dropdown-toggle" type="button" data-toggle="dropdown">Ruházat
    <span class="caret"></span></button>
    <ul class="dropdown-menu bg-secondary">
      <li>
            <a href="web.php?p=polo.php" id="polo" class="text-white">Pólók</a>
        </li>
        <li>
            <a href="web.php?p=pulcsi.php" id="pulover" class="text-white">Pulóverek</a>
        </li>
        <li>
            <a href="web.php?p=nadrag.php" id="nadrag" class="text-white">Nadrágok</a>
        </li>
    </ul>
</div>

<div class="dropdown nav-item">
    <button class="btn btn-danger btn-lg dropdown-toggle" type="button" data-toggle="dropdown">Kiegészítők
    <span class="caret"></span></button>
    <ul class="dropdown-menu bg-secondary">
    <li>
            <a href="web.php?p=sapka.php" id="sapka" class="text-white">Sapkák</a>
        </li>
        <li>
            <a href="web.php?p=taska.php" id="taska" class="text-white">táskák</a>
        </li>
        <li>
            <a href="web.php?p=labda.php"  id="labda" class="text-white">labdák</a>
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
    </div>

<?php
//print_r ($_GET);
    if(isset($_GET['p'])){
        include $_GET['p'];
    }else{
        include "home.php";
    }
?>
</div>

</body>
</html>
