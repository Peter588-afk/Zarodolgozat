<?php
require_once "config.php";
$jelszo=password_hash("12345",PASSWORD_DEFAULT);
$sql="INSERT into users values(null, 'Én', 'Peter', '{$jelszo}')";
$stmt=$db->exec($sql);

?>