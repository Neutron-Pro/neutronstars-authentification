<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use NeutronStars\Exemples\UserLoader;

$user = UserLoader::getUser();

if($user->isConnected()) { ?>
    <p><?=$user->get('username')?> is connected with email: <?=$user->get('email')?>. <a href="logout.php">Logout !</a></p>
<?php }else { ?>
    <p>No user connected ! <a href="login.php">Sign-in</a></p>
<?php }
