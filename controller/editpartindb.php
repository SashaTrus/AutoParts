<?php
$id = $_GET['id'];
$carbrand = filter_var(trim($_POST['selectedbrand']),FILTER_SANITIZE_STRING);
$carmodel = filter_var(trim($_POST['selectedmodel']),FILTER_SANITIZE_STRING);
$year = filter_var(trim($_POST['selectedyear']),FILTER_SANITIZE_STRING);
$enginetype = filter_var(trim($_POST['enginetype']),FILTER_SANITIZE_STRING);
$enginevolume = filter_var(trim($_POST['enginevolume']),FILTER_SANITIZE_STRING);
$gearboxtype = filter_var(trim($_POST['gearboxtype']),FILTER_SANITIZE_STRING);
$drivetype = filter_var(trim($_POST['drivetype']),FILTER_SANITIZE_STRING);
$bodytype = filter_var(trim($_POST['bodytype']),FILTER_SANITIZE_STRING);
$typeofpart = filter_var(trim($_POST['typeofpart']),FILTER_SANITIZE_STRING);
$partnumber = filter_var(trim($_POST['partnumber']),FILTER_SANITIZE_STRING);
$partcondition = filter_var(trim($_POST['partcondition']),FILTER_SANITIZE_STRING);
$partdescription = filter_var(trim($_POST['partdescription']),FILTER_SANITIZE_STRING);
$img = filter_var(trim($_POST['img']),FILTER_SANITIZE_STRING);
$price = filter_var(trim($_POST['price']),FILTER_SANITIZE_STRING);


include '../model/workwithDB.php';

$fileName = $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];
move_uploaded_file($tmp_name, "../img/". $fileName);

$workwithDBparts = new workwithDB();

$query = " parts SET carbrand = '$carbrand', carmodel = '$carmodel', year = '$year', enginetype = '$enginetype', enginevolume = '$enginevolume', gearboxtype = '$gearboxtype', drivetype = '$drivetype', bodytype = '$bodytype', typeofpart = '$typeofpart', partnumber = '$partnumber', partcondition = '$partcondition', partdescription = '$partdescription', img = '$fileName', price = '$price' WHERE id = '$id'";
$workwithDBparts->update($query);

header('Location: ../view/userparts.php');
?>