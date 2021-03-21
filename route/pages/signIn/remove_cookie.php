<?php
setcookie("login", $_COOKIE['login'], time()-86400 * 31, '/');
header("Location: http://".$_SERVER['HTTP_HOST']."/route/pages/signIn/signin.php");