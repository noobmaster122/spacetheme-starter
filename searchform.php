<?php
/* Custom search form */
(function(){
    ?>
        <form action="<?php echo home_url( '/' ); ?>" method="get">
            <div class="input-group ">
                <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" class="form-control shadow-none" 
                placeholder="<?php _e('Rechercher', SPACETHEME_TEXTDOMAIN); ?>" aria-label="<?php _e('Rechercher', SPACETHEME_TEXTDOMAIN); ?>" aria-describedby="searchBox">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" id="searchBox">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </form>
    <?php
})();
?>
