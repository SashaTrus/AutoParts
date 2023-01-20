<?php
session_start();
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$typeofuser = filter_var(trim($_POST['typeofuser']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING);
$city = filter_var(trim($_POST['city']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$img = filter_var(trim($_POST['img']),FILTER_SANITIZE_STRING);
$about = filter_var(trim($_POST['about']),FILTER_SANITIZE_STRING);
$admin = '0';

$password = md5($password. "dfvgjbh51411");

include '../model/workwithDB.php';

$fileName = $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];
move_uploaded_file($tmp_name, "../img/". $fileName);

$queryemail = " * FROM users WHERE email = '$email'";
$resultworkwithDBaddemail=array();
$workwithDBadd = new workwithDB();
$resultworkwithDBaddemail = $workwithDBadd->select($queryemail);
$numemail = count($resultworkwithDBaddemail);

if ($numemail > 0) {
    $_SESSION['message'] = 'Пользователь с такой почтой уже есть';
    header('Location: ../view/registration.php');
} else {
    $queryadduser = " INTO users (name, typeofuser, email, phone, city, img, about, password, admin) VALUES ('$name', '$typeofuser','$email', '$phone', '$city', '$fileName', '$about', '$password', '$admin')";
    $workwithDBadd->insert($queryadduser);
    header('Location: ../view/signin.php');
}
?>