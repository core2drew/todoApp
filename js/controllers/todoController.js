TodoApp.controller('TodoController',function($http, $location, $scope){
  $scope.title = ""
  $scope.description = ""
  $scope.todoList = [];
  $scope.isEditing = false;

  $scope.init = function() {
    $scope.getTodos()
  }

  $scope.getTodos = function() {
    $http.get($location.absUrl() + 'src/get_todo.php')
    .then(function(response) {
      $scope.todoList = response.data
    });
  }

  $scope.handleAddTodo = function(title, description) {

    if(!title || !description) {
      return false
    }

    var data = {
      title: title,
      description: description
    }
    $http({
      method: "post",
      url: $location.absUrl() + 'src/add_todo.php',
      data: data
    })
    .then(function(response) {
      $scope.clearFields()
      $scope.getTodos()
    });
  }

  $scope.handleRemoveTodo = function(id) {
    var data = {
      todoId: id
    }
    $http({
      method: "post",
      url: $location.absUrl() + 'src/remove_todo.php',
      data: data
    })
    .then(function(response) {
      $scope.getTodos()
    });
  }

  $scope.handleEditTodo = function(id, title, description) {
    $scope.isEditing = true
    $scope.todoId = id
    $scope.title = title
    $scope.description = description
  }

  $scope.handleSaveTodo = function() {

    if(!title || !description) {
      return false
    }

    var data = {
      todoId: $scope.todoId,
      title: $scope.title,
      description: $scope.description
    }
    $http({
      method: "post",
      url: $location.absUrl() + 'src/update_todo.php',
      data: data
    })
    .then(function(response) {
      $scope.isEditing = false
      $scope.clearFields()
      $scope.getTodos()
    });
  }

  $scope.handleCancelSave = function(){
    $scope.isEditing = false;
    $scope.clearFields();
  }

  $scope.clearFields = function(){
    $scope.todoId = ''
    $scope.title = ''
    $scope.description = ''
  }
})