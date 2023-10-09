<?php

require_once '../vendor/autoload.php';

if (!defined('BASEDIR')) {
    define('BASEDIR', dirname(__FILE__) . '/../');
}

if (!defined('VIEWS')) {
    define('VIEWS', dirname(__FILE__) . '/../App/View/Modules/');
}

$smarty = new Smarty();

$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../templates_c/');
$smarty->setCacheDir('../cache/');
$smarty->setConfigDir('../configs/');

$_ENV['db']['host'] = 'localhost';
$_ENV['db']['user'] = 'postgres';
$_ENV['db']['pass'] = '2003';
$_ENV['db']['database'] = 'hotel';


