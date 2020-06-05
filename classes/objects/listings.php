<?php

class Listings {

	private $conn;
	private $tableListing = 'vs_listings';
	public $listingId;
	public $userId;

	public function __construct($db){
		$this->conn = $db;
	}

	public function getAllListings(){
		$query = "SELECT *
		        FROM ".$this->tableListing;
		$stmt = $this->conn->prepare($query);
		$stmt->execute() or die(print_r($stmt->errorInfo(), true));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getListing(){
		$listing['id'] = "456";
		return $listing;
	}	



}