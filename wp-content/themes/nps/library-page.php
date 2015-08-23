<?php
/*
Template Name: Biblioteka strona główna
*/
?>

<?php get_header('library'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/library-page.js"></script>

<div class="row library-top">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="<?php echo get_page_link( get_theme_mod('rac_page', '0') )?>">
            <span class="col-xs-12 agency">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Raciborowice', 'nps' ); ?></span>
            </span>
        </a>
    </div>
    <div class="col-md-6 hidden-xs hidden-sm">
        <a href="http://80.55.179.139/cgi-bin/libraopac.dll">
            <span class="col-xs-12 catalogue">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Online library catalogue', 'nps' ); ?></span>
            </span>
        </a>
        <a href="http://libra.ibuk.pl">
            <span class="col-xs-12 ibuk"><span class="icon"></span></span>
        </a>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="<?php echo get_page_link( get_theme_mod('wie_page', '0') )?>">
            <span class="col-xs-12 agency second">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Więcławice', 'nps' ); ?></span>
            </span>
        </a>
    </div>
    <div class="col-xs-12 hidden-md hidden-lg">
        <a href="http://80.55.179.139/cgi-bin/libraopac.dll">
            <span class="col-xs-12 catalogue">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Online library catalogue', 'nps' ); ?></span>
            </span>
        </a>
        <a href="http://www.ibuk.pl/">
            <span class="col-xs-6 ibuk"><span class="icon"></span></span>
        </a>
    </div>
</div>
<hr class="separator"/>
<a href="<?php echo get_category_link( get_theme_mod('library_category', '0') ); ?>" class="section-heading">
    <h3 class="home-head"><?php _e( 'News', 'nps' ); ?><span class="pull-right"><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span></h3>
</a>
<div class="row block-posts block-library">
    <?php get_category_posts('library_category', __( 'No posts about library.', 'nps' ) ) ?>
</div>
<hr class="separator"/>
<a href="<?php echo get_category_link( get_theme_mod('library_books_category', '0') ); ?>" class="section-heading">
    <h3 class="home-head"><?php _e( 'New books', 'nps' ); ?><span class="pull-right"><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span></h3>
</a>
<div class="row block-posts block-library-books">
    <?php get_category_posts('library_books_category', __( 'No posts about new books.', 'nps' ), 6) ?>
</div>
<hr class="separator"/>

<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'custom-single' ); ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer('library'); ?>