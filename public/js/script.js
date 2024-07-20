$(document).ready(function(){
  let newTaskForm = $("#new");
  let accountNav = $('#accountNav');
  newTaskForm.hide();
  accountNav.hide();

  $("#addTask").click(function(){
    newTaskForm.show();
  });

  $('#Account').click(function(){
    accountNav.show();
  });
 
  console.log("js is working");
});

