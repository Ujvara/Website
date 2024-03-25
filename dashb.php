<?php
include_once 'UserRepository.php';
$userRepository = new UserRepository();
$users = $userRepository->getAllUsers();

if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $userRepository->deleteUser($delete_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
    body{
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }
    .container{
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .back-btn{
        display: inline-block;
        padding: 10px 20px;
        background-color: #808080;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .back-btn:hover{
        background-color: black;
    }
    h1{
        text-align: center;
        color: #333;
    }
    h2{
        margin-bottom: 10px;
        color: #666;
    }
    table{
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td{
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    th{
        background-color: #f2f2f2;
    }
    td{
        background-color: #fff;
    }
    tr:hover{
        background-color: #f9f9f9;
    }
    .btn-edit, .btn-delete{
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }
    .btn-edit{
        background-color: #4caf50;
        color: #fff;
    }
    .btn-delete{
        background-color: #f44336;
        color: #fff;
    }
    </style>
</head>
<body>
    <div class="container">
        <a href="wensite.php" class="back-btn">Back to Main Page</a>
        <h1>User Dashboard</h1>
        <div class="user-list">
            <h2>User List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($users) {
                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td>{$user['id']}</td>";
                            echo "<td>{$user['name']}</td>";
                            echo "<td>{$user['surname']}</td>";
                            echo "<td>{$user['username']}</td>";
                            echo "<td>{$user['email']}</td>";
                            echo "<td>{$user['password']}</td>";
                            echo "<td>{$user['role']}</td>";
                            echo "<td><a href='updateUser.php?edit_id={$user['id']}'><button>Edit</button></a> <a href='?delete_id={$user['id']}' onclick=\"return confirm('Are you sure you want to delete this user?');\"><button>Delete</button></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>