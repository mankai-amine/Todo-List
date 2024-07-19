





$(document).ready(function(){
  let newTaskForm = $("#new");
  newTaskForm.hide();

  $("#addTask").click(function(){
    newTaskForm.show();
  });
});

