<?php
session_start();
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Australia/Sydney');
require_once 'vendor/autoload.php';
require_once 'classes/database.php';

Flight::set('flight.handle_errors', false);

$referring_url = $_SERVER['HTTP_HOST']; //if localhost use different db conn


// check if logged in and redirect to /dashboard or /login
Flight::route('/', function(){
	include "pages/dashboard.php";
});

Flight::route('/logout', function(){

});

Flight::start();

?>
