<?php
/**
 * Created by IntelliJ IDEA.
 * User: kacper
 * Date: 4/6/18
 * Time: 7:28 PM
 */

namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Entity\Product;
use Gwo\Recruitment\Cart\Exception\QuantityTooLowException;

class Item
{
    private $product;
    private $quantity;

    /**
     * Dodałem ten komentarz aby JetBrains nie drażnił komunikatem że nie ma @throws.
     * Ze względu na to, że to tylko proste zadanie to nie robiłem komentarzy do wszystkich metod.
     *
     * @param $product Product Lorem ipsum dolor sit amet.
     * @param $quantity Lorem ipsum dolor sit amet.
     *
     * @throws QuantityTooLowException Lorem ipsum dolor sit amet.
     *
     */
    public function __construct(Product $product, $quantity)
    {
        if ($quantity < $product->getMinimumQuantity()) {
            throw new QuantityTooLowException();
        } else {
            $this->product = $product;
            $this->quantity = $quantity;
        }
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Dodałem ten komentarz aby JetBrains nie drażnił komunikatem że nie ma @throws.
     * Ze względu na to, że to tylko proste zadanie to nie robiłem komentarzy do wszystkich metod.
     *
     * @param $quantity Lorem ipsum dolor sit amet.
     *
     * @throws QuantityTooLowException Lorem ipsum dolor sit amet.
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        if ($quantity < $this->product->getMinimumQuantity()) {
            throw new QuantityTooLowException();
        } else {
            $this->quantity = intval($quantity);
        }
        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getTotalPrice()
    {
        return $this->product->getPrice() * $this->quantity;
    }
}
