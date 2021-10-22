

<?php

#1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.

class Order
{
    #2. Описать свойства класса из п.1 (состояние).

    public string $type = '';
    public float $price = 0.0;

    #3. Описать поведение класса из п.1 (методы).

    public function __construct(string $type, float $price)
    {
        $this->type = $type;
        $this->price = $price;
    }

    public function sendOrder():bool
    {
        echo "Order has been received";
        return true;
    }

    public function getPrice():float
    {
        return rand(1,50)/3;
    }

}

#4. Придумать наследников класса из п.1. Чем они будут отличаться?

class CanceledOrder extends Order
{
    public string $name = '';
    public string $lastname = '';

    public function returnOrder():bool
    {
        echo "Order canceled and return to shop";
        return true;
    }
}

?>

5. Дан код
Что он выведет на каждом шаге? Почему?
class A {

public function foo() {
static $x = 0;
echo ++$x;
}

}

Что он выведет на каждом шаге? Почему?

$a1 = new A(); #создание объекта с сохранением в переменную $a1
$a2 = new A(); #создание объекта с сохранением в переменную $a2
$a1->foo();    #выведет 1
$a2->foo();    #выведет 2
$a1->foo();    #выведет 3
$a2->foo();    #выведет 4

/хоть и перенная $x увеличивалась на 1 в разных объектах, но работа совершалась с статическим состоянием


6. Объясните результаты в этом случае.
Немного изменим п.5:

class A {
public function foo() {
static $x = 0;
echo ++$x;
}
}

class B extends A {
}

$a1 = new A(); #создание объекта с сохранением в переменную $a1
$b1 = new B(); #создание объекта с сохранением в переменную $b1
$a1->foo();    #выведет 1
$b1->foo();    #выведет 1
$a1->foo();    #выведет 2
$b1->foo();    #выведет 2

/такое поведение связано с тем что статические переменных принадлежат различным классам

7. *Дан код:
Что он выведет на каждом шаге? Почему?

class A {
public function foo() {
static $x = 0;
echo ++$x;
}
}

class B extends A {
}

$a1 = new A; #создание объекта с сохранением в переменную $a1
$b1 = new B; #создание объекта с сохранением в переменную $b1
$a1->foo();  #выведет 1
$b1->foo();  #выведет 1
$a1->foo();  #выведет 2
$b1->foo();  #выведет 2

/7 задание идентично коду выше, не понял задание.
