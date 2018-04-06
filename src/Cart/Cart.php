<?php
/**
 * Created by IntelliJ IDEA.
 * User: kacper
 * Date: 4/6/18
 * Time: 7:28 PM
 */

namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Entity\Product;

class Cart
{
    private $items = array();

    public function addProduct(Product $product, $quantity)
    {
        $index = $this->itemsIterate($product);

        if (is_null($index)) {
            $item = new Item($product, $quantity);
            array_push($this->items, $item);
        } else {
            $this->items[$index]->setQuantity($this->items[$index]->getQuantity() + $quantity);
        }

        return $this;
    }

    public function removeProduct(Product $product)
    {
        $index = $this->itemsIterate($product);

        if (!is_null($index)) {
            unset($this->items[$index]);
            $this->items = array_values($this->items);
        }

        return $this;
    }

    public function getItem($index)
    {
        if (isset($this->items[$index])) {
            return $this->items[$index];
        } else {
            throw new \OutOfBoundsException;
        }
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setQuantity(Product $product, $quantity)
    {
        $index = $this->itemsIterate($product);

        if (is_null($index)) {
            $this->addProduct($product, $quantity);
        } else {
            $this->items[$index]->setQuantity($quantity);
        }

        return $this;
    }

    public function getTotalPrice()
    {
        $totalPrice = 0;

        foreach ($this->items as $item) {
            $totalPrice += $item->getTotalPrice();
        }

        return $totalPrice;
    }

    private function itemsIterate(Product $product)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getProduct()->getId() == $product->getId()) {
                return $key;
            }
        }

        return null;
    }
}
