// @codekit-prepend quiet '../node_modules/jquery/dist/jquery.js'
// @codekit-prepend quiet '../node_modules/swiper/swiper-bundle.js'

let scroll_listen = false;

$('.aria-button').on("click", function (e) {

    let my_status = $(this).attr("aria-pressed");
    let aria_controls = $(this).attr("aria-controls");

    // console.log(my_status);
    // console.log(aria_controls);


    if (my_status == "true") {

        $('.board').removeClass("filter");

        // DISABLE ALL BUTTONS
        $('.aria-button').each(function () {
            $(this).attr("aria-pressed", "false");
        });

        // DISABLE ALL EXPANDABLES
        $('.filter__values').each(function () {
            $(this).attr("aria-expanded", "false");
        });

        scroll_listen = false;

    } else {

        $('.board').addClass("filter");

        // DISABLE ALL BUTTONS
        $('.aria-button').each(function () {
            $(this).attr("aria-pressed", "false");
        });

        // DISABLE ALL EXPANDABLES
        $('.filter__values').each(function () {
            $(this).attr("aria-expanded", "false");
        });

        // EXPAND AND TOGGLE THIS
        $(this).attr("aria-pressed", "true");
        $('#' + aria_controls + '').attr("aria-expanded", "true");

        scroll_listen = true;

    }

});

var filters_global = {};

jQuery(function () {

    $('fieldset legend').each(function (idx) {
        let my_filter_name = $(this).attr("aria-controls");
        filters_global[my_filter_name] = {}
    });

});



$('.filter_select').on("change", function () {

    let my_filter = $(this).attr("data-filter");
    filters_global['filter_' + my_filter + ''] = {};

    $('.filter_select[data-filter="' + my_filter + '"]:checked').each(function (idx) {
        let my_value = $(this).val();
        filters_global['filter_' + my_filter + ''][idx] = '.board__list-item[data-' + my_filter + '~="' + my_value + '"]';
    });

    var count_select = $('#filter_' + my_filter + ' .filter_select:checked').length;
    if (count_select > 0) {
        $('legend[aria-controls="filter_' + my_filter + '"]').addClass("yellow");
    } else {
        $('legend[aria-controls="filter_' + my_filter + '"]').removeClass("yellow");
    }

    run_filter();

});

function run_filter() {
    console.log("run filter");
    var query = '';
    // console.log(filters_global);

    for (var [key, value] of Object.entries(filters_global)) {
        // console.log(key);
        for (var [subkey, subvalue] of Object.entries(value)) {
            // console.log(`${subkey}: ${subvalue}`);

            // AND
            query += subvalue;

            // OR
            // query += subvalue + ',';
        }
    }
    // OR
    // query = query.slice(0, -1);
    console.log(query);

    if (query.length > 0) {
        $('.board__list-item').hide();
        $(query).show();
    } else {
        console.log("query empty");
        $('.board__list-item').show();
    }

}


// CREATIVES IMAGE SLIDESHOW

var creative__details__slideshows = [];

jQuery(function () {

    if ($('.creative__details__slideshow').length > 0) {

        console.log("slideshow exists");

        $('.creative__details__slideshow .swiper').each(function (idx) {
            let my_id = $(this).attr("id");
            console.log(my_id);
            creative__details__slideshows[idx] = new Swiper('#' + my_id + '', {
                speed: 500,
                slidesPerView: 'auto',
                spaceBetween: 0,
                centeredSlides: true,
                loop: false,
                grabCursor: true,
                allowTouchMove: true,
                // mousewheel: {
                //     invert: false,
                //     forceToAxis: true,
                //     thresholdTime: 700
                // },
                navigation: {
                    nextEl: '#' + my_id + '_next',
                    prevEl: '#' + my_id + '_prev'
                }

            });


        });

    }

});


// DETAILS EXPAND

// $('details summary').on("click",function(e){
//     e.preventDefault();
//     var this_prop = $(this);
//     if ( this_prop.parent().prop("open") == false ) {
//         console.log("false");
//         $('details[open]').each(function(){
//             $(this).prop("open",false);
//         });
//         this_prop.parent().prop("open",true);
//     } else {
//         console.log("true");
//         this_prop.parent().prop("open",false);
//     }
// });


// VIDEO PRELOAD

$('figure .videobox').on("click", function () {

    if ($(this).hasClass("preload")) {
        $(this).removeClass("preload");

        if ($(this).find("video").length > 0) {
            console.log("video found");
            let my_video = $(this).find("video");
            let my_src = my_video.attr("data-src");
            my_video.attr("src", my_src);
            my_video[0].load();
            my_video[0].play();
        } else {
            console.log("no video found");
        }
    }

});


// CREATIVES IMAGE SLIDESHOW

var creative__reel_reel = [];

jQuery(function () {

    if ($('.creative__reel_reel').length > 0) {


        $('.creative__reel_reel .swiper').each(function (idx) {
            let my_id = $(this).attr("id");
            console.log(my_id);
            creative__details__slideshows[idx] = new Swiper('#' + my_id + '', {
                speed: 500,
                slidesPerView: 'auto',
                spaceBetween: 0,
                centeredSlides: true,
                loop: false,
                grabCursor: true,
                allowTouchMove: true,
                navigation: {
                    nextEl: '#' + my_id + '_next',
                    prevEl: '#' + my_id + '_prev'
                }
            });


        });

    }

});

// NEWS SWIPER

// CREATIVES IMAGE SLIDESHOW

var creative__news__swiper = [];

jQuery(function () {

    if ($('.creative__news__swiper').length > 0) {

        console.log("creative__news__swiper");

        $('.creative__news__swiper').each(function (idx) {
            let my_id = $(this).attr("id");
            console.log(my_id);

            creative__news__swiper[idx] = new Swiper('#' + my_id + '', {
                speed: 500,
                slidesPerView: 'auto',
                spaceBetween: 0,
                centeredSlides: true,
                loop: false,
                grabCursor: true,
                allowTouchMove: true,
                navigation: {
                    nextEl: '#' + my_id + '_next',
                    prevEl: '#' + my_id + '_prev'
                }
            });


        });

    }

});


// HELPER


const isMacBrowser = /Mac|iPod|iPhone|iPad/.test(navigator.platform);
var current_breakpoint;

function get_breakpoint() {
    var style_root = getComputedStyle(document.body);
    var return_breakpoint = parseInt(style_root.getPropertyValue('--current-breakpoint'));
    return return_breakpoint;
}


// SCROLL POSITION VARIABLE


// The debounce function receives our function as a parameter
const debounce_scrollpos = (fn) => {

    // This holds the requestAnimationFrame reference, so we can cancel it if we wish
    let frame;

    // The debounce function returns a new function that can receive a variable number of arguments
    return (...params) => {

        // If the frame variable has been defined, clear it now, and queue for next frame
        if (frame) {
            cancelAnimationFrame(frame);
        }

        // Queue our function call for the next frame
        frame = requestAnimationFrame(() => {

            // Call our function and pass any params we received
            fn(...params);
        });

    }
};

var header_hidden = false;
var prevScrollpos = 0;

const storeScroll_pos = () => {
    document.documentElement.dataset.scroll = window.scrollY;

    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {


    }

    if (prevScrollpos < currentScrollPos) {

        // DISABLE ALL BUTTONS
        if (scroll_listen == true) {

            $('.board').removeClass("filter");

            $('.aria-button').each(function () {
                $(this).attr("aria-pressed", "false");
            });

            // DISABLE ALL EXPANDABLES
            $('.filter__values').each(function () {
                $(this).attr("aria-expanded", "false");
            });

            scroll_listen = false;
        }

    }
    prevScrollpos = currentScrollPos;

}

// Listen for new scroll events, here we debounce our `storeScroll` function
document.addEventListener('scroll', debounce_scrollpos(storeScroll_pos), { passive: true });

// Update scroll position for first time
storeScroll_pos();

// SCROLLUP BUTTON

$('.scrollup').on("click", function start_scroll_up(e) {
    e.preventDefault();
    $("html, body").animate({
        scrollTop: (0)
    }, "800", function () {
        $("html, body").off("scroll mousedown wheel DOMMouseScroll mousewheel touchmove")
    });

});

// SCROLLDOWN BUTTON

$('.scrolldown').on("click", function start_scroll_down(e) {
    e.preventDefault();
    $("html, body").animate({
        scrollTop: ( $('section:nth-of-type(2)').offset().top - $('header').height())
    }, "800", function () {
        $("html, body").off("scroll mousedown wheel DOMMouseScroll mousewheel touchmove")
    });

});

// BURGER MENU

$('.bigmac').on("click", function toggle_nav() {
    console.log("burger");
    $('.bigmac,#mainnav').toggleClass("active");
});