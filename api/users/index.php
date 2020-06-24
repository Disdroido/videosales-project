<?php
session_start();
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Australia/Sydney');

require_once '../../vendor/autoload.php';
require_once '../../classes/database.php';
include_once '../../classes/objects/users.php';

$referring_url = $_SERVER['HTTP_HOST']; //if localhost use different db conn

$database = new Database;
$db = $database->getConnection("live", $referring_url);

Flight::set('db', $db);

Flight::route('/', function(){
    echo 'Welcome to the Video Sales REST API!';
});

Flight::route('/register/user', function(){
  $users = new Users(Flight::get('db'));
  $users->firstname = Flight::request()->data->firstname;
  $users->surname = Flight::request()->data->surname;
  $users->email = Flight::request()->data->email;
  $users->password = Flight::request()->data->password;
	Flight::json($users->registerUser());
});

Flight::route('/login/user', function(){
  $users = new Users(Flight::get('db'));
  $users->email = Flight::request()->data->email;
  $users->password = Flight::request()->data->password;
  Flight::json($users->loginUser());
});

Flight::route('/logout/user', function(){
  session_destroy();
  session_unset();
  Flight::json($users->logoutUser());
});

Flight::start();

?>
