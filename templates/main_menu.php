<?php
declare(strict_types=1);


$menu = [
    0 => [
        'title' => 'Главная',
        'path' => '/',
        'sort' => '0',
    ],
    1 => [
        'title' => 'О нас',
        'path' => (isset($_SESSION['login']) == true) ? '/route/pages/about.php' : '/route/pages/signIn/signin.php',
        'sort' => '4',
    ],
    2 => [
        'title' => 'Контакты',
        'path' => (isset($_SESSION['login']) == true) ? '/route/pages/contacts.php' : '/route/pages/signIn/signin.php',
        'sort' => '3',
    ],
    3 => [
        'title' => 'Гарантия',
        'path' => (isset($_SESSION['login']) == true) ? '/route/pages/garantiya.php' : '/route/pages/signIn/signin.php',
        'sort' => '2',
    ],
    4 => [
        'title' => 'Как купить это у нас',
        'path' => (isset($_SESSION['login']) == true) ? '/route/pages/kak-kupit.php' : '/route/pages/signIn/signin.php',
        'sort' => '1',
    ],
    5 => [
        'title' => 'Загрузка изображений',
        'path' => (isset($_SESSION['login']) == true) ? '/route/pages/downloadPages/download_img.php' : '/route/pages/signIn/signin.php',
        'sort' => '5'
    ],
    6 => [
        'title' => 'Просмотр изображений',
        'path' => (isset($_SESSION['login']) == true) ? '/route/pages/downloadPages/img_page.php' : '/route/pages/signIn/signin.php',
        'sort' => '6'
    ],
    7 => [
        'title' => (isset($_SESSION['login']) == true) ? 'Профиль' : 'Войти',
        'path' => (isset($_SESSION['login']) == true) ? '/route/pages/account.php' : '/route/pages/signIn/signin.php',
        'sort' => '7'
    ]

];

function cutString($line, $length = 15, $appends = '...')
{
    if (mb_strlen($line) > $length) {
        $line = mb_substr($line, 0, 12) . $appends;
    }
    return $line;
}



function arraySort($menu, $key, $sort)
{

    if ($sort === SORT_ASC) {
        array_multisort(array_column($menu, "$key"), $sort, $menu);;
        return $menu;
    }

    if ($sort === SORT_STRING) {
        arsort($menu);
        return $menu;
    }

}


function showMenu($menu, $sort = 'sort', $methodSort = SORT_ASC)
{
    $menu = arraySort($menu, $sort, $methodSort);
    foreach ($menu as $num => $info) {
        $info['title'] = cutString($info['title']);
        if ($_SERVER['REQUEST_URI'] === '/route/pages/signIn/signin.php' && isset($_SESSION['login']) != true) {
            $style = $_SERVER['REQUEST_URI'] === '';
        } else {
            $style = $_SERVER['REQUEST_URI'] === $info['path'] ? 'text-decoration:underline;color:red;' : '';
        }
        echo '<a style="' . $style . '" class="foot_head_item" href="' . $info['path'] . '">' . $info["title"] . '</a>';
    }
}


















