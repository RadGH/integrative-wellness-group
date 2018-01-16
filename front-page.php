<?php
/**
 * Front Page
 */

get_header();

global $images_dir;
?>

<?php
while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('_template-parts/component', 'page-slider-banner'); ?>

    <?php aa_header_banner(); ?>

    <?php
    if ( have_rows('home_page_sections') ) : ?>

        <div class="container-fluid page-Content">

            <?php
            while ( have_rows('home_page_sections') ) : the_row(); ?>

                <?php
                if ( get_row_layout() == 'programs' ) :
                   ?>
                    <section class="row section-Services">
                        <div class="container"><div class="row">

                            <?php
                            if ( get_sub_field('header') ) : ?>
                                <header class="col-xs-12 section-Header">
                                    <?php the_sub_field('header'); ?>
                                </header>
                                <?php
                            endif; ?>

                            <?php
                            if ( have_rows('services') ) : ?>

                                <div class="col-xs-12 section-Services_Blocks">

                                    <?php
                                    while ( have_rows('services') ) : the_row();
                                        $service_image = get_sub_field('service_image');
                                        $service_post_object = get_sub_field('service_page');
                                        // override $post temporarily
                                    	$post = $service_post_object;
                                    	setup_postdata($post);
                                            $service_page_url = get_permalink();
                                        wp_reset_postdata(); ?>

                                        <div class="section-Services_Block">
                                            <a href="<?php echo $service_page_url; ?>" class="section-Services_Content" style="background-image: url('<?php echo $service_image["url"]; ?>');">
                                                <span><?php the_sub_field('service_text'); ?></span>
                                            </a>
                                        </div>

                                    <?php
                                    endwhile; ?>

                                    <div class="section-Services_Block section-Services_Block-fulllist">
                                        <div class="section-Services_Content">
                                            <h3><a href="<?php bloginfo('url'); ?>/cookbook-quiz/">Don't see what you're looking for?</a></h3>
                                            <a href="<?php bloginfo('url'); ?>/service">See the full list</a>
                                        </div>
                                    </div>

                                </div>

                            <?php
                            endif; ?>

                        </div></div>
                    </section>

                <?php
                elseif ( get_row_layout() == 'services' ) : ?>

                    <section class="row section-Services">
                        <div class="container"><div class="row">

                            <?php
                            if ( get_sub_field('header') ) : ?>
                                <header class="col-xs-12 section-Header">
                                    <?php the_sub_field('header'); ?>
                                </header>
                                <?php
                            endif; ?>

                            <?php
                            if ( have_rows('services') ) : ?>

                                <div class="col-xs-12 section-Services_Blocks">

                                    <?php
                                    while ( have_rows('services') ) : the_row();
                                        $service_image = get_sub_field('service_image');
                                        $service_post_object = get_sub_field('service_page');
                                        // override $post temporarily
                                    	$post = $service_post_object;
                                    	setup_postdata($post);
                                            $service_page_url = get_permalink();
                                        wp_reset_postdata(); ?>

                                        <div class="section-Services_Block">
                                            <a href="<?php echo $service_page_url; ?>" class="section-Services_Content" style="background-image: url('<?php echo $service_image["url"]; ?>');">
                                                <span><?php the_sub_field('service_text'); ?></span>
                                            </a>
                                        </div>

                                    <?php
                                    endwhile; ?>

                                    <div class="section-Services_Block section-Services_Block-fulllist">
                                        <div class="section-Services_Content">
                                            <h3><a href="<?php bloginfo('url'); ?>/cookbook-quiz/">Don't see what you're looking for?</a></h3>
                                            <a href="<?php bloginfo('url'); ?>/service">See the full list</a>
                                        </div>
                                    </div>

                                </div>

                            <?php
                            endif; ?>

                        </div></div>
                    </section>

                <?php
                elseif ( get_row_layout() == 'team' ) : ?>

                    <section class="row section-Team">

                        <?php
                        if ( get_sub_field('header') ) : ?>
                            <header class="col-xs-12 section-Header">
                                <?php the_sub_field('header'); ?>
                            </header>
                            <?php
                        endif; ?>

                        <?php
                        $post_objects = get_sub_field('team_members');
                        if ($post_objects) : ?>

                            <div class="container"><div class="row row-TeamMembers">

                                <?php
                                foreach ($post_objects as $post) :
                                    setup_postdata($post); ?>
                                    <div class="col-xs-12 col-md-6 col-lg-3 section-Team_Member">
                                        <a href="<?php the_permalink(); ?>" class="img-hover"><?php the_post_thumbnail(); ?></a>
                                        <p><?php the_title(); ?></p>
                                    </div>
                                <?php
                                endforeach; ?>

                            </div></div>
                            <?php
                            wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php
                        endif; ?>

                        <div class="col-xs-12 section-Team_CTA">
                            <a href="<?php bloginfo('url'); ?>/ourteam-iwg-nj/" class="btn btn-white">Meet the full team</a>
                        </div>

                    </section>

                <?php
                elseif ( get_row_layout() == 'logos' ) :
                    $logos = get_sub_field('logos'); ?>

                    <section class="row section-Logos">
                        <div class="container">
                            <div class="row"><div class="col-xs-12">
                                <div class="section-Logos_Wrapper">
                                    <p>As seen in</p>
                                    <?php
                                    if ($logos): ?>
                                    <ul>
                                        <?php foreach( $logos as $logo ): ?>
                                            <li>
                                                <img src="<?php echo $logo['sizes']['large']; ?>" alt="<?php echo $logo['alt']; ?>" />
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            </div></div>
                        </div>
                    </section>

                <?php
                elseif ( get_row_layout() == 'blog' ) : ?>

                    <section class="row section-Blog">
                        <div class="container"><div class="row">

                            <?php
                            if ( get_sub_field('header') ) : ?>
                                <header class="col-xs-12 section-Header">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 blog-Header">
                                            <?php the_sub_field('header'); ?>
                                        </div>
                                    </div>
                                </header>
                            <?php
                            endif; ?>

                            <div class="col-xs-12">
				<div class="row posts-Feed">
                                <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 1, 
				'category_name' => 'blog' );
                                $the_query1 = new WP_Query( $args );
                                if ( $the_query1->have_posts() ) : ?>
                                        <?php
                                        while ( $the_query1->have_posts() ) : $the_query1->the_post(); ?>

                                            <div class="col-xs-6 col-sm-3 post-FeedItem">
                                                
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php
	if ( has_post_thumbnail() ) {
        $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		echo '<a class="post-Thumbnail col-xs-12" href="' . get_permalink() . '"><img src="' . $thumbnail_url . '"></a>';
	} ?>

	<div class="post-ContentWrapper col-xs-12">
        <header class="post-Header">
            <div class="post-Meta">
                <p class="post-Category"><a href="<?php bloginfo('url'); ?>/category/blog">BLOG</a></p>
                <p class="post-Date"><?php the_time('n/d/y'); ?></p>
            </div>
    		<!--h2 class="post-Title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2-->
    	</header><!-- /.post-Header -->

    	<footer class="post-Footer">
    		<a href="<?php the_permalink(); ?>">Read More</a>
    	</footer><!-- /.post-Footer -->
	</div>

</article><!-- /#post-## -->
                                            </div>

                                            <?php
                                            wp_reset_postdata();
                                        endwhile; ?>
                                <?php endif; ?>
                                <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 1, 
				'category_name' => 'podcast' );
                                $the_query2 = new WP_Query( $args );
                                if ( $the_query2->have_posts() ) : ?>
                                        <?php
                                        while ( $the_query2->have_posts() ) : $the_query2->the_post(); ?>

                                            <div class="col-xs-6 col-sm-3 post-FeedItem">

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php
	if ( has_post_thumbnail() ) {
        $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		echo '<a class="post-Thumbnail col-xs-12" href="' . get_permalink() . '"><img src="' . $thumbnail_url . '"></a>';
	} ?>

	<div class="post-ContentWrapper col-xs-12">
        <header class="post-Header">
            <div class="post-Meta">
                <p class="post-Category"><a href="<?php bloginfo('url'); ?>/category/podcast">PODCAST</a></p>
                <p class="post-Date"><?php the_time('n/d/y'); ?></p>
            </div>
    		<!--h2 class="post-Title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2-->
    	</header><!-- /.post-Header -->

    	<footer class="post-Footer">
    		<a href="<?php the_permalink(); ?>">Read More</a>
    	</footer><!-- /.post-Footer -->
	</div>

</article><!-- /#post-## -->

                                            </div>

                                            <?php
                                            wp_reset_postdata();
                                        endwhile; ?>
                                <?php endif; ?>
                                <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 1, 
				'category_name' => 'video' );;
                                $the_query3 = new WP_Query( $args );
                                if ( $the_query3->have_posts() ) : ?>
                                        <?php
                                        while ( $the_query3->have_posts() ) : $the_query3->the_post(); ?>

                                            <div class="col-xs-6 col-sm-3 post-FeedItem">

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php
	if ( has_post_thumbnail() ) {
        $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		echo '<a class="post-Thumbnail col-xs-12" href="' . get_permalink() . '"><img src="' . $thumbnail_url . '"></a>';
	} ?>

	<div class="post-ContentWrapper col-xs-12">
        <header class="post-Header">
            <div class="post-Meta">
                <p class="post-Category"><a href="<?php bloginfo('url'); ?>/category/video">Watch</a></p>
                <p class="post-Date"><?php the_time('n/d/y'); ?></p>
            </div>
    		<!--h2 class="post-Title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2-->
    	</header><!-- /.post-Header -->

    	<footer class="post-Footer">
    		<a href="<?php the_permalink(); ?>">Read More</a>
    	</footer><!-- /.post-Footer -->
	</div>

</article><!-- /#post-## -->

                                            </div>

                                            <?php
                                            wp_reset_postdata();
                                        endwhile; ?>
                                <?php endif; ?>
                                <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 1, 
				'category_name' => 'nutrition-recipes' );
                                $the_query4 = new WP_Query( $args );
                                if ( $the_query4->have_posts() ) : ?>
                                        <?php
                                        while ( $the_query4->have_posts() ) : $the_query4->the_post(); ?>

                                            <div class="col-xs-6 col-sm-3 post-FeedItem">

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php
	if ( has_post_thumbnail() ) {
        $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		echo '<a class="post-Thumbnail col-xs-12" href="' . get_permalink() . '"><img src="' . $thumbnail_url . '"></a>';
	} ?>

	<div class="post-ContentWrapper col-xs-12">
        <header class="post-Header">
            <div class="post-Meta">
                <p class="post-Category"><a href="<?php bloginfo('url'); ?>/category/recipe">RECIPE</a></p>
                <p class="post-Date"><?php the_time('n/d/y'); ?></p>
            </div>
    		<!--h2 class="post-Title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2-->
    	</header><!-- /.post-Header -->

    	<footer class="post-Footer">
    		<a href="<?php the_permalink(); ?>">Read More</a>
    	</footer><!-- /.post-Footer -->
	</div>

</article><!-- /#post-## -->

                                            </div>

                                            <?php
                                            wp_reset_postdata();
                                        endwhile; ?>
                                <?php endif; ?>
				</div>
                            </div>

                        </div></div>
                    </section>

                <?php
                elseif ( get_row_layout() == 'success_story' ) : ?>

                    <section class="row section-SuccessStory">
                        <div class="container"><div class="row">

                            <?php
                            if ( get_sub_field('header') ) : ?>
                                <header class="col-xs-12 section-Header">
                                    <?php the_sub_field('header'); ?>
                                </header>
                                <?php
                            endif; ?>

                            <?php
                            $story_post_object = get_sub_field('story');
                            // override $post temporarily
                            $post = $story_post_object;
                            setup_postdata($post);

                            $testimonial_title = get_field('client_name');
                            if ( !$testimonial_title ) {
                                $testimonial_title = get_the_title();
                            }
                            $testimonial_description = get_field('client_description');
                            $testimonial_image = get_field('client_image');
                            if ( !$testimonial_image ) {
                                $testimonial_image['url'] = $images_dir . '/ph-Profile.jpg';
                            } ?>

                            <div class="card testimonial">
                                <img class="testimonial-image" src="<?php echo $testimonial_image['url']; ?>" alt="<?php echo $testimonial_image['alt']; ?>" />
                                <blockquote>
                                    <?php the_field('client_testimonial'); ?>
                                    <cite>
                                        <h4><?php echo $testimonial_title; ?></h4>
                                        <?php if ( $testimonial_description ) { ?><p><?php echo $testimonial_description; ?></p><?php } ?>
                                    </cite>
                                </blockquote>
                            </div>

                            <?php
                            wp_reset_postdata(); ?>

                        </div></div>
                    </section>

                <?php
                elseif ( get_row_layout() == 'full-width_content' ) :
                    $bg_image = get_sub_field('background_image');

                    $bg_color_obj = get_sub_field_object('background_color');
    				if ( $bg_color_obj ) {
    					$bg_color = 'bgc-' . $bg_color_obj['value'];
    				} ?>

                    <section class="row section-Content_FullWidth <?php echo $bg_color; ?>" style="background-image: url('<?php echo $bg_image["url"]; ?>');">
                        <div class="container"><div class="row">

                            <?php
                            if ( get_sub_field('header') ) : ?>
                                <header class="col-xs-12 section-Header">
                                    <?php the_sub_field('header'); ?>
                                </header>
                                <?php
                            endif; ?>

                            <div class="col-xs-12">
                                <?php the_sub_field('content'); ?>
                            </div>

                        </div></div>
                    </section>
                    

               <?php elseif ( get_row_layout() == 'icon_text_list_block' ) : ?>
               <section class="row icon-list">
               		<div class="container">
               			<div class="row">
							<div class="icon-list-intro col-xs-12"><?php the_sub_field( 'intro_text' ); ?></div>
						</div>
				    </div>
						
						<div class="container">
           					<div class="row">
			<?php if ( have_rows( 'icon_list' ) ) : ?>
				<?php while ( have_rows( 'icon_list' ) ) : the_row(); ?>
								<?php 	//var
										$icon = get_sub_field( 'icon' );
										$icon_txt = get_sub_field( 'icon_text' );
										$icon_link = get_sub_field( 'icon_url' );
								?>
							<div class="icon-list-item col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<?php if( $icon_link ): ?>
								<a href="<?php echo $icon_link; ?>">
							<?php endif; ?>
								<figure class="icon-img">
									<?php if ( $icon ) { ?>
										<?php echo wp_get_attachment_image( $icon, 'thumbnail' ); ?>
									<?php } ?>
								</figure>
								<div class="icon-text">
									<?php echo $icon_txt; ?>
								</div>
							<?php if( $icon_link ): ?>
								</a>
							<?php endif; ?>	
							</div>	
				
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
				<?php endif; ?>
				   </div>
				   </div>
			</section>
			
                <?php
                endif; // get_row_layout() ?>

            <?php
            endwhile; // have_rows() ?>

        </div> <!-- /.container-fluid.page-Content -->

    <?php
    endif; // have_rows() ?>

    <?php aa_footer_banner(); ?>

<?php
endwhile; // End of the loop. ?>

<!--cornerSlider starts-->
<style>
	#corner-slider{
		background-image: url(<?php the_field('popup_image','option')?>);
	}

@media only screen and (max-width: 480px) {
#corner-slider{
	background-image: url(<?php the_field('popup_image_mobile','option')?>);
}
	}
</style>
<div id="corner-slider">
<div class="popup-form"><?php the_field('popup_form_code','option')?></div>      
</div>
<!--cornerSlider ends-->

<?php get_footer(); ?>