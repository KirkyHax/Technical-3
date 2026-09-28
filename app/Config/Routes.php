<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('customer-accounts', 'CustomerAccounts::index', ['as' => 'customer-accounts']);
$routes->get('customers/new', 'CustomerAccounts::new');
$routes->post('customers', 'CustomerAccounts::create');
$routes->get('customers/(:num)/edit', 'CustomerAccounts::edit/$1');
$routes->post('customers/(:num)', 'CustomerAccounts::update/$1');
$routes->get('user-accounts', 'UserAccounts::index', ['as' => 'user-accounts']);
$routes->get('users/new', 'UserAccounts::new');
$routes->post('users', 'UserAccounts::create');
$routes->get('users/(:num)/edit', 'UserAccounts::edit/$1');
$routes->post('users/(:num)', 'UserAccounts::update/$1');

// Short aliases are convenient during development and demonstrations.
$routes->get('customers', 'CustomerAccounts::index');
$routes->get('users', 'UserAccounts::index');
