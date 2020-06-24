<?php
	$server = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'videosales';

	$conn = new PDO("mysql:host=localhost;dbname=".$dbName,$dbUsername,$dbPassword);

	if ($conn === false) {
		die("ERROR: could not connect. " . $e->getMessage());
	}
