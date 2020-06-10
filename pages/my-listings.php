<?php

include_once('classes/objects/listings.php'); //load listing class

$listings = new Listings(Flight::get('db'));

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
  'debug' => true, //remove on live
  //'cache' => __DIR__ .'/cache',
  //'autoload' => true //clears the cache when template source code updated
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

echo $twig->render('my-listings.html', ['myListings' => $listings->getAllListings(), 'page' => 'myListings']);
