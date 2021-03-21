<?php require_once($_SERVER['DOCUMENT_ROOT']. '/templates/session_continue.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT']. '/templates/header.php'); ?>

<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/templates/link_to_bd.php');


if (isset($_POST['send'])) {

    //Подключаемся к бд

    $connect = mysqli_connect($host, $user, $password, $dbname);

    if (mysqli_connect_errno()){
        echo mysqli_connect_errno();
    }
    else {
        $password = md5($_POST['password']);
        $result = mysqli_query($connect,
            'insert into users (name, email, telefone, password)
                    values("'.$_POST['name'].'","'.$_POST['email'].'","'.$_POST['tel'].'","'.$password.'")
                    ');
        /*var_export($result);*/
        mysqli_close($connect);
        $regSucess = true;
    }

}

?>
<h1>Регистрация</h1>
<?php

if (isset($_POST['send'])){
    if ($regSucess == true) {
        echo "Вы успешно зарегистрировались!";
    } else {
        echo "Ошибка! Попробуйте еще раз!";
    }
}

?>
<form action="" method="post">
    <div><input type="text" name="name" required placeholder="Введите имя"/></div>
    <div><input type="email" name="email" required placeholder="Введите email"/></div>
    <div><input type="tel" name="tel" placeholder="Введите телефон"/></div>
    <div><input type="password" name="password" required placeholder="Введите пароль"/></div>
    <div><input type="submit" name="send"/></div>
</form>

<?php require_once($_SERVER['DOCUMENT_ROOT']. '/templates/footer.php'); ?>
