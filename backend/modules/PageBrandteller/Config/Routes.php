<?php

$routes->match(['get','post'], 'tc/brandteller', '\Modules\PageBrandteller\Controllers\Pagebrandteller::index');
$routes->match(['get','post'], 'sc/brandteller', '\Modules\PageBrandteller\Controllers\Pagebrandteller::index');
$routes->match(['get','post'], 'en/brandteller', '\Modules\PageBrandteller\Controllers\Pagebrandteller::index');

$routes->match(['get','post'], 'tc/brandteller/(:any)', '\Modules\PageBrandteller\Controllers\Pagebrandteller::details/$1');
$routes->match(['get','post'], 'sc/brandteller/(:any)', '\Modules\PageBrandteller\Controllers\Pagebrandteller::details/$1');
$routes->match(['get','post'], 'en/brandteller/(:any)', '\Modules\PageBrandteller\Controllers\Pagebrandteller::details/$1');

?>
