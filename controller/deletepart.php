<?php
$id=$_GET['id'];

include '../model/workwithDB.php';

$query = " FROM parts WHERE id = '$id'";
$workwithDBaddpart = new workwithDB();
$workwithDBaddpart->delete($query);

header("Location: ".$_SERVER['HTTP_REFERER']);
?>