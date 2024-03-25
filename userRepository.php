<?php 
include_once 'databaseConnection.php';

class UserRepository{
    private $connection;

    function __construct(){
        $dbConnection = new databaseConnection();
        $this->connection = $dbConnection->startConnection();
    }
    public function insertUser($user, $role){
        $conn = $this->connection;
        
        $name = $user->getName();
        $surname = $user->getSurname();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $confirmpassword = $user->getConfirmPassword();
        
        try{
            $sql = "INSERT INTO User (name, surname, username, email, password, confirmpassword, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $statement = $conn->prepare($sql);
            $statement->execute([$name, $surname, $username, $email, $password, $confirmpassword, $role]);
            echo "<script> alert('User has been inserted successfully!'); </script>";
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    function updateUser($id, $name, $surname, $username, $email, $password, $confirmpassword){
        $conn = $this->connection;

        $sql = "UPDATE User SET name=?, surname=?, username=?, email=?, password=?, confirmpassword=? WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$name, $surname, $username, $email, $password, $confirmpassword, $id]);

        if($statement->rowCount() > 0){
            echo "<script> alert('User has been updated successfully!'); </script>";
        }else{
            echo "<script> alert('Failed to update user!'); </script>";
        }
    }

    public function deleteUser($id){
        $sql = "DELETE FROM User WHERE id=:id";
        $stm = $this->connection->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute(); 
    
        if($stm){
            echo "<script>
            alert('User has been deleted'); 
            document.location='dashb.php';
            </script>";
        }else{
            return false;
        }
    }

    public function getAllUsers(){
        try{
            $sql = "SELECT * FROM User";
            $statement = $this->connection->query($sql);
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
    function getUserById($id){
        $sql = "SELECT * FROM User WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    function getUserByEmail($email){
        try{
            $sql = "SELECT * FROM User WHERE email = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$email]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            
            return $user;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
    public function countUsers(){
        try{
            $sql = "SELECT COUNT(*) AS user_count FROM user";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['user_count'];
        }catch (PDOException $e){
    
            echo "Error: " . $e->getMessage();
            return false;
    }
}
}
?>