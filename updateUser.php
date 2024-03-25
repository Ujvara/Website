<?php
include_once 'UserRepository.php';
$userRepository = new UserRepository();

if(isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $editUser = $userRepository->getUserById($edit_id);

    if(!$editUser) {
        header("Location: dashb.php");
        exit();
    }
} else {
    header("Location: dashb.php");
    exit();
}

if(isset($_POST['updatebtn'])) {
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $role = $_POST['role'];

    $userRepository->updateUser($id, $name, $surname, $username, $email, $password, $confirmpassword, $role);
    header("Location: dashb.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
    body{
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f2f2f2;
        margin-top:100px;
        margin-right:40%;
        padding: 0;
    }
    .card{
        max-width: 600px;
        padding: 20px;
        margin-left:18%;
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
        margin-bottom: 20px;
        font-size: 35px;
    }
    .form-container{
        margin-top: 20px;
        font-size: 34px;
    }
    table{
        width: 50%;
        border-collapse: collapse;
        margin-top: 25px;
        border: none;
        border-radius: 8px;
        overflow: hidden;
    }
    th, td{
        padding: 8px;
        text-align: left;
        border: none;
        border-bottom: 2px solid #ddd;
    }
    th{
        background-color: #f2f2f2;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 25px;
    }
    td{
        background-color: #fff;
    }
    tr:hover{
        background-color: #f9f9f9;
    }
    label{
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
        font-size: 25px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"]{
        width: 45%;
        padding: 8px;
        margin-bottom: 10px;
        margin-left:58px;
        border: none;
        border-bottom: 1px solid #ccc;
        font-size: 16px;
        transition: border 0.3s ease;
    }
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus{
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button[type="submit"]{
        padding: 10px 20px;
        background-color: #808080;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 18px;
    }
    button[type="submit"]:hover{
        background-color: #555;
    }
    </style>
</head>
<body>
<h1>Update User</h1>
    <div class="card">
    <form method="POST" action="">
        <input type="hidden" name="user_id" value="<?php echo $editUser['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $editUser['name']; ?>"><br><br>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" id="surname" value="<?php echo $editUser['surname']; ?>"><br><br>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $editUser['username']; ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $editUser['email']; ?>"><br><br>
        <label for="password">New Password:</label>
        <input type="password" name="password" id="password" placeholder="New Password"><br><br>
        <label for="confirmpassword">Confirm New Password:</label>
        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm New Password"><br><br>
        <label for="role">Role:</label>
        <select name="role" id="role">
            <option value="admin" <?php if($editUser['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            <option value="user" <?php if($editUser['role'] == 'user') echo 'selected'; ?>>User</option>
        </select><br><br>
        <button type="submit" name="updatebtn">Update</button>
    </form>
    </div>
</body>
</html>