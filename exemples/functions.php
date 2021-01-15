<?php
namespace NeutronStars\Exemples;

use NeutronStars\Authentification\User;

function getUser(): User
{
    return User::init('user', ['username', 'email']);
}
