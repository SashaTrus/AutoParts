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
include '../model/workwithDB.php';

$adminornot = '0';
$email = $_COOKIE['useremail'];

$sqlemail = " * FROM users WHERE email = '$email'";
$resultworkwithDBemail=array();
$workwithDBparts = new workwithDB();
$resultworkwithDBemail = $workwithDBparts->select($sqlemail);
$adminornot = $resultworkwithDBemail[9];

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}else {
    $page = 1;
}
$count_in_page = 5;
$start_from = ($page-1)*$count_in_page;


$selectedsort = $_COOKIE['selectedsort'];

$selectedbrand = $_POST['selectedbrand'];
$selectedmodel = $_POST['selectedmodel'];
$selectedyear = $_POST['selectedyear'];
$selectedenginetype = $_POST['selectedenginetype'];
$selectedenginevolume = $_POST['selectedenginevolume'];
$selectedgearboxtype = $_POST['selectedgearboxtype'];
$selecteddrivetype = $_POST['selecteddrivetype'];
$selectedbodytype = $_POST['selectedbodytype'];
$selectedtypeofpart = $_POST['selectedtypeofpart'];
$selectedpartnumber = $_POST['selectedpartnumber'];
$selectedpartcondition = $_POST['selectedpartcondition'];

$a=0;

$whereArr = Array();
if ($selectedbrand != '') {
    $whereArr[] = "carbrand = '$selectedbrand'";
    $a++;
}
if ($selectedmodel != '') {
    $whereArr[] = "carmodel = '$selectedmodel'";
    $a++;
}
if ($selectedyear != '') {
    $whereArr[] = "year = '$selectedyear'";
    $a++;
}
if ($selectedenginetype != '') {
    $whereArr[] = "enginetype = '$selectedenginetype'";
    $a++;
}
if ($selectedenginevolume != '') {
    $whereArr[] = "enginevolume = '$selectedenginevolume'";
    $a++;
}
if ($selectedgearboxtype != '') {
    $whereArr[] = "gearboxtype = '$selectedgearboxtype'";
    $a++;
}if ($selecteddrivetype != '') {
    $whereArr[] = "drivetype = '$selecteddrivetype'";
    $a++;
}
if ($selectedbodytype != '') {
    $whereArr[] = "bodytype = '$selectedbodytype'";
    $a++;
}
if ($selectedtypeofpart != '') {
    $whereArr[] = "typeofpart = '$selectedtypeofpart'";
    $a++;
}
if ($selectedpartnumber != '') {
    $whereArr[] = "partnumber = '$selectedpartnumber'";
    $a++;
}
if ($selectedpartcondition != '') {
    $whereArr[] = "partcondition = '$selectedpartcondition'";
    $a++;
}


$sql = 'SELECT * FROM parts';
if ($a>0) {
    $sql .= ' WHERE ' . implode(' AND ', $whereArr);
}
if ($selectedsort == '1'){
    $sql .= ' ORDER BY id DESC';
}
$sql_for_count_pages = $sql;
$sql .= " LIMIT $start_from,$count_in_page";




?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Автозапчасти</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
<?php require "../blocks/header.php" ?>
<div class="container">
    <h2 class="h3 text-center mt-3 mb-3">Поиск автозапчастей</h2>
    <form class="m-5" action="parts.php" method="post">
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Выберите марку авто</label>
            <select class="form-select" name="selectedbrand" id="selectedbrand" aria-label="Example select with button addon" onchange="this.form.submit()">
                <option selected value="<?php if ($selectedbrand == ''){echo '';}else echo $selectedbrand?>"><?php if ($selectedbrand == ''){echo 'Выберите';}else echo $selectedbrand?></option>
                <option value="">Выберите</option>
                <?php
                $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
                $resultcarbrand = $mysql->query("SELECT * FROM carbrand");
                if ($resultcarbrand->num_rows > 0) {
                    while ($rowcarbrand = $resultcarbrand->fetch_assoc()) { ?>
                        <option value="<?php echo $rowcarbrand['carbrand']; ?>"><?php echo $rowcarbrand['carbrand']; ?></option>
                        <?php
                    }
                }?>
            </select>
            <label class="input-group-text" for="inputGroupSelect01">Выберите модель авто</label>
            <select class="form-select" name="selectedmodel" id="selectedmodel" aria-label="Example select with button addon" onchange="this.form.submit()">
                <option selected value="<?php if ($selectedmodel == ''){echo '';}else echo $selectedmodel?>"><?php if ($selectedmodel == ''){echo 'Выберите';}else echo $selectedmodel?></option>
                <option value="">Выберите</option>
                <?php
                $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
                $resultcarmodel = $mysql->query("SELECT * FROM carmodel WHERE carbrand = '$selectedbrand'");
                if ($resultcarmodel->num_rows > 0) {
                    while ($rowcarmodel = $resultcarmodel->fetch_assoc()) { ?>
                        <option value="<?php echo $rowcarmodel['carmodel']; ?>"><?php echo $rowcarmodel['carmodel']; ?></option>
                        <?php
                    }
                }?>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Год производства</span>
            <select class="form-select" name="selectedyear" id="selectedyear" aria-label="Example select with button addon" onchange="this.form.submit()">
                <option selected value="<?php if ($selectedyear == ''){echo '';}else echo $selectedyear?>"><?php if ($selectedyear == ''){echo 'Выберите';}else echo $selectedyear?></option>
                <option value="">Выберите</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
            <label class="input-group-text" for="inputGroupSelect01">Тип двигателя</label>
            <select class="form-select" name="selectedenginetype" id="selectedenginetype"  onchange="this.form.submit()">
                <option selected value="<?php if ($selectedenginetype == ''){echo '';}else echo $selectedenginetype?>"><?php if ($selectedenginetype == ''){echo 'Выберите';}else echo $selectedenginetype?></option>
                <option value="">Выберите</option>
                <option value="Бензин">Бензин</option>
                <option value="Дизель">Дизель</option>
                <option value="Электро">Электро</option>
            </select>
            <label class="input-group-text" for="inputGroupSelect01">Объем двигателя</label>
            <select class="form-select" name="selectedenginevolume" id="selectedenginevolume"  onchange="this.form.submit()">
                <option selected value="<?php if ($selectedenginevolume == ''){echo '';}else echo $selectedenginevolume?>"><?php if ($selectedenginevolume == ''){echo 'Выберите';}else echo $selectedenginevolume?></option>
                <option value="">Выберите</option>
                <option value="1,4">1,4</option>
                <option value="1,6">1,6</option>
                <option value="1,8">1,8</option>
                <option value="2,0">2,0</option>
                <option value="2,2">2,2</option>
                <option value="2,4">2,4</option>
                <option value="2,8">2,8</option>
                <option value="3,0">3,0</option>
                <option value="3,5">3,5</option>
                <option value="4,0">4,0</option>
                <option value="5,0">5,0</option>
                <option value="6,0">6,0</option>
                <option value="Электро">Электро</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Коробка передач</label>
            <select class="form-select" name="selectedgearboxtype" id="selectedgearboxtype" onchange="this.form.submit()">
                <option selected value="<?php if ($selectedgearboxtype == ''){echo '';}else echo $selectedgearboxtype?>"><?php if ($selectedgearboxtype == ''){echo 'Выберите';}else echo $selectedgearboxtype?></option>
                <option value="">Выберите</option>
                <option value="Механика">Механика</option>
                <option value="Автомат">Автомат</option>
            </select>
            <label class="input-group-text" for="inputGroupSelect01">Тип привода</label>
            <select class="form-select" name="selecteddrivetype" id="selecteddrivetype"  onchange="this.form.submit()">
                <option selected value="<?php if ($selecteddrivetype == ''){echo '';}else echo $selecteddrivetype?>"><?php if ($selecteddrivetype == ''){echo 'Выберите';}else echo $selecteddrivetype?></option>
                <option value="">Выберите</option>
                <option value="Полный">Полный</option>
                <option value="Передний">Передний</option>
                <option value="Задний">Задний</option>
            </select>
            <label class="input-group-text" for="inputGroupSelect01">Тип кузова</label>
            <select class="form-select" name="selectedbodytype" id="selectedbodytype"  onchange="this.form.submit()">
                <option selected value="<?php if ($selectedbodytype == ''){echo '';}else echo $selectedbodytype?>"><?php if ($selectedbodytype == ''){echo 'Выберите';}else echo $selectedbodytype?></option>
                <option value="">Выберите</option>
                <option value="Седан">Седан</option>
                <option value="Универсал">Универсал</option>
                <option value="Хэтчбэк">Хэтчбэк</option>
                <option value="Кабриолет">Кабриолет</option>
                <option value="Внедорожник">Внедорожник</option>
                <option value="Купе">Купе</option>
                <option value="Спорткар">Спорткар</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Выберите тип запчасти авто</label>
            <select class="form-select" name="selectedtypeofpart" id="selectedtypeofpart" aria-label="Example select with button addon" onchange="this.form.submit()">
                <option selected value="<?php if ($selectedtypeofpart == ''){echo '';}else echo $selectedtypeofpart?>"><?php if ($selectedtypeofpart == ''){echo 'Выберите';}else echo $selectedtypeofpart?></option>
                <option value="">Выберите</option>
                <?php
                $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
                $resulttypeofparts = $mysql->query("SELECT * FROM typeofparts");
                if ($resulttypeofparts->num_rows > 0) {
                    while ($rowtypeofparts = $resulttypeofparts->fetch_assoc()) { ?>
                        <option value="<?php echo $rowtypeofparts['typeofparts']; ?>"><?php echo $rowtypeofparts['typeofparts']; ?></option>
                        <?php
                    }
                }?>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Номер запчасти</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="selectedpartnumber" id="selectedpartnumber" placeholder="<?php if ($selectedpartnumber == ''){echo 'Номер запчасти';}else echo $selectedpartnumber?>" value="<?php if ($selectedpartnumber == ''){echo '';}else echo $selectedpartnumber?>" required="" onchange="this.form.submit()">
            <label class="input-group-text" for="inputGroupSelect01">Состояние запчасти</label>
            <select class="form-select" name="selectedpartcondition" id="selectedpartcondition"  onchange="this.form.submit()">
                <option selected value="<?php if ($selectedpartcondition == ''){echo '';}else echo $selectedpartcondition?>"><?php if ($selectedpartcondition == ''){echo 'Выберите';}else echo $selectedpartcondition?></option>
                <option value="">Выберите</option>
                <option value="Новая">Новая</option>
                <option value="Б/у">Б/у</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Сортировать</label>
            <select class="form-select" aria-label="Example select with button addon" onchange="getValue(this.value)">
                <option selected value="<?php if ($selectedsort == ''){echo '0';}else if ($selectedsort == '0'){echo '0';}else echo '1'?>"><?php if ($selectedsort == ''){echo 'старые сначала';}else if ($selectedsort == '0'){echo 'старые сначала';}else echo 'новые сначала'?></option>
                <option value="<?php if ($selectedsort == ''){echo '1';}else if ($selectedsort == '0'){echo '1';}else echo '0'?>"><?php if ($selectedsort == ''){echo 'новые сначала';}else if ($selectedsort == '0'){echo 'новые сначала';}else echo 'старые сначала'?></option>
            </select>
        </div>
        <div class="text-center">
            <a class="btn btn-danger mb-3" href="../view/parts.php">Сброс фильтра</a>
        </div>
    </form>
    <?php
    $parts = array();
    $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
    $result = $mysql->query($sql);
    if ($result->num_rows > 0) {
    $total_count_pages_sql = mysqli_num_rows($mysql->query($sql_for_count_pages));
    while ($row = $result->fetch_assoc()) {?>
    <div class="card mb-3">
        <div class="row featurette card-body">
            <div class="col-md-5">
                <img class="w-100 p-3" src="../img/<?php echo $row['img']; ?>" alt="Изображение отсутсвует">
            </div>
            <div class="col-md-7">
                <h1 class="fs-2 fw-bold"><?php echo $row['typeofpart'];?> для <?php echo $row['carbrand'];?> <?php  echo $row['carmodel']; ?></h1>
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
                    <li><p class="fs-5 fw-bold mb-1">Продавец:
                            <small class="fs-5 fw-normal"><?php
                                $id = $row['ownerid'];
                                $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
                                $resultname = $mysql->query("SELECT * FROM users WHERE id = '$id'");
                                $rowname = $resultname->fetch_assoc();
                                echo $rowname['name'];?></small></p></li>
                    <a class="btn btn-danger mb-3" href="../view/aboutowner.php?id=<?php echo $id;?>">Информация о продавце</a>
                    <?php if ($adminornot == '1'){?>
                        <a class="btn btn-danger mb-3" href="../controller/deletepart.php?id=<?php echo $row['id'];?>">Удалить объявление</a>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            $total_count_pages=ceil($total_count_pages_sql/$count_in_page);
            for ($i=1;$i<=$total_count_pages;$i++){
            ?>
            <a class="btn m-1 <?php if($i== $page) echo 'btn-danger text-light fw-bold'; else echo ' btn-outline-dark text-dark';?>" href="?page=<?php echo $i;?>"><?php echo $i;?></a>
            <?php }?>
        </ul>
    </nav>
    <?php
    }
    else {?>
    <h1 class="fs-1">Автозапчстей пока нет(</h1>
    <?php
    }
    $mysql->close();
?>
    <hr class="featurette-divider">
</div>
<?php require "../blocks/footer.php" ?>
</body>
</html>