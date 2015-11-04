<?php
/*
Template Name: Kino strona główna
*/
?>

<?php get_header('cinema'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/cinema-page.js"></script>

<a href="<?php echo get_home_url().'/'.Tribe__Events__Main::instance()->getOption( 'eventsSlug', 'events' ); ?>" class="section-heading">
    <h3 class="home-head"><?php _e( 'Movies', 'nps' ); ?><span class="pull-right"><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span></h3>
</a>
<div class="row block-events">
<?php 
    $args = array(
      'post_status'=>'publish',
      'post_type'=>array(Tribe__Events__Main::POSTTYPE),
      'posts_per_page'=>4,
      'eventDisplay'=>'custom',
      'order' => 'ASC',
      'meta_query' => array(
          array(
              'key' => '_EventStartDate',
              'value' => date('Y-m-d'),
              'compare' => '>=',
              'type'    => 'DATE'
          )
      ),
      'tax_query' => array(
          array(
              'taxonomy' => 'tribe_events_cat',
              'field' => 'slug',
              'terms' => get_theme_mod('cinema_event_category', 'unknown'),
              'operator' => 'IN'
          ),
      )
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
            <div class="alert alert-info"><?php _e( 'There are no tickets.', 'nps' ); ?></div>
        </div> <?php
      endif;
      wp_reset_query();
    ?>
</div>
<hr class="separator"/>

<a href="<?php echo get_category_link( get_theme_mod('cinema_category', '0') ); ?>" class="section-heading">
    <h3 class="home-head"><?php _e( 'News', 'nps' ); ?><span class="pull-right"><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span></h3>
</a>
<div class="row block-posts block-ckip">
    <?php get_category_posts('cinema_category', __( 'No posts about cinema.', 'nps' ) ) ?>
</div>
<hr class="separator"/>
<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'custom-single' ); ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>