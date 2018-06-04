<?php

interface MainProduct
{
    public function getPrice();

    public function setPrice($price);

    public function getTitle();

    public function setTitle($title);

    public function getDelivery();

    public function setDelivery($delivery);

}

trait ChangePrice
{
    public function setPrice($price)
    {
        $this->price = $price * 0.9;
    }
}

abstract class Product implements MainProduct
{

    protected $price;
    protected $title;
    protected $delivery;

    public function getPrice()
    {
        return $this->price;
    }

    abstract public function setPrice($price);

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getDelivery()
    {
        return $this->delivery;
    }

    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }

}

class SmartPhone extends Product
{
    protected $manufacturer;
    use ChangePrice;

    public function __construct($title, $price, $manufacturer)
    {
        $this->title = $title;
        $this->setPrice($price);
        $this->manufacturer = $manufacturer;
        $this->setDelivery(300);
    }

    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

}

class PowerBank extends Product
{
    protected $power;
    use ChangePrice;

    public function __construct($title, $price, $power)
    {
        $this->title = $title;
        $this->setPrice($price);
        $this->power = $power;
        $this->setDelivery(300);
    }

    public function getPower()
    {
        return $this->power;
    }

    public function setPower($power)
    {
        $this->power = $power;
        return $this;
    }

}

class Monitor extends Product
{
    protected $weight;

    public function __construct($title, $price, $weight)
    {
        $this->title = $title;
        $this->weight = $weight;
        $this->setPrice($price);
        $this->setDelivery(250);
        if ($this->getWeight() > 10)
        {
            $this->setPrice($price * 0.9);
            $this->setDelivery(300);
        }
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

}

$smart1 = new SmartPhone('m3 note', 500, 'meizu');
$smart1->setPrice(20);
echo "<pre>";
print_r($smart1);
echo "</pre>";

$power1 = new PowerBank('xiaomi', 15, 10000);
echo "<pre>";
print_r($power1);
echo "</pre>";

$monitor1 = new Monitor('samsung', 200, 1);
echo "<pre>";
print_r($monitor1);
echo "</pre>";