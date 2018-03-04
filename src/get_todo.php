<?php
  require("../classes/Todo.php");
  
  $todo = new Todo();
  $result = $todo->getTodos();

  echo json_encode($result);