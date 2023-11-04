<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'C_Home::index');
// $routes->add('/login', 'Auth::index');
// $routes->add('/logout', 'Auth::logout');
// $routes->add('/login/proses-login', 'Auth::prosesLogin');

// INVENTORI BARANG
$routes->add('/item', 'Admin\C_Item::index');
$routes->add('/item/save-multi', 'Admin\C_Item::saveMulti');
$routes->add('/item/simpan', 'Admin\C_Item::simpanItem');

// PENJUALAN BARANG
$routes->add('/data-penjualan', 'Admin\C_Penjualan::index');
// $routes->add('/item/save-multi', 'Admin\C_Item::saveMulti');
// $routes->add('/item/simpan', 'Admin\C_Item::simpanItem');

// APRIORI REPORT
$routes->add('/analisa', 'Admin\C_Analisa::index');
$routes->add('/analisa/get-analisa', 'Admin\C_Analisa::AnalisaData');
// $routes->add('/item/simpan', 'Admin\C_Item::simpanItem');