<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shop</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo SITE_URL;?>bower_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo TPL;?>styles/custom.css">
<!--    <link rel="stylesheet" href="--><?php //echo TPL;?><!--styles/build.min.css">-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<header>
    <div class="menu-top">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-top" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="menu-top">
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Связаться <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu phone">
                                <li><a href="#"><i class="fa fa-phone"></i> <span>+38 066 829 21 05</span></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> <span>vodolserge@gmail.com</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Мы в соцсетях <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu social">
                                <li><a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i><span>Google+</span></a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                        <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                        <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>

                        <li><a href="/cart" class="btn-red"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Корзина
                                (<span id="cart-count">)</a></li>
                        <li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div><!-- /.menu-top -->
    <section class="menu-carousel">
        <? if(!$carousel): ?>
        <div class="main-menu" style="position: initial; background-color: #000">
            <nav class="navbar navbar-inverse" style="margin-bottom: 0">
            <? else: ?>
            <div class="main-menu">
            <nav class="navbar navbar-inverse">
        <? endif; ?>
                <div class="container">
                    <div class="main-menu-bg">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#main-menu" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">
                                <img src="<?= TPL; ?>img/purple-shop.png" alt="logo">
                                <span>E-Shop</span>
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="main-menu">
                            <ul class="nav navbar-nav clearfix">
                                <li><a href="#">Главная</a></li>
                                <li><a href="#">Каталог</a></li>
                                <li><a href="#">О магазине</a></li>
                                <li><a href="#">Контакты</a></li>
                                <li><a href="#">Статьи</a></li>
                            </ul>

                            <div class="nav navbar-nav navbar-right">
                                <form class="navbar-form navbar-left" role="search" method="post"
                                      action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                                        <span class="input-group-btn">
                                                            <button type="submit" class="btn btn-default"
                                                                    name="submit">
                                                                <i class="glyphicon glyphicon-search"></i>
                                                            </button>
                                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.navbar-collapse -->
                        <i class="search glyphicon glyphicon-search"></i>
                    </div><!-- /.main-menu-bg-->
                </div><!-- /.container -->
            </nav>
        </div><!-- /.main-menu -->

        <? if ($carousel): ?>
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators-wrap">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                        <li data-target="#carousel" data-slide-to="3"></li>
                    </ol>
                </div>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="bg-slide" style="background-image: url('<?= TPL; ?>img/slider.jpg')"></div>
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Товар 1</h1>

                                <h3>Что-то,что-то, кое-что ещё...</h3>
                                <a href="#" class="btn-red">Купить Товар 1</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="bg-slide" style="background-image: url('<?= TPL; ?>img/muxa_1.jpg')"></div>
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Товар 2</h1>

                                <h3>Что-то,что-то, кое-что ещё...</h3>
                                <a href="#" class="btn-red">Купить Товар 2</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="bg-slide" style="background-image: url('<?= TPL; ?>img/muxa.jpg')"></div>
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Товар 3</h1>

                                <h3>Что-то,что-то, кое-что ещё...</h3>
                                <a href="#" class="btn-red">Купить Товар 3</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="bg-slide" style="background-image: url('<?= TPL; ?>img/goods4.jpg')"></div>
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Women's Apparel 4</h1>

                                <h3>T-Shirts, Dress Shirts, Tanks, Pants and More...</h3>
                                <a href="#" class="btn-red">Shop Women’s Apparel 2</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <? endif; ?>
    </section>
</header>