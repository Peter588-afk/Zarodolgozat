<?php
session_start();
//print_r($_GET);
if(isset($_SESSION['fnev'])){
   if($_SESSION['fnev'] != 'admin'){
    header("Location:index.php");
   }
}
require_once "../config.php";
$tbl="";
$tbl2="";

$sql="SELECT a.id, a.customer_id, b.name, b.email, a.total, a.status FROM orders a, customers b where a.customer_id=b.id order by a.status desc";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
    extract($row);
    $tbl.="<tr><td>{$id}</td><td>{$customer_id}</td><td>{$name}</td><td>{$email}</td><td>{$total}</td><td>{$status}</td><td><a href='orders.php?id={$id}'>Részletek</a></td></tr>";
}
if(isset($_GET['id'])){
    $sql="SELECT a.id,b.id productId, b.name, b.price, a.quantity, d.phone, d.address FROM order_items a,products b, orders c, customers d WHERE a.product_id=b.id and a.order_id=c.id and c.customer_id=d.id and a.order_id={$_GET['id']}";    
    $stmt=$db->query($sql);
while($row=$stmt->fetch()){
    extract($row);
    $tbl2.="<tr><td>{$id}</td><td>{$productId}</td><td>{$name}</td><td>{$price}</td><td>{$quantity}</td><td>{$phone}</td><td>{$address}</td></tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="btn btn-outline-light  m-1 p-1 rounded"><a  href="../web.php"><b>Vissza</b></a></div>
    <table>
        <thead>
            <th>Order id</th>
            <th>customer id</th>
            <th>Name</th>
            <th>email</th>
            <th>total</th>
            <th>date</th>
            <th>&nbsp</th>
        </thead>
        <tbody><?=$tbl?></tbody>
        
    </table>
    <table>
        <thead>
            <th>OrderItem id</th>
            <th>product id</th>
            <th>Name</th>
            <th>price</th>
            <th>quantity</th>
            <th>phone</th>
            <th>address</th>
        </thead>
        <tbody><?=$tbl2?></tbody>
        
    </table>
</body>
</html>