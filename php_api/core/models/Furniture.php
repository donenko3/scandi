<?php

namespace app\core\models;

use PDO;

class Furniture extends Product {

    public  $height;
    public  $width;
    public  $length;



    public function create() {
        $sql = "INSERT INTO products (sku, name, price, type, height, width, length)
        VALUES (:sku, :name, :price, :type, :height, :width, :length)";

        $stmt = $this->dbConn->prepare($sql);
        $stmt->bindValue(":sku", $this->sku);
        $stmt->bindValue(":name", $this->name);
        $stmt->bindValue(":price", $this->price);
        $stmt->bindValue(":type", $this->type);
        $stmt->bindValue(":height", $this->height);
        $stmt->bindValue(":width", $this->width);
        $stmt->bindValue(":length", $this->length);
        $stmt->execute();
    }


    public function rules() {
        return [
            'sku' => [self::RULE_REQUIRED, self::RULE_UNIQUE],
            'name' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'type' => [self::RULE_REQUIRED],
            'height' => [self::RULE_REQUIRED],
            'width' => [self::RULE_REQUIRED],
            'length' => [self::RULE_REQUIRED]

        ];
    }
   
}