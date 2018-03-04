<?php
  include_once("Db.php");
  class User {
    private $db;

    function __construct(){
      $this->db = new Db();
    }

    public function getUser($username, $password) {
      $username = $this->db->quote($username);
      $password = $this->db->quote($password);
      if(isset($username) && isset($password)) {
        $result = $this->db->select("SELECT * FROM users WHERE username = $username and password = $password");
        return $result;
      }
      else if(isset($username)) {
        $result = $this->db->select("SELECT * FROM users WHERE username = $username");
        return $result;
      }
    }

    public function addUser($username, $password) {
      $username = $this->db->quote($username);
      $password = $this->db->quote($password);
      $result = $db->query("INSERT INTO users (username, password) VALUES ($username, $password)");
      return $result;
    }

    public function removeUser($id) {
      $id = $this->db->quote($id);
      $result = $db->query("DELETE from users WHERE id = $id");
      return $result;
    }
  }
?>