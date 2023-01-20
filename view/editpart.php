<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    var selectedbrandvalue = '';
    function getValue(value) {
        selectedbrandvalue = value;
        document.cookie = "selectedbrandvalue=" + selectedbrandvalue;
        location.reload();
    }
</script>
<?php
$selectedbrandvalue = $_COOKIE['selectedbrandvalue'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Изменение объявления</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
<div class="container">
    <div class="mt-5 text-center">
        <h2>Изменение объявления</h2>
    </div>
    <?php
    include '../model/workwithDB.php';
    $resultworkwithDB=array();
    $id = $_GET['id'];
    $sql = " * FROM parts WHERE id = '$id'";
    $workwithDB = new workwithDB();
    $resultworkwithDB = $workwithDB->select($sql);
    ?>
    <form class="m-5" action="../controller/editpartindb.php?id=<?php echo $resultworkwithDB['0'];?>" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Марка автомобиля</span>
            <select class="form-select" name="selectedbrand" id="selectedbrand" aria-label="Example select with button addon" onchange="getValue(this.value)">
                <option selected value="<?php echo $selectedbrandvalue?>"><?php echo $selectedbrandvalue?></option>
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
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Модель автомобиля</span>
            <select class="form-select" name="selectedmodel" id="selectedmodel" aria-label="Example select with button addon">
                <?php
                $mysql = new mysqli('localhost', 'root', 'root', 'autoparts');
                $resultcarmodel = $mysql->query("SELECT * FROM carmodel WHERE carbrand = '$selectedbrandvalue'");
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
            <select class="form-select" name="selectedyear" id="selectedyear" aria-label="Example select with button addon">
                <option selected><?php echo $resultworkwithDB['3']; ?></option>
                <option value="1980">1980</option>
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
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Тип двигателя</label>
            <select class="form-select" name="enginetype" id="enginetype">
                <option selected><?php echo $resultworkwithDB['4']; ?></option>
                <option value="Бензин">Бензин</option>
                <option value="Дизель">Дизель</option>
                <option value="Электро">Электро</option>
            </select>
            <label class="input-group-text" for="inputGroupSelect01">Объем двигателя</label>
            <select class="form-select" name="enginevolume" id="enginevolume">
                <option selected><?php echo $resultworkwithDB['5']; ?></option>
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
            <select class="form-select" name="gearboxtype" id="gearboxtype">
                <option selected><?php echo $resultworkwithDB['6']; ?></option>
                <option value="Механика">Механика</option>
                <option value="Автомат">Автомат</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Тип привода</label>
            <select class="form-select" name="drivetype" id="drivetype">
                <option selected><?php echo $resultworkwithDB['7']; ?></option>
                <option value="Полный">Полный</option>
                <option value="Передний">Передний</option>
                <option value="Задний">Задний</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Тип кузова</label>
            <select class="form-select" name="bodytype" id="bodytype">
                <option selected><?php echo $resultworkwithDB['8']; ?></option>
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
            <label class="input-group-text" for="inputGroupSelect01">Тип запчасти</label>
            <select class="form-select" name="typeofpart" id="typeofpart">
                <option selected><?php echo $resultworkwithDB['9']; ?></option>
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
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="partnumber" id="partnumber" placeholder="Номер запчасти" value="<?php echo $resultworkwithDB['10']; ?>" required="">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Состояние запчасти</label>
            <select class="form-select" name="partcondition" id="partcondition">
                <option selected><?php echo $resultworkwithDB['11']; ?></option>
                <option value="Новая">Новая</option>
                <option value="Б/у">Б/у</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Описание</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="partdescription" id="partdescription" placeholder="Описание" value="<?php echo $resultworkwithDB['12']; ?>" required="">
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="img" id="img" value="<?php echo $resultworkwithDB['13']; ?>" required="">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Цена</span>
            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="price" id="price" placeholder="Цена" value="<?php echo $resultworkwithDB['14']; ?>" required="">
            <span class="input-group-text" id="inputGroup-sizing-default">$</span>
        </div>
        <div class="text-center">
            <button class="btn btn-success btn-danger mt-3 px-5" type="submit">Изменить объявление</button>
        </div>
    </form>
    <div class="text-center">
        <a class="btn btn-danger mb-3" href="/view/userparts.php">Вернуться</a>
    </div>
</div class="container">
</body>
</html>