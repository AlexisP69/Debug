<?php
namespace Leader\UserApi;

require_once __DIR__ . '/../../vendor/autoload.php';

use Leader\DAO\DAO;


new DAO();

$test = new user();

// $conn = $hello->connect();

$test->getAllUsers();

class user extends DAO
{
    public function getAllUsers()
    {
        $conn=parent::connect();
        $sql = "SELECT * FROM users;";
        /** @var TYPE_NAME $conn */
        $result =  $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $response[] = $row;
                // echo "Nom du produit : " . $row["ProductName"] . "<br>Prix : " . $row["Price"] . "<br>Vendu par : " . $row["Publishers"] . "<br>Description : " . $row["Description"] . "<br><br>";
            }
            header('Content-Type: application/json');
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
    public function getUserByEmail($email)
    {
        $conn=parent::connect();
        $query = "SELECT * FROM users";
        $query .= " WHERE Email=" . $email . " LIMIT 1";
        $response = array();
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $response[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}
