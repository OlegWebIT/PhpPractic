<?require_once($_SERVER['DOCUMENT_ROOT']. '/templates/session_continue.php');?>
<?require_once($_SERVER['DOCUMENT_ROOT']. '/templates/header.php');?>
<?require_once($_SERVER['DOCUMENT_ROOT']. '/templates/link_to_bd.php');?>

<h1>Профиль</h1>

<div>
    <?php

    if (mysqli_connect_errno()){
        echo mysqli_connect_errno();
    }
    else {
        $nameDb = '';

        //Получаем id авторизированного юзера
        $getIdUser = mysqli_query($connect,'select id from users where name="'.$_COOKIE['login'].'"');
        while($rowGetName= mysqli_fetch_assoc($getIdUser))
        {
            $nameDb = $rowGetName['id'];
        }

        $getAllInfo = mysqli_query($connect,'select name, email, telefone, active, notify from users where name="'.$_COOKIE['login'].'"');
        while($rowGetInfo= mysqli_fetch_assoc($getAllInfo))
        {
            foreach ($rowGetInfo as $key => $info) {
                echo ('<div>'.$key.' - '.$info.'</div>');
            }
            echo '<br>';
        }

        //Получаем группы, к которым юзеры принадлежат
        $result = mysqli_query($connect , 'select g.name, g.description from group_user gu inner join groups g on gu.group_id=g.id where gu.user_id="'.$nameDb.'"');
        while($row = mysqli_fetch_assoc($result))
        {
            echo ('<div class="user_group"><b>Вы принадлежите к группе: </b><i>'.$row['name']).'</i></div>';
            echo ('<div><b>Описание группы:</b> <i>'.$row['description']).'</i></div><br>';
        }
    }

    mysqli_close($connect);
    ?>
</div>
<div>
    <a href="/route/pages/logout.php">Выход с профиля</a>
</div>
<?require_once($_SERVER['DOCUMENT_ROOT']. '/templates/footer.php');?>