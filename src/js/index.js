import * as $ from "jquery";
import 'waypoints/lib/noframework.waypoints';
import './navbar';
import {truncWord} from './utils';
import {initDestinationSlider} from './theme/destinations.section';//new design
import {initHistorySwiper} from './theme/hisotry.section'; //new design
import {iniTripSlwiper} from "./theme/trips-slider.section";//new design
import {introSectionSwiper, resizeIntroSection} from "./theme/intro.section";//new design
import {initActivitiesBlock} from "./theme/activities.section";//new design
import {initReviewsBlocks} from "./theme/reviews.section";//new design


const initAjaxBlockWatcher = (eleHandler, requestHandler) => {
    if(document.querySelector(eleHandler)){
        new Waypoint({
            element: document.querySelector(eleHandler),
            handler: function(direction) {
                //load slider swiper
                requestHandler();
            },
            offset: innerHeight
        });
    }
}
$(function(){
    //on  first load
    resizeIntroSection();
    //intro section swiper
    initAjaxBlockWatcher("section#wd-onepager-theme-intro-section", introSectionSwiper);
    //history section swiper
    initAjaxBlockWatcher("section#wd-onepager-theme-history-section", initHistorySwiper);
    //load destinations slider 
    initAjaxBlockWatcher("section#wd-onepager-theme-destinations-section", initDestinationSlider);
    //load activities section
    initAjaxBlockWatcher("section#wd-onepager-theme-activities-section", initActivitiesBlock);
    //load activities section
    initAjaxBlockWatcher("section#wd-onepager-theme-reviews-section", initReviewsBlocks);
    //load activities section
    initAjaxBlockWatcher("section#wd-onepager-theme-trips-slider-section", iniTripSlwiper);
});

