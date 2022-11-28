<?php

use Simplon\Mysql\PDOConnector;
use Simplon\Mysql\Mysql;

// TODO: put connection data to config file
$pdo = new PDOConnector(
    'mysql', // server
    'symfony',      // user
    'password',      // password
    'symfony'   // database
);

$pdoConn = $pdo->connect('utf8', []); // charset, options
$dbConn = new Mysql($pdoConn);
