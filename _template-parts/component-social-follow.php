<?php
$facebook_url = get_field('facebook_url', 'option');
$twitter_username = get_field('twitter_username', 'option');
$google_plus_url = get_field('google_plus_url', 'option');
$instagram_username = get_field('instagram_username', 'option');
$youtube_url = get_field('youtube_url', 'option');
$pinterest_username = get_field('pinterest_username', 'option'); ?>

<ul class="social-follow">
    <?php if ($facebook_url) { ?><li><a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
    <?php if ($twitter_username) { ?><li><a href="https://www.twitter.com/<?php echo $twitter_username; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
    <?php if ($google_plus_url) { ?><li><a href="<?php echo $google_plus_url; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
    <?php if ($instagram_username) { ?><li><a href="https://www.instagram.com/<?php echo $instagram_username; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?>
    <?php if ($youtube_url) { ?><li><a href="<?php echo $youtube_url; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php } ?>
    <?php if ($pinterest_username) { ?><li><a href="http://pinterest.com/<?php echo $pinterest_username; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li><?php } ?>
</ul>
