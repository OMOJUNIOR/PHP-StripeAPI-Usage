<?php
namespace Omojunior\PhpStripeApiUsage\database;

class Connect {
  
      private $dbName;
  
      private $dbHost;
  
      private $dbUser;
  
      private $dbPassword;
  
      public function __construct()
      {
        $this->dbName = 'stripe';
        $this->dbHost = '127.0.0.1';
        $this->dbUser = 'momo';
        $this->dbPassword = '12345';
      }
  
      public function pdoConnect(){
          
        try {
            $conn = new \PDO("mysql:host=$this->dbHost;port=8889;dbname=$this->dbName;charset=utf8",$this->dbUser, $this->dbPassword );
            if($conn){
              $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } 
        } catch(\PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }

         return $conn;
        
      }       
}