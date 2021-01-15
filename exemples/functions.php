<?php
namespace Authentification\Exemples;

use Authentification\Authentification\User;

function getUser(): User
{
    return User::init('user', ['username', 'email']);
}
