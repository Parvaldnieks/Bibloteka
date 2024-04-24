<?php

auth();

require "Database.php";

$config = require("config.php");

$db = new Database($config);

$query = "SELECT * FROM books";
$params = [];

$posts = $db
          ->execute($query, $params)
          ->fetchAll();

$title = "Books";
require "views/books.view.php";