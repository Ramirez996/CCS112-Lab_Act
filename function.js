$(document).on("submit", "#form-group", function(e) {
    e.preventDefault();
    $.ajax({
        type:"post",
        url:"process.php",
        data:$(this).serialize(),
        dataType:"text",
        success:function(response){
            console.log(response);
        alert(response);
        }
    })
});