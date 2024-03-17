jQuery(document).on("ready", function () {
  function openMenu() {
    if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
      document.addEventListener("touchmove", preventScroll, { passive: false });
    }
  }
  function closeMenu() {
    if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
      document.removeEventListener("touchmove", preventScroll);
    }
  }

  function toggleMobileMenu() {
    jQuery(".menu-toggle").on("click", function () {
      jQuery(".header-menu").toggleClass("show");
      jQuery(".menu-toggle").toggleClass("show");
      jQuery("body").toggleClass("lock");
      if (jQuery("body").hasClass("lock") === true) {
        openMenu();
      } else {
        closeMenu();
      }
    });

    jQuery(".header-menu li a").on("click", function () {
      if (jQuery(window).width() < 1024) {
        jQuery(".header-menu").removeClass("show");
        jQuery(".menu-toggle").removeClass("show");
        jQuery("body").removeClass("lock");
        closeMenu();
      }
    });

    jQuery(".header-menu li.menu-item-has-children").on("click", function () {
      if (jQuery(window).width() < 1024) {
        jQuery(this).toggleClass("open");
        jQuery(this).find(".sub-menu").slideToggle();
      }
    });
  }

  function headerOnScroll() {
    const adminBar = jQuery("#wpadminbar");
    const adminBarHeight = adminBar.length > 0 ? adminBar.outerHeight() : 0;
    const headerHeight = jQuery(".site-header").outerHeight();
    let oldScrollY = jQuery(window).scrollTop();

    if (jQuery(".site-header").offset().top > headerHeight + adminBarHeight) {
      jQuery(".site-header").addClass("header-scroll");
    } else {
      jQuery(".site-header").removeClass("header-scroll");
    }

    jQuery(window).on("scroll", function () {
      if (oldScrollY < jQuery(window).scrollTop()) {
        jQuery(".site-header").removeClass("header-scroll-top");
      } else {
        jQuery(".site-header").addClass("header-scroll-top");
      }
      oldScrollY = jQuery(window).scrollTop();

      if (jQuery(window).scrollTop() > headerHeight + adminBarHeight) {
        jQuery(".site-header").addClass("header-scroll");
      } else {
        jQuery(".site-header").removeClass("header-scroll");
        jQuery(".site-header").removeClass("header-scroll-top");
      }
    });
  }

  function heroAnimation() {
    // Add event listener
    document.addEventListener("mousemove", parallax);
    const elem = document.querySelector(".hero");
    
    function parallax(e) {
      let _w = window.innerWidth / 2;
      let _mouseX = e.clientX;
      let _depth1 = `${50 + (_mouseX - _w) * 0.03}% 100%`;
      let _depth2 = `${30 + (_mouseX - _w) * 0.02}% 100%`;
      let _depth3 = `0% 100%`;
      let x = `${_depth3}, ${_depth2}, ${_depth1}`;
      elem.style.backgroundPosition = x;
    }
  }

  // Play video custom button
  function customVideoPlayer() {
    jQuery(".Hero__bg").each(function () {
      let thisSlide = jQuery(this);

      if (thisSlide.hasClass("video") === true) {
        let iframe_api = thisSlide.find(".Hero__bg-video").data("video");
        let video_id = thisSlide.find(".Hero__bg-video").data("video-index");
        let playTypeData = 0;
        let currentDomain = window.location.host;
        let currentProtocol = window.location.protocol;

        let player;
        YouTubeIframeLoader.load(function (YT) {
          player = new YT.Player(video_id, {
            width: "100%",
            height: "100%",
            videoId: iframe_api,
            host: `${currentProtocol}//www.youtube.com`,
            playerlets: {
              autoplay: playTypeData,
              playsinline: playTypeData,
              controls: 1,
              loop: playTypeData,
              playlist: iframe_api,
              disablekb: playTypeData,
              rel: 0,
              enablejsapi: 1,
              origin: `${currentProtocol}//${currentDomain}`,
            },
            events: {
              onReady: onPlayerReady,
            },
          });
        });
      }
    });
  }

  // Testimonials slider
  // function testimonialsSlider() {
  //   if (document.querySelector('.testimonials__slider')) {
  //     const slider = new Swiper('.testimonials__slider', {
  //       spaceBetween: 10,
  //       slidesPerView: 1,
  //       centeredSlides: true,
  //       autoHeight: true,
  //       loop: true,
  //       speed: 500,

  //       breakpoints: {
  //         768: {
  //           slidesPerView: 3,
  //           autoHeight: false,
  //         },
  //       },

  //       pagination: {
  //         el: '.testimonials .swiper-pagination',
  //         type: 'progressbar',
  //       },

  //       navigation: {
  //         nextEl: '.testimonials .swiper-button-next',
  //         prevEl: '.testimonials .swiper-button-prev',
  //       },
  //     });

  //     customVideoPlayer();
  //   }
  // }

  //Steps slider
  // function stepsSlider() {
  //   if (jQuery(window).innerWidth() < 768) {
  //     jQuery('.steps__content').addClass('swiper');
  //     jQuery('.steps__list').addClass('swiper-wrapper');
  //     jQuery('.steps__item').addClass('swiper-slide');
  //   } else {
  //     jQuery('.steps__content').removeClass('swiper');
  //     jQuery('.steps__list').removeClass('swiper-wrapper');
  //     jQuery('.steps__item').removeClass('swiper-slide');
  //   }
  //   if (document.querySelector('.steps')) {
  //     const slider = new Swiper('.steps__content.swiper', {
  //       spaceBetween: 10,
  //       slidesPerView: 1,
  //       speed: 500,
  //     });
  //   }
  // }

  // functions Resize
  // function functionsResize() {
  //   jQuery(window).on('resize', function () {
  //     stepsSlider();
  //     scrollCaseBackgroundColor();
  //   });
  // }

  // stepsSlider();
  // testimonialsSlider();
  // functionsResize();
  heroAnimation();
  headerOnScroll();
  toggleMobileMenu();
});
