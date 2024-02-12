<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::admin');
$routes->get('/kasir', 'Home::kasir');

$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');

//user
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');

//produk
$routes->get('/produk', 'Produk::index');
$routes->get('/produk/tampil', 'Produk::ambilSemua');
$routes->post('/produk/simpan', 'Produk::simpan');
$routes->get('/produk/edit', 'Produk::edit');
$routes->post('/produk/update', 'Produk::update');
$routes->post('/produk/delete', 'Produk::delete');

//pelanggan
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/pelanggan/tampil', 'Pelanggan::ambilSemua');
$routes->post('/pelanggan/simpan', 'Pelanggan::simpan');
$routes->get('/pelanggan/edit', 'Pelanggan::edit');
$routes->post('/pelanggan/update', 'Pelanggan::update');
$routes->post('/pelanggan/delete', 'Pelanggan::delete');

//penjualan
$routes->get('/penjualan', 'Penjualan::index');

//detailpenjualan
$routes->get('/dtpenjualan', 'DetailPenjualan::index');