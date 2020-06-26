<?php

include_once('classes/objects/listings.php'); //load listing class

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
  //'debug' => true, //remove on live
  //'cache' => __DIR__ .'/cache',
  //'autoload' => true //clears the cache when template source code updated
]);

$twig->addGlobal('session', $_SESSION);

$listings = new Listings(Flight::get('db'));
$listings->userId = $_SESSION['user_id'];

//$twig->addExtension(new \Twig\Extension\DebugExtension());

if(isset($_SESSION['authenticated'])){
	echo $twig->render('dashboard.html', ['myListings' => $listings->getAllUserListings(), 'page' => 'dashboard']);
} else {
	header('Location: /');
	die();
}
