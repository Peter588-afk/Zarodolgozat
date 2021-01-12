<?php
session_start();
include_once "config.php";
include "cart.class.php";

$cart=new Cart();
$sum=0;
$strCart=0;
//print_r($_GET);
if(isset($_GET['id'])){
    $query=$db->query("SELECT * from products where id={$_GET['id']}");
    $row=$query->fetch();
    extract($row);

    $item_data=array('id'=>$id,'name'=>$name,'price'=>$price,'quantity'=>1);
    $insert_item=$cart->insert($item_data);
    header("Location:cart.php");
}

if(isset($_SESSION['cart_contents'])){
    $total=0;
    foreach($_SESSION['cart_contents'] as $key=>$arr){
        extract($arr);
        $total=intval($quantity*$price);
        $sum+=$total;
        $strCart.="<tr><td>{$name}</td><td><input type='number' value='{$quantity}' id='{$id}' min='1'></td><td>{$price}</td><td>{$total}</td><td><a href='delete.php?id={$id}' class='remove-product'>Delete</a></td></tr>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="cart.js"></script>
    <title>Cart</title>
</head>
<style>
    .remove-product {
    border: 0;
    padding: 4px 8px;
    background-color: #c66;
    color: #fff;
    font-family: font-bold;
    font-size: 12px;
    border-radius: 3px;
}
  
  .remove-product:hover {
    background-color: #a44;
  }

  .links {
    border: 0;
    padding: 4px 8px;
    background-color: rgb(134, 204, 102);
    color: #fff;
    font-family: font-bold;
    font-size: 24px;
    border-radius: 3px;
}
  
  .links:hover {
    background-color: #a44;
  }
</style>
<body>
    <center>
    <div class="col-md-6">
    <h1>Shopping Cart</h1>
    <table class="table table-striped table-hover  table-dark">
    <thead>
        <th>Item name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Action</th>
    </thead>
        <tbody id="table">
            <?=$strCart?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan=3>Total</td>
                <td><?=$sum?></td>
            </tr>
        </tfoot>
    </table>
    <a href="web.php" class='links'>Continue shopping...</a>
    <a href="checkout.php" class='links'>Checkout</a>

</div>
</center>
</body>
</html>