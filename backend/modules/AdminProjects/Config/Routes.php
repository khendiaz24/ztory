<?php

$routes->match(['get','post'], 'admin/projects', '\Modules\AdminProjects\Controllers\Adminprojects::index');
$routes->match(['get','post'], 'admin/projects/edit/(:num)', '\Modules\AdminProjects\Controllers\Adminprojects::edit/$1');

// Datatables
$routes->match(['get','post'], 'admin/projects/getall', '\Modules\AdminProjects\Controllers\Adminprojects::get_all');
$routes->match(['get','post'], 'admin/projects/categories/getall', '\Modules\AdminProjects\Controllers\Adminprojects::get_all_categories');
$routes->match(['get','post'], 'admin/projects/introimages/getall/(:num)', '\Modules\AdminProjects\Controllers\Adminprojects::get_all_intro_images/$1');
$routes->match(['get','post'], 'admin/projects/learnmoreimage/getall/(:num)', '\Modules\AdminProjects\Controllers\Adminprojects::get_all_learnmore_images/$1');
$routes->match(['get','post'], 'admin/projects/baimages/getall/(:num)', '\Modules\AdminProjects\Controllers\Adminprojects::get_all_baimages_images/$1');
$routes->match(['get','post'], 'admin/projects/bvimages/getall/(:num)', '\Modules\AdminProjects\Controllers\Adminprojects::get_all_bvimages_images/$1');
$routes->match(['get','post'], 'admin/projects/mdimages/getall/(:num)', '\Modules\AdminProjects\Controllers\Adminprojects::get_all_mdimages_images/$1');
$routes->match(['get','post'], 'admin/projects/eventimage/getall/(:num)', '\Modules\AdminProjects\Controllers\Adminprojects::get_all_eventimage_images/$1');

// AJAX Return
$routes->match(['get','post'], 'admin/projects/categories/getdatabyid', '\Modules\AdminProjects\Controllers\Adminprojects::get_project_category_by_id');

$routes->match(['get','post'], 'admin/projects/introimages/deletedatabyid', '\Modules\AdminProjects\Controllers\Adminprojects::remove_intro_image');
$routes->match(['get','post'], 'admin/projects/introimages/switchorder', '\Modules\AdminProjects\Controllers\Adminprojects::switch_intro_image_order');

$routes->match(['get','post'], 'admin/projects/learnmoreimage/deletedatabyid', '\Modules\AdminProjects\Controllers\Adminprojects::remove_learnmore_image');
$routes->match(['get','post'], 'admin/projects/learnmoreimage/switchorder', '\Modules\AdminProjects\Controllers\Adminprojects::switch_learnmore_image_order');

$routes->match(['get','post'], 'admin/projects/baimages/deletedatabyid', '\Modules\AdminProjects\Controllers\Adminprojects::remove_ba_image');
$routes->match(['get','post'], 'admin/projects/baimages/switchorder', '\Modules\AdminProjects\Controllers\Adminprojects::switch_ba_image_order');

$routes->match(['get','post'], 'admin/projects/bvimages/deletedatabyid', '\Modules\AdminProjects\Controllers\Adminprojects::remove_bv_image');
$routes->match(['get','post'], 'admin/projects/bvimages/switchorder', '\Modules\AdminProjects\Controllers\Adminprojects::switch_bv_image_order');

$routes->match(['get','post'], 'admin/projects/mdimages/deletedatabyid', '\Modules\AdminProjects\Controllers\Adminprojects::remove_md_image');
$routes->match(['get','post'], 'admin/projects/mdimages/switchorder', '\Modules\AdminProjects\Controllers\Adminprojects::switch_event_md_order');

$routes->match(['get','post'], 'admin/projects/eventimage/deletedatabyid', '\Modules\AdminProjects\Controllers\Adminprojects::remove_event_image');
$routes->match(['get','post'], 'admin/projects/eventimage/switchorder', '\Modules\AdminProjects\Controllers\Adminprojects::switch_event_image_order');


?>
