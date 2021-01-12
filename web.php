<?php
session_start();

require_once "config.php";

//Kulcs ellenőrzés
if(!isset($_SESSION['kulcs'])){
    //header("Location:index.php");
    echo "Nincs kulcs";
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
    <script src="bootstrap/popper.min.js"></script>
    <script src="webshop.js"></script>
    <link rel="stylesheet" href="style22.css">

    <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 30%;
    height: 60%;
  }
  ul.carousel-indicators{
        background: black;
  }
    ul.carousel-indicators li.active {
        background: yellow;
  }
  .carousel-control-prev {
    background: black;
  }
  .carousel-control-next{
    background: black;
  }
  </style>
</head>
<body>

<header>
    <div class="myNavBar">
        <div class="container">
            <input type="checkbox" name="" id="check">
            
            <div class="logo-container">
            <a href="web.php"><h3 class="logo">Web<span>Shop</span></h3>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: .85s">
                            <a href="#">Cipők<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                <li class="dropdown-link">
                                    <a href="web.php?id=2" id="kosar">Kosárlabda cipők</a>
                                </li>
                                <li class="dropdown-link">
                                    <a href="web.php?id=1" id="utcai">Utcai cipők</a>
                                </li>
                                <li class="dropdown-link">
                                    <a href="web.php?id=3" id="papucs">Papucsok</a>
                                </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="#">Ruházat<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                <li class="dropdown-link">
                                    <a href="web.php?id=4" id="polo">Pólók</a>
                                </li>
                                <li class="dropdown-link">
                                    <a href="web.php?id=5" id="pulover">Pulóverek</a>
                                </li>
                                <li class="dropdown-link">
                                    <a href="web.php?id=6" id="nadrag">Nadrágok</a>
                                </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="#">Kiegészítők<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                <li class="dropdown-link">
                                    <a href="web.php?id=7" id="sapka">Sapkák</a>
                                </li>
                                <li class="dropdown-link">
                                    <a href="web.php?id=8" id="taska">táskák</a>
                                </li>
                                <li class="dropdown-link">
                                    <a href="web.php?id=9"  id="labda">labdák</a>
                                </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="log-sign" style="--i: 1.8s">
                    <button class="btn transparent"><img src="<?=$foto?>" alt="Avatar" width="30px" title="<?=$fnev?>"></button>
                    <form method="post">    
                        <input type="submit" class="btn transparent" value="Kijelentkezés" name="logout">
                    </form>
                    <a class="nav-link transparent" href="cart.php"><img src="images/cart.png" width="50px" height="50px"></a>
                </div>
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>
    </div>
    <div class="container">
      <div id="background-image">
      </div>
    </div>
</div>
<?php
//print_r ($_GET);
    if(isset($_GET['id'])){
        //include $_GET['id'];
        include "szures.php";
    }else{
        include "home.php";
    }
?>


</body>
</html>
