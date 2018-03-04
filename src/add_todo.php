<?php
  require("../classes/Todo.php");
  $data = file_get_contents("php://input");
  $dataJsonDecode = json_decode($data);
  $title = $dataJsonDecode->title;
  $description = $dataJsonDecode->description;
  
  if(isset($title) && isset($description)) {
    $todo = new Todo();
    $result = $todo->addTodo($title, $description);
    echo $result;
  }
  return false;