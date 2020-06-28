<?php

include_once('classes/objects/listings.php'); //load listing class

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
]);

$twig->addGlobal('session', $_SESSION);
$listings = new Listings(Flight::get('db'));

echo $twig->render('listings.html', ['myListings' => $listings->getAllListings(), 'page' => 'listings']);
