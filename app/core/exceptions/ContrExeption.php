<?php

namespace ShopApp\Exceptions;


/**
 * Custom Exeption for Controllers
 * @package ShopApp\Exceptions
 */
class ContrExeption extends \Exception
{
    public function __construct($text) {
        $this->message = $text;
    }
}