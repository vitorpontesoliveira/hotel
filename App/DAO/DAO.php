<?php

namespace App\DAO;

use \PDO;

abstract class DAO
{

    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("pgsql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'], $_ENV['db']['user'], $_ENV['db']['pass']);
    }
}
