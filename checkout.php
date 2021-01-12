<?php
session_start();
include_once "config.php";
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
}else header("Location:index.php");

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
    }
    /*if($stmt){
        echo "Sikeres adatbeiras";
        $sql="SELECT MAX(id) as 'id' from customers";
        $stmt=$db->query($sql);
        $row=$stmt->fetch();
        $customers_id=$row['id'];
        $date=date("Y-m-d");
        $sql="INSERT into orders values(null,{$customers_id},{$sum},'{$date}')";
        $stmt=$db->exec($sql);
        if($stmt){
            echo "Sikeres orders írás";
            $sql="SELECT MAX(id) as 'id' from orders";
            $stmt=$db->query($sql);
            $row=$stmt->fetch();
            $order_id=$row['id'];

            $sql="";
            foreach($_SESSION['cart_contents'] as $key=>$arr){
                extract($arr);
                $sql.="INSERT into order_items values(null,{$order_id},{$id},{$quantity});"; 
            }
            $stmt=$db->exec($sql);*/
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
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <title>Checkout</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6">
            <table class="table table-bordered">
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
            <a href="web.php">Continue shopping...</a>
        </div>
        <div class="col-6">
            <form method="post">
                <h2>Contact details</h2>
                <div class="form-group">
                    <input class="form-control" type="text" name="name" id="" disabled value="<?=$name?>" required>
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
                    <input class="form-group btn btn-success btn-block" type="submit" name="button" id="" value="Place order" required>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>