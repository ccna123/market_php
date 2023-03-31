$(document).ready(function () {
    const form = document.querySelector("form");
    form.onsubmit = (e) =>{
        e.preventDefault();
    }

    $("#login").click(function () {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "login_process.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    if (xhr.response == "success") {
                        location.href = "market.php";
                    }else{
                    
                        $("#text-err").empty();
                        $("#text-err").append(xhr.response);
                    }
                    
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    });
});