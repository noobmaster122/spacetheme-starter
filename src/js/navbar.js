import * as $ from 'jquery';

$(function(){
    const fadeOutAnimationClasses = "animate__animated animate__fadeOutLeft";
    const fadeInAnimationClasses = "animate__animated animate__fadeInLeft";
    const fadeDownAnimationClasses = "animate__animated animate__fadeInDown";
    const scrolledDistanceTrigger = 100;//this should get the height of the image element
    // mobile nav bar close/open
    $('#mobile-nav-toggler').on('click', function () {
        // d-none gets removed after the first open drawer trigger
        // d-none hids drawer on first page load
        $('.mobile-nav').removeClass(`${fadeOutAnimationClasses} d-none`).addClass(fadeInAnimationClasses);// show drawer navigation
    });
    $('#close-mobile-nav').on('click', function () {
        $('.mobile-nav').removeClass(fadeInAnimationClasses).addClass(`${fadeOutAnimationClasses}`);
    });
    //update languages menu icon
    $('#main-menu-languages-dropdown a').on('click', function(){
        //clicked link icon link
        const linkIconUrl = $(this).children('object').attr('data');
        //clicked link icon filename
        const iconFileName = linkIconUrl?.split('/').at(-1);
        //menu button icon link
        const btnIconLink = $('#main-menu-languages-dropdown button object').attr('data');
        const newArr = btnIconLink?.split('/');
        newArr?.pop();
        //replace menu icon filename
        newArr?.push(iconFileName);
        //update menu button icon
        jQuery('#main-menu-languages-dropdown button object').attr('data', newArr.join('/'));
  
    });
});