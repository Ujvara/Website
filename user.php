<?php
class User {
    private $name;
    private $surname;
    private $username;
    private $email;
    private $password;
    private $confirmpassword;
    private $role;

    function __construct($name, $surname, $username, $email, $password, $confirmpassword, $role = 'user') {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmpassword = $confirmpassword;
        $this->role = $role;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getConfirmPassword() {
        return $this->confirmpassword;
    }
    
    function getRole() {
        return $this->role;
    }
}
?>