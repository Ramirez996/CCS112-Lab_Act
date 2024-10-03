//fix later got some important errands
$(document).on("submit", "#form-group", function(e) {
    e.preventDefault();
    $.ajax({
        type:"post",
        url:"process.php",
        data:$(this).serialize(),
        dataType:"text",
        success:function(response){
            console.log(response);
            $("#form-group")[0].reset();
        alert(response);
        }
    })

});

$(document).ready(function() {
    function dynamicTable() {
        $.ajax({
            url: "fetch_task.php",
            type: "GET",
            success: function (data) {  
                $('tbody').html(data);
            }
        });
    }
})