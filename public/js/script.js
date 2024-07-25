$(document).ready(function(){
  //hiding all the popups when page is loaded 
  let newTaskForm = $("#new");
  let accountNav = $('#accountNav');
  newTaskForm.hide();
  accountNav.hide();

 $('[id^="form"]').each(function(){
    $(this).hide();
  });
  
  $(`[id^='statusForm']`).each(function(){
    $(this).hide();
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

  $('[id^="toggle"]').each(function(){
    $(this).click(function(){
      let elementId = $(this).attr('id');
      let int = elementId.slice("toggle".length);
      let formId = "statusForm".concat("",int);
      let categiry = $(`#task${int}`).children('#desc');

      $(`#${formId}`).show();
      categiry.hide();
    })
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
