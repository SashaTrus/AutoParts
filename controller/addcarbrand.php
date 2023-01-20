<?php
session_start();
$carbrand = filter_var(trim($_POST['carbrand']),FILTER_SANITIZE_STRING);
include '../model/workwithDB.php';


$querybrand = " * FROM carbrand WHERE carbrand = '$carbrand'";
$resultworkwithDBaddbrand=array();
$workwithDBaddbrand = new workwithDB();
$resultworkwithDBaddbrand = $workwithDBaddbrand->select($querybrand);
$numbrand = count($resultworkwithDBaddbrand);

if ($numbrand > 0) {
    $_SESSION['messagebrand'] = 'Такая марка уже есть';
    header('Location: ../view/admin.php');
} else {
    $queryaddbrand = " INTO carbrand (carbrand) VALUES('$carbrand')";
    $workwithDBaddbrand->insert($queryaddbrand);
    header('Location: ../view/admin.php');
}
?>