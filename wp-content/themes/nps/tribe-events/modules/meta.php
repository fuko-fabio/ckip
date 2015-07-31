<?php
/**
 * Single Event Meta Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta.php
 *
 * @package TribeEventsCalendar
 */

do_action( 'tribe_events_single_meta_before' );

// Check for skeleton mode (no outer wrappers per section)
$not_skeleton = false; #! apply_filters( 'tribe_events_single_event_the_meta_skeleton', false, get_the_ID() );

// Do we want to group venue meta separately?
$set_venue_apart = apply_filters( 'tribe_events_single_event_the_meta_group_venue', false, get_the_ID() );
do_action( 'tribe_events_single_event_meta_primary_section_start' );
?>

<div class="row">
    <div class="col-sm-4">
        <?php tribe_get_template_part( 'modules/meta/details' ); ?>
    </div>
    <div class="col-sm-4">
        <?php if ( tribe_has_organizer() ) {
            tribe_get_template_part( 'modules/meta/organizer' );
        } ?>
    </div>
    <div class="col-sm-4">
        <?php tribe_get_template_part( 'modules/meta/venue' ); ?>
    </div>
</div>
<?php do_action( 'tribe_events_single_event_meta_primary_section_end' ); ?>
<hr class="separator"/>
<?php do_action( 'tribe_events_single_event_meta_secondary_section_start' );
if ( tribe_embed_google_map() ) : ?>
<div class="row">
    <div class="col-xs-12">
        <?php 
            echo '<div class="tribe-events-meta-group tribe-events-meta-group-gmap">';
            tribe_get_template_part( 'modules/meta/map' );
            echo '</div>';
        ?>
    </div>
</div>
<?php endif;
do_action( 'tribe_events_single_event_meta_secondary_section_end' );
do_action( 'tribe_events_single_meta_after' ); ?>
