<?php

include_once('classes/objects/listings.php'); //load listing class
include_once('classes/cloudinary_config.php'); //load cloudinary config

$listings = new Listings(Flight::get('db'));

$loader = new \Twig\Loader\FilesystemLoader('pages/templates');
$twig = new \Twig\Environment($loader, [
  'debug' => true, //remove on live
  //'cache' => __DIR__ .'/cache',
  //'autoload' => true //clears the cache when template source code updated
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

$cloudinaryUploudInputField = cl_upload_tag('image_id', array("callback" => $cors_location));

echo $twig->render('add-listing.html', ['myListings' => $listings->getAllListings(), 'cloudinaryUpload' => $cloudinaryUploudInputField, 'page' => 'addListing']);
