<?php

namespace ShopApp\Controllers;
use ShopApp\Models\Category;

class SiteController extends BaseController
{
    public function actionIndex()
    {
        $this->input();
        $categories = Category::getCatList();

        $this->page = $this->render(VIEWS.'site/index',[
                                                         'header'=> $this->header,
                                                         'footer'=> $this->footer,
                                                         'catList' => $categories
                                                        ]);
        $this->getpage();
    }
}