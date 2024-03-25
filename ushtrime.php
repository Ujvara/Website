// function insertUser($user){
    //     $conn = $this->connection;
    
    //     $name = $user->getName();
    //     $surname = $user->getSurname();
    //     $username = $user->getUsername();
    //     $email = $user->getEmail();
    //     $password = $user->getPassword();
    //     $confirmpassword = $user->getConfirmPassword();
    
    //     $sqlCheckUsers = "SELECT COUNT(*) FROM User";
    //     $statementCheckUsers = $conn->query($sqlCheckUsers);
    //     $numUsers = $statementCheckUsers->fetchColumn();
    
    //     $role = ($numUsers === '0') ? 'admin' : 'user';
    
    //     $sql = "INSERT INTO User (name, surname, username, email, password, confirmpassword) VALUES (?, ?, ?, ?, ?, ?)";
    //     $statement = $conn->prepare($sql);
    //     $statement->execute([$name, $surname, $username, $email, $password, $confirmpassword]);
    //     echo "<script> alert('User has been inserted successfully!'); </script>";
    // }



    //dashbiard 
    // if(isset($_GET['edit_id'])) {
//     $edit_id = $_GET['edit_id'];
//     $user = $userRepository->getUserById($edit_id);
//     $name = $user['name'];
//     $surname = $user['surname'];
//     $username = $user['username'];
//     $email = $user['email'];

//     if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updatebtn'])) {
//         $userId = $_POST['user_id'];
//         $updatedName = $_POST['name'];
//         $updatedSurname = $_POST['surname'];
//         $updatedUsername = $_POST['username'];
//         $updatedEmail = $_POST['email'];
//         $updatedPassword = $_POST['password']; 
//         $updatedConfirmpassword = $_POST['confirmpassword'];

//         $updatedUser = new User(
//             $updatedName,
//             $updatedSurname,
//             $updatedUsername,
//             $updatedEmail,
//             $updatedPassword,
//             $updatedConfirmpassword
//         );

//         $userRepository->updateUser($userId, $updatedUser);
//         header("Location: wensite.php");
//         exit();
//     }
// }



<?php
session_start();

include_once 'User.php';
include_once 'UserRepository.php';
include_once 'databaseConnection.php';

$databaseConnection = new databaseConnection();
$connection = $databaseConnection->startConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginbtn'])) {
        if (empty($_POST['email']) || empty($_POST['pass'])) {
            echo "Please enter both email and password.";
        } else {
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $userRepository = new UserRepository($connection);
            $user = $userRepository->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['loginTime'] = date("H:i:s");
                header("Location: wensite.php");
                exit();
            } else {
                echo "Incorrect Email or Password!";
            } elseif (isset($_POST['signupbtn'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    $userRepository = new UserRepository($connection);
    $numUsers = $userRepository->countUsers();
    
    if ($numUsers == 0) {
        $role = 'admin';
    } else {
        $role = 'user';
    }
    $user = new User($name, $surname, $username, $email, $password, $confirmpassword, $role);
    $userRepository->insertUser($user);

    header("Location: ContactUs.php");
    exit();
            }}}}
?>




userrepo 
function insertUser($user, $role){
        $conn = $this->connection;
    
        $name = $user->getName();
        $surname = $user->getSurname();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $confirmpassword = $user->getConfirmPassword();
    
        $sql = "INSERT INTO User (name, surname, username, email, password, confirmpassword, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$name, $surname, $username, $email, $password, $confirmpassword, $role]);
        echo "<script> alert('User has been inserted successfully!'); </script>";
    }


    // contactus
    <?php
session_start();

include_once 'User.php';
include_once 'UserRepository.php';
include_once 'databaseConnection.php';

$databaseConnection = new databaseConnection();
$connection = $databaseConnection->startConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginbtn'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo "Please enter both email and password.";
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userRepository = new UserRepository($connection);
            $user = $userRepository->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['login_time'] = time();
                $_SESSION['expire_time'] = $_SESSION['login_time'] + 7200;
                header("Location: wensite.php");
                exit();
            } else {
                echo "Incorrect Email or Password!";
            }
        }
    } elseif (isset($_POST['signupbtn'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        $userRepository = new UserRepository($connection);
        $numUsers = $userRepository->countUsers();

        if ($numUsers == 0) {
            $role = 'admin';
        } else {
            $role = 'user';
        }
        $user = new User($name, $surname, $username, $email, $password, $confirmpassword, $role);
        $userRepository->insertUser($user, $role);

        header("Location: ContactUs.php");
        exit();
    }
}
if (isset($_SESSION['expire_time']) && time() > $_SESSION['expire_time']) {
    session_unset();
    session_destroy();

    header("Location: ContactUs.php");
    exit();
}
?>