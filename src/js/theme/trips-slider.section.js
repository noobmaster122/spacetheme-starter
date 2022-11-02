import * as $ from "jquery";
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import axios from 'axios';

export const iniTripSlwiper = () => {
    const AjaxAction = "spacetheme_ajax_prefix_load_reservations";
    const { spacetheme_AjaxUrl, spacetheme_ajax_nonce } = siteConfig;
    const swiperConfig = {
      //init:false,
      lazy: true,
      slidesPerView: 1,
      spaceBetween: 30,
      autoplay: {
        delay: 3000,
      },
    }
    //only query the slider data once
    if( $('.spacethemetripSwiper').length !== 0 ) return;

    axios.get(`${spacetheme_AjaxUrl}?action=${AjaxAction}&security=${spacetheme_ajax_nonce}`)
    .then(res => {
      $('section#wd-onepager-theme-trips-slider-section .row:first-child').empty().append(res.data.data);
      // //init destinations swiper
      new Swiper(".spacethemetripSwiper", swiperConfig);
    })
    .catch(e => {
      console.log('Ajax request failed : ', AjaxAction);
    });
};

