<?php
session_start();
require_once "config.php";

$msg="";

print_r($_POST);
if(isset($_POST['mentes'])){
    $fnev=$_POST['name'];
    $email=$_POST['email'];
    $jelszo=$_POST['password'];
    $telefon=$_POST['phone'];

   /* $sql="SELECT email,username from users where email='{$email}' or username='{$fnev}'";

    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        $msg="Létezik ilyen email/felhasználónév";

    }else{
        */
        $pw=password_hash($jelszo, PASSWORD_DEFAULT);
        $msgFoto="";

        include "avatar.php";
        echo "<br>";
        echo $msgFoto;
        if($msgFoto==""){
        $sql="INSERT INTO customers values(null, '{$fnev}', '{$email}', '{$pw}', '{$telefon}' ,'{$newName}')";

        echo $sql;

        $stmt=$db->exec($sql);
        if($stmt){
            $_SESSION['msg']="Sikeres Regisztráció";
            header("Location:index.php");
        
            }
    }
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
    <link rel="stylesheet" href="index.css">
    <script src="ellenor2.js"></script>
</head>
<body>

<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form method="post" enctype="multipart/form-data">
                <h2 class="text-center">Bejelentkezés</h2>
                <div class="text-danger" id="msg"><?=$msg?></div>
			<input type="text" name="name" placeholder="Felhasználónév" required>
			<input type="text" name="email" placeholder="Email cím" required>
            <input type="password" name="password" id="pw1" placeholder="Jelszó" required>
            <input type="password" name="pwConf" id="pw2" placeholder="Jelszó megerősítése" required>
            <input type="text" name="phone" id="phone" placeholder="Telefonszáma" required>
            <input type="file" name="avatar">
            <input type="checkbox" name="" id="" required> <a href="#">Adatkezelési feltételek...</a>
            <input type="submit" class="btn btn-success btn-block" name="mentes" id="btn" value="Regisztráció">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Szia!</h1>
				<p>Van már fiókod? Jelentkezz be itt!</p>
				<button class="ghost" id="signUp"><a href="index.php">Bejelentkezés</a></button>
			</div>
		</div>
	</div>
</div>
</body>
</html>