<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <?require_once($_SERVER['DOCUMENT_ROOT'].'/templates/main_menu.php');?>
    <?showMenu($menu, 'sort', SORT_ASC);?>
</header>
