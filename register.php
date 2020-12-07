<?php
session_start();
require_once "config.php";

$msg="";

//print_r($_POST);
if(isset($_POST['mentes'])){
    $fnev=$_POST['username'];
    $email=$_POST['email'];
    $nev=$_POST['name'];
    $jelszo=$_POST['password'];

    $sql="SELECT email,username from users where email='{$email}' or username='{$fnev}'";

    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        $msg="Létezik ilyen email/felhasználónév";

    }else{
        $pw=password_hash($jelszo, PASSWORD_DEFAULT);
        $msgFoto="";

        include "avatar.php";
        echo "<br>";
        echo $msgFoto;
        if($msgFoto==""){
        $sql="INSERT INTO users values(null, '{$fnev}', '{$nev}', '{$email}', '{$pw}', '{$newName}')";

        echo $sql;

        $stmt=$db->exec($sql);
        if($stmt){
            $_SESSION['msg']="Sikeres Regisztráció";
            header("Location:index.php");
        
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="ellenor.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <!--<div class="container">
        <div class="row justify content-md-center p-5">
            <form method="post" class="col-4 border" enctype="multipart/form-data">
                <h2 class="text-center">Bejelentkezés</h2>
                <div class="text-danger" id="msg"><?=$msg?></div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Felhasználónév" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email cím" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Neve" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="pw1" placeholder="Jelszó" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pwConf" id="pw2" placeholder="Jelszó megerősítése" required>
                </div>
                <div class="form-group">   
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="" id="" required> <a href="#">Adatkezelési feltételek...</a>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" name="mentes" id="btn" value="Regisztráció">
                </div>
            </form>
        </div>
    </div>-->

<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form method="post" enctype="multipart/form-data">
                <h2 class="text-center">Bejelentkezés</h2>
                <div class="text-danger" id="msg"><?=$msg?></div>
			<input type="text" name="username" placeholder="Felhasználónév" required>
			<input type="text" name="email" placeholder="Email cím" required>
			<input type="text" name="name" placeholder="Neve" required>
            <input type="password" name="password" id="pw1" placeholder="Jelszó" required>
            <input type="password" name="pwConf" id="pw2" placeholder="Jelszó megerősítése" required>
            <input type="file" name="foto">
            <input type="checkbox" name="" id="" required> <a href="#">Adatkezelési feltételek...</a>
            <input type="submit" class="btn btn-success btn-block" name="mentes" id="btn" value="Regisztráció">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp"><a href="index.php">Bejelntkezés</a></button>
			</div>
		</div>
	</div>
</div>

</body>
</html>