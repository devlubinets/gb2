<?php

namespace models;

class Order
{
    private string $order_name;

    /**
     * @return string
     */
    public function getOrderName(): string
    {
        return $this->order_name;
    }

    /**
     * @param string $order_name
     */
    public function setOrderName(string $order_name): void
    {
        $this->order_name = $order_name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    private float $price;

    public function addOrder():string
    {
        return "Заказ \"{$this->order_name}\" обработан, средства {$this->price} зачисленны на счет нашей конторы";
    }

}