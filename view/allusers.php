<?php
include '../model/workwithDB.php';

$selectedtypeofuser = $_POST['selectedtypeofuser'];
$adminornot = '0';
$email = $_COOKIE['useremail'];

$sqlemail = " * FROM users WHERE email = '$email'";
$resultworkwithDBemail=array();
$workwithDBparts = new workwithDB();
$resultworkwithDBemail = $workwithDBparts->select($sqlemail);
$adminornot = $resultworkwithDBemail[9];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Продавцы</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
<?php require "../blocks/header.php" ?>
<div class="container">
    <h2 class="h3 text-center mt-3 mb-3">Продавцы автозапчастей</h2>
    <form class="m-5" action="allusers.php" method="post">
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Выберите тип продавца</label>
            <select class="form-select" name="selectedtypeofuser" id="selectedtypeofuser" aria-label="Example select with button addon" onchange="this.form.submit()">
                <option selected value="<?php if ($selectedtypeofuser == ''){echo '';}else echo $selectedtypeofuser?>"><?php if ($selectedtypeofuser == ''){echo 'Выберите';}else echo $selectedtypeofuser?></option>
                <option value="">Выберите</option>
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
        <div class="text-center">
            <a class="btn btn-danger mb-3" href="/view/allusers.php">Сброс фильтра</a>
        </div>
    </form>
    <?php
    $selectedtypeofusernull = filter_var(trim($_POST['selectedtypeofuser']),FILTER_SANITIZE_STRING);
    if ($selectedtypeofusernull === ''){
        $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
        $result = $mysql->query("SELECT * FROM users");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
    <div class="card mb-3">
                <div class="row featurette card-body">
                    <div class="col-md-7">
                        <h1 class="fs-2 fw-bold"><?php echo $row['typeofuser']; ?> <?php echo $row['name']; ?></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><p class="fs-5 fw-bold mb-1">Email: <small class="fs-5 fw-normal"><?php echo $row['email']; ?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Телефон: <small class="fs-5 fw-normal"><?php echo $row['phone']; ?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Город: <small class="fs-5 fw-normal">г.<?php echo $row['city']; ?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">О продавце: <small class="fs-5 fw-normal"><?php echo $row['about']; ?></small></p></li>
                        </ul>
                        <?php if ($adminornot == '1'){?>
                            <p class="fs-5 fw-bold mb-1">Админ: <small class="fs-5 fw-normal"><?php if($row['admin']=='1'){echo "Да";}else {echo "Нет";}?></small></p></li>
                            <?php if($row['admin']=='1'){?>
                                <a class="btn btn-danger mb-3" href="../controller/unsetadmin.php?id=<?php echo $row['id'];?>">Сделать не админом</a>
                            <?php }else {?>
                                <a class="btn btn-danger mb-3" href="../controller/setadmin.php?id=<?php echo $row['id'];?>">Сделать админом</a>
                            <?php }?>
                        <?php }?>
                    </div>
                    <div class="col-md-5">
                        <img class="w-75 p-3" src="../img/<?php echo $row['img']; ?>" alt="Изображение отсутсвует">
                    </div>
                </div>
    </div>
                <?php
            }
        }
        else {?>
            <h1 class="fs-1">Продавцов пока нет(</h1>
            <?php
        }
        $mysql->close();
    } else {
        $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
        $result = $mysql->query("SELECT * FROM users WHERE typeofuser = '$selectedtypeofusernull'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
    <div class="card mb-3">
                <div class="row featurette card-body">
                    <div class="col-md-7">
                        <h1 class="fs-2 fw-bold"><?php echo $row['typeofuser']; ?> <?php echo $row['name']; ?></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><p class="fs-5 fw-bold mb-1">Email: <small class="fs-5 fw-normal"><?php echo $row['email']; ?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Телефон: <small class="fs-5 fw-normal"><?php echo $row['phone']; ?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">Город: <small class="fs-5 fw-normal">г.<?php echo $row['city']; ?></small></p></li>
                            <li><p class="fs-5 fw-bold mb-1">О продавце: <small class="fs-5 fw-normal"><?php echo $row['about']; ?></small></p></li>
                        </ul>
                        <?php if ($adminornot == '1'){?>
                            <p class="fs-5 fw-bold mb-1">Админ: <small class="fs-5 fw-normal"><?php if($row['admin']=='1'){echo "Да";}else {echo "Нет";}?></small></p></li>
                            <?php if($row['admin']=='1'){?>
                                <a class="btn btn-danger mb-3" href="../controller/unsetadmin.php?id=<?php echo $row['id'];?>">Сделать не админом</a>
                            <?php }else {?>
                                <a class="btn btn-danger mb-3" href="../controller/setadmin.php?id=<?php echo $row['id'];?>">Сделать админом</a>
                            <?php }?>
                        <?php }?>
                    </div>
                    <div class="col-md-5">
                        <img class="w-75 p-3" src="../img/<?php echo $row['img']; ?>" alt="Изображение отсутсвует">
                    </div>
                </div>
    </div>
                <?php
            }
        }
        else {?>
            <h1 class="fs-1">Продавцов пока нет(</h1>
            <?php
        }
        $mysql->close();
    }
    ?>
    <hr class="featurette-divider">
</div>
<?php require "../blocks/footer.php" ?>
</body>
</html>