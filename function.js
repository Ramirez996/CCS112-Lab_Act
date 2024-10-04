document.addEventListener('DOMContentLoaded', function() {
    const add_task = document.querySelector('#add-task');
    const form_container = document.querySelector('#form-task-container');
  
    add_task.addEventListener('click', function() {
      form_container.classList.toggle('expanded');
      add_task.innerHTML = form_container.classList.contains('expanded') ? '<i class="fas fa-times"></i>' :
       '<i class="fas fa-plus"></i>';
    });
  }); 


  $(document).on("submit", "#form-group", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "create.php",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        console.log(response);
        alert(response);
      },
    });
  });    


  $(document).on("click", ".task-row", function () {
    $(this).next(".description-row").toggle();
  });