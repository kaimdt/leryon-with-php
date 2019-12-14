(function ($) {

  "use strict";

  var $navbar = $(".nav"),
  y_pos = $navbar.offset().top,
  height = $navbar.height();

  //scroll top 0 sticky
  $(document).scroll(function () {
    var scrollTop = $(this).scrollTop();
    if (scrollTop > 0) {
      $navbar.addClass("sticky");
    }
  });

  //section sticky
  /*$(document).scroll(function() {
      var scrollTop = $(this).scrollTop();
      if ($(window).height() > scrollTop) {
        $navbar.removeClass("sticky");
      } else {
        $navbar.addClass("sticky");
      }
  });*/

})(jQuery, undefined);

$(".menu").click(function () {
  $("#nav").toggleClass("open");
});

const $ledropdown = $('leuserdropdown');
const $ledropdownbutton = $('.ledropdownbutton');
$(document).mouseup(e => {
 if (!$ledropdown.is(e.target) // if the target of the click isn't the container...
 && $ledropdown.has(e.target).length === 0) // ... nor a descendant of the container
 {
     $('#pdBox').hide();
     $('#pdBox').attr('data-pdtog','0');

     $('#localeBase').hide();
     $('#localeBase').attr('data-langtog','0');

     $('#lnavsettings').hide();
     $('#lnavsettings').attr('data-pdtog','0');

     $('#lnavlocal').show();
}
});

function leuserdropdown_darkmode() {
  // Get the checkbox
  var checkBox = document.getElementById("darkmode");
  // Get the output text
  var text = document.getElementById("text");

// If the checkbox is checked, display the output text
if (checkBox.checked == true){
  text.style.display = "block";
  localStorage.setItem(darkmode, "mode");
} else {
  text.style.display = "none";
  localStorage.setItem(darkmode, "mode");

}
}
function leuserdropdown() {
  var element = document.getElementById("pdBox");
  if($('#pdBox').attr('data-pdtog') == '0'){
    $('#pdBox').show();
    $('#pdBox').attr('data-pdtog','1');
  }else{
    $('#pdBox').hide();
    $('#pdBox').attr('data-pdtog','0');

    $('#localeBase').hide();
    $('#localeBase').attr('data-langtog','0');

    $('#lnavsettings').hide();
    $('#lnavsettings').attr('data-pdtog','0');

    $('#lnavlocal').show();
  }
}
function leuserdropdown_settings() {
  var element = document.getElementById("pdBox");
  if($('#lnavsettings').attr('data-pdtog') == '0'){
    $('#lnavsettings').show();
    $('#lnavlocal').hide();
    $('#lnavsettings').attr('data-pdtog','1');
  }else{
    $('#lnavsettings').hide();
    $('#lnavlocal').show();
    $('#lnavsettings').attr('data-pdtog','0');
  }
}
function leuserdropdown_language() {
  var element = document.getElementById("pdBox");
  if($('#localeBase').attr('data-langtog') == '0'){
    $('#localeBase').show();
    $('#lnavsettings').hide();
    $('#lnavlocal').hide();
    $('#localeBase').attr('data-langtog','1');
  }else{
    $('#localeBase').hide();
    $('#lnavsettings').show();

    $('#localeBase').attr('data-langtog','0');
  }
}
