<?php
require_once($_SERVER['DOCUMENT_ROOT']. '/templates/session_continue.php');
require_once($_SERVER['DOCUMENT_ROOT']. '/templates/header.php');
?>
<h1>Загрузка изображений</h1>

<form style="margin: 60px 0" action="postImgDownload.php" method="post" id="download-img" enctype="multipart/form-data">
    <span>Загрузите файл: </span>
    <input type="file" name="myfiles[]" multiple/>
    <br>
    <br>
    <input type="submit" name="upload" value="Загрузить" />
</form>

<div id="download-answer"></div>


    <script>
        $(document).ready(function () {
            $('#download-img').submit(function(e){

                e.preventDefault();
                var $that = $(this),
                    formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)

                $.ajax({
                    type: 'POST',
                    contentType: false, // важно - убираем форматирование данных по умолчанию
                    processData: false, // важно - убираем преобразование строк по умолчанию
                    data: formData,
                    url: 'postImgDownload.php',
                    success: function(json) {
                        if (json) {
                            console.log(json);
                            if (json === 'Файлы успешно загружены') {
                                $('#download-answer').text(json);
                            } else {
                                $('#download-answer').text(json);
                            }
                        }
                    }
                });
            });
        });
    </script>

<?php require_once($_SERVER['DOCUMENT_ROOT']. '/templates/footer.php');?>