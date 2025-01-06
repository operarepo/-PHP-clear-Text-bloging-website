<?php
    setcookie('user_login', '', time() - 3600 * 24 * 30, "/");
    unset($_COOKIE['user_login']);
    echo true;
?>