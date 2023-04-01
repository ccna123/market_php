$(document).ready(function () {
    
    $("#tt").tooltip({
        hide:true,
        disable:true
    });

    $(".cancel_inventory_btn").click(function (e) { 
        e.preventDefault();
        let item_id = $(this).closest(".item_card").data("item-id");
        const base_url = window.location.href.split("/").slice(0,4).join("/");
        console.log(item_id);
        $.ajax({
            type: "post",
            url: "cancel_process.php",
            data: {
                item_id: item_id
            },
            dataType: "html",
            success: function (mess) {
                
                $('.item_card[data-item-id="' + item_id + '"]').remove();
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