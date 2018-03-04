<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css"/>
  <title>Todo App</title>
</head>
<body ng-app="TodoApp">
  <div ng-controller="TodoController" ng-init="init()" class="container">
    <div id="TodoForm">
      <h1 class="title">Todo App</h1>
      <input class="field" placeholder="What needs to be done?" type="text" ng-model="title"/>
      <textarea class="field" placeholder="Description"  ng-model="description" resize="false" rows="4">
      </textarea>
      <button id="SaveTodo" class="button" ng-if="isEditing" ng-click="handleSaveTodo()">Save</button>
      <button id="CancelSave" class="button" ng-if="isEditing" ng-click="handleCancelSave()">Cancel</button>
      <button id="AddTodo" class="button" ng-if="!isEditing" ng-click="handleAddTodo(title, description)">Add</button>
    </div>
    <div id="TodoList" ng-if="!isEditing">
      <dl ng-repeat="todo in todoList" class="todo">
          <dt class="title">
            {{todo.title}} 
            <span class="options">
              <i ng-click="handleEditTodo(todo.id, todo.title, todo.description)" class="fas fa-pencil-alt fa-sm button"></i>
              <i ng-click="handleRemoveTodo(todo.id)" class="fas fa-times button"></i>
            <span>
          </dt>
          <dd class="description">{{todo.description}}</dd>
      </dl>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="js/todoApp.js"></script>
  <script src="js/controllers/todoController.js"></script>
</body>
</html>