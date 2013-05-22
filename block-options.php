<?php
class HeadwayAffiliateBlockOptions extends HeadwayBlockOptionsAPI {	
	public $tabs = array(
		'settings' => 'Settings'
	);
	public $inputs = array(
		'settings' => array(
			'new-window-check' => array(
				'type' => 'checkbox',
				'name' => 'new-window-check',
				'label' => 'Open Link in New Window?',
				'default' => true,
				'tooltip' => 'Do you want your links to open a new window?'
			),
			'ad-content' => array(
				'type' => 'wysiwyg',
				'name' => 'ad-content',
				'label' => 'Box Content',
				'default' => ''
			),
			'affiliate-image' => array(
				'type' => 'select',
				'name' => 'affiliate-image',
				'label' => 'Banner Image',
				'options' => array(
					'2' => '125x125px',
					'3' => '200x125px',
					'4' => '160x600px',
					'5' => '300x250px',
					'6' => '468x60px',
					'7' => '728x90px (dark)',
					'8' => '728x90px',
					'9' => '90x728px'
				),
				'default' => '',
				'tooltip' => 'Choose a banner to use.'
			),
			'affiliate-image-align' => array(
				'type' => 'select',
				'label' => 'Image Alignment',
				'name' => 'affiliate-image-align',
				'options' => array(
					'left' => 'Left',
					'right' => 'Right',
					'center' => 'Center'
				),
				'default' => 'left',
				'tooltip' => 'Choose your image alignment'
			)
		)
	);	
}