<?php

namespace models;

class Cart
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

    public function addOrderToCart():string
    {
        return "Заказ \"{$this->order_name}\" добавлен в корзину";
    }

}