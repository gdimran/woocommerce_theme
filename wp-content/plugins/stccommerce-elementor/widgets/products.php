<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

function stcCommerce_product_cat_list(){
	$term_id = 'product_cat';
    $categories = get_terms( $term_id );
 
    $cat_array['all'] = "All Categories";
    if ( !empty($categories) ) {
        foreach ( $categories as $cat ) {
            $cat_info = get_term($cat, $term_id);
            $cat_array[ $cat_info->slug ] = $cat_info->name;
        }
    }
 
    return $cat_array;
}


class STCommerce_Products_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'stCommerce-products';
	}

	public function get_title() {
		return __( 'STCommerce Products', 'plugin-name' );
	}

	public function get_icon() {
		return 'fa fa-shopping-cart';
	}

	
	public function get_categories() {
		return [ 'general' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Products', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'limit',
			[
				'label' => __( 'Count', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '4',
				
			]
		);
		$this->add_control(
			'columns',
			[
				'label' => __( 'Columns', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'1'  => __( '1 Column', 'plugin-domain' ),
					'2' => __( ' 2 Columns', 'plugin-domain' ),
					'3' => __( ' 3 Columns', 'plugin-domain' ),
					'4' => __( ' 4 Columns', 'plugin-domain' ),
				],
			]
		);

		$this->add_control(
			'category',
			[
				'label' => __( 'Select Category', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => stcCommerce_product_cat_list(),
				'default' => ['all'],
			]
		);

		$this->add_control(
            'carousel',
            [
                'label' => __( 'Enable Carousel?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'your-plugin' ),
                'label_off' => __( 'No', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        
		
		$this->end_controls_section();

		$this->start_controls_section(
            'setting_section',
            [
                'label' => __( 'Carousel Settings', 'plugin-name' ),
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
		
		if(empty($settings['category']) OR $settings['category'] == 'all') {
            $cats = '';
        } else {
            $cats = implode(',', $settings['category']);
		}
		
		

		if($settings['carousel'] == 'yes') {
            
			$dynamic_id = rand(89896,896698);
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

            echo '<script>
                jQuery(window).load(function(){
                    jQuery("#product-carousel-'.$dynamic_id.' .products").slick({
						slidesToShow: '.$settings['columns'].',
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
            </script><div id="product-carousel-'.$dynamic_id.'">';
        }

        echo do_shortcode('[products category="'.$cats.'" limit="'.$settings['limit'].'" columns="'.$settings['columns'].'"]');
        
        
        if($settings['carousel'] == 'yes') { echo '</div>'; }
		
	}

}
