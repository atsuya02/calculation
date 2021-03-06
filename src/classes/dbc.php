<?php

require_once('/Applications/MAMP/htdocs/calculation/src/config/env.php');

class Dbc{
  protected $tableName;

  protected function dbConnect() {
    $host = DB_HOST;
    $dbname = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;
    $dsh = "mysql:host=$host;dbname=$dbname;charset=utf8";

    try {
      $dbh = new PDO($dsh, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]);
      return $dbh;
    } catch (PDOException $e) {
      header('Content-Type: text/plain; charset=UTF-8', true, 500);
      exit($e->getMessage());
    }
  }

  public function getAll() {
    $dbh = $this->dbConnect();
    $sql = "SELECT * FROM $this->tableName ORDER BY id";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchAll();
    return $result;
  }

  public function getById($id) {
    if (empty($id)) {
      exit('IDが不正です');
    }

    $dbh = $this->dbConnect();
    $sql = "SELECT * FROM $this->tableName where id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();

    if (!$result) {
      exit("$this->tableNameのデータがありません");
    }

    return $result;
  }
}
