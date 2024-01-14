<?php
namespace App\Models;
class Cart implements \JsonSerializable {
public $id;
public $name;
public $price;
public $quantity;

public function jsonSerialize(): mixed{
    $vars = get_object_vars($this);
    return $vars;

}

}