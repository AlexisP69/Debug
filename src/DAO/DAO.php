<?php

namespace Leader\DAO;

session_start();

class DAO
{
    public function connect(): object
    {
        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "bdd_e-commerce";

        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
