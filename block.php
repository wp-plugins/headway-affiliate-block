<?php
class HeadwayAffiliateBlock extends HeadwayBlockAPI {
	
	
	public $id = 'affiliate';
	
	public $name = 'Affiliate';
	
	public $options_class = 'HeadwayAffiliateBlockOptions';

	function enqueue_action($block_id) {
	}	
	function content($block) {
		if ( HeadwayOption::get('affiliate-link') )
			$headway_location = strip_tags(HeadwayOption::get('affiliate-link'));
		else
			$headway_location = 'http://headwaythemes.com/';
		/* Link Window */
		$toggle = parent::get_setting($block, 'new-window-check', true);
		if($toggle == true) {$window = 'target="_blank"';}
		/* $image */
		$image = parent::get_setting($block, 'affiliate-image', '2');
		/* Image Alignment */
		$align = parent::get_setting($block, 'affiliate-image-align', 'left');
		if($align == 'center') {$move = '';}
		else {$move = 'float:'.$align.';';}
		/* Default Text */
		$content = parent::get_setting($block, 'ad-content', '<h2>This Website Runs on <a target="_blank" href="'.$headway_location.'" title="Get yourself a great looking blog">Headway Themes</a></h2>
<p><a target="_blank" href="'.$headway_location.'" target="_blank">Headway Themes</a> gives you the power to build your dream website with WordPress without having to learn any code or spend thousands on developers. To see how easy it is, <a target="_blank" href="'.$headway_location.'" target="_blank">watch this demonstration</a>.</p>');
		?>
		<div class="affiliate-box">
				<a href="<?=$headway_location; ?>" <?=$window; ?>><img src="<?=plugins_url( 'images/'.$image.'.png' , __FILE__ ) ?>" alt="Headway Themes" class="headway-affiliate-box-image" style="display: inline; <?=$move; ?>" /></a>
				<!-- CONTENT -->
				<div class="affiliate-box-content"><?=$content; ?></div>
				</div>
	<?php }
	
	/**
	 * Register elements to be edited by the Headway Design Editor
	 **/

	function setup_elements() {
		$this->register_block_element(array(
			'id' => 'affiliate-box',
			'name' => 'Affiliate Box',
			'selector' => '.affiliate-box',
			'properties' => array('background', 'borders', 'padding', 'rounded-corners', 'box-shadow')
		));
		$this->register_block_element(array(
			'id' => 'affiliate-image',
			'name' => 'Affiliate Banner',
			'selector' => '.headway-affiliate-box-image',
			'properties' => array('background', 'borders', 'padding', 'rounded-corners', 'box-shadow')
		));		
		$this->register_block_element(array(
			'id' => 'affiliate-box-content',
			'name' => 'Affiliate Copy',
			'selector' => '.affiliate-box-content',
			'properties' => array('fonts')
		));
		$this->register_block_element(array(
			'id' => 'affiliate-box-content-h2',
			'name' => 'Affiliate Copy H2',
			'selector' => '.affiliate-box-content h2',
			'properties' => array('fonts', 'background', 'borders', 'padding', 'text-shadow')
		));	
		$this->register_block_element(array(
			'id' => 'affiliate-box-content-links',
			'name' => 'Affiliate Copy Links',
			'selector' => '.affiliate-box-content a',
			'properties' => array('fonts'),
			'states' => array(
				'Hover' => '.affiliate-box-content a:hover',
			)
		));		
	}
}
add_filter('headway_element_data_defaults', 'affiliate_block_add_default_design_settings');
function affiliate_block_add_default_design_settings($existing_defaults) {

	return array_merge($existing_defaults, affiliate_block_default_design_settings());

}
function affiliate_block_default_design_settings() {

	return array(
			'block-affiliate-affiliate-box' => array(
				'properties' => array(
					'padding-top' => 15,
					'padding-right' => 15,
					'padding-bottom' => 15,
					'padding-left' => 15,
					'margin-bottom' => 15,

					'background-color' => 'FBF5DA',

					'border-color' => 'EDE0A6',
					'border-style' => 'solid',
					'border-top-width' => 1,
					'border-right-width' => 1,
					'border-bottom-width' => 1,
					'border-left-width' => 1,

				)
			),			
			'block-affiliate-affiliate-box-content-h2' => array(
				'properties' => array(
					'line-height' => 120,
					'font-family' => 'arial',
					'font-size' => 20,
					'font-styling' => 'bold',
					'margin-bottom' => 15,
					'color' => 'DB4D19'
				)
			),
			'block-affiliate-affiliate-box-content' => array(
				'properties' => array(
					'line-height' => 150,
					'font-family' => 'arial',
					'font-size' => 14,
					'margin-bottom' => 10
				)
			),
			'block-affiliate-affiliate-box-content-links' => array(
				'properties' => array(
					'color' => 'DB4D19'
				)
			),
			'block-affiliate-affiliate-image' => array(
				'properties' => array(
					'margin-right' => 15,
					'margin-bottom' => 15
				)
			)
		);

}