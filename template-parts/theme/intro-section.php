<?php

use \Spacetheme\helpers\PostTypesRetriever;

(function(){
    ?>
    <section id="wd-onepager-theme-intro-section" class="__spacetheme-intro-section container-fluid" style="height: 80vh;">
        <div class="row justify-content-center position-relative h-100" style="">
                <img src="<?php echo PostTypesRetriever::get_intro_bg(); ?>" height="100%"
                                width="100%" alt="" class="position-absolute" style="object-fit:cover;" />
                <div class="d-none d-md-flex col-md-6  justify-content-start align-items-end __spacetheme-intro-left-block">
                    <button type="button" class="btn btn-primary ml-7 mb-5 text-secondary px-2 py-3 " style="border-radius: 50px;font-weight: 600;">DEMANDE UN DEVIS</button>
                </div>
                <div class=" __spacetheme-intro-right-block col-12 col-md-6 py-2 px-1 px-md-3 px-lg-5 d-flex flex-column justify-content-between align-items-center" style="background: rgba(0, 0, 0, 0.3);backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);
                ">
                    <!-- -->
                    <div class="d-flex flex-column" style="width: 100%;">
                        <h2 class="text-primary mb-0" style="font-weight: 700;
        font-size: 50px;align-self:start;"><?php _e("Découvrez avec nous,", SPACETHEME_TEXTDOMAIN); ?></h2>
                        <img src="<?php echo PostTypesRetriever::get_section_logo(); ?>" height="auto"
                                width="250px" alt="" style="object-fit:cover;border-radius: 50%;margin: auto;" />      
                    </div>                  
                    <!-- -->
                    <div class="d-flex flex-column w-100">
                        <!-- skeleton divs -->
                        <div class="mt-5  p-0 rounded spacetheme__skeleton" style="height:10%;width:60%;" >
                            <div style="width: 100%; height: 100%; background-color: #eee" ></div>
                        </div>
                        <div class="mt-2 p-0 rounded spacetheme__skeleton" style="height:8%;width:100%;" >
                            <div style="width: 100%; height: 100%; background-color: #eee" ></div>
                        </div>
                        <div class=" mt-2  p-0 rounded spacetheme__skeleton" style="height:5%;width:80%;" >
                            <div style="width: 100%; height: 100%; background-color: #eee" ></div>
                        </div>
                        <div class=" mt-2  p-0 rounded spacetheme__skeleton" style="height:7%;width:70%;" >
                            <div style="width: 100%; height: 100%; background-color: #eee" ></div>
                        </div>
                        <!-- skeleton divs -->
                    </div>
                    <!-- -->
                </div>
        </div>
    </section>
    <?php
})();
?>