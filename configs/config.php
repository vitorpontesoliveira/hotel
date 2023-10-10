<?php

require_once '../vendor/autoload.php';

if (!defined('BASEDIR')) {
    define('BASEDIR', dirname(__FILE__) . '/../');
}

if (!defined('VIEWS')) {
    define('VIEWS', dirname(__FILE__) . '/../templates/');
}

$_ENV['db']['host'] = 'localhost';
$_ENV['db']['user'] = 'postgres';
$_ENV['db']['pass'] = '2003';
$_ENV['db']['database'] = 'hotel';


