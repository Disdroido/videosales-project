<?php

include_once('classes/objects/listings.php'); //load listing class
include_once('classes/cloudinary_config.php'); //load cloudinary config

if(isset($_GET['id'])){
  $listings->listingId = $_GET['id'];
} else {
  header('Location: my-listings');
  exit();
}

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
]);

$twig->addGlobal('session', $_SESSION);
$listings = new Listings(Flight::get('db'));

$cloudinaryUploudInputField = cl_upload_tag('video_id', array("resource_type" => "video",
  "eager" => array(array("streaming_profile" => "full_hd", "format" => "m3u8")),
  "eager_async" => true,
  "html" => array("id" => "my_upload_tag")
));

if(isset($_SESSION['authenticated'])){
	echo $twig->render('edit-listing.html', ['myListing' => $listings->getListing(), 'cloudinaryUpload' => $cloudinaryUploudInputField, 'page' => 'editListing']);
} else {
	header('Location: /');
	die();
}
