<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>
<div id="comments" class="comments-area spacetheme__comments-template-container">
    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                /* translators: %s: post title */
                printf( _x( '1 réponse à &ldquo;%s&rdquo;', 'comments title', SPACETHEME_TEXTDOMAIN ), get_the_title() );
            } else {
                printf(
                    /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s répense à &ldquo;%2$s&rdquo;',
                        '%1$s répenses à &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        SPACETHEME_TEXTDOMAIN
                    ),
                    number_format_i18n( $comments_number ),
                    get_the_title()
                );
            }
            ?>
        </h2>
        <ul class="comment-list">
            <?php
                wp_list_comments( array(
                    'avatar_size' => 50,
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'reply_text'  => __( 'Reply', SPACETHEME_TEXTDOMAIN ),
                ) );
            ?>
        </ul>
        <?php the_comments_pagination( array(
            'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', SPACETHEME_TEXTDOMAIN ) . '</span>',
            'next_text' => '<span class="screen-reader-text">' . __( 'Next', SPACETHEME_TEXTDOMAIN ) . '</span>',
        ) );
    endif; // Check for have_comments().
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', SPACETHEME_TEXTDOMAIN ); ?></p>
    <?php
    endif;
    comment_form();
    ?>
</div><!-- #comments -->