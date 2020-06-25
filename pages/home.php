<?php

include_once('classes/objects/listings.php'); //load listing class

$listings = new Listings(Flight::get('db'));

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
]);

$twig->addGlobal('session', $_SESSION);

echo $twig->render('home.html');
