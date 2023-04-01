<?php

$routes->get('admin/users', '\Modules\Users\Controllers\Users::index');
$routes->match(['get','post'], 'admin/users/add_new_user', '\Modules\Users\Controllers\Users::add_new_user');
$routes->match(['get','post'], 'admin/users/edit_user/(:num)', '\Modules\Users\Controllers\Users::edit_user/$1');
$routes->match(['get','post'], 'admin/login', '\Modules\Users\Controllers\Users::login');
$routes->match(['get','post'], 'admin/users/user_profile', '\Modules\Users\Controllers\Users::user_profile');
$routes->get('admin/logout', '\Modules\Users\Controllers\Users::logout');

$routes->match(['get','post'], 'admin/users/getallusers', '\Modules\Users\Controllers\Users::getallusers');
$routes->match(['get','post'], 'admin/users/saveuser', '\Modules\Users\Controllers\Users::saveuser');
$routes->match(['get','post'], 'admin/users/updateuser', '\Modules\Users\Controllers\Users::updateuser');
$routes->match(['get','post'], 'admin/users/updateuserprofile', '\Modules\Users\Controllers\Users::updateuserprofile');
$routes->match(['get','post'], 'admin/users/updateuserchangepassword', '\Modules\Users\Controllers\Users::updateuserchangepassword');
$routes->match(['get','post'], 'admin/users/resetaccountbyid', '\Modules\Users\Controllers\Users::resetaccountbyid');

?>
