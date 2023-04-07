$(document).ready(function () {

    $("#reset").click(function (e) {
        e.preventDefault();
        $.ajax({
        type: "POST",
        url: "reset_pass_process.php",
        data: $("form").serialize(),
        dataType: "html",
        success: function (response) {
            if (response == "success") {
                $("#message").append(`
                    <div class="alert alert-success alert-dismissible fade show w-100 " role="alert">
                        パスワードが再発行された。メールをご確認ください。
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
            }else{
                $("#message").empty();
                $("#message").append(response);
            }
                
                
        },
        });
    });
});