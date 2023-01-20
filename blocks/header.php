<header class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
    <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-danger text-decoration-none h3" href="/index.php">
        <img class="bi me-2" width="40" height="40" src="../img/front-car-symbol-frontal-view-black-cars-transport-car-symbol-png-512_512.png">
        Parts
    </a>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/index.php" class="nav-link px-2 link-dark fs-5">Главная</a></li>
        <li><a href="/view/parts.php" class="nav-link px-2 link-dark fs-5">Все объявления</a></li>
        <li><a href="/view/allusers.php" class="nav-link px-2 link-dark fs-5">Все продавцы</a></li>
    </ul>
    <div class="col-md-3 text-end">
        <?php
            if ($_COOKIE['useremail'] == ''):
        ?>
                <a class="btn btn-danger" href="../view/signin.php">Войти</a>
            <?php else: ?>
                <a class="btn btn-danger" href="../view/useraccount.php">Профиль</a>
                <a class="btn btn-danger" href="../exit.php">Выход</a>
            <?php endif; ?>
    </div>
</header>