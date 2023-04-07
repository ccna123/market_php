$(document).ready(function () {

    $("#register").click(function (e) {
    e.preventDefault();
    $.ajax({
    type: "POST",
    url: "register_process.php",
    data: $("form").serialize(),
    dataType: "html",
    success: function (response) {
        if (response == "success") {
            $("#message").append(`
                <div class="alert alert-success alert-dismissible fade show w-100 " role="alert">
                    登録が成功した。<a href="login.php">ログイン</a>
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