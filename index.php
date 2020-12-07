<?php
session_start();
require_once "config.php";
$msg=isset($_SESSION['msg']) ? $_SESSION['msg'] : "";
if(isset($_POST['login'])){
    $fnev=$_POST['username'];
    $pw=$_POST['password'];

    $sql="SELECT password,foto from users where username='{$fnev}'";
    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        $row=$stmt->fetch();
        //print_r($row);
        if(password_verify($pw,$row['password'])){
            $_SESSION['kulcs']=$fnev;
            $_SESSION['foto']=$row['foto'];
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
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
</head>
<body>
    <!--<div class="container">
        <div class="row justify content-md-center p-5">
            <form method="post" class="col-4 border">
                <h2 class="text-center">Bejelentkezés</h2>
                <div class="text-danger"><?=$msg?></div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Felhasználónév" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Jelszó" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" name="login" value="Bejelentkezés">
                </div>
                <div>
                    <a href="register.php">Regisztráció</a>
                </div>
            </form>
        </div>
    </div>-->
        
        <div class="container" id="container">
	<div class="form-container sign-in-container">
        <form method="post">
            <h2 class="text-center">Bejelentkezés</h2>
            <div class="text-danger"><?=$msg?></div>
			<input type="text" name="username" placeholder="Felhasználónév" required>
			<input type="password" name="password" placeholder="Jelszó" required>
			<input type="submit" name="login" value="Bejelentkezés">
		
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp"><a href="register.php">Regisztráció</a></button>
			</div>
		</div>
	</div>
</div>
</form>
    
</body>
</html>