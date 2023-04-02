$(document).ready(function () {
    const form = document.querySelector("form");
    form.onsubmit = (e) =>{
        e.preventDefault();
    }

    $("#reset").click(function () {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "reset_pass_process.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    if (xhr.response == "success") {
                        location.href = "login.php";
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