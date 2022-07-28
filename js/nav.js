let height = $("#header").height();

$(window).scroll(function () {
    if($(window).scrollTop() > height) {
        $(".navbar").addClass('fixed-top');
    } else {
        $(".navbar").removeClass('fixed-top');
    }
});