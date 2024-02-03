<?php
include_once '../userRepository.php';
include_once '../user.php';

if (isset($_POST['signupbtn'])) {
    if (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['username']) ||
        empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmpassword'])) {
        echo "Fill all fields!";
    } else {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $id = $username . uniqid();

        $user = new User($id, $name, $surname, $username, $email, $password, $confirmpassword);
        $userRepository = new UserRepository();

        $userRepository->insertUser($user);
    }
}
?>