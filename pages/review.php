<?php

include_once('classes/objects/listings.php'); //load listing class

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
]);

$twig->addGlobal('session', $_SESSION);

$listings = new Listings(Flight::get('db'));
$listings->userId = $_SESSION['user_id'];

if(isset($_SESSION['authenticated'])){
	echo $twig->render('review.html', ['myListings' => $listings->getAllListings(), 'page' => 'review']);
} else {
	header('Location: /');
	die();
}
