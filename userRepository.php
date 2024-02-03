<?php 
include_once '../databaseConnection.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }


    function insertUser($user){

        $conn = $this->connection;

        $id = $user->getId();
        $name = $user->getName();
        $surname = $user->getSurname();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $confirmpassword = $user->$confirmpassword;

        $sql = "INSERT INTO user (id,name,surname,username,password,confirmpassword) VALUES (?,?,?,?,?,?,?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$name,$surname,$username,$email,$password,$confirmpassword]);
        echo "<script> alert('User has been inserted successfuly!'); </script>";

    }
    function getAllUsers(){
        $conn = $this->connection;
        $sql = "SELECT * FROM user";
        $statement = $conn->query($sql);
        $users = $statement->fetchAll();
        return $users;
    }
    function getUserById($id){
        $conn = $this->connection;
        $sql = "SELECT * FROM user WHERE id='$id'";
        $statement = $conn->query($sql);
        $user = $statement->fetch();
        return $user;
    }
}
?>