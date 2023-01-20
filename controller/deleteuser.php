<?php
$id=$_GET['id'];

include '../model/workwithDB.php';


$queryuser = " FROM users WHERE id = '$id'";
$queryparts = " FROM parts WHERE ownerid = '$id'";
$workwithDBaddpart = new workwithDB();
$workwithDBaddpart->delete($queryuser);
$workwithDBaddpart->delete($queryparts);

header('Location: ../exit.php');
?>