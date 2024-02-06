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

        $sql = "INSERT INTO user (id, name, surname, username, email, password, confirmpassword, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$id, $name, $surname, $username, $email, $password, $confirmpassword, $role]);
         echo "<script> alert('User has been inserted successfully!'); </script>";

    }
    function updateUser($id, $name, $surname, $username, $email, $password, $confirmpassword, $role){
        $conn = $this->connection;

        $sql = "UPDATE user SET name=?, surname=?, username=?, email=?, password=?, confirmpassword=?, role=? WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$name, $surname, $username, $email, $password, $confirmpassword, $role, $id]);

        if ($statement->rowCount() > 0) {
            echo "<script> alert('User has been updated successfully!'); </script>";
        } else {
            echo "<script> alert('Failed to update user!'); </script>";
        }
    }
    function getAllUsers(){
        $conn = $this->connection;
        $sql = "SELECT * FROM user";
        $statement = $conn->query($sql);
        $user = $statement->fetchAll();
        return $users;
    }
    function getUserById($id){
        $conn = $this->connection;
        $sql = "SELECT * FROM user WHERE id='$id'";
        $statement = $conn->query($sql);
        $user = $statement->fetch();
        return $user;
    }
    $userRepository = new UserRepository();
    $user = new User();
    $user->setId(4); 
    $user->setName('Sara');
    $user->setSurname('Gashi');
    $user->setUsername('sarag1');
    $user->setEmail('sg@ubt-uni.net'); 
    $user->setPassword('sara123'); 
    $user->setConfirmPassword('sara123');
    $user->setRole('user');

    $userRepository->insertUser($user);
}
?>

?>