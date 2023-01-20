<?php
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$typeofuser = filter_var(trim($_POST['typeofuser']),FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING);
$city = filter_var(trim($_POST['city']),FILTER_SANITIZE_STRING);
$img = filter_var(trim($_POST['img']),FILTER_SANITIZE_STRING);
$about = filter_var(trim($_POST['about']),FILTER_SANITIZE_STRING);
$email= $_COOKIE['useremail'];


include '../model/workwithDB.php';

$fileName = $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];
move_uploaded_file($tmp_name, "../img/". $fileName);

$workwithDBuser = new workwithDB();
$query = " users SET name = '$name', typeofuser = '$typeofuser',phone = '$phone', city= '$city', img = '$fileName', about = '$about' WHERE email = '$email'";
$workwithDBuser->update($query);
header('Location: ../view/useraccount.php');
?>