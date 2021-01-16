<?php
    require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

    use NeutronStars\Exemples\UserLoader;

    $user = UserLoader::getUser();

    $user->disconnect(false);

    header('Location: /');
    exit;
