<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_57699cfbbec61',
	'title' => 'Developer Options',
	'fields' => array (
		array (
			'key' => 'field_57c0948fe9279',
			'label' => 'Dashboard Welcome Panel',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_57c09498e927a',
			'label' => 'Welcome Panel Text',
			'name' => 'welcome_panel_text',
			'type' => 'wysiwyg',
			'instructions' => 'Enter the personalized welcome text here.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '<h1 class="heading">Thank You for choosing Alchemy + Aim!</h1>
		<p>Here you will find tutorials, tools and update notifications from your administrator. Check here periodically for any maintenance updates or additional functionality you may require to further benefit your user experience and help you edit your site. Should you have any questions, problems or difficulties; please do not hesitate to <a href="http://alchemyandaim.com/contact/" target="_blank">contact us</a>.</p>
<p>Sincerely,<br>
<img width="131" height="45" src="http://www.notyouraverageordinary.com/wp-content/uploads/2015/03/blogsignature.png"></p>',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-developer',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5621273b83cf7',
	'title' => 'WYSIWYG Widget',
	'fields' => array (
		array (
			'key' => 'field_56212742fd44a',
			'label' => 'WYSIWYG Widget',
			'name' => 'wysiwyg_widget',
			'type' => 'wysiwyg',
			'instructions' => 'A rich text WYSIWYG widget.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'widget',
				'operator' => '==',
				'value' => 'rich-text-widget',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
?>
