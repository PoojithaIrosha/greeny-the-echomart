<?php

class Database
{
    public static mysqli $connection;

    public static function setUpConnection(): void
    {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("127.0.0.1", "root", "Poojitha@2006", "greeny", "3306");
        }
    }

    public static function iud($q): void
    {
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q): mysqli_result|bool
    {
        Database::setUpConnection();
        return Database::$connection->query($q);
    }
}
