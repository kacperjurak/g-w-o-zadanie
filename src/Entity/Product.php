<?php
/**
 * Created by IntelliJ IDEA.
 * User: kacper
 * Date: 4/6/18
 * Time: 7:28 PM
 */

namespace Gwo\Recruitment\Entity;

class Product
{
    private $id;
    private $name = "";
    private $price = 0.0;
    private $minimumQuantity = 1;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = intval($id);

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function setUnitPrice($price)
    {
        if ($price < 1) {
            throw new \InvalidArgumentException;
        } else {
            $this->price = round(floatval($price), 2);
        }

        return $this;
    }

    public function setMinimumQuantity($minimumQuantity)
    {
        if ($minimumQuantity < 1) {
            throw new \InvalidArgumentException;
        } else {
            $this->minimumQuantity = intval($minimumQuantity);
        }

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getMinimumQuantity()
    {
        return $this->minimumQuantity;
    }
}
