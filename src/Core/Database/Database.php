<?php

declare(strict_types=1);

namespace Bebeton\Backend\Core\Database;

class Database
{

    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query(string $query): \PDOStatement
    {
       return $this->pdo->query($query);
    }

}