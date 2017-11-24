<?php
/*
 * Groppe Theme Widgets
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if ( ! function_exists( 'groppe_vt_widget_init' ) ) {
	function groppe_vt_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

			// Main Widget Area
			register_sidebar(
				array(
					'name' => esc_html__( 'Main Widget Area', 'groppe' ),
					'id' => 'sidebar-1',
					'description' => esc_html__( 'Appears on posts and pages.', 'groppe' ),
					'before_widget' => '<aside id="%1$s" class="grop-side-widget %2$s">',
					'after_widget' => '</aside> <!-- end widget -->',
					'before_title' => '<h4 class="grop-side-widget-title">',
					'after_title' => '</h4>',
				)
			);
			// Main Widget Area
			
			// Shop Widget
			register_sidebar(
				array(
					'name' => esc_html__( 'Shop Widget', 'groppe' ),
					'id' => 'sidebar-shop',
					'description' => esc_html__( 'Appears on WooCommerce Pages.', 'groppe' ),
					'before_widget' => '<div id="%1$s" class="grop-side-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				)
			);
			// Shop Widget
			
			// Above Footer
			register_sidebar(
				array(
					'name' => esc_html__( 'Above Footer Widget', 'groppe' ),
					'id' => 'above-footer',
					'description' => esc_html__( 'Appears above the footer.', 'groppe' ),
					'before_widget' => '<div id="%1$s" class="grop-side-widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				)
			);

			// Footer Widgets
			$footer_widgets = cs_get_option( 'footer_widget_layout' );
	    if( $footer_widgets ) {

	      switch ( $footer_widgets ) {
	        case 5:
	        case 6:
	        case 7:
	          $length = 3;
	        break;

	        case 8:
	        case 9:
	          $length = 4;
	        break;

	        default:
	          $length = $footer_widgets;
	        break;
	      }

	      for( $i = 0; $i < $length; $i++ ) {

	        $num = ( $i+1 );

	        register_sidebar( array(
	          'id'            => 'footer-' . $num,
	          'name'          => esc_html__( 'Footer Widget ', 'groppe' ). $num,
	          'description'   => esc_html__( 'Appears on footer section.', 'groppe' ),
	          'before_widget' => '<div class="grop-ftr_sngl_widget %2$s">',
	          'after_widget'  => '<div class="clear"></div></div> <!-- end widget -->',
	          'before_title'  => '<h4 class="grop-ftr_widget_title">',
	          'after_title'   => '</h4>'
	        ) );

	      }

	    }
	    // Footer Widgets

			/* Custom Sidebar */
			$custom_sidebars = cs_get_option('custom_sidebar');
			if ($custom_sidebars) {
				foreach($custom_sidebars as $custom_sidebar) :
				$heading = $custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $custom_sidebar['sidebar_desc'];

				register_sidebar( array(
					'name' => esc_html($heading),
					'id' => $own_id,
					'description' => esc_html($desc),
					'before_widget' => '<aside id="%1$s" class="grop-side-widget %2$s">',
					'after_widget' => '</aside> <!-- end widget -->',
					'before_title' => '<h4 class="grop-side-widget-title">',
					'after_title' => '</h4>',
				) );
				endforeach;
			}
			/* Custom Sidebar */

		}
	}
	add_action( 'widgets_init', 'groppe_vt_widget_init' );
}