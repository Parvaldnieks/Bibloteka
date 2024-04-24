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

    $query = "SELECT * FROM users WHERE email = :email";
    $params = [
        ":email" => $_POST["email"],
    ];
    $user = $db->execute($query, $params)->fetch();

    if(empty($errors)) {
        $_SESSION["user"] = true;
        $_SESSION["email"] = $_POST["email"];
        header("Location: /");
        die();
    }
}

$title = "Create a book!";
require "views/auth/login.view.php";

unset($_SESSION["flash"]);