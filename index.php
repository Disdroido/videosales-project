<?php
session_start();
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Australia/Sydney');
require_once 'vendor/autoload.php';
require_once 'classes/database.php';

$referring_url = $_SERVER['HTTP_HOST']; //if localhost use different db conn
$database = new Database();
$db = $database->getConnection("live", $referring_url);

Flight::set('db', $db);

Flight::set('flight.handle_errors', false);

// check if logged in and redirect to /dashboard or /login
Flight::route('/', function(){
	include "pages/dashboard.php";
});

Flight::route('/my-listings', function(){
	include "pages/my-listings.php";
});

Flight::route('/add-listing', function(){
	include "pages/add-listing.php";
});

Flight::route('/edit-listing', function(){
	include "pages/edit-listing.php";
});

Flight::route('/settings', function(){
	include "pages/settings.php";
});

Flight::route('/logout', function(){

});

Flight::start();

?>
