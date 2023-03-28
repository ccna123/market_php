$(document).ready(function () {
    
    $("#tt").tooltip({
        hide:true,
        disable:true
    });

    $(".add_inventory_btn").click(function (e) { 
        e.preventDefault();
        let item_id = $(this).data("item-id");
        let item_name = $(this).val();
        const base_url = window.location.href.split("/").slice(0,4).join("/");
        console.log(item_name);
        $.ajax({
            type: "post",
            url: "add_process.php",
            data: {
                item_id: item_id
            },
            dataType: "json",
            success: function (response) {
                $("#tt").attr("title", "Add ${item_name} successfully");
                $("#tt").tooltip("dispose").tooltip("show");
                setTimeout(() => {
                    $("#tt").tooltip("disable").tooltip("hide");
                }, 2500);
            },
            error: function (xhr, status, error) {  
                console.log("Error: " + error);
            }
        });
    });
});