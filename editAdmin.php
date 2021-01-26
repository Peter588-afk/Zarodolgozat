<?php
session_start();
print_r(session_id());
require_once 'config.php';

$strOpt='';
$sql="select id,leiras from kategoria order by leiras";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
	$strOpt.="<option value='{$row['id']}'>{$row['leiras']}</option>";
}
//ha megerkezett az URL-ben az azonosito, eg kell jeleniteni a megfelelo rekordot:
if(isset($_GET['id'])){
	$id=$_GET['id'];//ezt az $id elrejtjuk a form-ban egy hidden tipusu tag-ban
	$sql="select * from products where id={$id}";
	$stmt=$db->query($sql);
	$row=$stmt->fetch();
	$name=$row['name'];
    $price=$row['price'];
    $picture=$row['picture'];
    $kategId=$row['kategId'];
}


//print_r($_POST);
if(isset($_POST['mentes']) && $_POST['name']!=null && $_POST['price']!=null && $_POST['picture']!=null && $_POST['kategId']!=null){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $picture=$_POST['picture'];
    $kategId=$_POST['kategId'];
	$id=$_POST['id'];
	$sql="update products set name='{$name}', price={$price}, picture='{$picture}', kategId={$kategId} where id={$id}";
	echo $sql;
    $stmt=$db->exec($sql);
    if($stmt){
           $_SESSION['msg']="sikeres adatmodsitas";  
           
    }
    else
    $_SESSION['msg']="hiba!! nem sikerult az adat modositasa";
        header("Location: admin.php");
}


?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>      
	<title>Munkasok</title>
</head>

<body>
    <div class="container border">
        <h3 class="text-center">Adatok modositasa</h3>
        <div class="row justify-content-center p-3">	
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
                        <label for="">Kategória:</label>
                        <select name="kategId" class="form-control">
                            <?=$strOpt?>
                        </select>
					</div>
					<input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="mentes" value="modositas" >
                </form>
              </div>
         </div>
    </div>
</body>
</html>