function star_rating(row, avg_rating){

    var stars = row.querySelectorAll(".bi-star-fill");
    starArray = Array.from(stars).reverse();

    starArray.forEach((element, index) => {
        if (index < avg_rating) {
                
            element.classList.add("filled");
        }else{
            element.classList.remove("filled");
                
        }
    });
};



$(document).ready(function () {

    
    $('input[type="radio"]').click(function (e) { 
        rating = $(this).nextAll(':visible').length;
        star_rating(this, rating);
     });

    //  $(".card").each(function(){
    //     var rating = $(this).find(".avg_rating").val();
    //     console.log(rating);
    //   });

      $("#sub-btn").click(function (e) { 
        e.preventDefault();
        let review =  $("#review_area").val();
        const item_id = $(this).data("item-id");
        
        $.ajax({
            type: "POST",
            url: "review_process.php",
            data: {
                item_id: item_id,
                rating: rating,
                review: review
            },
            dataType: "html",
            success: function (html) {
                $("#review_area").val("");
                $('input[type="radio"]').prop("checked", false);
                $(".review_part").html(html);
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
            }
        });
      });
});