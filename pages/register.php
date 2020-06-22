<?php

include_once('classes/objects/users.php'); //load users class

$users = new Users(Flight::get('db'));

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
  'debug' => true, //remove on live
  //'cache' => __DIR__ .'/cache',
  //'autoload' => true //clears the cache when template source code updated
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

echo $twig->render('register.html', ['page' => 'register']);
