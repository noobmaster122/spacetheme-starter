<?php
/* Custom search form */
(function(){
    ?>
        <form id="spacetheme__main-search-form" action="<?php echo home_url( '/' ); ?>" method="get" class="mb-0">
            <?php //input field expands on loop icon click ?>
            <div class=" d-none">
                <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" class="form-control shadow-none" 
            placeholder="<?php _e('Rechercher', SPACETHEME_TEXTDOMAIN); ?>" aria-label="<?php _e('Rechercher', SPACETHEME_TEXTDOMAIN); ?>" aria-describedby="searchBox">
            </div>
            <div id="spacetheme__main-form-loop-icon-container">
                <input type="submit" id="searchBox" hidden/>
                <span id="spacetheme__main-form-loop-icon" class="d-flex justify-content-center align-items-center py-2 pl-2 pr-0">
                    <img src="<?php echo UNSLASHED_BASE_URL_PATH . '/assets/images/loop-icon.png'; ?>" width="20px" height="20px" alt="" />
                </span>
            </div>
        </form>
    <?php
})();
?>