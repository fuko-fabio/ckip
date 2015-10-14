<?php
/*
Template Name: Strona główna
*/
?>

<?php get_header('home'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/home-page.js"></script>

<a href="<?php echo get_home_url().'/events'; ?>" class="section-heading">
    <h3 class="home-head"><?php _e( 'Events', 'nps' ); ?><span class="pull-right"><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span></h3>
</a>
<div class="row block-events">
<?php 
    $args = array(
      'post_status'=>'publish',
      'post_type'=>array(Tribe__Events__Main::POSTTYPE),
      'posts_per_page'=>4,
      //order by startdate from newest to oldest
      'meta_key'=>'_EventStartDate',
      'orderby'=>'_EventStartDate',
      'order'=>'DESC',
      //required in 3.x
      'eventDisplay'=>'all',
    );
    $get_posts = new WP_Query();
    $get_posts->query($args);
    if($get_posts->have_posts()) : while($get_posts->have_posts()) : $get_posts->the_post(); ?>
        <div class="col-sm-6 col-xs-12 post">
            <div class="content">
                <div class="title">
                    <div class="ellipsis"><?php the_title(); ?></div>
                    <div><?php echo tribe_get_start_date(); ?></div>
                </div>
                <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thumbnail', array('class' => 'fill-box')) ?>
                <span class="preview touch-show"><?php the_excerpt(); ?></span>
                <a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="btn btn-default touch-show"><?php _e( 'See more', 'nps' ); ?></a>
            </div>
      </div>
    <?php
      endwhile;
      else : ?>
        <div class="col-xs-12">
            <div class="alert alert-info"><?php _e( 'No events.', 'nps' ); ?></div>
        </div> <?php
      endif;
      wp_reset_query();
    ?>
</div>
<hr class="separator"/>

<h3 class="home-head posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="block-posts-categories">
    <div class="row">
        <div class="col-sm-6">
            <div class="block block-ckip-btn">
                <span class="block-title"><?php _e( 'Culture center', 'nps' ); ?></span>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="block block-library-btn">
                <span class="block-title"><?php _e( 'Library', 'nps' ); ?></span>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="block block-cinema-btn">
                <span class="block-title"><?php _e( 'Cinema', 'nps' ); ?></span>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="block block-marathon-btn">
                <span class="block-title"><?php _e( 'Marathon', 'nps' ); ?></span>
            </div>
        </div>
    </div>
</div>

<h3 class="home-head posts-cat-title posts-title-ckip" style="display: none;"><?php _e( 'Culture center', 'nps' ); ?>
    <a class="pull-right" href="<?php echo get_category_link( get_theme_mod('ck_category', '0') ); ?>">
        <span><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span>
    </a>
    <span class="pull-right posts-main-btn"><i class="fa fa-chevron-left"></i> <?php _e( 'Back', 'nps' ); ?></span>
</h3>
<div class="row block-posts block-ckip" style="display: none;">
    <?php get_category_posts('ck_category', __( 'No posts about culture center.', 'nps' ) ) ?>
</div>

<h3 class="home-head posts-cat-title posts-title-library" style="display: none;"><?php _e( 'Library', 'nps' ); ?>
    <a class="pull-right" href="<?php echo get_category_link( get_theme_mod('library_category', '0') ); ?>">
        <span><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span>
    </a>
    <span class="pull-right posts-main-btn"><i class="fa fa-chevron-left"></i> <?php _e( 'Back', 'nps' ); ?></span>
</h3>
<div class="row block-posts block-library" style="display: none;">
    <?php get_category_posts('library_category', __( 'No posts about library.', 'nps' ) ) ?>
</div>

<h3 class="home-head posts-cat-title posts-title-cinema" style="display: none;"><?php _e( 'Cinema', 'nps' ); ?>
    <a class="pull-right" href="<?php echo get_category_link( get_theme_mod('cinema_category', '0') ); ?>">
        <span><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span>
    </a>
    <span class="pull-right posts-main-btn"><i class="fa fa-chevron-left"></i> <?php _e( 'Back', 'nps' ); ?></span>
</h3>
<div class="row block-posts block-cinema" style="display: none;">
    <?php get_category_posts('cinema_category', __( 'No posts about cinema.', 'nps' ) ) ?>
</div>

<h3 class="home-head posts-cat-title posts-title-marathon" style="display: none;"><?php _e( 'Marathon', 'nps' ); ?>
    <a class="pull-right" href="<?php echo get_category_link( get_theme_mod('marathon_category', '0') ); ?>">
        <span><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span>
    </a>
    <span class="pull-right posts-main-btn"><i class="fa fa-chevron-left"></i> <?php _e( 'Back', 'nps' ); ?></span>
</h3>
<div class="row block-posts block-marathon" style="display: none;">
    <?php get_category_posts('marathon_category', __( 'No posts about marathon.', 'nps' ) ) ?>
</div>

<hr class="separator"/>

<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'custom-single' ); ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>