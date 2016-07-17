<?php

namespace ShopApp\Exceptions;


class ContrExeption extends \Exception
{
    public function __construct($text) {
        $this->message = $text;
    }
}