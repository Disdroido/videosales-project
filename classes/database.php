<?php

class Database {

    private $dbhost = '';
    private $dbname = 'videosales_db'; //new live server lorans_app
    private $dbusername = 'videosales_superadmin'; //new live server lorans_app_admin
    private $dbpassword = '123456'; //new live server 4_0Wk{JA#Z@8

    public $conn;

    public function getConnection($type,$referring_url){

        $this->conn = null;

        try{

          $type_localhost = $this->getReferralUrl($referring_url);

         if($type_localhost == "localhost") {
            $this->conn = new PDO('mysql:host=localhost;dbname=videosales_db','root','');
          } elseif ($type == "live"){
            $this->conn = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname, $this->dbusername, $this->dbpassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }

        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

    private function getReferralUrl($referring_url){

        $referrer = $referring_url;
        $search = 'localhost';
        if(preg_match("/{$search}/i", $referrer)) {
            $referrer = 'localhost';
            return $referrer;
        } else {
            $referrer = "not_localhost";
            return $referrer;
        }

    }
}

?>
