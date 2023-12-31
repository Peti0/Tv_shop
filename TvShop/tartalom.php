<?php

switch ($menu) {
    case 'feltoltesTV':
        require_once './pages/feltoltesTV.php';
        break;
    case 'logout':
        require_once './pages/logout.php';
        break;
    case 'tvvasarlasGuest':
        require_once './pages/tvvasarlasGuest.php';
        break;
    case 'login':
        require_once './pages/login.php';
        break;
    case 'regisztracio':
        require_once './pages/regisztracio.php';
        break;
    case 'rolunk':
        require_once './pages/rolunk.php';
        break;
    case 'home':
        if ($id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)) {
            require_once './pages/kivalasztottTV.php';
        } else {
            require_once './pages/home.php';
        }
        break;
    default:
        require_once './pages/home.php';
        break;
}

