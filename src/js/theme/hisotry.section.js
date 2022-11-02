import * as $ from "jquery";
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import axios from 'axios';
import { truncWord } from "../utils";

export const initHistorySwiper = () => {
    const AjaxAction = "spacetheme_ajax_prefix_load_history_slides";
    const { spacetheme_AjaxUrl, spacetheme_ajax_nonce } = siteConfig;
    const swiperConfig = {
      //init:false,
      lazy: true,
      slidesPerView: 1,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      }
    }
    //only query the slider data once
    if( $('.themeHistorySection').length !== 0 ) return;

    axios.get(`${spacetheme_AjaxUrl}?action=${AjaxAction}&security=${spacetheme_ajax_nonce}`)
    .then(res => {
      $('section#wd-onepager-theme-history-section .row > div:first-child').empty().append(res.data.data);
      // //init destinations swiper
      new Swiper(".themeHistorySection", swiperConfig);
      // //truncate desc
      $('.themeHistorySection .swiper-slide h4').each(function(){
        const trunatedTxt = truncWord($(this).text(), 30);
        $(this).text(trunatedTxt);
      });
    })
    .catch(e => {
      console.log('Ajax request failed : ', AjaxAction);
    });
};

