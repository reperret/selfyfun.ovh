<?php
class Database
{
    public static function connect()
    {
        return new PDO("mysql:host=localhost;dbname=selfy;charset=utf8mb4", "root", "Deflagratione89!", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}