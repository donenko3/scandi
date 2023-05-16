<?php

namespace app\core\models;

class Book extends Product {

    public $weight;
    
    


    public function create() {
        $sql = "INSERT INTO products (sku, name, price, type, weight)
        VALUES (:sku, :name, :price, :type, :weight)";

        $stmt = $this->dbConn->prepare($sql);
        $stmt->bindValue(":sku", $this->sku);
        $stmt->bindValue(":name", $this->name);
        $stmt->bindValue(":price", $this->price);
        $stmt->bindValue(":type", $this->type);
        $stmt->bindValue(":weight", $this->weight);
       
        $stmt->execute();
    }

    public function rules() {
        return [
            'sku' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
            'name' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'type' => [self::RULE_REQUIRED],
            'weight' => [self::RULE_REQUIRED]
        ];
    }
}