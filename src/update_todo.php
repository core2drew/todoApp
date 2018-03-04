<?php
  require("../classes/Todo.php");
  $data = file_get_contents("php://input");
  $dataJsonDecode = json_decode($data);
  $todoId = $dataJsonDecode->todoId;
  $title = $dataJsonDecode->title;
  $description = $dataJsonDecode->description;

  if(isset($title) && isset($description)) {
    $todo = new Todo();
    $result = $todo->updateTodo($todoId, $title, $description);
    echo $result;
  }
  return false;