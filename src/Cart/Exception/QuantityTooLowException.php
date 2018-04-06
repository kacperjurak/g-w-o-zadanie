<?php
/**
 * Created by IntelliJ IDEA.
 * User: kacper
 * Date: 4/6/18
 * Time: 8:33 PM
 */

namespace Gwo\Recruitment\Cart\Exception;

class QuantityTooLowException extends \Exception
{
    public function errorMessage()
    {
        return "Quantity too low";
    }
}

// Najprostsze możliwe rozszerzenie klasy \Exception.
// Jeśli ta implementacja była by bardziej skomplikowana, to można by dopisać test jednostkowy.
