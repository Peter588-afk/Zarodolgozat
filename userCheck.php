<?php
session_start();
require_once "config.php";

$msg="";

if(isset($_GET['us'])){
    $sql="SELECT name from customers where name='{$_GET['us']}'";
    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        //$row=$stmt->fetch();
        $msg="Létezik ez {$_GET['us']} felhasználónév";

    }
}

if(isset($_GET['em'])){
    $sql="SELECT email from customers where email='{$_GET['em']}'";
    $stmt=$db->query($sql);
    if($stmt->rowCount()>0){
        //$row=$stmt->fetch();
        $msg="Létezik ilyen ({$_GET['em']}) email cim";
        
    }
}

echo $msg;
?>