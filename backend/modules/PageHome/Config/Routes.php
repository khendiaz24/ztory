<?php

$routes->match(['get','post'], '/', '\Modules\PageHome\Controllers\Pagehome::index');

$routes->match(['get','post'], 'tc/home', '\Modules\PageHome\Controllers\Pagehome::home');
$routes->match(['get','post'], 'sc/home', '\Modules\PageHome\Controllers\Pagehome::home');
$routes->match(['get','post'], 'en/home', '\Modules\PageHome\Controllers\Pagehome::home');

$routes->match(['get','post'], 'en/search/result', '\Modules\PageHome\Controllers\Pagehome::search_result');
$routes->match(['get','post'], 'tc/search/result', '\Modules\PageHome\Controllers\Pagehome::search_result');
?>
