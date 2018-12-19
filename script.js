$('.nav-toggle').click(function(e) {
  
  e.preventDefault();
  $("html").toggleClass("openNav");
  $(".nav-toggle").toggleClass("active");

});


var p=$('#fos p');
var divh=$('#fos').height();
while ($(p).outerHeight()>divh) {
    $(p).text(function (index, text) {
        return text.replace(/\W*\s(\S)*$/, '......');
    });
}