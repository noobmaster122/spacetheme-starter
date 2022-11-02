import * as $ from "jquery";
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import axios from 'axios';
import { truncWord } from "../utils";
import {AJAX_ENDPOINT_PREFIX} from "./config";

/**
 * 
 * @param {vois}  
 * @return {void}
 */
export const resizeIntroSection = () => {
  if(document.querySelector("section#wd-onepager-theme-intro-section")){
    // get navbar height
    const navBarHeight = $('nav#main-navbar-container').height();
    // resize intro section
    $('section#wd-onepager-theme-intro-section').height(innerHeight - navBarHeight);
  }
}

/**
 * 
 * @param {void}  
 * @return {void}
 */
export const introSectionSwiper = () => {
  //
  resizeIntroSection();
  $(window).on('resize', function(){
    resizeIntroSection();
  });
  // move theme prefix to .env file
    const AjaxAction = `${AJAX_ENDPOINT_PREFIX}_load_intro_swiper`;
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
    if( $('.introSectionSwiper').length !== 0 ) return;

    axios.get(`${spacetheme_AjaxUrl}?action=${AjaxAction}&security=${spacetheme_ajax_nonce}`)
    .then(res => {
      $('section#wd-onepager-theme-intro-section .__spacetheme-intro-right-block > div:last-child').empty().append(res.data.data);
      //init swiper
      new Swiper(".introSectionSwiper", swiperConfig);
      //truncate desc
      $('.introSectionSwiper .swiper-slide p').each(function(){
        const trunatedTxt = truncWord($(this).text(), 200);
        $(this).text(trunatedTxt);
      });
    })
    .catch(e => {
      console.log(`Ajax request failed : ${AjaxAction}`);
    });
};

