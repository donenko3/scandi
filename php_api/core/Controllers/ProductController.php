<?php

namespace app\core\Controllers;

use app\core\Request;
use app\core\models\Furniture;
use app\core\models\DVD;
use app\core\models\Book;



Header("Access-Control-Allow-Origin", "*");
Header("Access-Control-Allow-Credentials", "true");
Header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
Header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
header("Content-type: application/json; charset= UTF-8");



class ProductController {

    public Furniture $furniture;
    public Book $book;
    public DVD $dvd;
    public Request $request;

    public function __construct(Furniture $furniture,Book $book, DVD $dvd ) {
        $this->furniture = $furniture;
        $this->book = $book;
        $this->dvd = $dvd;
    }

    public function getModel( $data) {
        if($data == "furniture") {
            return $this->furniture;
        } else if($data == "book") {
            return $this->book;
        }
        return $this->dvd;
       }


    public function productsToDelete( $data) {
        $this->book->delete($data);
       }

    public function processRequest(string $method, $url) 
    {
        
        
        if($method === "GET") {
        echo json_encode($this->book->getAll());
        }
        
        else {
            $data = json_decode(file_get_contents("php://input"),true);
            
            if(array_key_exists("ids",$data)){
                $this->book->delete($data["ids"]);
                echo json_encode("deleted");
                return;
            } 
            // else {
            
            $type = $data["type"];

            $model= $this->getModel($type);
            $model->LoadData($data);

            
            if($model->validateRules()) {
                $model->create();
                echo json_encode("success");
            } else {
                echo json_encode($model);
            }
            // }
        }
    
    
}
}