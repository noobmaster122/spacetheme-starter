import * as $ from "jquery";
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import axios from 'axios';
import { truncWord } from "../utils";

export const initDestinationSlider = () => {
    const AjaxAction = "spacetheme_ajax_prefix_load_destinations";
    const { spacetheme_AjaxUrl, spacetheme_ajax_nonce } = siteConfig;
    const swiperConfig = {
      //init:false,
      lazy: true,
      slidesPerView: 3,
      spaceBetween: 30,
      // pagination: {
      //   el: ".swiper-pagination",
      //   clickable: true,
      // },
      //Responsive breakpoints
      breakpoints: {
        // when window width is >= 320px
        0: {
          slidesPerView: 1,
          //spaceBetween: 10
        },
        600: {
          slidesPerView: 2,
          spaceBetween: 10
        },
        800: {
          slidesPerView: 2,
          spaceBetween: 60
        },
        // when window width is >= 640px
        900: {
          slidesPerView: 3,
          spaceBetween: 30
        },
        // when window width is >= 640px
        1200: {
          slidesPerView: 3,
          spaceBetween: 30
        }
      },
    }
    //only query the slider data once
    if( $('.spacethemeDestinationSlider').length !== 0 ) return;

    axios.get(`${spacetheme_AjaxUrl}?action=${AjaxAction}&security=${spacetheme_ajax_nonce}`)
    .then(res => {
      $('section#wd-onepager-theme-destinations-section > .row:nth-child(2)').empty().append(res.data.data);
      //init destinations swiper
      new Swiper(".spacethemeDestinationSlider", swiperConfig);
      //truncate desc
      $('.spacethemeDestinationSlider .swiper-slide p').each(function(){
        const trunatedTxt = truncWord($(this).text(), 100);
        $(this).text(trunatedTxt);
      });
    })
    .catch(e => {
      console.log('am error log', e);
    });
};

