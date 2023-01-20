<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
<div class="container">
    <div class="mt-5 text-center">
        <h2>Изменение профиля</h2>
    </div>
    <?php
    $email = $_COOKIE['useremail'];
    include '../model/workwithDB.php';
    $resultworkwithDB=array();
    $sql = " * FROM users WHERE email = '$email'";
    $workwithDB = new workwithDB();
    $resultworkwithDB = $workwithDB->select($sql);
    ?>
    <form class="m-5" action="../controller/edituserindb.php" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Название организации или ваше имя</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" id="name" placeholder="Название организации или ваше имя" value="<?php echo $resultworkwithDB['1']; ?>" required="">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Кем вы являетесь</span>
            <select class="form-select" name="typeofuser" id="typeofuser" aria-label="Example select with button addon">
                <option value="<?php echo $resultworkwithDB['2']; ?>"><?php echo $resultworkwithDB['2']; ?></option>
                <?php
                $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
                $resulttypeofuser = $mysql->query("SELECT * FROM typeofuser");
                if ($resulttypeofuser->num_rows > 0) {
                    while ($rowtypeofuser = $resulttypeofuser->fetch_assoc()) { ?>
                        <option value="<?php echo $rowtypeofuser['typeofuser']; ?>"><?php echo $rowtypeofuser['typeofuser']; ?></option>
                        <?php
                    }
                }?>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Телефон</span>
            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="phone" id="phone" placeholder="Телефон" value="<?php echo $resultworkwithDB['4']; ?>" required="">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Город</span>
            <input type="text" aria-label="City" class="form-control" name="city" id="city" placeholder="Город" value="<?php echo $resultworkwithDB['5']; ?>" required="">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Ваше изображение (Изображение можно будет изменить)</span>
            <input type="file" class="form-control" name="img" id="img" value="<?php echo $resultworkwithDB['6']; ?>" required="">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">О вас (Данную информацию можно будет изменить)</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="about" id="about" placeholder="О вас" value="<?php echo $resultworkwithDB['7']; ?>" required="">
        </div>
        <div class="text-center">
            <button class="btn btn-success btn-danger mt-3 px-5" type="submit">Изменить</button>
        </div>
    </form>
    <div class="text-center">
        <a class="btn btn-danger mb-3" href="/view/useraccount.php">Вернуться</a>
    </div>
</div class="container">
</body>
</html>