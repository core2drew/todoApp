<?php
  require("Db.php");

  class Todo {
    private $db;

    function __construct(){
      $this->db = new Db();
    }

    public function getTodos (){
      $result = $this->db->select("SELECT * FROM todos");
      return $result;
    }

    public function addTodo ($title, $description){
      $title = $this->db->quote($title);
      $description = $this->db->quote($description);
      $result = $this->db->query("INSERT INTO todos (title, description) VALUES ($title, $description)");
      return $result;
    }

    public function removeTodo ($todo_id){
      $todo_id = $this->db->quote($todo_id);
      $result = $this->db->query("DELETE FROM todos WHERE id = $todo_id");
      return $result;
    }

    public function updateTodo ($todo_id, $title, $description){
      $todo_id = $this->db->quote($todo_id);
      $title = $this->db->quote($title);
      $description = $this->db->quote($description);
      $result = $this->db->query("UPDATE todos SET title = $title, description = $description WHERE id = $todo_id");
      return $result;
    }
  }
?>