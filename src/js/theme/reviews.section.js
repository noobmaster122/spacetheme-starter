import * as $ from "jquery";
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import axios from 'axios';
import {truncWord} from "../utils";

export const initReviewsBlocks = () => {
    const AjaxAction = "spacetheme_ajax_prefix_load_reviews";
    const { spacetheme_AjaxUrl, spacetheme_ajax_nonce } = siteConfig;

    //only query the slider data once
    if( $('.wd-onepager-theme-review-block').length !== 0 ) return;

    axios.get(`${spacetheme_AjaxUrl}?action=${AjaxAction}&security=${spacetheme_ajax_nonce}`)
    .then(res => {
      $('section#wd-onepager-theme-reviews-section .row:last-child').empty().append(res.data.data);
      //truncate review
      $('section#wd-onepager-theme-reviews-section .row:last-child p').each(function(){
          const trunatedTxt = truncWord($(this).text(), 70);
          $(this).text(trunatedTxt);
      });
    })
    .catch(e => {
      console.log('Ajax request failed : ', AjaxAction);
    });
};

