<?php
namespace NeutronStars\Exemples;

use NeutronStars\Authentification\User;

class UserLoader
{
    public static function getUser(): User
    {
        return User::init('user', ['username', 'email']);
    }
}
