<?php

namespace ShopApp\Exceptions;

class DbExeption extends \Exception
{
    public function __construct($text) {
        $this->message = $text;
    }
}