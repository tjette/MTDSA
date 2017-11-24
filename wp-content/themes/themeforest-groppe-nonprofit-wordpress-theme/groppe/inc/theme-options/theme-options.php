<?php
/*
 * All Theme Options for Groppe theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function groppe_vt_settings( $settings ) {

  $settings           = array(
    'menu_title'      => GROPPE_NAME . esc_html__(' Options', 'groppe'),
    'menu_slug'       => sanitize_title(GROPPE_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => GROPPE_NAME .' <small>V-'. GROPPE_VERSION .' by <a href="'. GROPPE_BRAND_URL .'" target="_blank">'. GROPPE_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'groppe_vt_settings' );

// Theme Framework Options
function groppe_vt_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'groppe'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => esc_html__('Logo', 'groppe'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Site Logo', 'groppe')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'groppe'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'groppe'),
            'add_title' => esc_html__('Add Logo', 'groppe'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina Logo', 'groppe'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'groppe'),
            'add_title' => esc_html__('Add Retina Logo', 'groppe'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'groppe'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'groppe'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'groppe'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'groppe'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Transparent Header', 'groppe')
          ),
          array(
            'id'    => 'transparent_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Transparent Logo', 'groppe'),
            'info'  => esc_html__('Upload your transparent header logo here. This logo is used in transparent header by enabled in each pages.', 'groppe'),
            'add_title' => esc_html__('Add Transparent Logo', 'groppe'),
          ),
          array(
            'id'    => 'transparent_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Transparent Retina Logo', 'groppe'),
            'info'  => esc_html__('Upload your transparent header retina logo here. This logo is used in transparent header by enabled in each pages.', 'groppe'),
            'add_title' => esc_html__('Add Transparent Retina Logo', 'groppe'),
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WordPress Admin Logo', 'groppe')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'groppe'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'groppe'),
            'add_title' => esc_html__('Add Login Logo', 'groppe'),
          ),
        ) // end: fields
      ), // end: section

      // brand logo tab
      array(
        'name'     => 'mobile_logo_title',
        'title'    => esc_html__('Mobile Logo', 'groppe'),
        'icon'     => 'fa fa-mobile',
        'fields'   => array(

          // Mobile Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Mobile Logo - If you not upload mobile logo as separatly here, then normal logo will place in that position.', 'groppe')
          ),
          array(
            'id'    => 'mobile_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Mobile Logo', 'groppe'),
            'info'  => esc_html__('Upload your mobile logo as retina size.', 'groppe'),
            'add_title' => esc_html__('Add Mobile Logo', 'groppe'),
          ),
          array(
            'id'          => 'mobile_logo_width',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Width', 'groppe'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_height',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Height', 'groppe'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'groppe'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'groppe'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'groppe'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'groppe'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'groppe'),
              'add_title' => esc_html__('Add Fav Icon', 'groppe'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'groppe'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'groppe'),
              'add_title' => esc_html__('Add iPhone Icon', 'groppe'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'groppe'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'groppe'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'groppe'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'groppe'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'groppe'),
              'add_title' => esc_html__('Add iPad Icon', 'groppe'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'groppe'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'groppe'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'groppe'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'groppe'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'groppe'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'        => 'theme_page_layout',
        'type'      => 'image_select',
        'options'   => array(
          'full-width'    => GROPPE_CS_IMAGES . '/page-1.png',
          'extra-width'   => GROPPE_CS_IMAGES . '/page-2.png',
          'left-sidebar'  => GROPPE_CS_IMAGES . '/page-3.png',
          'right-sidebar' => GROPPE_CS_IMAGES . '/page-4.png',
        ),
        'attributes' => array(
          'data-depend-id' => 'theme_page_layout',
        ),
        'default'    => 'full-width',
        'radio'      => false,
        'wrap_class' => 'text-center',
      ),
      array(
        'id'            => 'theme_sidebar_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'groppe'),
        'options'        => groppe_vt_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'groppe'),
        'dependency'   => array('theme_page_layout', 'any', 'left-sidebar,right-sidebar'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Background Options', 'groppe'),
      ),
      array(
        'id'             => 'theme_layout_bg_type',
        'type'           => 'select',
        'title'          => esc_html__('Background Type', 'groppe'),
        'options'        => array(
          'bg-image' => esc_html__('Image', 'groppe'),
          'bg-pattern' => esc_html__('Pattern', 'groppe'),
        ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_bg_pattern',
        'type'  => 'image_select',
        'title' => esc_html__('Background Pattern', 'groppe'),
        'info' => esc_html__('Select background pattern', 'groppe'),
        'options'      => array(
          'pattern-1'    => GROPPE_CS_IMAGES . '/pattern-1.png',
          'pattern-2'    => GROPPE_CS_IMAGES . '/pattern-2.png',
          'pattern-3'    => GROPPE_CS_IMAGES . '/pattern-3.png',
          'pattern-4'    => GROPPE_CS_IMAGES . '/pattern-4.png',
          'custom-pattern'  => GROPPE_CS_IMAGES . '/pattern-5.png',
        ),
        'default'      => 'pattern-1',
        'radio'      => true,
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-pattern' ),
      ),
      array(
        'id'      => 'custom_bg_pattern',
        'type'    => 'upload',
        'title'   => esc_html__('Custom Pattern', 'groppe'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type|theme_layout_bg_pattern_custom-pattern', '==|==|==', 'true|bg-pattern|true' ),
        'info' => __('Select your custom background pattern. <br />Note, background pattern image will be repeat in all x and y axis. So, please consider all repeatable area will perfectly fit your custom patterns.', 'groppe'),
      ),
      array(
        'id'      => 'theme_layout_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'groppe'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-image' ),
      ),
      array(
        'id'      => 'theme_bg_parallax',
        'type'    => 'switcher',
        'title'   => esc_html__('Parallax', 'groppe'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_parallax_speed',
        'type'    => 'text',
        'title'   => esc_html__('Parallax Speed', 'groppe'),
        'attributes' => array(
          'placeholder'     => '0.4',
        ),
        'dependency' => array( 'theme_layout_width_container|theme_bg_parallax', '==|!=', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_overlay_color',
        'type'    => 'color_picker',
        'title'   => esc_html__('Overlay Color', 'groppe'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
$contact_forms = array();
if ( $cf7 ) {
  foreach ( $cf7 as $cform ) {
    $contact_forms[ $cform->ID ] = $cform->post_title;
  }
} else {
  $contact_forms[ esc_html__( 'No contact forms found', 'groppe' ) ] = 0;
}
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'groppe'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'groppe'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          // Header Select
          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => esc_html__('Select Header Design', 'groppe'),
            'options'      => array(
              'style_one'   => GROPPE_CS_IMAGES .'/hs-1.png',
              'style_two'   => GROPPE_CS_IMAGES .'/hs-2.png',
              'style_three'   => GROPPE_CS_IMAGES .'/hs-3.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'        => true,
            'default'   => 'style_one',
            'info' => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'groppe'),
          ),
          array(
            'id'              => 'header_address_info',
            'title'           => esc_html__('Header Content', 'groppe'),
            'desc'            => esc_html__('Add your header content here. Example : Address Details', 'groppe'),
            'type'            => 'textarea',
            'shortcode'       => true,
            'dependency' => array('header_design', 'any', 'style_two,style_three'),
          ),
          array(
            'id'        => 'donate_btn_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Donate Button Type', 'groppe'),
            'options'   => array(
              'link'    => esc_html__( 'Simple Link', 'groppe' ),
              'popup'    => esc_html__( 'Pop-up', 'groppe' ),
            ),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'             => 'donate_button_text',
            'type'           => 'text',
            'title'          => esc_html__('Donate Button Text', 'groppe'),
            'info'          => esc_html__('Add button text for showing in main menu', 'groppe'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'             => 'donate_button_link',
            'type'           => 'text',
            'title'          => esc_html__('Donate Button URL', 'groppe'),
            'dependency' => array('header_design|donate_btn_type', '!=|==', 'default|link'),
          ),
          array(
            'id'        => 'pop_form_id',
            'type'      => 'select',
            'title'     => esc_html__('Choose Pop-up Form', 'groppe'),
            'options'   => $contact_forms,
            'dependency'   => array('donate_btn_type', '==', 'popup'),
          ),

          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Extra\'s', 'groppe'),
          ),
          array(
            'id'          => 'mobile_breakpoint',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Menu Starts from?', 'groppe'),
            'attributes'  => array( 'placeholder' => '767' ),
            'info' => esc_html__('Just put numeric value only. Like : 767. Don\'t use px or any other units.', 'groppe'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'groppe'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Search Icon', 'groppe'),
            'info' => esc_html__('Turn On if you want to show search icon in navigation bar.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'shopping_cart',
            'type'  => 'switcher',
            'title' => esc_html__('Shopping Cart', 'groppe'),
            'info' => esc_html__('Turn On if you want to show shopping cart icon in navigation bar.', 'groppe'),
            'default' => true,
          ),

        )
      ),

      // header top bar
      array(
        'name'     => 'header_top_bar_tab',
        'title'    => esc_html__('Top Bar', 'groppe'),
        'icon'     => 'fa fa-minus',
        'fields'   => array(

          array(
            'id'          => 'top_bar',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Top Bar', 'groppe'),
            'on_text'     => esc_html__('Yes', 'groppe'),
            'off_text'    => esc_html__('No', 'groppe'),
            'default'     => false,
          ),
          array(
            'id'          => 'top_left',
            'title'       => esc_html__('Top Left Block', 'groppe'),
            'desc'        => esc_html__('Top bar left block.', 'groppe'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'top_right',
            'title'       => esc_html__('Top Right Block', 'groppe'),
            'desc'        => esc_html__('Top bar right block.', 'groppe'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),

          array(
            'id'          => 'topbar_left_width',
            'type'        => 'text',
            'title'       => esc_html__('Top Left Width in %', 'groppe'),
            'attributes'  => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'topbar_right_width',
            'type'        => 'text',
            'title'       => esc_html__('Top Right Width in %', 'groppe'),
            'attributes'  => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('top_bar', '==', false),
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'groppe'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Title Area', 'groppe')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar', 'groppe'),
            'label'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'groppe'),
            'default'    => true,
          ),
          array(
            'id'             => 'title_bar_height',
            'type'           => 'select',
            'title'          => esc_html__('Title Area Height', 'groppe'),
            'options'        => array(
              'height-default' => esc_html__('Default Height', 'groppe'),
              'height-custom' => esc_html__('Custom Height', 'groppe'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'title_bar_custom_height',
            'type'           => 'text',
            'title'          => esc_html__('Custom Height', 'groppe'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_height', '==', 'height-custom' ),
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'groppe'),
            'options'        => array(
              'padding-none' => esc_html__('Default Spacing', 'groppe'),
              'padding-custom' => esc_html__('Custom Spaceing', 'groppe'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Top Space', 'groppe'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Bot Spacetom', 'groppe'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Background Options', 'groppe'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg',
            'type'    => 'background',
            'title'   => esc_html__('Background', 'groppe'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'groppe'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'groppe'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'groppe'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Footer Widget Block', 'groppe')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'groppe'),
            'info' => __('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'groppe'),
            'info' => esc_html__('Choose your footer widget layouts.', 'groppe'),
            'default' => 4,
            'options' => array(
              1   => GROPPE_CS_IMAGES . '/footer/footer-1.png',
              2   => GROPPE_CS_IMAGES . '/footer/footer-2.png',
              3   => GROPPE_CS_IMAGES . '/footer/footer-3.png',
              4   => GROPPE_CS_IMAGES . '/footer/footer-4.png',
              5   => GROPPE_CS_IMAGES . '/footer/footer-5.png',
              6   => GROPPE_CS_IMAGES . '/footer/footer-6.png',
              7   => GROPPE_CS_IMAGES . '/footer/footer-7.png',
              8   => GROPPE_CS_IMAGES . '/footer/footer-8.png',
              9   => GROPPE_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'groppe'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Copyright Layout', 'groppe'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Copyright Section', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Select Copyright Layout', 'groppe'),
            'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'groppe'),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => GROPPE_CS_IMAGES .'/footer/copyright-1.png',
              'copyright-2'    => GROPPE_CS_IMAGES .'/footer/copyright-2.png',
              'copyright-3'    => GROPPE_CS_IMAGES .'/footer/copyright-3.png',
              ),
            'radio'        => true,
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'groppe'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-vt-heading',
            'content' => esc_html__('Copyright Secondary Text', 'groppe'),
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Secondary Text', 'groppe'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'groppe'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'groppe'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'groppe'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => __('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'groppe'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'groppe'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'groppe'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'groppe'),
            'info'           => __('Enter css selectors like : <strong>body, .custom-class</strong>', 'groppe'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'groppe'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'groppe'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'groppe'),
        'accordion_title'     => esc_html__('New Typography', 'groppe'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'groppe'),
            'selector'        => 'body,.grop-silder_caption_text p,.grop-section_text p,.grop-ucoming_evnt_location,.grop-ucoming_evnt_time,.grop-prjct_tab_cont p,.grop-fetrd_cause_cont p,.grop-prlax_bcmvolnter_text p,.help_single_itm_warp p,.grop-news_single p,.grop-news_ps_date,.grop-news_pst_in,.grop-news_pst_commnt,.grop-ftr_sngl_widget .textwidget,.grop-ftr_sngl_widget ul li a,#grop-latest_tweets,#grop-latest_tweets a,#grop-latest_tweets .twt-date,.mc4wp-form-fields p,.grop-callout2_text p,.grop-dnatrsd_amount,.grop-stryabtus_pra_stg,.grop-stryabtustxt_warp p,.grop-h2bcme_vlnter_stn_txt,.grop-h2bcme_vlnter_cont p,.grop-suprtus_tday_txt p,.grop-suess_stris_single p,.grop-suess_stris_info h6,.grop-missions_txt p,.grop-suess_strisst2_txt p,.grop-vltrs_peple_intro_txt p,.grop-vltrs_peple_scil_title,.grop-vltrs_peple_promo_box p,.grop-testimonial_single p,.grop-tstimnl_intro p,.grop-grop-ndspnsr_box p,.grop-news_pst_cont p,.grop-hm-3sildcapst1_text p,.grop-hm-3sildcapst2_text p,.grop-cause_txts_content p:not(.grop-donation_stats),.grop-side-widget .grop-wigt_search_form input[type="search"],.grop-upcomt_wigt_txt .grop-upcomt_wigt-date,.grop-donate_txt_wigt p,.grop-cusigl_content p.grop-semi-txt,.grop-sigl_content p.grop-semi-txt,.grop-cusigl_content p.grop-box-txt,.grop-sigl_content p.grop-box-txt,.grop-cusigl_content p,.grop-sigl_content p,.grop-cusiglso_txt h4,.grop-siglso_txt h4,.grop-about_txt q,.grop-about_txt p,.grop-ab_msion_heading p,.grop-ab_msions_txt p,ul.grop-ab_msions_list li,.grop-ab_calut_txt p,.grop-tm_desc p,.grop-tmsl_txt_warp p,.grop-oimt_txt p,.grop-bv_txt p,.grop-bvlist_text p,.grop-callout3_cont p,.grop-ucoming_evnt_txt_cont p:not(.grop-ucoming_evnt_location),.grop-evensigl_content p,.grop-evensigl_content ol li,.grop-cgettouch_txt p,.grop-cgettouch_info .grop-cgettouch_locn,.grop-offic_locfull,.grop-offic_loc_txt p,.grop-contact_social p,.grop-post_meta,.grop-post_content p,.grop-post_comnt,.grop-pulrnws_wigt_warp .grop-pulrnws_date,.grop-sigl_content ol li,.author-content p,#comments.comments-area .grop-comments-meta span,#comments.comments-area .comment-content p,#comments.comments-area #respond #commentform .grop-form-inputs input,#comments.comments-area #respond #commentform .grop-form-textarea textarea,.grop-projct_content_warp p,.grop-pjctsigle_content p,.grop-prjctinfo_box h5,.woocommerce ul.products li.product .price,.woocommerce ul.products li.product .price del,.woocommerce ul.products li.product .price ins,.woocommerce ul.cart_list li img del,.woocommerce ul.cart_list li img ins,.woocommerce ul.product_list_widget li del,.woocommerce ul.product_list_widget li ins,.woocommerce .entry-summary .woocommerce-review-link,.woocommerce div.product p.price,.woocommerce div.product span.price,[itemprop="description"] p,.woocommerce .entry-summary .product_meta span,.woocommerce #reviews #comments ol.commentlist li .comment-text .description p,.woocommerce-Tabs-panel--description p,.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta > time,.woocommerce form.login > p,.woocommerce table.shop_table td,.woocommerce-checkout #payment div.payment_box,.grop-hm-4cap_btxt p,.grop-hm4ab_desc p,.grop-hm4srv_txt p,.grop-pww_txt p,.grop-faq-body,.grop-faq-body p,.grop-hadrsrch_form input[type="search"],.grop-txt-blck',
            'font'            => array(
              'family'        => 'Arvo',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'groppe'),
            'selector'        => '#grop-mainmenu > li> a',
            'font'            => array(
              'family'        => 'Roboto',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'groppe'),
            'selector'        => '#grop-mainmenu ul.sub-menu li a',
            'font'            => array(
              'family'        => 'Roboto',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Primary Font', 'groppe'),
            'selector'        => 'body .grop-hm-3sildcapst3_text p,body .grop-oic_txt,body [class*="grop-input-col-"] input,body [class*="grop-input-col-"] select,body .grop-callout3_cont h2,body .grop-resform_footr,body .grop-faqp-title,body .grop-header_info > ul li,body .grop-header_info > ul a,body h4.grop-cause_title,body .grop-donation_stats,body .grop-cause_time,body .grop-cause_remor_btn,body .grop-prlax_captn_text p,body h4.grop-ucoming_evnt_title,body .grop-prjct_nav_tabs li a,body .grop-prjct_tab_title,body .grop-prjct_tab_title a,body .grop-fetrd_cause_cont .grop-fetrd_cause_title,body .grop-fetrd_cause_cont .grop-fetrd_cause_title a,body .grop-fetrdcs_dnt_stats,body .grop-counter_cont p,body .help_single_itm_warp h4,body .help_single_itm_warp h4 a,body h4.grop-news_ps_title,body .grop-copyright,body .grop-caudetai_title,body .grop-dnatrsd_name,body .grop-stryabtus_box_txt h5,body .grop-suprtus_tday_txt h4,body .grop-suessrstr_name,body .grop-cntdwn_upevt_txt h5,body .grop-cntdwn_upevt_txt h4,body .grop-dont_sectors_txt .grop-dont_sectors_mta,body .grop-dont_sectors_txt .grop-dont_sectors_btn,body .grop-missions_txt h4,body .grop-suess_strisst2_pst_txt h4,body .grop-vltrs_peple_intro_txt h4,body .grop-vltpeple_prmo_btn,body .grop-tstimnl_intro .grop-tstimnl_prsn-title,body #grop_filters ul li,body .grop-posts-pagination-warp .page-numbers,body .woocommerce-pagination .page-numbers,body .grop-side-widget > ul li a,body .grop-upcomt_wigt_txt h5,body .grop-side-widget .tagcloud a,body .grop-cusigl_meta,body .grop-sigl_meta,body .grop-cusigl_dt-txt,body .grop-sigl_dt-txt,body .grop-urtcau_wigt_txt h5,body .grop-urtcau_wigt-date,body .grop-ab_msionrd_btn,body .grop-ab_msions_txt h4,body .grop-tm_intro h4,body .grop-tm_intro h6,body .grop-tmsl_conctinfo span,body .grop-grop-oimtrm_btn,body .grop-oic_singl_warp p,body [class*="grop-worldmap_"] .tooltip.top .tooltip-inner,body .grop-bvlist_text h4,body [class*="grop-input-col-"] label,body [class*="grop-input-col-"] input,body [class*="grop-input-col-"] textarea,body [class*="grop-input-col-"] select,body .grop-galry_cption,body .grop-cgettouch_info h4,body .grop-post_title,body .grop-pulrnws_wigt_warp h5,body .grop-sigl_content h4,body .author-content .author-name,body #comments.comments-area .grop-comments-meta h4,body #comments.comments-area a.comment-reply-link,body #comments.comments-area #respond #reply-title small a,body .grop-projct_content_warp h4,body .woocommerce-result-count,body .woocommerce .woocommerce-ordering select,body .woocommerce ul.products li.product h3,body .woocommerce ul.cart_list li a,body .woocommerce ul.product_list_widget li a,body .woocommerce .quantity .qty,body .woocommerce-tabs .panel > h2,body .woocommerce-Tabs-panel--description h2,body .woocommerce div.product .woocommerce-tabs .woocommerce-Reviews-title,body .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta > strong,body .woocommerce #reviews h3#reply-title,body .woocommerce #review_form #respond p[class*="comment-form"] > label,body .woocommerce table.shop_attributes th,body .woocommerce-error,body .woocommerce-info,body .woocommerce-message,body .woocommerce form .form-row label,body .lost_password,body .woocommerce table.shop_table td.product-name,body .woocommerce .woocommerce-checkout-payment label,body .woocommerce-page .woocommerce-checkout-payment label,body #add_payment_method #payment .payment_method_paypal .about_paypal,body .woocommerce-cart #payment .payment_method_paypal .about_paypal,body .woocommerce-checkout #payment .payment_method_paypal .about_paypal,body .woocommerce-cart .woocommerce table.shop_table th,body .woocommerce-cart .woocommerce table.shop_table .cart_item td.product-name,body .woocommerce-cart .woocommerce-shipping-calculator .shipping-calculator-button,body .grop-rsd_amn,body .grop-gal_amn,body .grop-chart_tolltip_list > div,body .grop-piechart_inrtxt h6,body .grop-piechart_inrtxt h5,body .grop-piechart_list li,body .grop-pww_btn,body .grop-faq-heading .panel-title,body .grop-header_style3 .grop-hsi2_txt h5,body .grop-header_style3 .grop-hsi2_txt h6,body .grop-callout_txt_warp p,body .grop-sigl_tags,body .wpcf7 input,body .wpcf7 textarea,body .wpcf7 select,body .grop-sigl_content,body #comments.comments-area .comment-content,body .grop-sigl_content h3,body .grop-sigl_content th,body #comments.comments-area .comment-content h4,body #comments.comments-area .comment-content h3,body #comments.comments-area .comment-content th,body .grop-sigl_content h5,body .grop-sigl_content h6,body #comments.comments-area .comment-content h5,body #comments.comments-area .comment-content h6,body ul.slimmenu li a,body .grop-btn,body .grop-knob,body .grop-donation_stats .grop-rasd_amount,body .grop-fetrdcs_dnt_stats .grop-rasd_amount,body .grop-caudetai_amunt,body .flip-clock-divider .flip-clock-label,body [class*="grop-sildcap_tag-"],body .grop-hm-3sildcapst3_btn,body .grop-cusigl_dtr_count,body .grop-sigl_dtr_count,body .grop-cusigl_title,body .grop-sigl_title,body .grop-cusigl_pager a,body .grop-sigl_pager a,body .grop-tmsl_conctinfo,body .grop-oimt_cption,body .grop-callout3_cont h2 span,body .grop-evensigl_tx,body .grop-evensigl_desc_warp h4,body .grop-float_left h5.grop-dtls_title,body .no-sidebar h5.grop-dtls_title,body .grop-float_left .grop-dtl h5,body .no-sidebar .grop-dtl h5,body .grop-evensigl_map h4,body .grop-gm-text,body #comments.comments-area #respond #commentform .form-submit .submit,body .grop-pjctsigle_title,body .grop-prjctinfo_box h6,body .grop-pjdnatrsd_area > h3,body .woocommerce span.onsale,body .woocommerce #respond input#submit,body .woocommerce a.button,body .woocommerce button.button,body .woocommerce input.button,body .woocommerce div.product .product_title,body .woocommerce div.product .woocommerce-tabs ul.tabs li a,body .woocommerce table.shop_table th,body .grop-hsi2_txt h6,body .grop-hsi2_txt h5,body .grop-rsd_amn span,body .grop-gal_amn span,body .grop-hm4srv_txt h4,body .grop-faqp-title span,body .grop-404_txt h2,body .grop-sigltags_warp > span,body .grop-sigl_content h1,body .grop-sigl_content h2,body #comments.comments-area .comment-content h1,body #comments.comments-area .comment-content h2,body .grop-sigl_content .post-password-form input[type="submit"],body #comments.comments-area .comment-content .post-password-form input[type="submit"],body .grop-cause_donate_btn,body .grop-vltrs_peple_intro,body .grop-causelist_donate_btn,body .grop-tmsl_intro,body .grop-evensiglre_btn,body .grop-confrm_sigl .grop-btn_submit,body .wpcf7 input[type="submit"],body .wpcf7 button[type="submit"],body .grop-offic_loc,body .grop-404_btn,body .tribe-events-list-widget-events h4.tribe-event-title a,body .submit-form .give-submit.give-btn,body .donation-form-wrap h2,body .donation-form-wrap legend.give-payment-mode-label, body .grop-float_left .grop-evensigl_content h4, .woocommerce ul.products li.product .woocommerce-loop-product__title',
            'font'            => array(
              'family'        => 'Roboto',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Secondary Font', 'groppe'),
            'selector'        => 'body .grop-hm4_promo,body .grop-404_txt h1,body .grop-sildcap_title,body .grop-big_link,body .grop-section_text [class*="grop-sctn_title_"],body .grop-prlax_captn_text h2,body .grop-ucoming_evnt_date,body .grop-ucoming_evnt_tp_cont > h3,body .grop-counter_cont h2,body .grop-prlax_bcmvolnter_text h2,body .grop-news_single h2,body .grop-ftr_widget_title,body .grop-hm-2sildcap_text .grop-sildcap_title,body .grop-styl-2sildcap_text .grop-sildcap_title,body .grop-callout2_text h3,body .grop-dnatrss_sec_title,body .grop-stryabtus_title,body .grop-stryabtus_counter,body .grop-h2bcme_vlnter_title,body .grop-h2prlax_callout_text h2,body .grop-sussstris_sec-title,body .flip-clock-wrapper,body .flip-clock-wrapper .flip,body .flip-clock-wrapper .flip li,body .flip-clock-wrapper .flip li a,body .flip-clock-wrapper .flip li div,body .grop-suess_strisst2_txt h2,body .grop-vltrs_peple_promo_box h2,body .grop-grop-ndspnsr_box h2,body .grop-hm3callout_txt,body .grop-page_title,body .grop-side-widget-title,body .grop-donate_txt_wigt h4,body .grop-rtdcaus-title,body .grop-about_txt h3,body .grop-ab_msion_heading h3,body .grop-ab_calut_txt h3,body .grop-tm_desc h3,body .grop-tmsl_title,body .grop-oimt_txt h3,body .grop-oic_singl_warp h2,body .grop-bv_txt h3,body .grop-form_title,body .grop-evnt_list_item .grop-evnt_list_date span.grop-evnt_d,body .grop-evnt_list_item .grop-evnt_list_date span.grop-evnt_m-y,body .grop-resform_headr,body .grop-cgettouch_txt h3,body .grop-offic_loc_txt h2,body .grop-contact_social h3,body #comments.comments-area .comments-title,body #comments.comments-area #respond #reply-title,body .grop-rtdpjct-title,body .grop-page-title,body .related.products,body .woocommerce-billing-fields > h3,body #ship-to-different-address label,body #order_review_heading,body .woocommerce .cart-collaterals .cart_totals > h2,body .woocommerce-page .cart-collaterals .cart_totals > h2,body .woocommerce-account .woocommerce h2,body .woocommerce-account .woocommerce h3,body .woocommerce-account .woocommerce h4,body .grop-hm-4cap_btxt h3,body .grop-hm4ab_desc h2,body .grop-pww_txt h2,body .wpcf7 .grop-file-upload .grop-file-btn,body h4.widget-title,body .related.products h2',
            'font'            => array(
              'family'        => 'Dosis',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Content Headings Typography', 'groppe'),
            'selector'        => '.grop-float_left h1,.grop-float_left h2,.grop-float_left h3,.grop-float_left h4,.grop-float_left h5,.grop-float_left h6,.grop-float_left h1,.grop-float_left h2,.grop-float_left h3,.grop-float_left h4,.grop-float_left h5,.grop-float_left h6,.no-sidebar h1,.no-sidebar h2,.no-sidebar h3, .no-sidebar h4,.no-sidebar h5,.no-sidebar h6,.text-logo,.grop-page_title, h1.grop-txt-blck,h2.grop-txt-blck,h3.grop-txt-blck,h4.grop-txt-blck, h5.grop-txt-blck,h6.grop-txt-blck',
            'font'            => array(
              'family'        => 'Dosis',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Sidebar Headings Typography', 'groppe'),
            'selector'        => '.grop-side-widget-title,.grop-page-rgt_sidebar h1,.grop-page-rgt_sidebar h2,.grop-page-rgt_sidebar h3,.grop-page-rgt_sidebar h4,.grop-page-rgt_sidebar h5,.grop-page-rgt_sidebar h6',
            'font'            => array(
              'family'        => 'Dosis',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Footer Headings Typography', 'groppe'),
            'selector'        => '.grop-ftr_widget_title,.grop-footer_widgets h1,.grop-footer_widgets h2,.grop-footer_widgets h3,.grop-footer_widgets h4,.grop-footer_widgets h5,.grop-footer_widgets h6',
            'font'            => array(
              'family'        => 'Dosis',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Example Usage', 'groppe'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Roboto',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'groppe'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'groppe'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'groppe'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Project Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'project_section',
    'title'    => esc_html__('Project', 'groppe'),
    'icon'     => 'fa fa-briefcase',
    'fields' => array(

      // project name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Name Change', 'groppe')
      ),
      array(
        'id'      => 'theme_project_name',
        'type'    => 'text',
        'title'   => esc_html__('Project Name', 'groppe'),
        'attributes'     => array(
          'placeholder'  => 'Project'
        ),
      ),
      array(
        'id'      => 'theme_project_slug',
        'type'    => 'text',
        'title'   => esc_html__('Project Slug', 'groppe'),
        'attributes'     => array(
          'placeholder'  => 'project-item'
        ),
      ),
      array(
        'id'      => 'theme_project_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Project Category Slug', 'groppe'),
        'attributes'     => array(
          'placeholder'  => 'project-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => __('<strong>Important</strong>: Please do not set project slug and page slug as same. It\'ll not work.', 'groppe')
      ),
      // Project Name
      array(
        'id'      => 'project_limit',
        'type'    => 'text',
        'title'   => esc_html__('Project limit', 'groppe'),
        'info'   => esc_html__('Enter the number of items to show.', 'groppe'),
      ),
      array(
        'id'          => 'project_column',
        'title'       => esc_html__('Project Column', 'groppe'),
        'desc'        => esc_html__('Select project column', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'bpw-col-2' => esc_html__('Column Two', 'groppe'),
          'bpw-col-3' => esc_html__('Column Three', 'groppe'),
          'bpw-col-4' => esc_html__('Column Four', 'groppe'),
        ),
      ),
      array(
        'id'          => 'project_order',
        'title'       => esc_html__('Project Order', 'groppe'),
        'desc'        => esc_html__('Select project order', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'ASC' => esc_html__('Ascending', 'groppe'),
          'DESC' => esc_html__('Decending', 'groppe'),
        ),
      ),
      array(
        'id'          => 'project_orderby',
        'title'       => esc_html__('Project Orderby', 'groppe'),
        'desc'        => esc_html__('Select project orderby', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'groppe'),
          'id' => esc_html__('ID', 'groppe'),
          'author' => esc_html__('Author', 'groppe'),
          'title' => esc_html__('Title', 'groppe'),
          'date' => esc_html__('Date', 'groppe'),
        ),
      ),
      array(
        'id'      => 'project_read_more_txt',
        'type'    => 'text',
        'title'   => esc_html__('Project Read More Button Text', 'groppe'),
        'info'   => esc_html__('Enter read more button text.', 'groppe'),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'groppe')
      ),
      array(
        'id'      => 'project_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'groppe'),
        'label'   => esc_html__('If you need pagination in project pages, please turn this ON.', 'groppe'),
        'default'   => true,
      ),
      array(
        'id'      => 'project_filter',
        'type'    => 'switcher',
        'title'   => esc_html__('Project Filter', 'groppe'),
        'label'   => esc_html__('If you need project filter in project pages, please turn this ON.', 'groppe'),
        'default'   => true,
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Project', 'groppe')
      ),
      array(
        'id'      => 'project_single_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Next & Prev Navigation', 'groppe'),
        'label'   => esc_html__('If you don\'t want next and previous navigation in project single pages, please turn this OFF.', 'groppe'),
        'default'   => true,
      ),
      array(
        'id'             => 'project_single_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'groppe'),
        'options'        => array(
          'sidebar-right' => esc_html__('Right', 'groppe'),
          'sidebar-left' => esc_html__('Left', 'groppe'),
          'sidebar-hide' => esc_html__('Hide', 'groppe'),
        ),
        'default_option' => 'Select sidebar position',
        'info'          => esc_html__('Default option : Right', 'groppe'),
      ),
      array(
        'id'             => 'project_single_blog_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'groppe'),
        'options'        => groppe_vt_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'groppe'),
        'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Main Widget Area', 'groppe'),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Related Projects Section', 'groppe')
      ),
      array(
        'id'      => 'project_related_post',
        'type'    => 'switcher',
        'title'   => esc_html__('Related Projects', 'groppe'),
        'label'   => esc_html__('If you don\'t want related projects in project single pages, please turn this OFF.', 'groppe'),
        'default'   => true,
      ),
      array(
        'id'      => 'related_project_title',
        'type'    => 'text',
        'title'   => esc_html__('Related Projects Title', 'groppe'),
        'info'   => esc_html__('Enter the title of related projects section.', 'groppe'),
        'dependency'     => array('project_related_post', '==', 'true'),
      ),
      array(
        'id'      => 'related_project_limit',
        'type'    => 'text',
        'title'   => esc_html__('Project limit', 'groppe'),
        'info'   => esc_html__('Enter the number of items to show.', 'groppe'),
        'dependency'     => array('project_related_post', '==', 'true'),
      ),
      array(
        'id'          => 'related_project_order',
        'title'       => esc_html__('Project Order', 'groppe'),
        'desc'        => esc_html__('Select project order', 'groppe'),
        'type'        => 'select',
        'dependency'     => array('project_related_post', '==', 'true'),
        'options'        => array(
          'ASC' => esc_html__('Ascending', 'groppe'),
          'DESC' => esc_html__('Decending', 'groppe'),
        ),
      ),
      array(
        'id'          => 'related_project_orderby',
        'title'       => esc_html__('Project Orderby', 'groppe'),
        'desc'        => esc_html__('Select project orderby', 'groppe'),
        'type'        => 'select',
        'dependency'     => array('project_related_post', '==', 'true'),
        'options'        => array(
          'None' => esc_html__('None', 'groppe'),
          'id' => esc_html__('ID', 'groppe'),
          'author' => esc_html__('Author', 'groppe'),
          'title' => esc_html__('Title', 'groppe'),
          'date' => esc_html__('Date', 'groppe'),
        ),
      ),
      // Project Listing

    ),
  );

  // ------------------------------
  // Team Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'team_section',
    'title'    => esc_html__('Team', 'groppe'),
    'icon'     => 'fa fa-users',
    'fields' => array(
      array(
        'id'          => 'team_style',
        'title'       => esc_html__('Team Style', 'groppe'),
        'desc'        => esc_html__('Select Team style', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'basic' => esc_html__('Basic', 'groppe'),
          'standard' => esc_html__('Standard', 'groppe'),
        ),
      ),
      array(
        'id'      => 'team_limit',
        'type'    => 'text',
        'title'   => esc_html__('Team limit', 'groppe'),
        'info'   => esc_html__('Enter the number of items to show.', 'groppe'),
      ),
      array(
        'id'          => 'team_column',
        'title'       => esc_html__('Team Column', 'groppe'),
        'desc'        => esc_html__('Select Team column', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'col-3' => esc_html__('Column Three', 'groppe'),
          'col-4' => esc_html__('Column Four', 'groppe'),
          'col-5' => esc_html__('Column Five', 'groppe'),
        ),
        'dependency'     => array('team_style', '==', 'basic'),
      ),
      array(
        'id'          => 'team_order',
        'title'       => esc_html__('Team Order', 'groppe'),
        'desc'        => esc_html__('Select Team order', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'ASC' => esc_html__('Ascending', 'groppe'),
          'DESC' => esc_html__('Decending', 'groppe'),
        ),
      ),
      array(
        'id'          => 'team_orderby',
        'title'       => esc_html__('Team Orderby', 'groppe'),
        'desc'        => esc_html__('Select Team orderby', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'groppe'),
          'id' => esc_html__('ID', 'groppe'),
          'author' => esc_html__('Author', 'groppe'),
          'title' => esc_html__('Title', 'groppe'),
          'date' => esc_html__('Date', 'groppe'),
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'groppe')
      ),
      array(
        'id'      => 'team_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'groppe'),
        'label'   => esc_html__('If you need pagination in Team pages, please turn this ON.', 'groppe'),
        'default'   => true,
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Team Single', 'groppe')
      ),
      array(
        'id'      => 'team_callout_btn_text',
        'type'    => 'text',
        'title'   => esc_html__('Callout Button Text', 'groppe'),
      ),
      array(
        'id'      => 'team_callout_btn_url',
        'type'    => 'text',
        'title'   => esc_html__('Callout Button URL', 'groppe'),
        'attributes'     => array(
          'placeholder'  => 'http://'
        ),
      ),
      array(
        'id'    => 'call_action_icon',
        'type'  => 'image',
        'title' => esc_html__('Team Call-Action Icon', 'groppe'),
        'add_title' => esc_html__('Add Icon', 'groppe'),
      ),
      array(
        'id'          => 'team_call_action',
        'type'        => 'textarea',
        'title'       => esc_html__('Single Call-Action Content', 'groppe'),
      ),
      // Team End

    ),
  );

  // ------------------------------
  // Gallery Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'gallery_section',
    'title'    => esc_html__('Gallery', 'groppe'),
    'icon'     => 'fa fa-users',
    'fields' => array(
      array(
        'id'          => 'gallery_style',
        'title'       => esc_html__('Gallery Style', 'groppe'),
        'desc'        => esc_html__('Select Gallery style', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'without_caption' => esc_html__('Without Caption', 'groppe'),
          'with_caption' => esc_html__('With Caption', 'groppe'),
        ),
      ),
      array(
        'id'      => 'gallery_limit',
        'type'    => 'text',
        'title'   => esc_html__('Gallery limit', 'groppe'),
        'info'   => esc_html__('Enter the number of items to show.', 'groppe'),
      ),
      array(
        'id'          => 'gallery_column',
        'title'       => esc_html__('Gallery Column', 'groppe'),
        'desc'        => esc_html__('Select Gallery column', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'grop-galry_col-2' => esc_html__('Column Two', 'groppe'),
          'grop-galry_col-3' => esc_html__('Column Three', 'groppe'),
          'grop-galry_col-4' => esc_html__('Column Four', 'groppe'),
        ),
      ),
      array(
        'id'          => 'gallery_order',
        'title'       => esc_html__('Gallery Order', 'groppe'),
        'desc'        => esc_html__('Select Gallery order', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'ASC' => esc_html__('Ascending', 'groppe'),
          'DESC' => esc_html__('Decending', 'groppe'),
        ),
      ),
      array(
        'id'          => 'gallery_orderby',
        'title'       => esc_html__('Gallery Orderby', 'groppe'),
        'desc'        => esc_html__('Select Gallery orderby', 'groppe'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'groppe'),
          'id' => esc_html__('ID', 'groppe'),
          'author' => esc_html__('Author', 'groppe'),
          'title' => esc_html__('Title', 'groppe'),
          'date' => esc_html__('Date', 'groppe'),
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'groppe')
      ),
      array(
        'id'      => 'gallery_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'groppe'),
        'label'   => esc_html__('If you need pagination in Gallery pages, please turn this ON.', 'groppe'),
        'default'   => true,
      ),
      array(
        'id'      => 'gallery_filter',
        'type'    => 'switcher',
        'title'   => esc_html__('Gallery Filter', 'groppe'),
        'label'   => esc_html__('If you need filter in Gallery pages, please turn this ON.', 'groppe'),
        'default'   => true,
      ),
      // Gallery End

    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'groppe'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'groppe'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Layout', 'groppe')
          ),
          array(
            'id'             => 'blog_listing_style',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Style', 'groppe'),
            'options'        => array(
              'style-one' => esc_html__('List (Default)', 'groppe'),
              'style-two' => esc_html__('Grid', 'groppe'),
            ),
            'default_option' => 'Select blog style',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author. If this settings will not apply your blog page, please set that page as a post page in Settings > Readings.', 'groppe'),
          ),
          array(
            'id'             => 'blog_listing_columns',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Columns', 'groppe'),
            'options'        => array(
              'column-one' => esc_html__('Column One', 'groppe'),
              'column-two' => esc_html__('Column Two', 'groppe'),
              'column-three' => esc_html__('Column Three', 'groppe'),
              'column-four' => esc_html__('Column Four', 'groppe'),
              'column-five' => esc_html__('Column Five', 'groppe'),
            ),
            'default_option' => 'Select blog column',
            'dependency'     => array('blog_listing_style', 'any', 'style-two'),
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'groppe'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'groppe'),
              'sidebar-left' => esc_html__('Left', 'groppe'),
              'sidebar-hide' => esc_html__('Hide', 'groppe'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'groppe'),
            'info'          => esc_html__('Default option : Right', 'groppe'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'groppe'),
            'options'        => groppe_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'groppe'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'groppe'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'groppe')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'groppe'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'groppe'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'groppe'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'groppe'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'groppe'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'groppe'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'groppe'),
              'date'    => esc_html__('Date', 'groppe'),
              'author'     => esc_html__('Author', 'groppe'),
              'comments'      => esc_html__('Comments', 'groppe'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'groppe'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'groppe')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'groppe'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'groppe'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'groppe'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'single_post_pagination',
            'type'  => 'switcher',
            'title' => esc_html__('Pagination', 'groppe'),
            'info' => esc_html__('If need to hide pagination option on single blog page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'groppe')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'groppe'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'groppe'),
              'sidebar-left' => esc_html__('Left', 'groppe'),
              'sidebar-hide' => esc_html__('Hide', 'groppe'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'groppe'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'groppe'),
            'options'        => groppe_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'groppe'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'groppe'),
          ),
          // End fields

        )
      ),

    ),
  );

  // ------------------------------
  // Causes Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'donation_section',
    'title'    => esc_html__('Donation', 'groppe'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'causes_general_tab',
        'title'    => esc_html__('General', 'groppe'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'groppe')
          ),
          array(
            'id'          => 'donation_style',
            'title'       => esc_html__('Donation Style', 'groppe'),
            'desc'        => esc_html__('Select Donation style', 'groppe'),
            'type'        => 'select',
            'options'        => array(
              'causes-list' => esc_html__('List', 'groppe'),
              'causes-grid' => esc_html__('Grid', 'groppe'),
            ),
          ),
          array(
            'id'      => 'theme_causes_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'groppe'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'groppe'),
            'default' => '55',
          ),
          array(
            'id'      => 'donation_limit',
            'type'    => 'text',
            'title'   => esc_html__('Donation limit', 'groppe'),
            'info'   => esc_html__('Enter the number of items to show.', 'groppe'),
          ),
          array(
            'id'          => 'donation_column',
            'title'       => esc_html__('Donation Column', 'groppe'),
            'desc'        => esc_html__('Select Donation column', 'groppe'),
            'type'        => 'select',
            'dependency'     => array('donation_style', '==', 'causes-grid'),
            'options'        => array(
              'bpw-col-2' => esc_html__('Column Two', 'groppe'),
              'bpw-col-3' => esc_html__('Column Three', 'groppe'),
              'bpw-col-4' => esc_html__('Column Four', 'groppe'),
            ),
          ),
          array(
            'id'          => 'donation_order',
            'title'       => esc_html__('Donation Order', 'groppe'),
            'desc'        => esc_html__('Select Donation order', 'groppe'),
            'type'        => 'select',
            'options'        => array(
              'ASC' => esc_html__('Ascending', 'groppe'),
              'DESC' => esc_html__('Decending', 'groppe'),
            ),
          ),
          array(
            'id'          => 'donation_orderby',
            'title'       => esc_html__('Donation Orderby', 'groppe'),
            'desc'        => esc_html__('Select Donation orderby', 'groppe'),
            'type'        => 'select',
            'options'        => array(
              'None' => esc_html__('None', 'groppe'),
              'id' => esc_html__('ID', 'groppe'),
              'author' => esc_html__('Author', 'groppe'),
              'title' => esc_html__('Title', 'groppe'),
              'date' => esc_html__('Date', 'groppe'),
            ),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable/Disable Options', 'groppe')
          ),
          array(
            'id'      => 'donation_pagination',
            'type'    => 'switcher',
            'title'   => esc_html__('Pagination', 'groppe'),
            'label'   => esc_html__('If you need pagination in Donation pages, please turn this ON.', 'groppe'),
            'default'   => true,
          ),
          array(
            'id'      => 'donation_filter',
            'type'    => 'switcher',
            'title'   => esc_html__('Donation Filter', 'groppe'),
            'label'   => esc_html__('If you need Donation filter in Project pages, please turn this ON.', 'groppe'),
            'default'   => true,
            'dependency'     => array('donation_style', '==', 'causes-grid'),
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'causes_single_tab',
        'title'    => esc_html__('Single', 'groppe'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'groppe')
          ),
          array(
            'id'    => 'causes_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'groppe'),
            'info' => esc_html__('If need to hide featured image from single causes post page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'causes_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'groppe'),
            'info' => esc_html__('If need to hide share option on single causes page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'causes_post_pagination',
            'type'  => 'switcher',
            'title' => esc_html__('Pagination', 'groppe'),
            'info' => esc_html__('If need to hide pagination option on single causes page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'groppe')
          ),
          array(
            'id'             => 'causes_single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'groppe'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'groppe'),
              'sidebar-left' => esc_html__('Left', 'groppe'),
              'sidebar-hide' => esc_html__('Hide', 'groppe'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'groppe'),
          ),
          array(
            'id'             => 'single_causes_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'groppe'),
            'options'        => groppe_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'groppe'),
            'dependency'     => array('causes_single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'groppe'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Related Causes Section', 'groppe')
          ),
          array(
            'id'    => 'causes_related_post',
            'type'  => 'switcher',
            'title' => esc_html__('Related Post Area', 'groppe'),
            'info' => esc_html__('If need to hide related post area on single causes page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'      => 'related_causes_title',
            'type'    => 'text',
            'title'   => esc_html__('Related Causes Title', 'groppe'),
            'dependency'     => array('causes_related_post', '==', 'true'),
            'info'   => esc_html__('Enter the title of related causes section.', 'groppe'),
          ),
          array(
            'id'      => 'related_causes_limit',
            'type'    => 'text',
            'title'   => esc_html__('Causes limit', 'groppe'),
            'dependency'     => array('causes_related_post', '==', 'true'),
            'info'   => esc_html__('Enter the number of items to show.', 'groppe'),
          ),
          array(
            'id'          => 'related_causes_order',
            'title'       => esc_html__('Causes Order', 'groppe'),
            'desc'        => esc_html__('Select causes order', 'groppe'),
            'type'        => 'select',
            'dependency'     => array('causes_related_post', '==', 'true'),
            'options'        => array(
              'ASC' => esc_html__('Ascending', 'groppe'),
              'DESC' => esc_html__('Decending', 'groppe'),
            ),
          ),
          array(
            'id'          => 'related_causes_orderby',
            'title'       => esc_html__('Causes Orderby', 'groppe'),
            'desc'        => esc_html__('Select causes orderby', 'groppe'),
            'type'        => 'select',
            'dependency'     => array('causes_related_post', '==', 'true'),
            'options'        => array(
              'None' => esc_html__('None', 'groppe'),
              'id' => esc_html__('ID', 'groppe'),
              'author' => esc_html__('Author', 'groppe'),
              'title' => esc_html__('Title', 'groppe'),
              'date' => esc_html__('Date', 'groppe'),
            ),
          ),
          // End fields
        )
      ),

    ),
  );

  // ------------------------------
  // Event Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'event_section',
    'title'    => esc_html__('Event', 'groppe'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'event_general_tab',
        'title'    => esc_html__('General', 'groppe'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'groppe')
          ),
          array(
            'id'        => 'event_styles',
            'type'      => 'select',
            'title'     => esc_html__('Choose Event STyle', 'groppe'),
            'options'   => array(
              'default'    => esc_html__( 'Default', 'groppe' ),
              'style_one'    => esc_html__( 'Style One', 'groppe' ),
              'style_two'    => esc_html__( 'Style Two', 'groppe' ),
            ),
          ),
          array(
            'id'    => 'event_pagination',
            'type'  => 'switcher',
            'title' => esc_html__('Pagination', 'groppe'),
            'info' => esc_html__('If need to hide pagination on event page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'      => 'theme_event_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'groppe'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'groppe'),
            'default' => '55',
            'dependency'   => array('event_styles', '==', 'style_two'),
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'event_single_tab',
        'title'    => esc_html__('Single', 'groppe'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(
          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'groppe')
          ),
          array(
            'id'    => 'event_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'groppe'),
            'info' => esc_html__('If need to hide featured image from single event post page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'event_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'groppe'),
            'info' => esc_html__('If need to hide share option on single event page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'    => 'event_post_pagination',
            'type'  => 'switcher',
            'title' => esc_html__('Pagination', 'groppe'),
            'info' => esc_html__('If need to hide pagination option on single event page, please turn this OFF.', 'groppe'),
            'default' => true,
          ),
          array(
            'id'             => 'single_event_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'groppe'),
            'options'        => groppe_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'groppe'),
            'info'          => esc_html__('Default option : Main Widget Area', 'groppe'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Register/Contact Button Type', 'groppe')
          ),
          array(
            'id'    => 'popup_btn',
            'type'  => 'switcher',
            'title' => esc_html__('Include Contact/Register Button', 'groppe'),
          ),
          array(
            'id'        => 'contact_btn_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Contact Button Type', 'groppe'),
            'options'   => array(
              'link'    => esc_html__( 'Simple Link', 'groppe' ),
              'popup'    => esc_html__( 'Pop-up', 'groppe' ),
            ),
            'dependency'   => array('popup_btn', '==', 'true'),
          ),
          array(
            'id'      => 'contact_btn_link',
            'type'    => 'text',
            'title'    => esc_html__('Contact Button Link', 'groppe'),
            'dependency'   => array('popup_btn|contact_btn_type', '==|==', 'true|link'),
          ),
          array(
            'id'        => 'form_id',
            'type'      => 'select',
            'title'     => esc_html__('Choose Pop-up Form', 'groppe'),
            'options'   => $contact_forms,
            'dependency'   => array('popup_btn|contact_btn_type', '==|==', 'true|popup'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'groppe'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Layout', 'groppe')
      ),
      array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__('Product Column', 'groppe'),
        'options'        => array(
          3 => esc_html__('Three Column', 'groppe'),
          4 => esc_html__('Four Column', 'groppe'),
        ),
        'default_option' => esc_html__('Select Product Columns', 'groppe'),
        'help'          => esc_html__('This style will apply, default woocommerce listings pages. Like, shop and archive pages.', 'groppe'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'groppe'),
        'options'        => array(
          'right-sidebar' => esc_html__('Right', 'groppe'),
          'left-sidebar' => esc_html__('Left', 'groppe'),
          'sidebar-hide' => esc_html__('Hide', 'groppe'),
        ),
        'default_option' => esc_html__('Select sidebar position', 'groppe'),
        'info'          => esc_html__('Default option : Right', 'groppe'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'groppe'),
        'options'        => groppe_vt_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'groppe'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Shop Page', 'groppe'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Listing', 'groppe')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'groppe'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'groppe'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Product', 'groppe')
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Limit', 'groppe'),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like', 'groppe'),
        'info' => esc_html__('If you don\'t want \'You May Also Like\' products in single product page, please turn this ON.', 'groppe'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'groppe'),
        'info' => esc_html__('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'groppe'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'groppe'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'groppe'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_banner_bg',
            'type'  => 'image',
            'title' => esc_html__('Banner Background', 'groppe'),
            'info'  => esc_html__('Choose banner background styles.', 'groppe'),
            'add_title' => esc_html__('Add Banner Image', 'groppe'),
          ),
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'groppe'),
            'info'  => esc_html__('Enter 404 page heading.', 'groppe'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'groppe'),
            'info'  => esc_html__('Enter 404 page content.', 'groppe'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => esc_html__('404 Page Background', 'groppe'),
            'info'  => esc_html__('Choose 404 page background styles.', 'groppe'),
            'add_title' => esc_html__('Add 404 Image', 'groppe'),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'groppe'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'groppe'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'groppe'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'groppe')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'groppe'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'groppe'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'groppe'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'groppe'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'groppe'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'groppe'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'groppe'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'groppe'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'groppe'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'groppe'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'groppe'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'groppe'),
            'accordion_title' => esc_html__('New Sidebar', 'groppe'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'groppe'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom CSS', 'groppe')
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder' => esc_html__('Enter your CSS code here...', 'groppe'),
            ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'groppe')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'groppe'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'groppe'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Common Texts', 'groppe')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'groppe'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'groppe'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'groppe'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('Author Text', 'groppe'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'groppe'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WooCommerce', 'groppe')
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => esc_html__('Add to Cart Text', 'groppe'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Pagination', 'groppe')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'groppe'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'groppe'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // envato account
  // ------------------------------
  $options[]   = array(
    'name'     => 'envato_account_section',
    'title'    => esc_html__('Envato Account', 'groppe'),
    'icon'     => 'fa fa-link',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => esc_html__('Enter your Username and API key. You can get update our themes from WordPress admin itself.', 'groppe'),
      ),
      array(
        'id'      => 'themeforest_username',
        'type'    => 'text',
        'title'   => esc_html__('Envato Username', 'groppe'),
      ),
      array(
        'id'      => 'themeforest_api',
        'type'    => 'text',
        'title'   => esc_html__('Envato API Key', 'groppe'),
        'class'   => 'text-security',
        'after'   => __('<p>This is not a password field. Enter your Envato API key, which is located in : <strong>http://themeforest.net/user/[YOUR-USER-NAME]/api_keys/edit</strong></p>', 'groppe')
      ),

    )
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'groppe_vt_options' );