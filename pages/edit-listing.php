<?php

include_once('classes/objects/listings.php'); //load listing class
include_once('classes/cloudinary_config.php'); //load cloudinary config

$listings = new Listings(Flight::get('db'));

if(isset($_GET['id'])){
  $listings->listingId = $_GET['id'];
} else {
  header('Location: my-listings');
  exit();
}

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
  'debug' => true, //remove on live
  //'cache' => __DIR__ .'/cache',
  //'autoload' => true //clears the cache when template source code updated
]);
$twig->addGlobal('session', $_SESSION);

$twig->addExtension(new \Twig\Extension\DebugExtension());

$cloudinaryUploudInputField = cl_upload_tag('video_id', array("resource_type" => "video",
  "eager" => array(array("streaming_profile" => "full_hd", "format" => "m3u8")),
  "eager_async" => true,
  "html" => array("id" => "my_upload_tag")
));

echo $twig->render('edit-listing.html', ['myListing' => $listings->getListing(), 'cloudinaryUpload' => $cloudinaryUploudInputField, 'page' => 'editListing']);
