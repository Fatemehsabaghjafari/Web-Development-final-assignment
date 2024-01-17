<?php
namespace App\Models;
class Cart  implements \JsonSerializable {
public $id;
public $name;
public $price;
public $quantity;

  
    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

  

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

      /**
     * Get the value of price
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

  

    /**
     * Set the value of id
     *
     * @param float $price
     *
     * @return self
     */
    public function setPrice(float $id): self
    {
        $this->price = $price;

        return $this;
    }

/**
     * Get the value of id
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->id;
    }

  

    /**
     * Set the value of id
     *
     * @param int $quantity
     *
     * @return self
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
    public function jsonSerialize() : mixed
    {
        return [
            "id" => $this->getId(),
            "name"=> $this->getName(),
            "price"=> $this->getPrice(),
            "quantity"=> $this->getQuantity(),
           
        ];
    }


}