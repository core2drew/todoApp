<?php
  require("../classes/Todo.php");
  $data = file_get_contents("php://input");
  $dataJsonDecode = json_decode($data);
  $todoId = $dataJsonDecode->todoId;

  if(isset($todoId)) {
    $todo = new Todo();
    $result = $todo->removeTodo($todoId);
    echo $result;
  }