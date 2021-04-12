<?php
include '../config.php';

$columnName = $_POST["column"];
$columnValue = $_POST["editval"];
$id= $_POST["id"];
$sql="update products set 
{$columnName}='{$columnValue}' where id={$id}";
echo $sql;
$stmt=$db->exec($sql);

?>