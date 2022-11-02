import * as $ from "jquery";
import axios from 'axios';
import {AJAX_ENDPOINT_PREFIX} from "./config";

export const initActivitiesBlock = () => {
    const AjaxAction = `${AJAX_ENDPOINT_PREFIX}_load_activities`;
    const { spacetheme_AjaxUrl, spacetheme_ajax_nonce } = siteConfig;

    //only query the slider data once
    if( $('.wd-onepager-theme-activity-block').length !== 0 ) return;

    axios.get(`${spacetheme_AjaxUrl}?action=${AjaxAction}&security=${spacetheme_ajax_nonce}`)
    .then(res => {
     $('section#wd-onepager-theme-activities-section .row:last-child').empty().append(res.data.data);
    })
    .catch(e => {
      console.log('Ajax request failed : ', AjaxAction);
    });
};

