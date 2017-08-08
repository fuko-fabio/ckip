<?php

function workshops_calendar($date) {
    $today = date('Y-m-d');
    $month = date('m', strtotime($date));;
    $year = date('Y', strtotime($date));
    $today_timestamp = strtotime($today);

    $calendar = '<table>';

    /* table headings */
    $headings = array(
        __('Monday'),
        __('Tuesday'),
        __('Wednesday'),
        __('Thursday'),
        __('Friday'),
        __('Saturday'),
        __('Sunday'));

    $events_colors = array(
        'blue',
        'red',
        'green',
        'pink',
        'cyan',
        'violet');

    $calendar.= '<thead><tr>';
    foreach ($headings as $key => $value) {
        $calendar.= '<td>'.$value.'</td>';
    }
    $calendar.= '</tr></thead><tbody>';

    /* days and weeks vars now ... */
    $running_day = date('w',mktime(0,0,0,$month,1,$year));
    if ($running_day == 0) {
        $running_day = 7;
    }
    $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
    $days_in_this_week = 1;
    $day_counter = 0;
    $dates_array = array();

    /* row for week one */
    $calendar.= '<tr>';

    /* print "blank" days until the first of the current week */
    for($x = 1; $x < $running_day; $x++):
        $calendar.= '<td class="empty"></td>';
        $days_in_this_week++;
    endfor;

    /* keep going with days.... */
    for($list_day = 1; $list_day <= $days_in_month; $list_day++):
        $loop_day_timestamp = strtotime($year.'-'.$month.'-'.$list_day);
        $calendar.= '<td class="';
        if ($list_day == date("d", $today_timestamp) && $month == date("m", $today_timestamp)) {
            $calendar.= 'today';
        } else if ($loop_day_timestamp < $today_timestamp) {
            $calendar.= 'past';
        }
        $calendar.= '">';
        /* add in the day number */
        $calendar.= '<div><span class="number">'.$list_day.'<span>'.date_i18n('D', $loop_day_timestamp).'</span></span>';
        $calendar.= workshops_events_list($year.'-'.$month.'-'.$list_day, $events_colors);
        $calendar.= '</div></td>';
        if($running_day == 7):
            $calendar.= '</tr>';
            if(($day_counter+1) != $days_in_month):
                $calendar.= '<tr>';
            endif;
            $running_day = 0;
            $days_in_this_week = 0;
        endif;
        $days_in_this_week++; $running_day++; $day_counter++;
    endfor;

    /* finish the rest of the days in the week */
    if($days_in_this_week < 8):
        for($x = 1; $x <= (8 - $days_in_this_week); $x++):
            $calendar.= '<td class="empty"></td>';
        endfor;
    endif;

    /* final row */
    $calendar.= '</tr></tbody>';

    /* end the table */
    $calendar.= '</table>';
    
    /* all done, return result */
    return $calendar;
}

function workshops_events_list($date, $events_colors) {
    $result = '';
    $get_posts = new WP_Query();
    $get_posts->query(workshops_query_args($date));
    if($get_posts->have_posts()) : while($get_posts->have_posts()) : $get_posts->the_post();
        $result.= '<a href="'.esc_url( tribe_get_event_link()).'">'
            .'<span class="'.workshops_event_class(get_the_ID(), $events_colors).'">'
            .'<p>'.tribe_get_start_time().'</p>'
            .the_title('', '', false)
            .'</span>'
            .'</a>';
    endwhile;
    endif;
    wp_reset_query();
    return $result;
}

function workshops_event_class($post_id, $events_colors) {
    $terms = get_the_terms($post_id, 'tribe_events_cat');
    $class = '';
    if ( $terms && !is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
            if (in_array($term->description, $events_colors)) {
                $class.= 'cat-'.$term->description.' ';
            }
        }
    }
    if (empty($class)) {
        $class = 'default';
    }
    return $class;
}

function workshops_query_args($date = null) {
    if ($date == null) {
        $date = date('Y-m-d');
    }
    return array(
      'post_status'=>'publish',
      'post_type'=>array(Tribe__Events__Main::POSTTYPE),
      'posts_per_page'=>-1,
      'eventDisplay'=>'custom',
      'order' => 'ASC',
      'meta_query' => array(
          array(
              'key' => '_EventStartDate',
              'value' => $date,
              'compare' => '=',
              'type'    => 'DATE'
          )
      ),
      'tax_query' => array(
          array(
              'taxonomy' => 'tribe_events_cat',
              'field' => 'slug',
              'terms' => get_theme_mod('ckip_workshops_category', 'unknown'),
              'operator' => 'IN'
          ),
      )
    );
}

?>