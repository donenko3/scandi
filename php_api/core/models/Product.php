<?php

namespace app\core\models;

use app\core\Request;
use app\core\models\Furniture;
use app\core\models\Book;
use app\core\models\DVD;


use PDO;

abstract class Product {

    public const RULE_REQUIRED = 'required';
    public const RULE_STRING = 'string';
    public const RULE_NUMBER = 'number';
    public const RULE_UNIQUE = 'unique';

    public  $sku;
    public  $name;
    public  $price;
    public  $type;
    public $dbConn;
   
 

    public function __construct() {
        $this->dbConn = new PDO('mysql:host=localhost;dbname=id20692378_localhost','id20692378_root','Asani#919033', [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]);
    }

    abstract public function rules();

    public array $errors = [];

    public function addError($attribute, $rule) {
        $message = $this->errorMessages()[$rule];
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages() {
        return [
        self::RULE_REQUIRED => 'This field is required',
        self::RULE_STRING => "Please provide product name in text",
        self::RULE_NUMBER => "Please provide number value",
        self::RULE_UNIQUE => "Already another product present with this SKU"
         
        ];
    }
    
 

    public function validateRules() {
        foreach($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach($rules as $rule) {
                if($rule === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if($rule === self::RULE_UNIQUE && $this->validateSku($value)) {
                    $this->addError($attribute, self::RULE_UNIQUE);
                }
            }
        }
        return empty($this->errors);
    }
    
    
    public function validateSku($value) {
        $sql = "SELECT * FROM products 
             WHERE sku =  '$value' ";
            $stmt = $this->dbConn->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result == false) {
                return false;
            }
            return true;
    }
    
    abstract public function create();

    
    
    
    public function delete($data) {
        foreach($data as $item) {
            $sql = "DELETE FROM products 
                    WHERE id =  $item ";
                    $stmt = $this->dbConn->query($sql);
                    
        }
    }


   public function getAll() {
    $sql = "SELECT * 
    FROM products";

    $stmt = $this->dbConn->query($sql);

    $data =[];

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

      $data[] = $row;
    }
    return $data;
   }

    
    public function LoadData ( $data)   {
        foreach($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
        
    }
}








?>