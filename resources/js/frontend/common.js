$(function () {

    var wind = $(window);

    wow = new WOW({
        boxClass: 'wow', animateClass: 'animated', offset: 200, mobile: false, live: false
    });
    wow.init();

    // ---------- background change -----------
    var pageSection = $(".bg-img");
    pageSection.each(function (indx) {

        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });


    // ---------- to top -----------

    wind.on("scroll", function () {

        var bodyScroll = wind.scrollTop(), toTop = $("#to_top")

        if (bodyScroll > 700) {

            toTop.addClass("show");

        } else {

            toTop.removeClass("show");
        }
    });

    $('#to_top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 0);
        return false;
    });

    // -------- counter --------
    $('.counter').countUp({
        delay: 10, time: 2000
    });


    /* ==  float_box_container button  == */
    $(".float_box_container").mousemove(function (e) {
        var parentOffset = $(this).offset();
        var relX = e.pageX - parentOffset.left;
        var relY = e.pageY - parentOffset.top;
        $(".float_box").css({"left": relX, "top": relY});
        $(".float_box").addClass("show");
    });
    $(".float_box_container").mouseleave(function (e) {
        $(".float_box").removeClass("show");
    });

    // -------- fav-btn --------
    $(".fav-btn").on("click", function () {
        $(this).toggleClass("active");
    })

    // -------- cls --------
    $(".cls").on("click", function () {
        $(this).parent().fadeOut();
    })

    // ------------ working in desktop -----------
    if ($(window).width() > 991) {
        $('.parallaxie').parallaxie({});
    }

    // ---------- tooltip -----------
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    // ---------- to top -----------
    wind.on("scroll", function () {

        var bodyScroll = wind.scrollTop(), toTop = $(".to_top")

        if (bodyScroll > 700) {

            toTop.addClass("show");

        } else {

            toTop.removeClass("show");
        }
    });

});
//
// // ------------ Preloader -----------
// $(function () {
//     const svg = document.getElementById("svg");
//     const tl = gsap.timeline();
//     const curve = "M0 502S175 272 500 272s500 230 500 230V0H0Z";
//     const flat = "M0 2S175 1 500 1s500 1 500 1V0H0Z";
//
//     tl.to(".loader-wrap-heading .load-text , .loader-wrap-heading .cont , .loader-wrap-heading .logo", {
//         delay: 1.5, y: -100, opacity: 0,
//     });
//     tl.to(svg, {
//         duration: 0.5, attr: {d: curve}, ease: "power2.easeIn",
//     }).to(svg, {
//         duration: 0.5, attr: {d: flat}, ease: "power2.easeOut",
//     });
//     tl.to(".loader-wrap", {
//         y: -1500,
//     });
//     tl.to(".loader-wrap", {
//         zIndex: -1, display: "none",
//     });
//     tl.from("header , .header", {
//         y: 200,
//     }, "-=1.5");
//     tl.from("header .container , .header .container", {
//         y: 40, opacity: 0, delay: 0.3,
//     }, "-=1.5");
// });


// $(window).on("load", function () {
//     var body = $('body');
//     body.addClass('loaded');
//     setTimeout(function () {
//         body.removeClass('loaded');
//     }, 1500);
//
// });

$( function() {

    // ----------- side menu -----------
    $(".side_menu_btn").on("click", function () {
        $(this).toggleClass("active");
        $(".side_menu4_overlay").toggleClass("show");
        $(".side_menu4_overlay2").toggleClass("show");
        $(".side_menu_style4").toggleClass("show");
    });

    $(".side_menu_style4 .clss").on("click", function () {
        $(".side_menu4_overlay").toggleClass("show");
        $(".side_menu4_overlay2").toggleClass("show");
        $(".side_menu_style4").toggleClass("show");
    });


    // ---------- search box -----------
    $(".navbar .search_btn").on("click" , function(){
        $(".nav-search-box").toggleClass("show");
    })


});

// ------------ tc-latest-posts-style1 -----------
var swiper = new Swiper('.tc-latest-posts-style1 .posts-slider', {
    slidesPerView: 2,
    spaceBetween: 100,
    speed: 1000,
    pagination: false,
    navigation: {
        nextEl: '.tc-latest-posts-style1 .swiper-button-next',
        prevEl: '.tc-latest-posts-style1 .swiper-button-prev',
    },
    mousewheel: false,
    keyboard: true,
    autoplay: {
        delay: 5000,
    },
    loop: true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        480: {
            slidesPerView: 2,
        },
        787: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 2,
        },
        1200: {
            slidesPerView: 2,
        }
    }
});


// ------------ tc-latest-posts-style1 -----------
var swiper = new Swiper('.post-pg-style1 .related-posts .related-slider', {
    slidesPerView: 2,
    spaceBetween: 30,
    speed: 1000,
    pagination: false,
    navigation: {
        nextEl: '.related-posts .swiper-button-next',
        prevEl: '.related-posts .swiper-button-prev',
    },
    mousewheel: false,
    keyboard: true,
    autoplay: {
        delay: 5000,
    },
    loop: true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        480: {
            slidesPerView: 2,
        },
        787: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 2,
        },
        1200: {
            slidesPerView: 2,
        }
    }
});

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

$(document).ready(function () {
    // Create a GSAP timeline
    let tl = gsap.timeline({ paused: true });

    // Animate each p tag within the .style_introduction div
    $(".style_introduction p").each(function (index, element) {
        tl.fromTo(
            element,
            { opacity: 0, y: 20 },
            { opacity: 1, y: 0, duration: 4, delay: index * 0.5 }
        );
    });

    // Start the timeline
    tl.play();

    // Hide the preloader after the page has loaded
    $(window).on("load", function () {
        gsap.to(".style_introduction", { opacity: 0, duration: 1, onComplete: function() {
                $(".style_introduction").hide();
            }});
    });
});
