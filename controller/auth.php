<?php
session_start();
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$password = md5($password. "dfvgjbh51411");
include '../model/workwithDB.php';

$workwithDB = new workwithDB();


$querypass= " * FROM users WHERE email = '$email' AND password = '$password'";
$resultworkwithDBpass=array();
$resultworkwithDBpass = $workwithDB->select($querypass);
$numpass = count($resultworkwithDBpass);

if ($numpass == 0) {
    $_SESSION['message'] = 'Неверная почта или пароль';
    header('Location: ../view/signin.php');
} else {
    setcookie('useremail', $email, time() + 3600, '/');
    header('Location: /');
}
?>