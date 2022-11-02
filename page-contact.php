<?php get_header();
use \Spacetheme\helpers\PostTypesRetriever;
?>
<?php
    (function(){

        ?>
            <section id="contact-page-container" <?php post_class('container-fluid spacetheme__contact-page-template-container '); ?>  >
                <div class="row " style="min-height: 100vh;">
                    <main class="col-12 col-lg-5 d-flex justify-content-center align-items-center flex-column " >
                        <div class="text-center my-5 ">
                            <a href="<?php echo home_url(); ?>" class="rounded-circle p-3 bg-light" style="font-size:20px;color:olive;"><i class="fa-solid fa-house text-secondary"></i></a>
                        </div>
                        <h1 class="mb-5"><?php _e('Contact', SPACETHEME_TEXTDOMAIN); ?></h1>
                        <?php echo do_shortcode( '[contact-form-7 id="77" title="Contact form 1"]'); ?>
                    </main>
                    <aside class=" d-none d-lg-block col-12 col-lg-7 position-relative " aria-label="contact page thumbnail" style="overflow:hidden;">
                        <img src="<?php echo PostTypesRetriever::get_intro_bg(); ?>" height="100%" width="100%" alt=""
                        style="transform:scale(1.5);position:absolute;z-index:-1;object-fit:cover;transition:transform 1s ease-in-out;" />
                    <aside>
                </div>
            </section>
        <?php
    })();
?>
<?php get_footer(); ?>