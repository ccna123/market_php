$(document).ready(function () {
    
    $("#tt").tooltip({
        hide:true,
        disable:true
    });

    $(".add_inventory_btn").click(function (e) { 
        e.preventDefault();
        let item_id = $(this).data("item-id");
        let item_name = $(this).val();
        console.log(item_name);
        $.ajax({
            type: "post",
            url: "add_process.php",
            data: {
                item_id: item_id
            },
            dataType: "html",
            success: function (mess) {
                $("#mess_section").append(mess);
                setTimeout(() => {
                    $("#mess_section").empty();
                }, 3000);
               
            },
            error: function (xhr, status, error) {  
                console.log("Error: " + error);
            }
        });
    });
});