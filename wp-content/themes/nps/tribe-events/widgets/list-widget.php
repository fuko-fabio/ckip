<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();
$posts = tribe_get_list_widget_events();

if ( $posts ) : ?>
    <div class="row">
    <?php foreach ( $posts as $post ) :
        setup_postdata( $post ); ?>
        <div class="col-xs-12 col-sm-6 col-md-12 events-widget-post">
            <div class="content" onclick="goTo('<?php echo tribe_get_event_link(); ?>')">
                <div class="title">
                    <div class="ellipsis"><?php the_title(); ?></div>
                </div>
                <div class="duration">
                    <?php echo tribe_events_event_schedule_details(); ?>
                </div>
                <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thumbnail', array('class' => 'fill-box')) ?>
            </div>
        </div>
    <?php endforeach ;?>
    </div>

    <p class="events-widget-link">
        <a href="<?php echo esc_url( tribe_get_events_link() ); ?>" rel="bookmark"><?php printf( __( 'View All %s', 'the-events-calendar' ), $events_label_plural ); ?> <i class="fa fa-chevron-right"></i></a>
    </p>
    <hr class="separator">

<?php
// No events were found.
else : ?>
	<p><?php printf( __( 'There are no upcoming %s at this time.', 'the-events-calendar' ), strtolower( $events_label_plural ) ); ?></p>
<?php
endif;
