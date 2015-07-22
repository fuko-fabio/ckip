<?php
/*
Template Name: Main Home Page
*/
?>

<?php get_header('home'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/home-page.js"></script>

<h3 class="home-head"><?php _e( 'Events', 'nps' ); ?></h3>
<div class="row block-events">
<?php 
    $args = array(
      'post_status'=>'publish',
      'post_type'=>array(TribeEvents::POSTTYPE),
      'posts_per_page'=>4,
      //order by startdate from newest to oldest
      'meta_key'=>'_EventStartDate',
      'orderby'=>'_EventStartDate',
      'order'=>'DESC',
      //required in 3.x
      'eventDisplay'=>'custom',
    );
    $get_posts = new WP_Query();
    $get_posts->query($args);
    if($get_posts->have_posts()) : while($get_posts->have_posts()) : $get_posts->the_post(); ?>
    
        <div class="col-sm-6 col-xs-12 post">
            <div class="content">
                <p class="title ellipsis"><?php the_title(); ?>
                    <span class="date">
                        <?php if (tribe_get_start_date() !== tribe_get_end_date() ) { ?>
                            <?php echo tribe_get_start_date(); ?> - <?php echo tribe_get_end_date(); ?>
                        <?php } else { ?>
                            <?php echo tribe_get_start_date(); ?>
                        <?php } ?>
                    </span>
                </p>
                <?php echo tribe_event_featured_image() ?>
                
                <span class="preview touch-show"><?php the_excerpt(); ?></span>
                <a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="btn btn-default touch-show"><?php _e( 'See more', 'nps' ); ?></a>
            </div>
      </div>
    <?php
      endwhile;
      endif;
      wp_reset_query();
    ?>
</div>

<hr class="separator"/>

<h3 class="home-head posts-main-btn posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="block-posts-categories">
    <div class="col-sm-6 col-xs-12">
        <div class="row block block-ckip-btn">
            <span class="block-title"><?php _e( 'Culture center', 'nps' ); ?></span>
        </div>
        <div class="row block block-library-btn">
            <span class="block-title"><?php _e( 'Library', 'nps' ); ?></span>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12">
        <div class="row block block-cinema-btn">
            <span class="block-title"><?php _e( 'Cinema', 'nps' ); ?></span>
        </div>
        <div class="row block block-marathon-btn">
            <span class="block-title"><?php _e( 'Marathon', 'nps' ); ?></span>
        </div>
    </div>
</div>

<h3 class="home-head posts-main-btn posts-title-ckip" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="fa fa-chevron-right"></span> <?php _e( 'Culture center', 'nps' ); ?></h3>
<div class="row block-posts block-ckip" style="display: none;"></div>

<h3 class="home-head posts-main-btn posts-title-library" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="fa fa-chevron-right"></span> <?php _e( 'Library', 'nps' ); ?></h3>
<div class="row block-posts block-library" style="display: none;"></div>

<h3 class="home-head posts-main-btn posts-title-cinema" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="fa fa-chevron-right"></span> <?php _e( 'Cinema', 'nps' ); ?></h3>
<div class="row block-posts block-cinema" style="display: none;"></div>

<h3 class="home-head posts-main-btn posts-title-marathon" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="fa fa-chevron-right"></span> <?php _e( 'Marathon', 'nps' ); ?></h3>
<div class="row block-posts block-marathon" style="display: none;"></div>

<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'custom-single' ); ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>