<?php

namespace Leader\Products;

use Leader\DAO\DAO;

require_once __DIR__ . '/../../vendor/autoload.php';
$request_method = $_SERVER["REQUEST_METHOD"];

new DAO();

$product = new product();

// $conn = $hello->connect();

$product->getAllProducts();

class product extends DAO
{
    public function getAllProducts()
    {
        $conn=parent::connect();
        $sql = "SELECT * FROM products;";
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
    public function getProductById($id)
    {
        $conn=parent::connect();
        $query = "SELECT * FROM products";
        $query .= " WHERE ProductId=" . $id . " LIMIT 1";
        $response = array();
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $response[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
    function AddProduct()
	{
		global $conn;
		$name = $_POST["name"];
		$description = $_POST["description"];
		$price = $_POST["price"];
		$category = $_POST["category"];
		$created = date('Y-m-d H:i:s');
		$modified = date('Y-m-d H:i:s');
		echo $query="INSERT INTO produit(name, description, price, category_id, created, modified) VALUES('".$name."', '".$description."', '".$price."', '".$category."', '".$created."', '".$modified."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit ajout� avec succ�s.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function updateProduct($id)
	{
		global $conn;
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);
		$name = $_PUT["name"];
		$description = $_PUT["description"];
		$price = $_PUT["price"];
		$category = $_PUT["category"];
		$created = 'NULL';
		$modified = date('Y-m-d H:i:s');
		$query="UPDATE produit SET name='".$name."', description='".$description."', price='".$price."', category_id='".$category."', modified='".$modified."' WHERE id=".$id;
		
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit mis a jour avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise a jour de produit. '. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function deleteProduct($id)
	{
		global $conn;
		$query = "DELETE FROM products WHERE ProductId=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit supprime avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'La suppression du produit a echoue. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}
switch($request_method)
	{
		
		case 'GET':
			// Retrive Products
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$product->getProductById($id);
			}
			else
			{
				$product->getAllProducts();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter un produit
			$product->AddProduct();
			break;
			
		case 'PUT':
			// Modifier un produit
			$id = intval($_GET["id"]);
			$product->updateProduct($id);
			break;
			
		case 'DELETE':
			// Supprimer un produit
			$id = intval($_GET["id"]);
			$product->deleteProduct($id);
			break;

	}
