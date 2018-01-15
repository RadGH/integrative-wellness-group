/**
 * Main JS file where all custom JS is done
 */
(function($) {
"use strict";
	var $body = $('body');

	var modalVideo = function() {
    	var $modal = $('div[data-remodal-id=video]'),
    		remodalInst = $modal.remodal(),
			$modalContentWrapper = $modal.find('.remodal-content');

    	$('.toggle-Modal_Video').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this),
				$modalContent;

			$modalContent = $this.siblings('.modal-content').html();
			$modalContentWrapper.append($modalContent);

    		remodalInst.open();
    	});

    	// When the modal closes, remove the iframe from it
    	$(document).on('closed', 'div[data-remodal-id=video]', function() {
    		$modalContentWrapper.empty();
    	});

    	$(document).on('opened', 'div[data-remodal-id=video]', function() {
    		if ( ! $modalContentWrapper.length ) {
    			remodalInst.close();
    		}
    	});
    };

	var accordion = function() {
		var $faqItems = $('.section-Accordion_Items');

		// First hide every item except the first
		$faqItems.children('.section-Accordion_Item:not(:first)').each(function() {
			var $this = $(this);

			// Hide the answers initially (except the first one)
			$this.removeClass('visible')
				.children('.section-Accordion_ItemContent').hide();
			$this.find('i.fa')
				.removeClass('fa-minus')
				.addClass('fa-plus');
		});

		// Then add the click functionality
		$faqItems.children('.section-Accordion_Item').each(function() {
			var $this = $(this);

			$this.on('click', function() {
				if ( $this.hasClass('visible') ) {
					// Hide the content
					$this.find('.section-Accordion_ItemContent').velocity('slideUp');
					// Change the icon
					$this.find('i.fa')
						.removeClass('fa-minus')
						.addClass('fa-plus');
					// Remove the visible class
					$this.removeClass('visible');
				} else {
					// Show the content
					$this.find('.section-Accordion_ItemContent').velocity('slideDown');
					// Change the icon
					$this.find('i.fa')
						.removeClass('fa-plus')
						.addClass('fa-minus');
					// Add the visible class
					$this.addClass('visible');
				}
			});
		});
	};

	/* Init Owl Carousel success stories slider */
	var successStoriesSlider = function() {

		var $owl = $('#success-stories-slider');
		var multipleSlides = $owl.children().length > 1;

		$owl.owlCarousel({
			autoplay: multipleSlides,
			autoplayTimeout: 10000,
			responsive: {
				0: {
					items: 1,
					dots: false,
				},
				768: {
					items: 1,
				},
				992: {
					items: 1,
				},
			},
			mouseDrag: multipleSlides,
			touchDrag: multipleSlides,
			loop: multipleSlides,
			dots: false,
		    nav: multipleSlides,
			navText: ['', ''],
		});

		// Set margin for owl dots based on how many there are
		var $owlDots = $owl.find('.owl-dots'),
			owlDotsNegMargin = $owlDots.width() / 2;

		$owlDots.css('margin-left', '-' + owlDotsNegMargin + 'px');
	};

	/* Hover JS for the nav submenu */
	var subMenuJS = function() {
		var $mainNavMenu = $('#menu-main-nav'),
			$parentLi = $mainNavMenu.find('li.menu-item-has-children'),
			$subMenuWrapper = $('.mainnav-SubMenu'),
			$subMenuList = $('.mainnav-SubMenu_Column').find('.sub-menu');

		$parentLi.on('mouseenter', function() {
			var $this = $(this);

			// if this submenu item is not the current one
			if ( !$this.hasClass('active') ) {
				$parentLi.removeClass('active');
				$this.addClass('active');

				// If the subMenuWrapper isn't open already
				if ( !$subMenuWrapper.hasClass('open') ) {
					$subMenuWrapper.addClass('open');
				}

				$subMenuList
					.empty()
					.append( $this.find('.sub-menu').html() );

			}
		});

		$('.site-Header').on('mouseleave', function() {
			$parentLi.removeClass('active');
			$subMenuWrapper.removeClass('open');

			setTimeout(function() {
				$subMenuList.empty();
			}, 300);
		});

		// NOTE: This kind of works, but doesn't leave enough space at responsive layouts. Leaving out unless client requests it.
		// var mainMenuUl = document.getElementById('menu-main-nav'),
		// 	mainMenuUlPosition = mainMenuUl.getBoundingClientRect();
		//
		// $('.mainnav-SubMenu').find('.sub-menu').css('margin-left', mainMenuUlPosition.left);
	};

	
	var searchBarJS = function() {
		var $searchBtn = $('#search-Button'),
			$searchWrapper = $('#search-Wrapper'),
			$searchClose = $('#search-Close');

		$searchBtn.on('click', function(e) {
			e.preventDefault();
			$searchWrapper.toggleClass('open');
		});

		$searchClose.on('click', function(e) {
			e.preventDefault();
			$searchWrapper.toggleClass('open');
		});

		$(document).keyup(function(e) {
			if (e.keyCode === 27 && $searchWrapper.hasClass('open') ) { // escape key maps to keycode `27`
				$searchWrapper.removeClass('open');
			}
		});
	};

	// Filter Ajax Load More
	var alm_is_animating = false;
	$('#alm-filter-nav li').eq(0).addClass('active'); // Set the initial button active state

	// Nav btn click event
	$('#alm-filter-nav li a').on('click', function(e) {
		e.preventDefault();
		var el = $(this); // Our selected element

		if(!el.hasClass('active') && !alm_is_animating){ // Check for active and !alm_is_animating
			alm_is_animating = true;
			el.parent().addClass('active').siblings('li').removeClass('active'); // Add active state

			var data = el.data(), // Get data values from selected menu item
			transition = 'fade', // 'slide' | 'fade' | null
			speed = '300'; //in milliseconds

			$.fn.almFilter(transition, speed, data); // reset Ajax Load More (transition, speed, data)
		}
	});

	$.fn.almFilterComplete = function(){
		alm_is_animating = false; // clear alm_isanimating flag
	};

	$(document).ready( function() {

		subMenuJS();
		searchBarJS();
		modalVideo();
		accordion();

		if ( $body.hasClass('page-template-template-services') ) {
			successStoriesSlider();
		}

		// Init the off-canvas nav
		$('#off-canvas-nav').mmenu({
			'navbar': false,
			'offCanvas': {
            	'zposition': 'front',
				'position': 'right',
        	},
		});
		var offCanvasAPI = $('#off-canvas-nav').data('mmenu');
		$('#off-canvas-close-button').click(function() {
			offCanvasAPI.close();
		});

		// Init the mobile nav
		$('#mobile-nav').mmenu({
			'navbar': true,
			'navbars': [
				{
					"position": "top"
				}
			],
			'offCanvas': {
            	'zposition': 'front',
				'position': 'right',
        	},
		});
		var MobileNavAPI = $('#mobile-nav').data('mmenu');
		$('#mobile-close-button').click(function() {
			MobileNavAPI.close();
		});

		// Init Sticky-kit for the program price block
		$('.main-nav').stick_in_parent()
			.on('sticky_kit:stick', function() {
				$('.site-Header, .mainnav-SubMenu').addClass('is_stuck');
			})
			.on('sticky_kit:unstick', function() {
				$('.site-Header, .mainnav-SubMenu').removeClass('is_stuck');
			});

	}); // document.ready()

})(jQuery);

jQuery(function($) {
	"use strict";
	$('.search-icon-link a').click( function() {
    $('#search-Wrapper').toggleClass('open');
	});
		});

(function($){
$(document).ready(function () {

    $("#corner-slider").cornerSlider({
        showAtScrollingHeight : 1300,
		directionEffect       : "bottom",
        speedEffect           : 300,
		right                 : 20,
		bottom                : 0,
        cookieMinutesToExpiry : 15,
		//onClose               : function() {
		    //alert("Not to be seen again in the near future.");
		//},
    });
});
}(jQuery));