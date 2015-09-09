<?php
/*
Template Name: Biblioteka Więcławice szablon strony
*/
?>

<?php get_header('library'); ?>

    <?php while ( have_posts() ) : the_post(); ?>
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
    <?php endwhile; // end of the loop. ?>

    <div class="row library-top">
        <div class="col-xs-12">
            <a href="http://83.17.19.121:8080/cgi-bin/LibraOpac.dll">
                <span class="col-xs-12 catalogue">
                    <span class="icon"></span>
                    <span class="name"><?php _e( 'Online library catalogue', 'nps' ); ?></span>
                </span>
            </a>
        </div>
    </div>
    <br />
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'custom-single' ); ?>

        <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() )
                comments_template();
        ?>

    <?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer('library'); ?>
