<?php
/**
 * The Template for displaying all single posts.
 *
 * @package nps
 */
if (have_posts()) {
    the_post();
    $hn =  null;
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        foreach( $categories as $category ) {
            $id = $category->cat_ID;
            if ($id == get_theme_mod('ck_category', '0')) {
                $hn = 'ck';
                break;
            } else if ($id == get_theme_mod('library_category', '0') || $id == get_theme_mod('library_books_category', '0')) {
                $hn = 'library';
                break;
            } else if ($id == get_theme_mod('marathon_category', '0')) {
                $hn = 'marathon';
                break;
            } else if ($id == get_theme_mod('cinema_category', '0')) {
                $hn = 'cinema';
                break;
            }
        }
    }
    get_header($hn);
} else {
    get_header(); 
}?>

<div class="row">
    <div class="col-md-9">
        <?php get_template_part( 'content', 'single' ); ?>
        
        <?php
        	// If comments are open or we have at least one comment, load up the comment template
        	if ( comments_open() || '0' != get_comments_number() )
        		comments_template();
        ?>
    </div>
    <div class="col-md-3">
        <?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
        <div class="sidebar-padder">

            <?php do_action( 'before_sidebar' ); ?>
            <?php dynamic_sidebar( 'posts-sidebar' ) ?>

        </div><!-- close .sidebar-padder -->
    </div>
</div>
<?php get_sidebar('single'); ?>
<?php get_footer(); ?>