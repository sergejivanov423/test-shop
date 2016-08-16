<?php

namespace ShopApp\Controllers;

class ProductController extends BaseController
{
    public function actionView($id)
    {
        $this->needCarousel = false;
        $this->input();
        $this->page = $this->render(VIEWS.'product/view', [
            'header' => $this->header,
            'footer' => $this->footer
        ]);
        $this->getPage();
    }
}