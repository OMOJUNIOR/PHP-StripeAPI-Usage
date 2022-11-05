<?php 
namespace Omojunior\PhpStripeApiUsage\controller;
use Omojunior\PhpStripeApiUsage\database\Connect;

class ItemsController {


    public function __construct()
    {
        $this->db = new Connect();
    }

    public function showItem(){

        try{
            $sql = "SELECT * FROM `product`";
            $items = $this->db->pdoConnect()->query($sql);
           
           
        }
        catch(\PDOException $e){
            return "failed to show items: " . $e->getMessage();
        }
        return $items;
    }

    public function showItemById($id){

        try{
            $sql = "SELECT * FROM `items` WHERE `id` = $id";
            $item = $this->db->pdoConnect()->query($sql);
        }
        catch(\PDOException $e){
            return "failed to show item: " . $e->getMessage();
        }
        return $item;
    }


    public function insertItem($name, $price, $description, $image){

        try{
            $sql = "INSERT INTO `items` (`name`, `price`, `description`, `image`) VALUES ('$name', '$price', '$description', '$image')";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':name', $name, $price, $description, $image);
            $stmt->execute();
            $output = "Item inserted successfully";
           
        }
        catch(\PDOException $e){
            return "failed to insert item: " . $e->getMessage();
        }
        return  $output;
    }

    public function insertPayment($amount, $currency, $description, $status){

        try{
            $sql = "INSERT INTO `payments` (`amount`, `currency`, `description`, `status`) VALUES ('$amount', '$currency', '$description', '$status')";
            $payment = $this->db->pdoConnect()->query($sql);
        }
        catch(\PDOException $e){
            return "failed to insert payment: " . $e->getMessage();
        }
        return $payment;
    }
}