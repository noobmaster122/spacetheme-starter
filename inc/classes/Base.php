<?php

namespace Spacetheme\classes;

use \Spacetheme\traits\SingletonTrait;

use \Spacetheme\post_types\CustomPostTypes;
use \Spacetheme\ajax\IntroSwiperAjax; 
use \Spacetheme\ajax\HistorySectionSlider; 
use \Spacetheme\ajax\DestinationSliderAjax; 
use \Spacetheme\ajax\ActivitieSectionAjax; 
use \Spacetheme\ajax\ReviewSlider;
use \Spacetheme\ajax\TripSlider; 

use \Spacetheme\classes\Assets;
use \Spacetheme\classes\Setup;
use \Spacetheme\helpers\DebugHelpers;
use \Spacetheme\widgets\Base as WidgetsBase;



class Base{

    use SingletonTrait;

    public function __construct() {
        //put classes in filter action
        // so user can remove specific sections

        //loading theme assets
        Assets::get_instance();
        // theme setup
        Setup::get_instance();
        //load custom post types
        CustomPostTypes::get_instance();
        /**
         *
         * Load custom widgets
         */
        new WidgetsBase();
        /**
         * Load Ajax Classes
         *
         */
        apply_filters( "spacetheme_sections", array(
            IntroSwiperAjax::get_instance(),
            HistorySectionSlider::get_instance(),
            DestinationSliderAjax::get_instance(),
            ActivitieSectionAjax::get_instance(),
            ReviewSlider::get_instance(),
            TripSlider::get_instance(),
        ) );
    }
}

?>