<?php
session_start();
print_r(session_id());
require_once "config.php";
print_r($_GET);
$id=$_GET['id'];
$sql="delete from kosar where idTermek={$id}";
try {
    $db->exec($sql);
    $_SESSION['msg']="A/Az {$id} azonositoju szemely torolve lett a tablabol";
} catch (PDOException $e) {
    $_SESSION['msg']= "A/Az {$id} azonositoju szemely nem torolheto a tablabol";
}
header("Location:web.php");
?>