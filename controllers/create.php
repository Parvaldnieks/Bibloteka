<?php
require "Validator.php";
require "Database.php";
$config = require("config.php");
$db = new Database($config);

$specificName = "yes";
$specificName = "no";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if(!Validator::string($_POST["name"], min: 1, max: 30)) {
        $errors["name"] = "Name cannot be empty or longer then 30 symbols!";
    }
    if(!Validator::string($_POST["author"], min: 1, max: 50)) {
                $errors["author"] = "Author canot be empty or longer then 50 symbols!";
    }
    if (!Validator::nameValidator($_POST["availability"], 'yes') && !Validator::nameValidator($_POST["availability"], 'no')) {
        $errors["availability"] = "Availability can not be anything else besides 'yes' or 'no'!";
    }
    if(empty($errors)) {
            $query ="INSERT INTO books (name, author, released, availability)
                     VALUES (:name, :author, :released, :availability);";
            $params = [
                ":name" => $_POST["name"],
                ":author" => $_POST["author"],
                ":released" => $_POST["released"],
                ":availability" => $_POST["availability"]
                ];
                $db->execute($query, $params);
                header("Location: /");
                die();
    }
}
$title = "Create a book";
require "views/create.view.php";