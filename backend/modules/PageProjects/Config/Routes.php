<?php

$routes->match(['get','post'], 'tc/projects', '\Modules\PageProjects\Controllers\Pageprojects::index');
$routes->match(['get','post'], 'sc/projects', '\Modules\PageProjects\Controllers\Pageprojects::index');
$routes->match(['get','post'], 'en/projects', '\Modules\PageProjects\Controllers\Pageprojects::index');

$routes->match(['get','post'], 'tc/project/(:any)', '\Modules\PageProjects\Controllers\Pageprojects::details/$1');
$routes->match(['get','post'], 'sc/project/(:any)', '\Modules\PageProjects\Controllers\Pageprojects::details/$1');
$routes->match(['get','post'], 'en/project/(:any)', '\Modules\PageProjects\Controllers\Pageprojects::details/$1');

$routes->match(['get','post'], 'tc/learn_more_about_project/(:any)', '\Modules\PageProjects\Controllers\Pageprojects::learnmore/$1');
$routes->match(['get','post'], 'sc/learn_more_about_project/(:any)', '\Modules\PageProjects\Controllers\Pageprojects::learnmore/$1');
$routes->match(['get','post'], 'en/learn_more_about_project/(:any)', '\Modules\PageProjects\Controllers\Pageprojects::learnmore/$1');

?>
