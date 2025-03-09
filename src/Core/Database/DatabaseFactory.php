<?php

declare(strict_types=1);

namespace Bebeton\Backend\Core\Database;

class DatabaseFactory
{

    private const DEFAULT_CHARSET = 'utf8';

    private string $host;
    private string $port;
    private string $charset;
    private string $username;
    private string $password;
    private string $dbName;

    public function __construct(
        string $host,
        string $port,
        string $username,
        string $password,
        string $dbName,
        string $charset = self::DEFAULT_CHARSET,
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->charset = $charset;
        $this->dbName = $dbName;
    }

    public function create(): Database
    {
        $pdo = new \PDO($this->prepareDsn());

        return new Database($pdo);
    }

    private function prepareDsn(): string
    {
        return "pgsql:host={$this->host};port={$this->port};dbname={$this->dbName};user={$this->username};password={$this->password}";
    }
    
}