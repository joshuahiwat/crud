<?php

class Connection
{
    public function getDatabase() {
        $dbh = NULL;

        $host = "localhost";
        $dbname = "test";
        $username = "root";
        $password = "";

        try {
            $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die('DATABASE ERROR: ' . $e->getMessage());
        }

        return $dbh;

    }
}