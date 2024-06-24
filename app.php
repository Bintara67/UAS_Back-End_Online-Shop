<?php
include_once 'controllers/ProductsController.php';
include_once 'controllers/StocksController.php';
include_once 'controllers/TransactionsController.php';
include_once 'controllers/UsersController.php';
include_once 'config/database.php'; 
include_once 'middleware/Router.php';

$database = new Database();
$db = $database->getConnection();

$router = new Router();
$router->register('GET', '/api/products', [new ProductsController($db), 'readProducts']);
$router->register('POST', '/api/products', [new ProductsController($db), 'addProducts']);
$router->register('PUT', '/api/products', [new ProductsController($db), 'updateProducts']);
$router->register('DELETE', '/api/products', [new ProductsController($db), 'deleteProducts']);

$router->register('GET', '/api/stocks', [new StocksController($db), 'readStocks']);
$router->register('POST', '/api/stocks', [new StocksController($db), 'addStocks']);
$router->register('PUT', '/api/stocks', [new StocksController($db), 'updateStocks']);
$router->register('DELETE', '/api/stocks', [new StocksController($db), 'deleteStocks']);

$router->register('GET', '/api/transactions', [new TransactionsController($db), 'readTransactions']);
$router->register('POST', '/api/transactions', [new TransactionsController($db), 'addTransactions']);
$router->register('PUT', '/api/transactions', [new TransactionsController($db), 'updateTransactions']);
$router->register('DELETE', '/api/transactions', [new TransactionsController($db), 'deleteTransactions']);

$router->register('GET', '/api/users', [new UsersController($db), 'readUsers']);
$router->register('POST', '/api/users', [new UsersController($db), 'addUser']);
$router->register('PUT', '/api/users', [new UsersController($db), 'updateUser']);
$router->register('DELETE', '/api/users', [new UsersController($db), 'deleteUser']);


$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));