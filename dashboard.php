<?php
session_start();

require_once "databaseConnection.php";
require_once "UserRepository.php"; 
require_once "ProductRepository.php";

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("location: home.php");
    exit();
}


$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        
        $userRepository = new UserRepository();
        $productRepository = new ProductRepository();
        
        switch ($action) {
            case 'deleteUser':
                $userId = $_POST['userId'];
                $userRepository->deleteUser($userId);
                break;
            case 'updateUser':
                $Id = $_POST['Id'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmpassword = $_POST['confirmpassword'];
                $role = $_POST['role'];
                $userRepository->updateUser($userId, $name, $surname, $username, $email, $password, $confirmpassword, $role);
                break;
            case 'deleteProduct':
                $id = $_POST['productId'];
                $productRepository->deleteProduct($productId);
                break;
            case 'updateProduct':
                $productId = $_POST['productId'];
                $product_name = $_POST['product_name'];
                $description = $_POST['description'];
                $image_url = $_POST['image_url'];
                $productRepository->updateProduct($productId, $product_name, $description, $image_url);
                break;
        }
    }
}

$databaseConnection = new databaseConnection();
$conn = $databaseConnection->startConnection();

if ($conn) {
    $userSql = "SELECT * FROM users";
    $userResult = $conn->query($userSql);
    $users = ($userResult && $userResult->rowCount() > 0) ? $userResult->fetchAll(PDO::FETCH_ASSOC) : [];

    $productSql = "SELECT * FROM products";
    $productResult = $conn->query($productSql);
    $products = ($productResult && $productResult->rowCount() > 0) ? $productResult->fetchAll(PDO::FETCH_ASSOC) : [];
} else {
    $users = [];
    $products = [];
}
if ($conn) {
    $userRepository = new UserRepository();
    $users = $userRepository->getAllUsers();
    
    $productRepository = new ProductRepository();
    $products = $productRepository->getAllProducts();
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1, h2 {
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 6px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Admin Dashboard</h1>
<div class="container">
    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Confirm Password</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['surname']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td><?php echo $user['confirmpassword']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="action" value="deleteUser">
                        <input type="hidden" name="userId" value="<?php echo $user['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Products</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image URL</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['image_url']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="action" value="deleteProduct">
                        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
