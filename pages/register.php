<?php

include_once('classes/objects/users.php'); //load users class

$users = new Users(Flight::get('db'));

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
]);

$twig->addGlobal('session', $_SESSION);

if(isset($_SESSION['authenticated'])){
	header('Location: /');
  die();
} else {
	echo $twig->render('register.html', ['page' => 'register']);
}
