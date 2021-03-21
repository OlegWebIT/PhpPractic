<?php

require_once($_SERVER['DOCUMENT_ROOT']. '/templates/link_to_bd.php');




if (isset($_POST['signin'])) {
    $connect = mysqli_connect($host, $user, $password, $dbname);

    if (mysqli_connect_errno()){
        echo mysqli_connect_errno();
    }
    else {
        $result = mysqli_query($connect , 'select * from users where name="'.$_POST['login'].'" and password="'.md5($_POST['password']).'"');
        $answer = mysqli_fetch_assoc($result);
        mysqli_close($connect);

        if (!empty($answer)) {
            //Устнавливаем куку
            require_once($_SERVER['DOCUMENT_ROOT']. '/templates/set_cookie.php');
            //Старт сессии
            require_once($_SERVER['DOCUMENT_ROOT']. '/templates/session_continue.php');
            $_SESSION['login'] = true;
        }

    }


}

require_once($_SERVER['DOCUMENT_ROOT']. '/templates/header.php');
?>
<h1>Вход в личный кабинет</h1>
<?php
if (isset($_POST['signin'])) {
    if (!empty($answer)) {
        echo '<h3>Вы успешно авторизировались</h3>';
    } else {
        echo '<h3>Неверное имя пользователя или пароль</h3>';
    }
}
?>
<?php if (!empty($answer)) {?>

<?php } else {?>
    <form style="margin: 50px 0" action="" method="POST">
        <span style="<?=isset($_COOKIE['login']) ? 'display:none' : ''?>">Логин <input value="<?=$_POST['login'] ?? $_COOKIE['login'] ?? ''?>" type="text" name="login"></span>
        <span>Пароль <input value="<?=$_POST['password'] ?? ''?>" type="text" name="password"></span>
        <span><input value="Войти" type="submit" name="signin"></span>
        <?php if (isset($_COOKIE['login'])) {?>
            <div><a href="/route/pages/signIn/remove_cookie.php">Войти под другим пользователем</a></div>
        <?php } else {?>
            <div>
                <a href="/route/pages/signUp.php">Зарегистрироваться</a>
            </div>
        <?php }?>
    </form>
<?php }?>



<?require_once($_SERVER['DOCUMENT_ROOT']. '/templates/footer.php');?>
