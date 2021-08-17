$(document).ready(function() {

  $("#header").load("header.html");

  $("#footer").load("footer.html");

});



// -----------

$('.aiming-owl').owlCarousel({

    loop:true,

    margin:0,

    dots:true,

    nav:false,

    smartSpeed:800,

    responsive:{

        0:{

            items:1

        },

        600:{

            items:1

        },

        1000:{

            items:1

        }

    }

})

// --------------------



$("#searchli").on('click', function(){

    $(this).toggleClass('active');

});


$("#filterli").click(function (e) {
    e.stopPropagation();
    $("#filter-div").fadeToggle();
});

$(document).click(function (e) {
    if (!$(e.target).closest('#filter-div').length)
    {
        $('#filter-div').fadeOut();
    }
});


// --------------------


$("#searchli").on('click', function(){

    $(this).toggleClass('active');

});


$("#searchli").click(function (e) {
    e.stopPropagation();
    $("#search-div").fadeToggle();
});

$(document).click(function (e) {
    if (!$(e.target).closest('#search-div').length)
    {
        $('#search-div').fadeOut();
    }
});

// --------------------------------------------------
// search and filter hide show script
 $("#searchli").on('click', function(){
  $("#filter-div").hide();
  $("#search-div").show();

});


 
 $("#filterli").on('click', function(){
  $("#search-div").hide();
  $("#filter-div").show();

});

 //-----------------------------------------------
