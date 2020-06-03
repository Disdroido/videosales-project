<?php


$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
  'debug' => true, //remove on live
  //'cache' => __DIR__ .'/cache',
  //'autoload' => true //clears the cache when template source code updated
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

if($user->isLoggedIn()){
		echo $twig->render('dashboard.html', ['name' => 'Ethan Worth']);
}