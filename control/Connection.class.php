<?php

class Connection
{
    private const HOST = "LOCALHOST";
    private const DATABASE = "...";
    private const USERNAME = "...";
    private const PASSWORD = "...";
    
    public function getDatabase() {
        $dbh = NULL;

        try {
            $dbh = new PDO('mysql:host=' . SELF::HOST . ';dbname=' . SELF::DATABASE, SELF::USERNAME, SELF::PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die('DATABASE ERROR: ' . $e->getMessage());
        }

        return $dbh;

    }
}
