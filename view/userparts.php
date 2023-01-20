<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    var selectedsort = '';
    function getValue(value) {
        selectedsort = value;
        document.cookie = "selectedsort=" + selectedsort;
        location.reload();
    }
</script>
<?php
$selectedsort = $_COOKIE['selectedsort'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мои объявления</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
<?php require "../blocks/header.php" ?>
<?php require "../blocks/userheader.php" ?>
<div class="container">
    <h2 class="h3 text-center mt-3 mb-3">Мои объявления</h2>

    <div class="row featurette card-body">
        <div class="col-md-9">
            <a class="btn btn-danger mb-3" href="addpart.php">Добавить объявление</a>
        </div>
        <div class="col-md-3">
            <select class="form-select" aria-label="Disabled select example" onchange="getValue(this.value)">
                <option selected value="<?php if ($selectedsort == ''){echo '0';}else if ($selectedsort == '0'){echo '0';}else echo '1'?>"><?php if ($selectedsort == ''){echo 'старые сначала';}else if ($selectedsort == '0'){echo 'старые сначала';}else echo 'новые сначала'?></option>
                <option value="<?php if ($selectedsort == ''){echo '1';}else if ($selectedsort == '0'){echo '1';}else echo '0'?>"><?php if ($selectedsort == ''){echo 'новые сначала';}else if ($selectedsort == '0'){echo 'новые сначала';}else echo 'старые сначала'?></option>
            </select>
        </div>
    </div>
    <?php
    if ($selectedsort == '' || $selectedsort == '0'){
    $email = $_COOKIE['useremail'];
    $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
    $result = $mysql->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
        $result = $mysql->query("SELECT * FROM parts WHERE ownerid = '$id'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
    <div class="card mb-3">
        <div class="row featurette card-body">
            <h1 class="fs-2 fw-bold"><?php echo $row['typeofpart'];?> для <?php echo $row['carbrand'];?> <?php  echo $row['carmodel']; ?></h1>
            <div class="col-md-7">
                <ul class="list-unstyled mt-3 mb-4">
                    <li><p class="fs-5 fw-bold mb-1">Год производства: <small class="fs-5 fw-normal"><?php echo $row['year'];?></small></p></li>
                    <li><p class="fs-5 fw-bold mb-1">Тип двигателя: <small class="fs-5 fw-normal"><?php echo $row['enginetype'];?></small></p></li>
                    <li><p class="fs-5 fw-bold mb-1">Объем двигателя: <small class="fs-5 fw-normal"><?php echo $row['enginevolume'];?></small></p></li>
                    <li><p class="fs-5 fw-bold mb-1">Коробка передач: <small class="fs-5 fw-normal"><?php echo $row['gearboxtype'];?></small></p></li>
                    <li><p class="fs-5 fw-bold mb-1">Тип привода: <small class="fs-5 fw-normal"><?php echo $row['drivetype'];?></small></p></li>
                    <li><p class="fs-5 fw-bold mb-1">Тип кузова: <small class="fs-5 fw-normal"><?php echo $row['bodytype'];?></small></p></li>
                    <li><p class="fs-5 fw-bold mb-1">Номер запчасти: <small class="fs-5 fw-normal"><?php echo $row['partnumber'];?></small></p></li>
                    <li><p class="fs-5 fw-bold mb-1">Состояние запчасти: <small class="fs-5 fw-normal"><?php echo $row['partcondition'];?></small></p></li>
                    <li><p class="fs-5 fw-bold mb-1">Описание запчасти: <small class="fs-5 fw-normal"><?php echo $row['partdescription'];?></small></p></li>
                    <li><p class="fs-5 fw-bold mb-1">Стоимость: <small class="fs-5 fw-normal"><?php echo $row['price'];?> $</small></p></li>
                </ul>

            </div>
            <div class="col-md-5">
                <img class="w-100 p-3" src="../img/<?php echo $row['img']; ?>" alt="Изображение отсутсвует">
            </div>
            <div>
                <a class="btn btn-danger mb-3" href="../view/editpart.php?id=<?php echo $row['id'];?>">Изменить объявление</a>
                <a class="btn btn-danger mb-3" href="../controller/deletepart.php?id=<?php echo $row['id'];?>">Удалить объявление</a>
            </div>
        </div>
    </div>
    <?php
    }
    }
    else {?>
    <h1 class="fs-1">У Вас еще нет объявлений</h1>
    <?php
    }
    }
    }
    $mysql->close();
    }
    else {
    $email = $_COOKIE['useremail'];
    $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
    $result = $mysql->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
        $result = $mysql->query("SELECT * FROM parts WHERE ownerid = '$id' ORDER BY id DESC");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
    <div class="card mb-3">
                <div class="row featurette card-body">
                    <h1 class="fs-2 fw-bold"><?php echo $row['typeofpart'];?> для <?php echo $row['carbrand'];?> <?php  echo $row['carmodel']; ?></h1>
                    <div class="col-md-7">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><p class="fs-5 fw-bold mb-1">Год производства: <small class="fs-5 fw-normal"><?php echo $row['year'];?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Тип двигателя: <small class="fs-5 fw-normal"><?php echo $row['enginetype'];?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Объем двигателя: <small class="fs-5 fw-normal"><?php echo $row['enginevolume'];?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Коробка передач: <small class="fs-5 fw-normal"><?php echo $row['gearboxtype'];?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Тип привода: <small class="fs-5 fw-normal"><?php echo $row['drivetype'];?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Тип кузова: <small class="fs-5 fw-normal"><?php echo $row['bodytype'];?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Номер запчасти: <small class="fs-5 fw-normal"><?php echo $row['partnumber'];?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Состояние запчасти: <small class="fs-5 fw-normal"><?php echo $row['partcondition'];?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Описание запчасти: <small class="fs-5 fw-normal"><?php echo $row['partdescription'];?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Стоимость: <small class="fs-5 fw-normal"><?php echo $row['price'];?> $</small></p></li>
                        </ul>

                    </div>
                    <div class="col-md-5">
                        <img class="w-100 p-3" src="../img/<?php echo $row['img']; ?>" alt="Изображение отсутсвует">
                    </div>
                    <div>
                        <a class="btn btn-danger mb-3" href="../view/editpart.php?id=<?php echo $row['id'];?>">Изменить объявление</a>
                        <a class="btn btn-danger mb-3" href="../controller/deletepart.php?id=<?php echo $row['id'];?>">Удалить объявление</a>
                    </div>
                </div>
    </div>
                <?php
            }
        }
        else {?>
        <h1 class="fs-1">У Вас еще нет объявлений</h1>
    <?php
        }
    }
    }
    $mysql->close();
    }
    ?>
</div>
<?php require "../blocks/footer.php" ?>
</body>
</html>