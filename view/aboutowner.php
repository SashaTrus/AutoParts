<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о продавце</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
<?php require "../blocks/header.php" ?>
<div class="container">
    <h2 class="h3 text-center mt-3 mb-3">Информация о продавце</h2>

    <?php
    include '../model/workwithDB.php';

    $id = $_GET['id'];

    $sql_select = " * FROM users WHERE id = '$id'";
    $resultworkwithDB = array();
    $workwithDB = new workwithDB();
    $resultworkwithDB = $workwithDB->select($sql_select);
    ?>
    <div class="card mb-3">
            <div class="row featurette card-body">
                <div class="col-md-7">
                    <h1 class="fs-2 fw-bold"><?php echo $resultworkwithDB['2']; ?> <?php echo $resultworkwithDB['1']; ?></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><p class="fs-5 fw-bold mb-1">Email: <small class="fs-5 fw-normal"><?php echo $resultworkwithDB['3']; ?></small></p></li>
                        <li><p class="fs-5 fw-bold mb-1">Телефон: <small class="fs-5 fw-normal"><?php echo $resultworkwithDB['4']; ?></small></p></li>
                        <li><p class="fs-5 fw-bold mb-1">Город: <small class="fs-5 fw-normal">г.<?php echo $resultworkwithDB['5']; ?></small></p></li>
                        <li><p class="fs-5 fw-bold mb-1">О продавце: <small class="fs-5 fw-normal"><?php echo $resultworkwithDB['7']; ?></small></p></li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <img class="w-75 p-3" src="../img/<?php echo $resultworkwithDB['6']; ?>" alt="Изображение отсутсвует">
                </div>
            </div>
    </div>
    <div class="text-center">
        <a class="btn btn-danger mb-3" href="../view/parts.php">Вернуться</a>
    </div>
    <hr class="featurette-divider">
</div>
<?php require "../blocks/footer.php" ?>
</body>
</html>