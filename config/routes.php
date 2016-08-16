<?php

// array of routes
return [
    'product/([0-9]+)' => 'product/view/$1',
    '' => 'site/index', // actionIndex in SiteController
];
