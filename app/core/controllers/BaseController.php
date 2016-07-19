<?php

namespace ShopApp\Controllers;
use ShopApp\Exceptions\ContrExeption;


/**
 * Class BaseController
 * @package ShopApp\Controllers
 */
class BaseController
{
    protected $page;

    /**
     * @param $path
     * Path to views
     *
     * @param array $param
     * data from model
     *
     * @return string
     * return view file
     *
     * @throws ContrExeption
     * if the file does not exists
     */
    final protected function render($path, $param = array()) {

        extract($param);

        ob_start();

        if(!include($path.'.php')) {
            throw new ContrExeption('Данного шаблона нет');
        }

        return ob_get_clean();
    }


    /**
     * echo page after render
     */
    public function getPage()
    {
        echo $this->page;
    }


}