<?php

include_once('classes/objects/users.php'); //load users class

$users = new Users(Flight::get('db'));

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
]);

echo $twig->render('register.html', ['page' => 'register']);
