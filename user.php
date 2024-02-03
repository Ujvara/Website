<?php
class User {
    private $id;
    private $name;
    private $surname;
    private $username;
    private $email;
    private $password;
    private $confirmpassword;

    function __construct($id, $name, $surname, $username, $email, $password, $confirmpassword) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmpassword = $confirmpassword;
    }

    function getId() {
        return $this->id;
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
}
?>