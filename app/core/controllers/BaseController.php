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
    protected $header;
    protected $footer;
    protected $title;
    protected $content;
    protected $needCarousel = true;

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
    protected function getPage()
    {
        echo $this->page;
    }

    protected function input($params = []) {
        $this->header = $this->render(VIEWS."layouts/header", [
                                        'carousel' => $this->needCarousel
                                    ]);
        $this->footer = $this->render(VIEWS."layouts/footer");
    }



}