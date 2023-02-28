<?php

$routes->match(['get','post'], 'tc/aboutus', '\Modules\PageAboutUs\Controllers\Pageaboutus::index');
$routes->match(['get','post'], 'sc/aboutus', '\Modules\PageAboutUs\Controllers\Pageaboutus::index');
$routes->match(['get','post'], 'en/aboutus', '\Modules\PageAboutUs\Controllers\Pageaboutus::index');

?>
