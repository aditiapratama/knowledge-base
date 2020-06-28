<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_pakb_page_sidebar',
	'title' => 'Layout',
	'fields' => array (

		array (
			'key' => 'field_width',
			'label' => 'Page Width',
			'name' => 'pakb_width',
			'type' => 'radio',
      'choices' => array(
        0	=> 'Theme Default',
    		1	=> 'Narrow',
        2	=> 'Wide',
    	),
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
		),

		array (
			'key' => 'field_sidebar',
			'label' => 'Sidebar',
			'name' => 'pakb_sidebar',
			'type' => 'radio',
      'choices' => array(
        0	=> 'Default (Theme Options)',
    		1	=> 'None',
        2	=> 'Left',
        3	=> 'Right',
    	),
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
		)
	),

	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_pakb_page_header',
	'title' => 'Header Options',
	'fields' => array (

    array (
			'key' => 'field_hero',
			'label' => 'Hero',
			'name' => 'pakb_hero',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
      'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'readonly' => 0,
			'disabled' => 0,
		),

		array (
			'key' => 'field_hero_image',
			'label' => 'Background Image',
			'name' => 'pakb_hero_image',
			'type' => 'image',
      'preview_size' => 'full',
      'library' => 'all',
			'instructions' => '',
			'required' => 0,
      'conditional_logic' => array (
        'field' => 'field_hero',
        'operator' => '==',
        'value' => '1',
      ),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'readonly' => 0,
			'disabled' => 0,
		),

    array (
			'key' => 'field_hero_bg',
			'label' => 'Background Color',
			'name' => 'pakb_hero_bg',
			'type' => 'color_picker',
			'instructions' => 'If background image is set, this option acts as an overlay, to disable clear background color.',
			'required' => 0,
      'conditional_logic' => array (
        'field' => 'field_hero',
        'operator' => '==',
        'value' => '1',
      ),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'readonly' => 0,
			'disabled' => 0,
		),

    array (
			'key' => 'field_hero_text',
			'label' => 'Text Color',
			'name' => 'pakb_hero_text',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
      'conditional_logic' => array (
        'field' => 'field_hero',
        'operator' => '==',
        'value' => '1',
      ),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#ffffff',
			'readonly' => 0,
			'disabled' => 0,
		),

    array (
			'key' => 'field_hero_search',
			'label' => 'Display Search',
			'name' => 'pakb_hero_search',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
      'conditional_logic' => array (
        'field' => 'field_hero',
        'operator' => '==',
        'value' => '1',
      ),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 1,
			'readonly' => 0,
			'disabled' => 0,
		),

	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
));

endif;
