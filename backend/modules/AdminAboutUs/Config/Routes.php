<?php

$routes->match(['get','post'], 'admin/aboutus', '\Modules\AdminAboutUs\Controllers\Adminaboutus::index');

// Datatables
$routes->match(['get','post'], 'admin/aboutus/obb/getall', '\Modules\AdminAboutUs\Controllers\Adminaboutus::get_all_obb');
$routes->match(['get','post'], 'admin/aboutus/oc/getall', '\Modules\AdminAboutUs\Controllers\Adminaboutus::get_all_oc');
$routes->match(['get','post'], 'admin/aboutus/os/getall', '\Modules\AdminAboutUs\Controllers\Adminaboutus::get_all_os');
$routes->match(['get','post'], 'admin/aboutus/owc/getall', '\Modules\AdminAboutUs\Controllers\Adminaboutus::get_all_owc');

// AJAX Return
$routes->match(['get','post'], 'admin/aboutus/obb/getdatabyid', '\Modules\AdminAboutUs\Controllers\Adminaboutus::get_obb_data_by_id');
$routes->match(['get','post'], 'admin/aboutus/obb/deletedatabyid', '\Modules\AdminAboutUs\Controllers\Adminaboutus::delete_obb_data_by_id');
$routes->match(['get','post'], 'admin/aboutus/obb/switchorder', '\Modules\AdminAboutUs\Controllers\Adminaboutus::switch_obb_order');

$routes->match(['get','post'], 'admin/aboutus/oc/getdatabyid', '\Modules\AdminAboutUs\Controllers\Adminaboutus::get_oc_data_by_id');
$routes->match(['get','post'], 'admin/aboutus/oc/deletedatabyid', '\Modules\AdminAboutUs\Controllers\Adminaboutus::delete_oc_data_by_id');

$routes->match(['get','post'], 'admin/aboutus/os/getdatabyid', '\Modules\AdminAboutUs\Controllers\Adminaboutus::get_os_data_by_id');
$routes->match(['get','post'], 'admin/aboutus/os/deletedatabyid', '\Modules\AdminAboutUs\Controllers\Adminaboutus::delete_os_data_by_id');

$routes->match(['get','post'], 'admin/aboutus/owc/deletedatabyid', '\Modules\AdminAboutUs\Controllers\Adminaboutus::delete_owc_data_by_id');
?>
