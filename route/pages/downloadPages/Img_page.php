<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/templates/session_continue.php');
require_once($_SERVER['DOCUMENT_ROOT']. '/templates/header.php');


$path = $_SERVER['DOCUMENT_ROOT'] . '/upload';


if (isset($_GET['btn_remove'])) {
    if (!empty($_GET['remove'])) {
        $delImg = $_GET['remove'];
        foreach ($delImg as $img) {
            if (file_exists($path .'/'. $img)) {
                unlink($path .'/'. $img);
            }
        }
        echo 'Файлы успешно удалены!';
    } else {
     echo 'Не выбрано ни одного изображения!';
    }
}


?>
<h1>Просмотр изображений</h1>
<form method="get">
    <div>
        <ul class="all_imgs">

            <?php if ($catalog = opendir($path)) { ?>
                <?php while (false !== ($entry = readdir($catalog))) { ?>
                    <?php if ($entry != "." && $entry != "..") {?>
                        <li class="img_item">
                            <img src="<?='/upload/' . $entry?>" alt="">
                            <input type="checkbox" name="remove[]" value="<?=$entry?>">
                            <p><?=$entry?></p>
                            <p>Дата изменения файла: <?=date("m.d.Y", filectime($path))?></p>
                        </li>
                    <?php }?>
                <?php }?>
            <?php }?>
        </ul>
        <div><input type="submit" name="btn_remove" value="Удалить"/></div>
    </div>
</form>

















<?php require_once($_SERVER['DOCUMENT_ROOT']. '/templates/footer.php');?>
