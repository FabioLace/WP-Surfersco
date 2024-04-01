import domReady from '@roots/sage/client/dom-ready';
import $ from 'jquery';
import 'bootstrap';
import '@mdi/font/css/materialdesignicons.css'
//import '@fortawesome/fontawesome-free';

/**
 * Application entrypoint
 */
domReady(async () => {

    let header = $('header');

    function handleScroll() {
        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();
        const documentHeight = $(document).height();
        const scrollPercentage = (scrollTop / (documentHeight - windowHeight)) * 100;
        if (scrollPercentage > 1 && !header.hasClass('scrolled')) {
            header.addClass('scrolled');
        } else if(scrollPercentage === 0  && header.hasClass('scrolled')){
            header.removeClass('scrolled');
        }
    }
    handleScroll();
    $(window).on('scroll',handleScroll);

    $('i[id^="star-"]').on('mouseenter', function(){
        assignStarClasses($(this));
    });

    $('i[id^="star-"]').on('mouseleave',function(){
        $(this).nextAll('i[id^="star-"]').removeClass('mdi-star').addClass('mdi-star-outline');
    });

    $('i[id^="star-"]').on('click', function(){
        assignStarClasses($(this));
        $(this).prevAll('i[id^="star-"]').off('mouseleave');
    });

    function assignStarClasses(star) {
        var starId = star.attr('id').split('-')[1];
        for (var i = 1; i <= starId; i++) {
            $('#star-' + i).removeClass('mdi-star-outline').addClass('mdi-star');
        }
    }

    /* let hasVisited = document.cookie.includes('cookieName=Visited');

    if(!hasVisited) {
        console.log("UNDEFINED");
        $('#cookie-modal').modal('show');
        $("#cookie-modal .btn-primary").on('click', function(){
            console.log("Setting cookie")
            let expireDate = new Date();
            expireDate.setDate(expireDate.getDate() + 1);
            document.cookie = "cookieName=Visited; expires=" + expireDate +"; path=/";
        });
    } else {
        console.log("DEFINED");
    } */
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
