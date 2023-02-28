<?php

$routes->match(['get','post'], 'tc/contactus', '\Modules\PageContactUs\Controllers\Pagecontactus::index');
$routes->match(['get','post'], 'sc/contactus', '\Modules\PageContactUs\Controllers\Pagecontactus::index');
$routes->match(['get','post'], 'en/contactus', '\Modules\PageContactUs\Controllers\Pagecontactus::index');

?>
