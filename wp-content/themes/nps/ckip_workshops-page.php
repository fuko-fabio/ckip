<?php
/*
Template Name: CKiP zajęcia
*/
?>

<?php get_header('ckip'); ?>

<h3 class="home-head"><?php _e( 'Workshops', 'nps' ); ?></h3>

<?php 
    $date = $_GET['date'];
    if (empty($date)) {
        $date = date('Y-m');
    }
?>
<a href="<?php echo add_query_arg(array('date' => date('Y-m', strtotime("-1 month", strtotime($date))))); ?>"><?php _e('Previous', 'nps'); ?></a>

<a href="<?php echo add_query_arg(array('date' => date('Y-m', strtotime("+1 month", strtotime($date))))); ?>"><?php _e('Next', 'nps'); ?></a>
<?php
    echo '<h2>'.date_i18n('F Y', strtotime($date)).'</h2>';
    echo workshops_calendar($date);
?>

<?php get_footer(); ?>