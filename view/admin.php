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
        <h2>Админка</h2>
    </div>
    <form class="m-5" action="../controller/addcarbrand.php" method="post">
        <div class="text-center">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Название бренда авто</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="carbrand" id="carbrand" placeholder="Название бренда авто" value="" required="">
            </div>
            <?php
            if ($_SESSION['messagebrand']) {
                echo '<div class="alert alert-danger mt-3" role="alert">'.$_SESSION['messagebrand'].'</div>';
            }
            unset($_SESSION['messagebrand']);
            ?>
            <button class="btn btn-success btn-danger mt-3 px-5" type="submit">Добавить марку автомобиля</button>
        </div>
    </form>
    <form class="m-5" action="../controller/addcarmodel.php" method="post">
        <div class="text-center">
            <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Марка автомобиля</span>
            <select class="form-select" name="selectedbrand" id="selectedbrand" aria-label="Example select with button addon">
                <?php
                $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
                $result = $mysql->query("SELECT * FROM carbrand");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['carbrand']; ?>"><?php echo $row['carbrand']; ?></option>
                        <?php
                    }
                }?>
            </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Название модели авто</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="carmodel" id="carmodel" placeholder="Название модели авто" value="" required="">
            </div>
            <?php
            if ($_SESSION['messagemodel']) {
                echo '<div class="alert alert-danger mt-3" role="alert">'.$_SESSION['messagemodel'].'</div>';
            }
            unset($_SESSION['messagemodel']);
            ?>
            <button class="btn btn-success btn-danger mt-3 px-5" type="submit">Добавить модель автомобиля</button>
        </div>
    </form>
    <form class="m-5" action="../controller/addtypeofpart.php" method="post">
        <div class="text-center">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Название типа запчасти авто</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="typeofpart" id="typeofpart" placeholder="Название типа запчасти авто" value="" required="">
            </div>
            <?php
            if ($_SESSION['messagetypeofpart']) {
                echo '<div class="alert alert-danger mt-3" role="alert">'.$_SESSION['messagetypeofpart'].'</div>';
            }
            unset($_SESSION['messagetypeofpart']);
            ?>
            <button class="btn btn-success btn-danger mt-3 px-5" type="submit">Добавить тип запчасти автомобиля</button>
        </div>
    </form>
    <div class="text-center">
        <a class="btn btn-danger mb-3" href="/view/useraccount.php">Вернуться</a>
    </div>
</div class="container">
</body>
</html>