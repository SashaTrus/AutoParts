<?php
$id=$_GET['id'];

include '../model/workwithDB.php';

$query = " users SET admin = '1' WHERE id = '$id'";
$workwithDBaddpart = new workwithDB();
$workwithDBaddpart->update($query);

header('Location: ../view/allusers.php');
?>