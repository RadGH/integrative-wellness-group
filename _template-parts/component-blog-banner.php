<?php
if ( is_singular('post') ) {
    $banner_image = get_field('single_post_banner_image', get_option('page_for_posts'));
} else {
    $banner_image = get_field('banner_image', get_option('page_for_posts'));
}
$banner_video = get_field('banner_video_url', get_option('page_for_posts'));
$banner_heading = get_field('banner_heading', get_option('page_for_posts'));
$banner_subheading = get_field('banner_subheading', get_option('page_for_posts'));
$banner_button_url = get_field('banner_button_url', get_option('page_for_posts'));
$banner_button_text = get_field('banner_button_text', get_option('page_for_posts'));
$banner_layout = get_field('banner_layout', get_option('page_for_posts')) ?: 'boxed'; ?>

<?php // TODO: Parallax BG is not working ?>
<div class="jumbotron jumbotron-fluid banner-layout-<?php echo esc_attr($banner_layout); ?>" style="background-image: url('<?php echo (isset($banner_image['sizes']['large']) ? $banner_image['sizes']['large'] : $banner_image['url']); ?>');">
    <div class="container"><div class="row">
        <div class="col-xs-12">
            <?php if ( $banner_video ) { ?>
                <a href="#" class="btn-video toggle-Modal_Video"></a>
                <div class="modal-content hidden-xs-up"><?php echo do_shortcode("[arve url='$banner_video']"); ?></div>
                <?php } ?>

            <?php if ( $banner_heading ) { ?>
                <h1><?php echo $banner_heading; ?></h1>
            <?php } else { ?>
                <h1><?php the_title(); ?></h1>
            <?php
            } ?>

            <?php if ( $banner_subheading ) { ?><h2><?php echo $banner_subheading; ?></h2><?php } ?>

            <?php if ( $banner_button_url ) { ?><a href="<?php echo $banner_button_url; ?>" class="btn"><?php echo $banner_button_text; ?></a><?php } ?>
        </div>
    </div></div>
</div>
