<?php
session_start();
require_once "config.php";
$msg=isset($_SESSION['msg']) ? $_SESSION['msg'] : "";
if(isset($_POST['login'])){
    $fnev=$_POST['name'];
    $pw=$_POST['password'];

    $sql="SELECT password,avatar,id from customers where name='{$fnev}'";
    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        $row=$stmt->fetch();
        print_r($_SESSION);
        if(password_verify($pw,$row['password'])){
            $_SESSION['kulcs']=$row['id'];
            $_SESSION['fnev']=$fnev;
            $_SESSION['avatar']=$row['avatar'];
            header("Location:web.php");
        }else $msg="Helytelen jelszó vagy felhasználónév";
    }else $msg="Helytelen jelszó vagy felhasználónév";

}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .box{
            width: 400px;
        }
    </style>
</head>
<body>

<form class="box" method="post">
  <h1>Login</h1>
  <div class="text-danger"><?=$msg?></div>
  <input type="text" name="name" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" name="login" value="Login">
    <a href="register.php">Regisztráció</a>
</form>

</body>
</html>