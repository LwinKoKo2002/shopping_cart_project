$(document).ready(function (event) {
  $(".show-sidebar-btn").click(function () {
    $(".sidebar").animate({
      marginLeft: 0,
    });
  });

  $(".hide-sidebar-btn").click(function () {
    $(".sidebar").animate({
      marginLeft: "-100%",
    });
  });
});

$(".notebook-slide").slick({
  arrows: false,
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 6,
  slidesToScroll: 6,
  responsive: [
    {
      breakpoint: 1400,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 6,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
  ],
});

$(".notebook-slide-two").slick({
  arrows: false,
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1400,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false,
      },
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: false,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
      },
    },
  ],
});

let screenHeight = $(window).height();

$(window).scroll(function () {
  let currentPosition = $(this).scrollTop();
  if (currentPosition > screenHeight - 600) {
    $(".upbar").css("display", "block");
  } else {
    $(".upbar").css("display", "none");
  }
});

// $(window).on("load", function () {
//   $(".loader-container").fadeOut(500, function () {
//     $(this).remove();
//   });
// });
