$(document).ready(function() {
  // Scroll to target
  $('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if (target.length) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 800);
    }
  });

  // Order button click event
  $('button.order-btn').on('click', function() {
    $('#myModal').css('display', 'block');
    $('body').css('overflow', 'hidden');
  });

  // Modal close button click event
  $('.modal-close').on('click', function() {
    closeModal();
  });

  // Confirm order button click event
  $('#confirmOrder').on('click', function() {
    alert('Order placed successfully!');
    closeModal();
  });

  // Escape key press event
  $(document).on('keydown', function(event) {
    if (event.key === 'Escape') {
      closeModal();
    }
  });

  // Click outside modal event
  $(document).mouseup(function(e) {
    var modal = $(".modal-content");
    if (!modal.is(e.target) && modal.has(e.target).length === 0) {
      closeModal();
    }
  });

  // Minus button click event
  $('.minus-btn').on('click', function() {
    var quantityInput = $(this).siblings('.qty-input');
    var currentQty = parseInt(quantityInput.val());
    if (currentQty > 1) {
      quantityInput.val(currentQty - 1);
      updateTotalPrice();
    }
  });

  // Plus button click event
  $('.plus-btn').on('click', function() {
    var quantityInput = $(this).siblings('.qty-input');
    var currentQty = parseInt(quantityInput.val());
    quantityInput.val(currentQty + 1);
    updateTotalPrice();
  });

  // Function to close modal
  function closeModal() {
    $('#myModal').css('display', 'none');
    $('body').css('overflow', 'auto');
  }

  // Function to update total price
  function updateTotalPrice() {
    var price = parseFloat($('.price').text());
    var quantity = parseInt($('.qty-input').val());
    var totalPrice = price * quantity;
    $('#totalPrice').text(totalPrice.toFixed(2));
  }

  // Scrolling - Main Course
  var isLoadingMainCourse = false;
  var isLoadingDessert = false;
  var threshold = 200;
  var contentIdMainCourse = "#main-course-blog";
  var contentIdDessert = "#dessert-blog";

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() > $(document).height() - threshold) {
      if (!isLoadingMainCourse && $(contentIdMainCourse).length > 0) {
        isLoadingMainCourse = true;
        $(contentIdMainCourse).append('<div id="loadingSpinnerMainCourse" class="spinner"></div>');
        loadContent('maincourse', contentIdMainCourse, '#loadingSpinnerMainCourse', isLoadingMainCourse);
      }

      if (!isLoadingDessert && $(contentIdDessert).length > 0) {
        isLoadingDessert = true;
        $(contentIdDessert).append('<div id="loadingSpinnerDessert" class="spinner"></div>');
        loadContent('dessert', contentIdDessert, '#loadingSpinnerDessert', isLoadingDessert);
      }
    }
  });

  // Function to load content
  function loadContent(category, contentId, spinnerId, isLoading) {
    $.ajax({
      url: 'load_content.php',
      type: 'GET',
      data: { category: category },
      success: function(response) {
        $(spinnerId).remove();
        $(contentId).append(response);
        isLoading = false;
      },
      error: function() {
        console.log('Error loading content - ' + category.charAt(0).toUpperCase() + category.slice(1) + '.');
        isLoading = false;
      }
    });
  }
});
