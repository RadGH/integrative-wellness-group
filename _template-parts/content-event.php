<?php
/**
 * Template part for displaying post content in single-event.php
 *
 */
?>
 <script type="text/javascript">(function () {
            if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                var h = d[g]('body')[0];h.appendChild(s); }})();
    </script>

<div class="container-fluid page-Content">
	<section class="row">
		<div class="container"><div class="row">

			<div class="col-xs-12 col-md-6">
				<div class="event-Content">
					<h3><?php the_title(); ?></h3>
					<p class="event-Date">
						<?php
                    	// get raw date
						$date = get_field('event_date', false, false);
						// make date object
						$date = new DateTime($date);
                    	echo $date->format('F jS'); ?>
					</p>
					<div class="event-Description">
						<?php the_field('event_description'); ?>
					</div>
					<p class="event-Meta">
						<strong>Venue: </strong><br>
						<?php the_field('event_venue'); ?>
					</p>
					<p class="event-Meta">
						<strong>Time: </strong><br>
						<?php the_field('event_time'); ?>
					</p>
					<p class="event-Meta">
						<strong>Event Info: </strong><br>
						<?php the_field('event_info'); ?>
					</p>
					<p class="event-Meta">
						<strong>Contact Info: </strong><br>
						<?php the_field('event_contact_info'); ?>
					</p>
					<a href="<?php the_field('event_rsvp_link'); ?>" class="btn btn-blue" target="_blank">RSVP</a> 
	<span class="addtocalendar"      
	data-calendars="iCalendar, Google Calendar, Outlook">
	<a class="atcb-link btn btn-blue" style="display:inline-block;color:#ffffff;">Add to Calendar</a>
        <var class="atc_event">
            <var class="atc_date_start"><?php the_field('event_start_time'); ?></var>
            <var class="atc_date_end"><?php the_field('event_end_time'); ?></var>
            <var class="atc_timezone">America/New_York</var>
            <var class="atc_title"><?php the_title(); ?></var>
            <var class="atc_description"><?php the_field('event_short_description'); ?></var>
            <var class="atc_location"><?php the_field('event_venue'); ?></var>
            <var class="atc_organizer"><?php the_field('event_organizer'); ?></var>
	    <var class="atc_organizer_email">info@integrativewellnessgroup.com</var>
        </var>
	</span>
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="event-Image">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}?>
				</div>
				<div class="post-Share" style="margin-top:30px;">
					<?php echo do_shortcode('[ssba]'); ?>
				</div>
			</div>

		</div></div>
	</section>
</div>
