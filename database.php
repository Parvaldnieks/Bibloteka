<?php

class Database {

    private $pdo;

    public function __construct($config) {

      $connection_string = "mysql:" . http_build_query($config, "", ";");
      $this->pdo = new PDO($connection_string);
      $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

public function execute($que_string, $params) {
$que = $this->pdo->prepare($que_string);
$que->execute($params);
return $que;
    }
}

?>