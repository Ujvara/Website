<?php
require_once "databaseConnection.php";

class ProductRepository {
    private $connection;

    public function __construct() {
        $databaseConnection = new databaseConnection();
        $this->connection = $databaseConnection->startConnection();
    }

    public function updateProduct($id, $product_name, $description, $image_url) {
        $conn = $this->connection;

        $sql = "UPDATE products SET product_name=?, description=?, image_url=? WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$product_name, $description, $image_url, $id]);

        if ($statement->rowCount() > 0) {
            echo "<script> alert('Product has been updated successfully!'); </script>";
        } else {
            echo "<script> alert('Failed to update product!'); </script>";
        }
    }

    public function insertProduct($product_name, $description, $image_url) {
        $conn = $this->connection;

        $sql = "INSERT INTO products (product_name, description, image_url) VALUES (?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$product_name, $description, $image_url]);

        if ($statement->rowCount() > 0) {
            echo "<script> alert('Product has been inserted successfully!'); </script>";
        } else {
            echo "<script> alert('Failed to insert product!'); </script>";
        }
    }

    require_once "ProductRepository.php";
    
    $productRepository = new ProductRepository();
    
    $product_name = "New Product";
    $description = "This is a new product description.";
    $image_url = "path/to/image.jpg";
    
    $productRepository->insertProduct($product_name, $description, $image_url);
}
    ?>

?>