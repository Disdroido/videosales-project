<?php

class Listings {

	private $conn;
	private $tableListing = 'vs_listings';
	public $listingId;
	public $userId;
	public $categoryId;
	public $title;
	public $price;
	public $suburb;
	public $state;
	public $description;
	public $videoUrl;
	public $publicId;

	public function __construct($db){
		$this->conn = $db;
	}

	public function getAllListings(){
		$query = "SELECT * FROM ".$this->tableListing;
		$stmt = $this->conn->prepare($query);
		$stmt->execute() or die(print_r($stmt->errorInfo(), true));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getListing(){
		$listing['id'] = "456";
		return $listing;
	}

	public function addListing(){
		$this->categoryId = 1; //testing
		$this->userId = 1; //testing

		$query = 'INSERT INTO '.$this->tableListing.' (title, price, suburb, state, description, videoUrl, publicId, categoryId, userId) VALUES (:title, :price, :suburb, :state, :description, :videoUrl, :publicId, :categoryId, :userId)';
		$stmt = $this->conn->prepare($query);

		$stmt->bindValue(':title', $this->title,PDO::PARAM_STR);
		$stmt->bindValue(':price', $this->price, PDO::PARAM_STR);
		$stmt->bindValue(':suburb', $this->suburb, PDO::PARAM_STR);
		$stmt->bindValue(':state', $this->state, PDO::PARAM_STR);
		$stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
		$stmt->bindValue(':videoUrl', $this->videoUrl, PDO::PARAM_STR);
		$stmt->bindValue(':publicId', $this->publicId, PDO::PARAM_STR);
		$stmt->bindValue(':categoryId', $this->categoryId, PDO::PARAM_INT);
		$stmt->bindValue(':userId', $this->userId, PDO::PARAM_INT);

		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0) {
			$result['result'] = "true";
			return $result;
		} else {
			$error = $stmt->errorInfo();
			$result['result'] = 'failed';
			$result['db_error'] = $error; //not displaying errors on production site
			return $result;
		}
	}

		public function deleteListing(){
			$query = 'UPDATE '.$this->tableListing.' SET status = 2 WHERE listingId = :listingId';
			$stmt = $this->conn->prepare($query);

			$stmt->bindValue(':listingId', $this->listingId, PDO::PARAM_INT);
			$stmt->execute();
			$count = $stmt->rowCount();

			if($count > 0) {
				$result['result'] = "true";
				return $result;
			} else {
				$error = $stmt->errorInfo();
				$result['result'] = 'failed';
				$result['db_error'] = $error; //not displaying errors on production site
				return $result;
			}
		}

}
