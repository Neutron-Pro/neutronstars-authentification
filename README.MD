# Code example

```php
<?php
  require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
  use NeutronStars\Authentification\User;
  $user = User::init('user', ['username', 'email']);

  //Check if your user is connected:
  if($user->isConnected()) {
    //Your code
  }

  //Connect your user:
  $user->connect([
    'username' => 'John Doe',
    'email'    => 'john.doe@email.com'
  ]);

  //Disconnected your user without destroy all data in session:
  $user->disconnect();

  //Disconnected your user with the destroy all data in session:
  $user->disconnect(true);
```

# Installation

```
composer require neutronstars/authentification
```

```json
{
    "require": {
      "neutronstars/authentification": ">=1.0.0"
    }
}
```
