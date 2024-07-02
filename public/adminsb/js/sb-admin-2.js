(function($) {
  "use strict"; // Start of use strict

  console.log("Script started");

  var isDarkMode = false;

  function setDarkMode(isDark) {
    console.log("setDarkMode called with:", isDark);
    isDarkMode = isDark;
    if (isDark) {
      $('body').addClass('dark-mode');
      $('#darkModeToggle i').removeClass('fa-moon').addClass('fa-sun');
    } else {
      $('body').removeClass('dark-mode');
      $('#darkModeToggle i').removeClass('fa-sun').addClass('fa-moon');
    }
    if (typeof(Storage) !== "undefined") {
      localStorage.setItem('darkMode', isDark);
    }
  }

  function checkDarkMode() {
    console.log("checkDarkMode called");
    if (typeof(Storage) !== "undefined") {
      var storedMode = localStorage.getItem('darkMode');
      console.log("isDark from localStorage:", storedMode);
      isDarkMode = storedMode === 'true';
    } else {
      console.log("localStorage is not supported");
    }
    setDarkMode(isDarkMode);
  }

  // Immediately invoke checkDarkMode
  checkDarkMode();

  $(document).ready(function() {
    console.log("Document ready");
    // Recheck dark mode on document ready
    checkDarkMode();

    $('#darkModeToggle').on('click', function(e) {
      console.log("Dark mode toggle clicked");
      e.preventDefault();
      setDarkMode(!isDarkMode);
    });

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
      $("body").toggleClass("sidebar-toggled");
      $(".sidebar").toggleClass("toggled");
      if ($(".sidebar").hasClass("toggled")) {
        $('.sidebar .collapse').collapse('hide');
      };
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function() {
      if ($(window).width() < 768) {
        $('.sidebar .collapse').collapse('hide');
      };
      
      // Toggle the side navigation when window is resized below 480px
      if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
        $("body").addClass("sidebar-toggled");
        $(".sidebar").addClass("toggled");
        $('.sidebar .collapse').collapse('hide');
      };
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
      if ($(window).width() > 768) {
        var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail;
        this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        e.preventDefault();
      }
    });

    // Scroll to top button appear
    $(document).on('scroll', function() {
      var scrollDistance = $(this).scrollTop();
      if (scrollDistance > 100) {
        $('.scroll-to-top').fadeIn();
      } else {
        $('.scroll-to-top').fadeOut();
      }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function(e) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: ($($anchor.attr('href')).offset().top)
      }, 1000, 'easeInOutExpo');
      e.preventDefault();
    });
  });

  $(window).on('load', function() {
    console.log("Window loaded");
    checkDarkMode();
  });

})(jQuery); // End of use strict