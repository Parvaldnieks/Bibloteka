<?php
require "Validator.php";
require "Database.php";
$config = require("config.php");
$db = new Database($config);

$query = "SELECT * FROM books WHERE id = :id";

$params = [":id" => $_GET["id"]];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if(!Validator::string($_POST["name"], min: 1, max: 30)) {
        $errors["name"] = "Name cannot be empty or longer then 30 symbols!";
    }
    if(!Validator::string($_POST["author"], min: 1, max: 50)) {
                $errors["author"] = "Author cannot be empty or longer then 50 symbols!";
    }
    if (!Validator::nameValidator($_POST["availability"], 'yes') && !Validator::nameValidator($_POST["availability"], 'no')) {
        $errors["availability"] = "Availability can not be anything else besides (yes) or (no)!";
    }
    if(empty($errors)) {
            $query ="UPDATE books
                     SET name = :name, author = :author, released = :released, availability = :availability
                     WHERE id = :id;";
            $params = [
                ":name" => $_POST["name"],
                ":author" => $_POST["author"],
                ":released" => $_POST["released"],
                ":availability" => $_POST["availability"],
                ":id" => $_GET["id"]
                ];
                $db->execute($query, $params);
                header("Location: /");
                die();
    }
}

$post = $db->execute($query, $params)
           ->fetch();

$title = "Edit a book";
require "views/edit.view.php";