<?php
(function(){
    ?>
<section id="wd-onepager-theme-destinations-section" class=" __spacetheme-destinations-section container-fluid my-3" style="">
    <div class="row justify-content-start">
        <div class="col-12">
            <h3 class="text-left text-center text-secondary  m-0 my-4 " style="font-weight:700;" ><?php _e('Planetes', SPACETHEME_TEXTDOMAIN); ?></h3>
        </div>
    </div>
    <div class="row justify-content-center position-relative ">
        <!-- skeleton divs -->
        <div class="d-flex flex-column justify-content-between align-items-center p-0 col-10 col-md-5 col-lg-3 mx-2 rounded spacetheme__skeleton" style="height:400px;background-color: #DCDCDC;gap: 10px;" >
                <div class="rounded" style="width: 100%; height: 50%; background-color: #eee" ></div>
                <div class="rounded" style="width: 80%; height: 5%; background-color: #eee" ></div>
                <div class="rounded mb-3" style="width: 90%; height: 30%; background-color: #eee" ></div>
        </div>
        <!-- skeleton divs -->
        <div class="d-none d-md-flex flex-column justify-content-between align-items-center p-0 col-0 col-md-5 col-lg-3 mx-2 rounded spacetheme__skeleton" style="height:400px;background-color: #DCDCDC;gap: 10px;" >
                <div class="rounded" style="width: 100%; height: 50%; background-color: #eee" ></div>
                <div class="rounded" style="width: 80%; height: 5%; background-color: #eee" ></div>
                <div class="rounded mb-3" style="width: 90%; height: 30%; background-color: #eee" ></div>
        </div>
        <!-- skeleton divs -->

        <div class="d-none d-lg-flex flex-column justify-content-between align-items-center p-0 col-0 col-md-5 col-lg-3 mx-2 rounded spacetheme__skeleton" style="height:400px;background-color: #DCDCDC;gap: 10px;" >
                <div class="rounded" style="width: 100%; height: 50%; background-color: #eee" ></div>
                <div class="rounded" style="width: 80%; height: 5%; background-color: #eee" ></div>
                <div class="rounded mb-3" style="width: 90%; height: 30%; background-color: #eee" ></div>
        </div>
    </div>
    <div class="row justify-content-start mt-3">
        <div class="col-11 col-sm-10 col-md-8 col-lg-7 col-xl-6 d-flex overflow-hidden" style="margin:auto;">
            <?php if ( is_active_sidebar( 'spacetheme-destinations-widget' ) ): ?>
		       <?php dynamic_sidebar( 'spacetheme-destinations-widget' ); ?>
	        <?php endif; ?>
        </div>
    </div>

</section>
<?php
})();
?>