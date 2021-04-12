<?php
session_start();
//print_r(session_id());
require_once '../config.php';

$name=$price=$picture=$kategId=$darab=$msg="";

$strOpt='';
$sql="select id,leiras from kategoria order by leiras";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
	$strOpt.="<option value='{$row['id']}'>{$row['leiras']}</option>";
}
//print_r($_POST);
if(isset($_POST['mentes']) && $_POST['name']!=null && $_POST['price']!=null && $_POST['picture']!=null && $_POST['kategId']!=null){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $picture=$_POST['picture'];
    $darab=$_POST['darab'];
    $kategId=$_POST['kategId'];
    $sql="insert into products values (null,'{$name}',{$price},'{$picture}',{$kategId},{$darab})";
    echo $sql;
    $stmt=$db->exec($sql);
    if($stmt){
        $_SESSION['msg']="sikeres adatbeiras";  
           header("Location: admin.php");
    }
    else
    $_SESSION['msg']="hiba!! nem sikerult az adat beirasa az adatbazisba";
    
}


?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />
    <script src="../bootstrap/jquery.min.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>      
	<title>Munkasok</title>
</head>

<body>
    <div class="container border">
        <h3 class="text-center">Új Termék adatainak bevezetése</h3>
        <div class="row justify-content-center p-3">	
			<div class="col-md-4" id="hibak" ><?=isset($_SESSION['msg'])? $_SESSION['msg'] : ""?></div>	
			<a class="btn btn-info " href="admin.php">Vissza</a>
		</div>
        <div class="row m-1 p-2">   
            <div class="col-5">
                <form action="" method="post">
                <div class="form-group">
                        <label for="">A termék neve:</label>
                        <input type="text" name="name" class="form-control" value="<?=$name?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ára:</label>
                        <input type="number" name="price" class="form-control" value="<?=$price?>">
					</div>
                    <div class="form-group">
                        <label for="">Kép:</label>
                        <input type="text" name="picture" class="form-control" value="<?=$picture?>">
					</div>
                    <div class="form-group">
                        <label for="">Darabszám:</label>
                        <input type="number" name="darab" class="form-control" value="<?=$darab?>">
					</div>
                    <div class="form-group">
                        <label for="">Kategória:</label>
                        <select name="kategId" class="form-control">
                            <?=$strOpt?>
                        </select>
					</div>
                    <input type="submit" name="mentes" value="mentés" >
                </form>
              </div>
         </div>
    </div>
</body>
</html>                