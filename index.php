<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
<?php require "blocks/header.php"?>
<div class="container">
    <div>
    <h2 class="h3 text-center mt-3 mb-3">Возможно вы это ищите</h2>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <?php
            include 'model/workwithDB.php';
            $rand1 = mt_rand(4, 5);
            $sql_selectrand1 = " * FROM parts WHERE id = '$rand1'";
            $resultworkwithDBrand1=array();
            $workwithDB = new workwithDB();
            $resultworkwithDBrand1 = $workwithDB->select($sql_selectrand1);
            ?>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h1 class="fs-2 fw-bold"><?php echo $resultworkwithDBrand1['9'];?> для <br><?php echo $resultworkwithDBrand1['1'];?> <?php  echo $resultworkwithDBrand1['2']; ?></h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><p class="fs-5 mb-1">Год производства: <?php echo $resultworkwithDBrand1['3'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Тип двигателя: <?php echo $resultworkwithDBrand1['4'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Объем двигателя: <?php echo $resultworkwithDBrand1['5'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Коробка передач: <?php echo $resultworkwithDBrand1['6'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Тип привода: <?php echo $resultworkwithDBrand1['7'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Тип кузова: <?php echo $resultworkwithDBrand1['8'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Номер запчасти: <?php echo $resultworkwithDBrand1['10'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Состояние запчасти: <?php echo $resultworkwithDBrand1['11'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Описание запчасти: <?php echo $resultworkwithDBrand1['12'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Стоимость: <?php echo $resultworkwithDBrand1['14'];?> $<small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Продавец: <?php
                                    $id = $resultworkwithDBrand1['15'];;
                                    $sql_selectname1 = " * FROM users WHERE id = '$id'";
                                    $resultworkwithDBname1=array();
                                    $resultworkwithDBname1 = $workwithDB->select($sql_selectname1);
                                    echo $resultworkwithDBname1['1'];
                                    ?><small class="fs-5 fw-normal"></small></p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            $rand2 = mt_rand(13, 14);
            $sql_selectrand2 = " * FROM parts WHERE id = '$rand2'";
            $resultworkwithDBrand2=array();
            $resultworkwithDBrand2 = $workwithDB->select($sql_selectrand2);
            ?>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h1 class="fs-2 fw-bold"><?php echo $resultworkwithDBrand2['9'];?> для <br><?php echo $resultworkwithDBrand2['1'];?> <?php  echo $resultworkwithDBrand2['2']; ?></h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><p class="fs-5 mb-1">Год производства: <?php echo $resultworkwithDBrand2['3'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Тип двигателя: <?php echo $resultworkwithDBrand2['4'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Объем двигателя: <?php echo $resultworkwithDBrand2['5'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Коробка передач: <?php echo $resultworkwithDBrand2['6'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Тип привода: <?php echo $resultworkwithDBrand2['7'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Тип кузова: <?php echo $resultworkwithDBrand2['8'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Номер запчасти: <?php echo $resultworkwithDBrand2['10'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Состояние запчасти: <?php echo $resultworkwithDBrand2['11'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Описание запчасти: <?php echo $resultworkwithDBrand2['12'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Стоимость: <?php echo $resultworkwithDBrand2['14'];?> $<small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Продавец: <?php
                                    $id = $resultworkwithDBrand2['15'];;
                                    $sql_selectname2 = " * FROM users WHERE id = '$id'";
                                    $resultworkwithDBname2=array();
                                    $resultworkwithDBname2 = $workwithDB->select($sql_selectname2);
                                    echo $resultworkwithDBname2['1'];
                                    ?><small class="fs-5 fw-normal"></small></p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            $rand3 = mt_rand(28, 28);
            $sql_selectrand3 = " * FROM parts WHERE id = '$rand3'";
            $resultworkwithDBrand3=array();
            $resultworkwithDBrand3 = $workwithDB->select($sql_selectrand3);
            ?>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h1 class="fs-2 fw-bold"><?php echo $resultworkwithDBrand3['9'];?> для <br><?php echo $resultworkwithDBrand3['1'];?> <?php  echo $resultworkwithDBrand3['2']; ?></h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><p class="fs-5 mb-1">Год производства: <?php echo $resultworkwithDBrand3['3'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Тип двигателя: <?php echo $resultworkwithDBrand3['4'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Объем двигателя: <?php echo $resultworkwithDBrand3['5'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Коробка передач: <?php echo $resultworkwithDBrand3['6'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Тип привода: <?php echo $resultworkwithDBrand3['7'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Тип кузова: <?php echo $resultworkwithDBrand3['8'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Номер запчасти: <?php echo $resultworkwithDBrand3['10'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Состояние запчасти: <?php echo $resultworkwithDBrand3['11'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Описание запчасти: <?php echo $resultworkwithDBrand3['12'];?><small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Стоимость: <?php echo $resultworkwithDBrand3['14'];?> $<small class="fs-5 fw-normal"></small></p></li>
                            <li><p class="fs-5 mb-1">Продавец: <?php
                                    $id = $resultworkwithDBrand3['15'];;
                                    $sql_selectname3 = " * FROM users WHERE id = '$id'";
                                    $resultworkwithDBname3=array();
                                    $resultworkwithDBname3 = $workwithDB->select($sql_selectname3);
                                    echo $resultworkwithDBname3['1'];
                                    ?><small class="fs-5 fw-normal"></small></p></li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>

    <div>
    <h2 class="h3 text-center">Наши преимущества</h2>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <p class="featurette-heading fs-5">Большое количество автозапчастей к разным автомобилей.</p>
        </div>
        <div class="col-md-5">
            <img class="w-100 p-3" src="img/car%20logos%201.gif">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <p class="featurette-heading fs-5">У нас Вы можете найти как новые, так и б/у автозапчасти по приемлимым ценам.</p>
        </div>
        <div class="col-md-5">
            <img class="w-100 p-3" src="img/parts.jpg">
        </div>
        </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <p class="featurette-heading fs-5">Большое количество продавцов.</p>
        </div>
        <div class="col-md-5">
            <img class="w-100 p-3" src="img/photo_2022-04-21_11-45-17.jpg">
        </div>
    </div>
    <hr class="featurette-divider">
    </div>
</div>
<?php require "blocks/footer.php"?>
</body>
</html>