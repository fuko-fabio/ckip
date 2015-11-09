<?php

function workshops_calendar($date) {
    $today = date('Y-m-d');
    $month = date('m', strtotime($date));;
    $year = date('Y', strtotime($date));

    $calendar = '<div class="workshops-calendar">';

    /* table headings */
    $headings = array(
        __('Monday'),
        __('Tuesday'),
        __('Wednesday'),
        __('Thursday'),
        __('Friday'),
        __('Saturday'),
        __('Sunday'));

    $calendar.= '<div class="row seven-cols workshops-calendar-heading">';
    foreach ($headings as $key => $value) {
        $calendar.= '<div class="col-sm-1">'.$value.'</div>';
    }
    $calendar.= '</div>';

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
    $calendar.= '<div class="row seven-cols workshops-calendar-week">';

    /* print "blank" days until the first of the current week */
    for($x = 1; $x < $running_day; $x++):
        $calendar.= '<div class="col-sm-1 workshops-calendar-day-np"></div>';
        $days_in_this_week++;
    endfor;

    /* keep going with days.... */
    for($list_day = 1; $list_day <= $days_in_month; $list_day++):
        $calendar.= '<div class="col-sm-1 workshops-calendar-day';
        if ($list_day == date("d",strtotime($today)) && $month == date("m",strtotime($today))) {
            $calendar.= ' today';
        } else if (strtotime($year.'-'.$month.'-'.$list_day) < strtotime($today)) {
            $calendar.= ' past';
        }
        $calendar.= '">';
        /* add in the day number */
        $calendar.= '<div class="day-number">'.$list_day.'</div>';
        $calendar.= workshops_events_list($year.'-'.$month.'-'.$list_day);
        $calendar.= '</div>';
        if($running_day == 7):
            $calendar.= '</div>';
            if(($day_counter+1) != $days_in_month):
                $calendar.= '<div class="row seven-cols workshops-calendar-week">';
            endif;
            $running_day = 0;
            $days_in_this_week = 0;
        endif;
        $days_in_this_week++; $running_day++; $day_counter++;
    endfor;

    /* finish the rest of the days in the week */
    if($days_in_this_week < 8):
        for($x = 1; $x <= (8 - $days_in_this_week); $x++):
            $calendar.= '<div class="col-sm-1 workshops-calendar-day-np"></div>';
        endfor;
    endif;

    /* final row */
    $calendar.= '</div>';

    /* end the table */
    $calendar.= '</div>';
    
    /* all done, return result */
    return $calendar;
}

function workshops_events_list($date = null) {
    $result = '';
    $get_posts = new WP_Query();
    $get_posts->query(workshops_query_args($date));
    if($get_posts->have_posts()) : while($get_posts->have_posts()) : $get_posts->the_post();
        $result.= '<a href="'.esc_url( tribe_get_event_link()).'"><span class="event">'.the_title('', '', false).'</span></a>';
    endwhile;
    endif;
    wp_reset_query();
    return $result;
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