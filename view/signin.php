<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="../css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<main class="form-signin">
    <form action="../controller/auth.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Авторизация</h1>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required="">
            <label for="floatingInput">Почта</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
            <label for="floatingPassword">Пароль</label>
        </div>
        </div>
        <button class="w-100 btn btn-lg btn-danger" type="submit">Войти</button>
        <a class="w-100 btn btn-lg btn-danger mt-3" href="../view/registration.php">Регистрация</a>
        <?php
        if ($_SESSION['message']) {
            echo '<div class="alert alert-danger mt-3" role="alert">'.$_SESSION['message'].'</div>';
        }
        unset($_SESSION['message']);
        ?>
        <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
    </form>
</main>
</body>
</html>