<?php


$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
  // 'debug' => true, //remove on live
  //'cache' => __DIR__ .'/cache',
  //'autoload' => true //clears the cache when template source code updated
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());


echo $twig->render('your-listings.html', ['name' => 'Ethan Worth', 'page' => 'yourListings']);
