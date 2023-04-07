$(document).ready(function () {

    $(".cancel_inventory_btn").click(function (e) { 
        e.preventDefault();
        let item_id = $(this).closest(".item_card").data("item-id");
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