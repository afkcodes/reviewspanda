$('.nav-toggle').click(function(e) {

    e.preventDefault();
    $("html").toggleClass("openNav");
    $(".nav-toggle").toggleClass("active");

});


var p = $('#fos p');
var divh = $('#fos').height();
while ($(p).outerHeight() > divh) {
    $(p).text(function(index, text) {
        return text.replace(/\W*\s(\S)*$/, '......');
    });
}

;
(function($) {
    $window = $(window);

    $('*[data-type="parallax"]').each(function() {

        var $bgobj = $(this);

        $(window).scroll(function() {

            var yPos = -($window.scrollTop() / $bgobj.data('speed'));
            var coords = '50% ' + yPos + 'px';

            $bgobj.css({
                backgroundPosition: coords
            });

        });
    });
})(jQuery);