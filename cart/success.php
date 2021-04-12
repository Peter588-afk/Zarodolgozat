<?php
session_start();
require_once "../config.php";

$id=$_GET['order_id'];
$orderinfo="SELECT orders.id,orders.total,orders.status,customers.name,customers.email,customers.phone
from orders inner join customers on customers.id=orders.customer_id where orders.id={$id}";
$stmt=$db->query($orderinfo);
$row=$stmt->fetch();
extract($row);

$orderStr="";

$orderdetails="SELECT c.name,c.price,b.quantity,c.price*b.quantity as subtotal
from orders a, order_items b, products c
where a.id=b.order_id and b.product_id=c.id and a.id={$id}";
$stmt=$db->query($orderdetails);
while($row=$stmt->fetch()){
    extract($row);
    $orderStr.="<tr><td>{$name}</td><td>{$quantity}</td><td>{$price}</td><td>{$subtotal}</td></tr>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="../bootstrap/jquery.min.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>
    <title>Success</title>
</head>
<style>
      .links {
    border: 0;
    padding: 4px 8px;
    background-color: rgb(134, 204, 102);
    color: #fff;
    font-family: font-bold;
    font-size: 24px;
    border-radius: 3px;
}
</style>
<body style="background-color:gray;">

<div class="container">
    <div class="row">
        <div class="row col-12">
            <div class='col-12'>
            <center>
            <div class="bg-dark"><h1 class="lead bg-dark text-center text-white">Rendelés Adatai</h1></div>
                <div>Reference id: <?=$id?></div>
                <div>Total: <?=$total?></div>
                <div>Placed on <?=$status?></div>
                <div>Buyer name: <?=$_SESSION['fnev']?></div>
                <div>Email: <?=$email?></div>
                <div>Phone: <?=$phone?></div>
            </div>
            <div class='col-12'>
                <table class="table table-striped table-hover  table-dark">
                    <thead>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                    </thead>
                    <tbody>
                        <?=$orderStr?>
                    </tbody>
                </table>
                
                <center><a class="links" href="../web.php">Vissza a fő oldalra</a></center>
            </div>
            </center>
        </div>
    </div>
</div>
</body>
</html>