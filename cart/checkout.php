<?php
session_start();
include_once "../config.php";
//print_r ($_SESSION);

$sql="SELECT * from customers where id=?";
$stmt=$db->prepare($sql);
$stmt->execute([$_SESSION['kulcs']]);
$row=$stmt->fetch();
extract($row);

$cartDetails="";
$sum=0;

if(isset($_SESSION['cart_contents'])){
    $total=0;
    foreach($_SESSION['cart_contents'] as $key=>$arr){
        extract($arr);
        $total=intval($quantity*$price);
        $sum+=$total;
        $cartDetails.="<tr><td>{$name}</td><td>{$quantity}</td><td>{$price}</td><td>{$total}</td></tr>";
    }
}else header("Location:../index.php");

if(isset($_POST['button'])){
    extract($_POST);
    extract($_SESSION);

    $sql="INSERT into orders values(?,?,?,?)";
    $stmt=$db->prepare($sql);
    $stmt->execute([null,$kulcs,$sum,date("Y-m-d")]);
    $sql="SELECT MAX(id) as 'mId' from orders";
    $stmt=$db->query($sql);
    $row=$stmt->fetch();
    extract($row);
    foreach($_SESSION['cart_contents'] as $key=>$arr){
        extract($arr);
        $sql="INSERT into order_items values(?,?,?,?);";
        $stmt=$db->prepare($sql);
        $stmt->execute([null,$mId,$id,$quantity]);
        $sql="update products set db=db-? where id=?";
        $stmt=$db->prepare($sql);
        $stmt->execute([$quantity,$id]);
    }
            if($stmt){
            unset($_SESSION['cart_contents']);
            header("Location:success.php?order_id=".$mId);
            }
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
    <title>Checkout</title>
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
        <div class="col-12">
            <table class="table table-striped table-hover  table-dark">
            <div class="bg-dark">
            <hr>
            <h1 class="lead bg-dark text-center text-white">Order Summary</h1>
            <hr>
            </div>
                <thead>
                    <th>Item name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </thead>
                <tbody id="table">
                    <?=$cartDetails?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan=3>Total</td>
                        <td><?=$sum?></td>
                    </tr>
                </tfoot>
            </table>
            <center>
                <a href="../web.php" class='links'>Continue shopping...</a>
                <a href="cart.php" class='links'>Back to cart</a>
            </center>
        </div>
    </div>
    
        <div class="row">
            <div class="col-12">
                <form method="post">
                <div class="bg-dark">
                    <hr>
                    <h1 class="lead bg-dark text-center text-white">Contact details</h1>
                    <hr>
                </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" id="" disabled value="<?=$_SESSION['fnev']?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" id="" disabled value="<?=$email?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" id="" disabled value="<?=$phone?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="address" id="" disabled value="<?=$address?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-group btn btn-success btn-block links" type="submit" name="button" id="" value="Place order" required>
                    </div>
                </form>
            </div>
        </div>
</div>

</body>
</html>