<?php
(function(){
    ?>
        <section id="spacetheme-subscription-section" class="  __spacetheme-subscription-section container-fluid py-5 position-relative " style="">
            <object data="<?php echo UNSLASHED_BASE_URL_PATH . '/assets/images/newsletter-bg.svg'; ?>" height="100%" width="100%" style="object-fit: cover;
    position: absolute;
    z-index: -1;
    top: 0;
    left: 0;"></object>
            <object data="<?php echo UNSLASHED_BASE_URL_PATH . '/assets/images/half-circle-down.svg'; ?>" height="auto" width="250px" style="object-fit: cover;
    position: absolute;
    z-index: -1;
    top: 0;
    right: 50px;"></object>
            <object data="<?php echo UNSLASHED_BASE_URL_PATH . '/assets/images/half-circle-up.svg'; ?>" height="auto" width="250px" style="object-fit: cover;
    position: absolute;
    z-index: -1;
    bottom: 0;
    left: 50px;"></object>
            <div class="row justify-content-center flex-column align-items-center ">
                <div class="col-11 col-sm-7 col-lg-5 col-xl-4 d-flex justify-content-center pb-3">
                    <h4 class="text-primary text-center" style="">Entrez votre adresse e-mail</h4>
                </div>
                <div class="col-11 col-sm-7 col-lg-5 col-xl-4 " style="    padding: 8px;
    border: 2px solid #AAAAAA;
    background-color: white;
    border-radius: 5px;">
                    <?php echo do_shortcode('[contact-form-7 id="78" title="Newsletter"]'); ?>
                </div>
            </div>
        </section>
<?php
})();
?>