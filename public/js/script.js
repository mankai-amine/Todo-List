$(document).ready(function(){
  //hiding all the popups when page is loaded 
  let newTaskForm = $("#new");
  let accountNav = $('#accountNav');
  newTaskForm.hide();
  accountNav.hide();

  $('[id^="form"]').each(function(){
    $(this).hide();
    $(this).click(function(){
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(), // Serialize form data
        success: function() {
          console.log('Success');
        },
        error: function() {
          console.error('Error');
        }
      });
      console.log("updated");
    });
  });
  
  $(`[id^='statusToggle']`).each(function(){
    $(this).click(function(){
      $.ajax({
        type: 'POST',
        url: "",
        data: {
          "task_id":"{{@task['task_id']}}",
          "title":"{{@task['title']}}",
          "description":"{{@task['description']}}",
          "due_date":"{{@task['due_date']}}",
          "priority":"{{@task['priority']}}",
          "status":"Completed"
        }, // manually send data to server
        success: function() {
          console.log('Success');
        },
        error: function() {
          console.error('Error');
        }
      });
      console.log("updated");
    });
  });


  //selecting the 3dots(id starting with) adding pop-up functionality to the form with the same id at the end
  $('[id^="tripleButton"]').each(function(){
    $(this).click(function(){
      //getting the integer out of the id
      let elementId = $(this).attr('id');
      let int = elementId.slice("tripleButton".length);
      //selecting the form with the same id
      let formId = "form".concat("",int);
      let taskId = "task".concat("",int);

      $(`#${formId}`).show();
      $(`#${taskId}`).hide();

    });
  });  

  

  //select the newtask button, assign to it functionality
  $("#addTask").click(function(){
    newTaskForm.show();
  });

  //select the account nav button, assigning the pop-up functionality
  $('#Account').click(function(){
    accountNav.show();
  });

  // redirect to the signup page
  $("#signupButton").click(function() {
    window.location.href = "/Todo-List/signup";
  });

  // change the account credentials
  $(".changeButton").click(function(event) {
    event.preventDefault();
    $(this).siblings("input").removeAttr("disabled").focus();
  });


  console.log("js is working");
});
