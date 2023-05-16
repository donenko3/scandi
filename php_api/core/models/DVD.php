<?php

namespace app\core\models;

class DVD extends Product {
    public  $size;


    public function create() {
        $sql = "INSERT INTO products (sku, name, price, type, size)
        VALUES (:sku, :name, :price, :type, :size)";

        $stmt = $this->dbConn->prepare($sql);
        $stmt->bindValue(":sku", $this->sku);
        $stmt->bindValue(":name", $this->name);
        $stmt->bindValue(":price", $this->price);
        $stmt->bindValue(":type", $this->type);
        $stmt->bindValue(":size", $this->size);
       
        $stmt->execute();
    }

    
    public function rules() {
        return [
            'sku' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
            'name' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'type' => [self::RULE_REQUIRED],
            'size' => [self::RULE_REQUIRED]
        ];
    }
}