document.addEventListener("DOMContentLoaded", function () {
  const add_task = document.querySelector("#add-task");
  const form_container = document.querySelector("#form-task-container");

  add_task.addEventListener("click", function () {
    form_container.classList.toggle("expanded");
    add_task.innerHTML = form_container.classList.contains("expanded")
      ? '<i class="fas fa-times"></i>'
      : '<i class="fas fa-plus"></i>';
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
      swal
        .fire({
          title: "Add Task!",
          text: "Task added successfully!",
          icon: "success",
          confirmButtonText: "Go Back",
        })
        .then((value) => {
          setInterval("location.reload()", 3000);
        });
    },
  });
});

$(document).on("click", ".edit-btn", function (e) {
  e.stopPropagation();
  var elem = $(this);
  var row = elem.closest("tr");
  var taskId = row.data("task-id");
  var title = row.find("td:nth-child(2)").text().trim();
  var priority = row.find("td:nth-child(3)").text().trim();
  var deadline = row.find("td:nth-child(4)").text().trim();
  var description = row
    .next(".description-row")
    .find(".task-description")
    .text()
    .trim()
    .replace("Description:", "")
    .trim();
  console.log(title, description, priority, deadline);
  const priorityOptions = `
    <option value="Low" ${priority === "Low" ? "selected" : ""}>Low</option>
    <option value="High" ${priority === "High" ? "selected" : ""}>High</option>
    <option value="Trivial" ${
      priority === "Trivial" ? "selected" : ""
    }>Trivial</option>
  `;

  Swal.fire({
    title: "Update Task",
    html: `
    <form id="edit-task-form">
        <input type="hidden" name="task_id" value="${taskId}">
        <div class="swal2-input-group">
            <input type="text" id="edit-title" class="swal2-input" 
                name="title" value="${title}" placeholder="Task Title" required>
        </div>
        <div class="swal2-input-group">
            <textarea id="edit-description" class="swal2-textarea" 
                name="description" placeholder="Task Description">${description}</textarea>
        </div>
        <div class="swal2-input-group">
            <label for="task--priority">Task Priority</label>
            <select id="task--priority" name="priority" class="swal2-input" required>
                ${priorityOptions}
            </select>
        </div>
        <div class="swal2-input-group">
            <input type="date" id="edit-deadline" class="swal2-input"
                name="deadline" value="${deadline}" placeholder="Task Deadline" required>
        </div>
    </form>`,
    showCancelButton: true,
    confirmButtonText: "Update Task",
    cancelButtonText: "Cancel",
    focusConfirm: false,
    preConfirm: () => {
      const form = document.getElementById("edit-task-form");
      const formData = new FormData(form);
      formData.append("taskId", taskId);

      return $.ajax({
        type: "POST",
        url: "update.php",
        data: new URLSearchParams(formData).toString(),
        dataType: "json",
      }).then((response) => {
        return response;
      });
    },
  }).then((result) => {
    if (result.isConfirmed) {
      const response = result.value;
      if (response.title !== title)
        row.find(".task-title").text(response.title);
      if (response.description !== description)
        row.find(".task-description").text(response.description);
      if (response.priority !== priority)
        row.find(".task-priority").text(response.priority);
      if (response.deadline !== deadline)
        row.find(".task-deadline").text(response.deadline);
      Swal.fire("Task Updated", "Update Successfully!", "success");
      setInterval("location.reload()", 3000);
    }
  });
});

$(document).on("click", ".delete-btn", function (e) {
  e.stopPropagation();
  var elem = $(this);
  var del_id = elem.closest("tr").data("task-id");
  var info = "id=" + del_id;
  swal
    .fire({
      title: "Deleting Task?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    })
    .then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "get",
          url: "delete.php",
          data: info,
          success: function () {
            elem.closest("tr").next(".description-row").remove();
            elem.closest("tr").remove();
            swal.fire("Deleted", "Your task has been deleted.", "success");
          },
        });
      }
    });
});

$(document).on("click", ".task-row", function () {
  $(this).next(".description-row").toggle();
});

$("#taskSearch").on("input", function () {
  const searchTerm = $(this).val().toLowerCase();

  $.ajax({
    url: "search.php",
    type: "GET",
    data: { search: searchTerm },
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        renderTasks(response.tasks);
      }
    },
  });
});

function renderTasks(tasksToRender) {
  const tbody = $("tbody");
  tbody.empty();

  tasksToRender.forEach((task) => {
    const row = `
      <tr class="task-row" data-task-id="${task.taskId}">
        <td>${task.taskId}</td>x
        <td>${task.taskTitle}</td>
        <td>${task.taskPriority}</td>
        <td>${task.taskDeadline}</td>
        <td>
          <button class="action-btn edit-btn"><i class="fas fa-marker"></i></button>
          <button class="action-btn delete-btn"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
      <tr class="description-row" style="display: none;">
        <td colspan="5">
          <div class="task-description">
            Description: ${task.taskDescription}
          </div>
        </td>
      </tr>
    `;
    tbody.append(row);
  });
}
