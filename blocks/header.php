<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="50" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            
            <li><a href="/" class="nav-link px-2 text-secondary"><h5>NBlog</h5></a></li>
            <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
        <?php
            if (!isset($_COOKIE['log']) || $_COOKIE['log'] != ''):
        ?>
            <li><a href="../articles.php" class="nav-link px-2 text-white">Добавить статью</a></li>
        <?php
            endif;
        ?>
        </ul>
        <div class="text-end">
        <?php
            if (!isset($_COOKIE['log']) || $_COOKIE['log'] == ''):
        ?>
            <a href="auth.php" class="btn btn-outline-light me-1">Войти</a>
            <a href="reg.php" type="button" class="btn btn-warning">Регистрация</a>
        <?php
            else:
        ?>
        <span class="text-white me-2"><?=$_COOKIE['log']?></span>
        <a href="auth.php" type="button" class="btn btn-warning">Личный кабинет </a>
        <?php
        endif;
        ?>
        </div>
        </div>
    </div>
</header>