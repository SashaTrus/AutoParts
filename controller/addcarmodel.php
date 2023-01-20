<?php
session_start();
$carbrand = filter_var(trim($_POST['selectedbrand']),FILTER_SANITIZE_STRING);
$carmodel = filter_var(trim($_POST['carmodel']),FILTER_SANITIZE_STRING);

include '../model/workwithDB.php';


$querymodel = " * FROM carmodel WHERE carbrand = '$carbrand' AND carmodel = '$carmodel'";
$resultworkwithDBaddmodel=array();
$workwithDBaddmodel = new workwithDB();
$resultworkwithDBaddmodel = $workwithDBaddmodel->select($querymodel);
$nummodel = count($resultworkwithDBaddmodel);

if ($nummodel > 0) {
    $_SESSION['messagemodel'] = 'Такая модель уже есть';
    header('Location: ../view/admin.php');
} else {
    $queryaddmodel = " INTO carmodel (carbrand, carmodel) VALUES('$carbrand', '$carmodel')";
    $workwithDBaddmodel->insert($queryaddmodel);
    header('Location: ../view/admin.php');
}
?>