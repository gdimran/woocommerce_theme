<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class STCommerce_slider_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'stCommerce-slider';
	}

	public function get_title() {
		return __( 'STCommerce Slider', 'plugin-name' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	
	public function get_categories() {
		return [ 'general' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);



		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'Slider_title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slider_content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'show_label' => true,
			]
		);
		$repeater->add_control(
			'slider_desc', [
				'label' => __( 'Slider Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'slider_image', [
				'label' => __( 'Slider Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'slides',
			[
				'label' => __('Slides', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					'list_title' => __('Slide #1',  'plugin-domain'),
					'list_content' => __('Slider content  #1',  'plugin-domain'),
				]
				
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
            'setting_section',
            [
                'label' => __( 'Slider Settings', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);
		
		$this->add_control(
			'fade',
			[
				'label' => __('Fade effect?', 'plugin-domain'),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on'=>__('Yes', 'your-plugin'),
				'label_off'=>__('No', 'your-plugin'),
				'return_value' => 'Yes',
				'default' => 'no',
				'show_label' => true,
			]
		);
		$this->add_control(
			'loop',
			[
				'label' => __('Loop?', 'plugin-domain'),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on'=>__('Yes', 'your-plugin'),
				'label_off'=>__('No', 'your-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
		);
		$this->add_control(
			'arrows',
			[
				'label' => __('Show arrows?', 'plugin-domain'),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on'=>__('Show', 'your-plugin'),
				'label_off'=>__('Hide', 'your-plugin'),
				'return_value' => 'yes',
				'default' => 'no',
				'show_label' => true,
			]
		);
		$this->add_control(
			'dots',
			[
				'label' => __('Show dots?', 'plugin-domain'),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on'=>__('Show', 'your-plugin'),
				'label_off'=>__('Hide', 'your-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label' => __('Autoplay?', 'plugin-domain'),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on'=>__('Yes', 'your-plugin'),
				'label_off'=>__('No', 'your-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
		);
		$this->add_control(
			'autoplay_time',
			[
				'label' => __('Autoplay Time?', 'plugin-domain'),
				'type' => Elementor\Controls_Manager::TEXT,
				'default' => '5000',
                'condition' => [
                    'autoplay' => 'yes',
				],
				'show_label' => true,
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		if($settings['slides']){
			$dynamic_id= rand(78676, 967698);
			if(count($settings['slides'])>1){
				if($settings['fade']=='yes'){
					$fade = 'true';
				}else{
					$fade = 'false';
				}
				if($settings['arrows'] == 'yes') {
                    $arrows = 'true';
                } else {
                    $arrows = 'false';
                }
                if($settings['dots'] == 'yes') {
                    $dots = 'true';
                } else {
                    $dots = 'false';
                }
                if($settings['autoplay'] == 'yes') {
                    $autoplay = 'true';
                } else {
                    $autoplay = 'false';
                }
                if($settings['loop'] == 'yes') {
                    $loop = 'true';
                } else {
                    $loop = 'false';
                }
				echo '
				<script>
					jQuery(document).ready(function($) {
						$("#slides-'.$dynamic_id.'").slick({
							arrows: '.$arrows.',
							prevArrow: "<i class=\'fa fa-angle-left\'></i>",
							nextArrow: "<i class=\'fa fa-angle-right\'></i>",
							dots: '.$dots.',
							fade: '.$fade.',
							autoplay: '.$autoplay.',
							loop: '.$loop.',';

							if($autoplay == 'true') {
								echo 'autoplaySpeed: '.$settings['autoplay_time'].'';
							}
							

							echo '
						});
					});
				</script>
				
				';
			}
			echo '<div id="slides-'.$dynamic_id.'" class="slides">';
				foreach($settings['slides'] as $slide){
					echo '<div class="single-slide-item" style="background-image: url('.wp_get_attachment_image_url($slide['slider_image']['id'], 'large').');">
						<div class="row">
							<div class="col my-auto">
							'.wpautop($slide['slider_content']).'
							</div>
						</div>
						<div class="slider-info">
							<h4>'.$slide['Slider_title'].'</h4>
							'.$slide['slider_desc'].'
						</div>
					
					</div>';
				}
		
			echo '</div>';
		}
		

	}

}
