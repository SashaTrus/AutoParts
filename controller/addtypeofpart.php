<?php
session_start();
$typeofpart = filter_var(trim($_POST['typeofpart']),FILTER_SANITIZE_STRING);

include '../model/workwithDB.php';


$querytypeofparts = " * FROM typeofparts WHERE typeofparts = '$typeofpart'";
$resultworkwithDBaddtypeofparts=array();
$workwithDBaddtypeofparts = new workwithDB();
$resultworkwithDBaddtypeofparts = $workwithDBaddtypeofparts->select($querytypeofparts);
$numtypeofparts = count($resultworkwithDBaddtypeofparts);

if ($numtypeofparts > 0) {
    $_SESSION['messagetypeofpart'] = 'Такой тип запчасти уже есть';
    header('Location: ../view/admin.php');
} else {
    $queryaddtypeofparts = " INTO typeofparts (typeofparts) VALUES('$typeofpart')";
    $workwithDBaddtypeofparts->insert($queryaddtypeofparts);
    header('Location: ../view/admin.php');
}

?>


