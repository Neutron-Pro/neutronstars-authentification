<?php
    require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

    use NeutronStars\Exemples\UserLoader;

    $user = UserLoader::getUser();

    if($user->isConnected())
    {
        header('Location: /');
        exit;
    }

    if(!empty($_POST['submitted']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        if($_POST['email'] === 'john.doe@email.com' && $_POST['password'] === 'johndoe') {
            $user->connect([
                'username'=> 'John Doe',
                'email'   => $_POST['email']
            ]);
            header('Location: /');
            exit;
        }
        $error = 'Your credentials are not correct !';
    }

?>
    <form action="" method="post">
        <?=isset($error) ? '<p style="color: #d62e2e">' .$error.'</p>' : ''?>
        <input type="text" name="email" id="email" placeholder="Your Email">
        <input type="password" name="password" id="password" placeholder="Your Password">
        <input type="submit" name="submitted" value="Log-in">
    </form>
<?php
