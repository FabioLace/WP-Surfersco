import domReady from '@roots/sage/client/dom-ready';
import $ from 'jquery';
import 'bootstrap';
import '@mdi/font/css/materialdesignicons.css'
import '@fortawesome/fontawesome-free';
//import Cookies from 'js-cookie';
import Swiper from 'swiper';
import 'jssocials';

/**
 * Application entrypoint
 */
domReady(async () => {
    let hasVisited = document.cookie.includes('cookieName=Visited'); //let hasVisited = Cookies.get('Visited');
    
    if(!hasVisited) { // if(hasVisited == undefined)
        console.log("UNDEFINED");
        $('#cookie-modal').modal('show');
        $("#cookie-modal .btn-primary").on('click', function(){
            console.log("Setting cookie")
            let expireDate = new Date();
            expireDate.setDate(expireDate.getDate() + 1);
            document.cookie = "cookieName=Visited; expires=" + expireDate +"; path=/"; //Cookies.set("cookieName", "visited");
        });
    } else {
        console.log("DEFINED");
    }

    $("header .socials").jsSocials({ //FIX
        shares: ['facebook', 'email'],
        showLabel: false,
        showCount: false,
    })
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
