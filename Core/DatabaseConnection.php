<?php
declare (strict_types = 1);

namespace Core;
use PDO;

class DatabaseConnection {

    /**
     * Connect to the database if it is not already connected
     *
     * @return PDO database object
     */

    protected  ? PDO $db = null;

    public function __construct() {

        $db = new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'].';
            charset=utf8', $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->db = $db;
    }

}