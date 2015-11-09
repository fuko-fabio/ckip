<?php
/*
Template Name: CKiP zajęcia
*/
?>

<?php get_header('ckip'); ?>
<div class="nps-workshops">
    <h3 class="home-head"><?php _e( 'Workshops', 'nps' ); ?></h3>

    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'custom-single' ); ?>
        <hr class="separator"/>
    <?php endwhile; // end of the loop. ?>

    <?php 
        $date = $_GET['date'];
        if (empty($date)) {
            $date = date('Y-m');
        }
    ?>
    <div class="nav">
        <a class="btn-prev" href="<?php echo add_query_arg(array('date' => date('Y-m', strtotime("-1 month", strtotime($date))))); ?>"><i class="fa fa-chevron-left"></i> <?php echo date_i18n('F', strtotime($date.' -1 month')); ?></a>
        <a class="btn-next" href="<?php echo add_query_arg(array('date' => date('Y-m', strtotime("+1 month", strtotime($date))))); ?>"><?php echo date_i18n('F', strtotime($date.' +1 month')); ?> <i class="fa fa-chevron-right"></i></a>
        <h2><?php echo date_i18n('F Y', strtotime($date)) ?></h2>
    </div>
    
    <?php echo workshops_calendar($date); ?>
</div>
<?php get_footer(); ?>