<?php

function dd($books) {
    echo "<pre>";
    var_dump($books);
    echo "</pre>";
    die();
  }

  function auth() {
    if(!isset($_SESSION["user"])) {
      header("Location: /login");
    die();
    }
  }

  function guest() {
    if(isset($_SESSION["user"])) {
      header("Location: /");
    die();
    }
  }

?>