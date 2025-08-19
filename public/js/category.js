var lastScroll = 0;

jQuery(document).ready(function ($) {
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > 5) {
      $(".navbar-top").addClass("sticky");
    } else if (scrollY < 20) {
      $(".navbar-top").removeClass("sticky");
    }
    lastScroll = scroll;
  });
});

$(".menu-toggler").on("click", function () {
  $(this).toggleClass("active");
  $(".navbar-menu").toggleClass("active");
});

$(".click").on("click", function () {
  $(".menu-toggler").removeClass("active");
  $(".navbar-menu").removeClass("active");
});

$(".navbar-menu a").on("click", function () {
  $(".menu-toggler").removeClass("active");
  $(".navbar-menu").removeClass("active");
});

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}