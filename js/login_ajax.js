$(document).ready(function () {

    $("#login").click(function (e) {
        e.preventDefault();
        $.ajax({
        type: "POST",
        url: "login_process.php",
        data: $("form").serialize(),
        dataType: "html",
        success: function (response) {
            if (response == "success") {
                $("#message").empty();
                $("#message").append(`
                    <div class="alert alert-success alert-dismissible fade show w-100 " role="alert">
                        ログインが成功した。<a href="market.php">コレクション</a>
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