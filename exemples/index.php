<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use function NeutronStars\Exemples\getUser;

$user = getUser();

if($user->isConnected()) {
    echo $user->get('username').' is connected with email: '.$user->get('email');
}else {
    echo 'No user connection.';
}
