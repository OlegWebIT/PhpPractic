<?php

$downloadImgSuccess = false;
$uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

if (!empty($_FILES['upload']['error'])) {
    echo 'Произошла ошибка';
} elseif (count($_FILES['myfiles']['name']) > 5) {
    echo 'Количество изображений не должно превышать 5';
} else {
    if ($_FILES['myfiles']['name'][0] === '') {
        echo 'Не выбрано ни одно изображение!';
    } else {
        foreach ($_FILES['myfiles']['name'] as $key => $infoImg) {
            if ((in_array($_FILES['myfiles']['type'][$key], array('image/jpeg', 'image/gif', 'image/png'))) && $_FILES['myfiles']['size'][$key] < 1024 * 1024 * 5) {
                move_uploaded_file($_FILES['myfiles']['tmp_name'][$key], $uploadPath . $_FILES['myfiles']['name'][$key]);
                $downloadImgSuccess = true;
            }
        }
        if ($downloadImgSuccess === true) {
            echo 'Файлы успешно загружены';
        } else {
            echo 'Не тот формат файла, или размер файла превышает 5мб';
        }
    }
}



