$(document).ready(function (event) {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// Count For Add To Cart
  loadCartCount();
  function loadCartCount(){
    $.ajax({
      method: "GET",
      url: "/load-cart-count",
      success: function (response) {  
          $('.cart_count').html('');
          $('.cart_count').html(response.count);
      }
    });
  }

  var product_qty =$('.product_qty').val();
  // Increment Button
  $('.increment_btn').on('click',function(e){
      e.preventDefault();
      let inc_value = $(this).closest('.product_data').find('.qty_input').val();
      let  value = parseInt(inc_value,product_qty);
          value = isNaN(value) ? '0' : value;
          if(value < product_qty){
              value++;
              $(this).closest('.product_data').find('.qty_input').val(value);
          }
  })

  // Decrement Button
  $('.decrement_btn').on('click',function(e){
      e.preventDefault();
      let dec_value = $(this).closest('.product_data').find('.qty_input').val();
      let  value = parseInt(dec_value,product_qty);
          value = isNaN(value) ? '0' : value;
          if(value > 1){
              value--;
              $(this).closest('.product_data').find('.qty_input').val(value);
          }
  })

  // AddToCart Button
  $('.add_to_cart').on('click',function(e){
      e.preventDefault();
      let product_id = $(this).closest('.product_data').find('.product_id').val();
      let qty = $(this).closest('.product_data').find('.qty_input').val();
      $.ajax({
          method: "POST",
          url: "/add-to-cart",
          data: {
              'product_id':product_id,
              'qty':qty
          },
          success: function (response) {
              if(response.status === 'success'){
                  Swal.fire(response.message);
                  loadCartCount();
              }else{
                  Swal.fire(response.message);
              }
          }
      });
  })

  //Remove Btn
  $('.remove_btn').click(function(e){
    e.preventDefault();
    var product_id = $(this).closest('.product_data').find('.product_id').val();
    Swal.fire({
      title: 'Are you sure , you want to delete?',
      showCancelButton: true,
      reverseButtons : true,
      focusConfirm : false,
      focusCancel : false,
      confirmButtonText: 'Yes,sure',
      cancelButtonText : 'No,keep it'
      }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          method : "POST",
          url : '/delete-cart/'+product_id,
          success : function(response){
            if(response.status === 'success'){
              window.location.reload();
            }else{
              Swal.fire(response.message);
            }
          }
        })
      }
      })
  })

  //changeBtn
$('.changeBtn').click(function(e){
  e.preventDefault();
  var product_id = $(this).closest('.product_data').find('.product_id').val();
  var qty = $(this).closest('.product_data').find('.qty_input').val();
  $.ajax({
    method : 'POST',
    url: '/update-cart-quantity',
    data: {
      'product_id':product_id,
      'qty':qty
  },
    success : function(response){
      if(response.status === 'success'){
        window.location.reload();
      }else{
        Swal.fire(response.message);
      }
    }
  })
})

  // Sidebar Section
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

// Search Feature For Desktop Device
$(".submit_btn").click(function(e){
  e.preventDefault();
  var brand_search = $('.brand_search').val();
  $.ajax({
    url: "/brand-search",
    type: "GET",
    data: { brand_search },
    success: function (response) {
      if(response.status == 'success'){
          window.location.replace( "/brands/"+response.brand_id);
      }
    }
  });
})

//Search Feature for Mobile Device
$(".submit_btn_two").click(function(e){
  e.preventDefault();
  var search_value = $('.brand_search_two').val();
  $.ajax({
    url: "/brand-search-two",
    type: "GET",
    data: { search_value },
    success: function (response) {
      if(response.status == 'success'){
          window.location.replace( "/brands/"+response.brand_id_two);
      }
    }
  });
})

// Slider
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


// Upbar
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
