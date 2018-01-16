<?php global $images_dir; ?>
    </main>

    <footer class="site-Footer">

        <div class="site-Footer_Content">
            <div class="container">
                <div class="row row-Footer_Logo"><div class="col-xs-12">
                    <a href="<?php bloginfo('url'); ?>">
						<img src="<?php echo $images_dir; ?>/site-Logo-full.png" alt="Integrative Wellness Group logo" />
					</a>
                </div></div>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <h4>Menu</h4>
                        <nav class="footer-nav">
                        <?php
                        wp_nav_menu( array(
                            'menu'       => 'footer-nav',
                            'menu_class' => 'nav group',
                            'container'  => false,
                            'fallback_cb'=> 'bs4navwalker::fallback',
                            'walker'     => new bs4navwalker(),
                        ));
                        ?>
                        </nav>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <h4>Blog Categories</h4>
                        <ul class="blog-nav">
						<li><a href="http://integrativewellnessgroup.com/category/autoimmune-conditions">Autoimmune Conditions</a></li>
                        <li><a href="http://integrativewellnessgroup.com/category/food-environmental-allergies">Food + Environmental Allergies</a></li>
                        <li><a href="http://integrativewellnessgroup.com/category/gut-health">Gut Health</a></li>
                        <li><a href="http://integrativewellnessgroup.com/category/chronic-pain-inflammation">Chronic Pain + Inflammatory Conditions</a></li>
                        <li><a href="http://integrativewellnessgroup.com/category/lyme-disease">Lyme Disease + Lyme Co-infections</a></li>
                        <li><a href="http://integrativewellnessgroup.com/category/mold-biotoxin-illness">Mold + Biotoxin Illness</a></li>
                        <li><a href="https://integrativewellnessgroup.com/blog/">See More Topics ></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <h4>Office Hours</h4>
                        <p><strong>M | W</strong> <br>
                            9AM - 12PM & 2PM - 6PM</p>
						<p><strong>TU</strong> <br>
							10AM -12PM & 2PM - 6PM</p>
                        <p><strong>TH</strong> <br>
                            9AM- 2PM</p>
                        <p><strong>F</strong> <br>
                            9AM - 12PM & 2PM - 5PM</p>
                        <p><strong>SA</strong> <br>
                            9AM - 12PM</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-3">
                        <h4>Stay in Touch</h4>
                        <p>616 5th Avenue #105 <br>
                        Belmar, NJ 07719 <br>
                        732.359.8263</p>

                        <?php get_template_part('_template-parts/component', 'social-follow'); ?>

                        <a href="<?php bloginfo('url'); ?>/get-started" class="btn btn-white">Book an appointment</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-Footer_Copyright">
            <div class="container"><div class="row">
                <div class="col-xs-12">
                    <p>© <?php echo date('Y'); ?>. Integrative Wellness Group. All Rights Reserved.</p>
                    <ul>
                        <li><a href="<?php bloginfo('url'); ?>/terms-conditions">Terms & Conditions</a></li>
                        <li><a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a></li>
                    </ul>
                    <p>Design by <a href="http://rachelpesso.com" target="_blank">Rachel Pesso</a> | Development by <a href="http://alchemyandaim.com" target="_blank">Alchemy+Aim</a></p>
                </div></div>
            </div>
        </div>

    </footer>

</div> <!-- #page-wrapper -->
</div> <!-- .site -->

<?php
    // include the remodals
    get_template_part('/_template-parts/part', 'modals'); ?>

<?php wp_footer(); ?>

<script>
jQuery(function($) {
	"use strict";
	$('.search-icon-link a').click( function() {
    $('#search-Wrapper').toggleClass('open');
	});
		});
</script>
</body>
</html>
