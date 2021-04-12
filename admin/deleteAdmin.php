<?php
session_start();
print_r(session_id());
require_once "../config.php";
print_r($_GET);
$id=$_GET['id'];
$sql="delete from products where id={$id}";
echo $sql;
try {
    $db->exec($sql);
    $_SESSION['msg']="A/Az {$id} azonositoju termek torolve lett a tablabol";
} catch (PDOException $e) {
    $_SESSION['msg']= "A/Az {$id} azonositoju termek nem torolheto a tablabol";
}
header("Location:admin.php");
?>