<?php
 if (!empty($_FILES['upload']['error'])) {
        echo 'Произошла ошибка';
    } else {
        if ((in_array($_FILES['myfiles']['type'], array('image/jpeg', 'image/gif', 'image/png'))) && $_FILES['myfiles']['size'] < 1024 * 1024 * 5) {
            move_uploaded_file($_FILES['myfiles']['tmp_name'], $uploadPath . $_FILES['myfiles']['name']);
        } else {
            echo 'Не тот формат файла или же файл слишком большой';
        }
    }