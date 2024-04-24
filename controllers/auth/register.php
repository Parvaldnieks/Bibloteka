<?php

guest();

require "Validator.php";
require "Database.php";
$config = require("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database($config);
    $errors = [];

    if(!Validator::email($_POST["email"])) {
        $errors["email"] = "Wrong e-mail format!";
    }

    if(!Validator::password($_POST["password"])) {
        $errors["password"] = "The password is not completed correctly!";
    }

    $query = "SELECT * FROM users WHERE email = :email";
    $params = [
        ":email" => $_POST["email"]];
    $result = $db->execute($query, $params)->fetch();

// Parbaudis vai datubaze ir epasts
    if($result) {
        $errors["email"] = "An account with this e-mail already exists!";
    }

    if(empty($errors)) {
        $query = "INSERT INTO users (email, password)
        VALUES (:email, :password);";
            $params = [
                ":email" => $_POST["email"],
                ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
            ];
        $result = $db->execute($query, $params);

        $_SESSION["flash"] = "You are succesfully registered!";
        header("Location: /login");
        die();
    }
}

// Ielikt DB

$title = "Create a book";
require "views/auth/register.view.php";