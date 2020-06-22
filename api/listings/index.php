<?php
session_start();
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Australia/Sydney');

require_once '../../vendor/autoload.php';
require_once '../../classes/database.php';
include_once "../../classes/objects/listings.php";

$referring_url = $_SERVER['HTTP_HOST']; //if localhost use different db conn

$database = new Database;
$db = $database->getConnection("live", $referring_url);

Flight::set('db', $db);

Flight::route('/', function(){
    echo 'Welcome to the Video Sales REST API!';
});

Flight::route('/add/listing', function(){
  $listings = new Listings(Flight::get('db'));
  $listings->title = Flight::request()->data->title;
  $listings->price = Flight::request()->data->price;
  $listings->suburb = Flight::request()->data->suburb;
  $listings->state = Flight::request()->data->state;
  $listings->description = Flight::request()->data->description;
  $listings->videoUrl = Flight::request()->data->videoUrl;
  $listings->publicId = Flight::request()->data->publicId;
  $listings->categoryId = Flight::request()->data->categoryId;
	Flight::json($listings->addListing());
});

Flight::route('/remove/listing', function(){
  $listings = new Listings(Flight::get('db'));
  $listings->listingId = Flight::request()->data->id;
  Flight::json($listings->deleteListing());
});

Flight::route('/edit/listing', function(){
  $listings = new Listings(Flight::get('db'));
  $listings->title = Flight::request()->data->title;
  $listings->price = Flight::request()->data->price;
  $listings->suburb = Flight::request()->data->suburb;
  $listings->state = Flight::request()->data->state;
  $listings->description = Flight::request()->data->description;
  $listings->listingId = Flight::request()->data->listingId;
  $listings->categoryId = Flight::request()->data->categoryId;
  // $listings->videoUrl = Flight::request()->data->videoUrl;
  $listings->publicId = Flight::request()->data->publicId;
	Flight::json($listings->editListing());
});

Flight::start();

?>
