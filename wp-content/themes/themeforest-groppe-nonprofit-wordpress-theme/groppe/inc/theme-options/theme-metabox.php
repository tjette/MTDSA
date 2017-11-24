<?php
/*
 * All Metabox related options for Groppe theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function groppe_vt_metabox_options( $options ) {

  $options      = array();
  // -----------------------------------------
  // Project
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'project_options',
    'title'     => esc_html__('Project Options', 'groppe'),
    'post_type' => 'project',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'project_info_section',
        'icon'  => 'fa fa-address-card',
        'title' => esc_html__('Project Info', 'groppe'),
        'fields' => array(
          array(
            'id'                  => 'project_info',
            'title' => esc_html__('Project Information', 'groppe'),
            'type'                => 'group',
            'fields'              => array(
              array(
                'id'              => 'info_title',
                'type'            => 'text',
                'title'           => esc_html__('Info Title', 'groppe'),
              ),
              array(
                'id'              => 'info_desc',
                'type'            => 'text',
                'title'           => esc_html__('Info Description', 'groppe'),
              ),
              array(
                'id'              => 'info_icon',
                'type'            => 'image',
                'title'           => esc_html__('Info Icon', 'groppe'),
              ),
            ),
            'button_title'        => esc_html__('Add New', 'groppe'),
            'accordion_title'     => esc_html__('Project Info', 'groppe'),
          ),
        ),
      ),
      array(
        'name'  => 'project_donor_section',
        'icon'  => 'fa fa-address-card',
        'title' => esc_html__('Project Donors', 'groppe'),
        'fields' => array(

          array(
            'id'                  => 'project_donors',
            'title' => esc_html__('Project Donors', 'groppe'),
            'type'                => 'group',
            'fields'              => array(
              array(
                'id'              => 'donor_name',
                'type'            => 'text',
                'title'           => esc_html__('Donor Name', 'groppe'),
              ),
              array(
                'id'              => 'donated_amount',
                'type'            => 'text',
                'title'           => esc_html__('Donated Amount', 'groppe'),
              ),
              array(
                'id'              => 'donor_thumb',
                'type'            => 'image',
                'title'           => esc_html__('Donor Thumb', 'groppe'),
              ),
            ),
            'button_title'        => esc_html__('Add New', 'groppe'),
            'accordion_title'     => esc_html__('Project Donor', 'groppe'),
          ),
        ),
      ),
    ),
  );

  // -----------------------------------------
  // Team
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Teams Options', 'groppe'),
    'post_type' => 'team',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'team_job_position_section',
        'title' => esc_html__('Job Positon', 'groppe'),
        'icon'  => 'fa fa-id-badge',
        'fields' => array(

          array(
            'id'      => 'employee_name',
            'type'    => 'text',
            'title'    => esc_html__('Employee Name', 'groppe'),
            'info'    => esc_html__('Enter employee name.', 'groppe'),
          ),
          array(
            'id'      => 'team_job_position',
            'type'    => 'text',
            'title'    => esc_html__('Job Position', 'groppe'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'groppe'),
            ),
            'info'    => esc_html__('Enter this employee job position, in your company.', 'groppe'),
          ),
          array(
            'id'      => 'team_link',
            'type'    => 'text',
            'title'    => esc_html__('Team Link', 'groppe'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'groppe'),
            ),
            'info'    => esc_html__('Enter team link.', 'groppe'),
          ),

        ),
      ),
      array(
        'name'   => 'team_contact_section',
        'title' => esc_html__('Contact Info', 'groppe'),
        'icon'  => 'fa fa-address-card',
        'fields' => array(

          array(
            'id'      => 'contact_number',
            'type'    => 'text',
            'title'    => esc_html__('Phone Number', 'groppe'),
            'info'    => esc_html__('Enter this employee phone number.', 'groppe'),
          ),
          array(
            'id'      => 'team_email_id',
            'type'    => 'text',
            'title'    => esc_html__('Email ID', 'groppe'),
            'info'    => esc_html__('Enter this employee email ID.', 'groppe'),
          ),
          array(
            'id'                  => 'team_socials',
            'type'                => 'group',
            'fields'              => array(
              array(
                'id'              => 'team_social_icon',
                'type'            => 'icon',
                'title'           => esc_html__('Social Icon', 'groppe'),
              ),
              array(
                'id'              => 'team_social_link',
                'type'            => 'text',
                'title'           => esc_html__('URL', 'groppe'),
              ),
            ),
            'button_title'        => esc_html__('Add Social Icon', 'groppe'),
            'accordion_title'     => esc_html__('Social Icons', 'groppe'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Donation Forms
  // -----------------------------------------
  $options[]    = array(
    'id'        => '_donation_form_metabox',
    'title'     => esc_html__('Donation Deadline', 'groppe'),
    'post_type' => 'give_forms',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_deadline',
        'fields' => array(
          array(
            'id'          => 'donation_deadline',
            'type'        => 'text',
            'title'       => esc_html__('Deadline Date', 'groppe'),
            'attributes' => array(
              'placeholder' => 'DD/MM/YYYY'
            ),
          ),
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Event
  // -----------------------------------------
  $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
    $contact_forms = array();
    if ( $cf7 ) {
      foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->ID ] = $cform->post_title;
      }
    } else {
      $contact_forms[ esc_html__( 'No contact forms found', 'groppe' ) ] = 0;
    }
  $options[]    = array(
    'id'        => '_event_popup_form_metabox',
    'title'     => esc_html__('Event Pop-up Contact Form', 'groppe'),
    'post_type' => 'tribe_events',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'popup_form',
        'fields' => array(
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
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'gallery_post_type_metabox',
    'title'     => esc_html__('Gallery Options', 'groppe'),
    'post_type' => 'gallery',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          array(
            'id'        => 'gallery_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Gallery Type', 'groppe'),
            'options'   => array(
              'image'    => esc_html__( 'Standard Image', 'groppe' ),
              'gallery'    => esc_html__( 'Slider', 'groppe' ),
              'video'    => esc_html__( 'Video', 'groppe' ),
              'link'    => esc_html__( 'link', 'groppe' ),
            ),
            'attributes' => array(
              'data-depend-id' => 'gallery_type',
            ),
          ),
          array(
            'id'              => 'video_post',
            'type'            => 'text',
            'title'           => esc_html__('Video URL', 'groppe'),
            'dependency'  => array('gallery_type', '==', 'video'),
          ),
          array(
            'id'              => 'link_post',
            'type'            => 'text',
            'title'           => esc_html__('URL', 'groppe'),
            'dependency'  => array('gallery_type', '==', 'link'),
          ),
          // Standard, Image
          array(
            'title' => esc_html__( 'Image', 'groppe' ),
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format! Upload Featured Image only', 'groppe'),
            'wrap_class' => 'vt-minimal-heading hide-title',
            'dependency'  => array('gallery_type', '==', 'image'),
          ),
          // Standard, Image

          // Gallery
          array(
            'id'          => 'gallery_post_images',
            'title' => esc_html__( 'Slider Images', 'groppe' ),
            'type'        => 'gallery',
            'add_title'   => esc_html__('Add Image(s)', 'groppe'),
            'edit_title'  => esc_html__('Edit Image(s)', 'groppe'),
            'clear_title' => esc_html__('Clear Image(s)', 'groppe'),
            'dependency'  => array('gallery_type', '==', 'gallery'),
          ),
          // Gallery

        ),
      ),

    ),
  );
  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'groppe'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'groppe'),
            'wrap_class' => 'vt-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'    => 'notice',
            'title'   => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Gallery Format', 'groppe')
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'groppe'),
            'add_title'   => esc_html__('Add Image(s)', 'groppe'),
            'edit_title'  => esc_html__('Edit Image(s)', 'groppe'),
            'clear_title' => esc_html__('Clear Image(s)', 'groppe'),
          ),
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'groppe'),
    'post_type' => array('post', 'page', 'project', 'product', 'team', 'give_forms', 'tribe_events'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_topbar_section',
        'title' => esc_html__('Top Bar', 'groppe'),
        'icon'  => 'fa fa-minus',

        // Fields Start
        'fields' => array(

          array(
            'id'           => 'topbar_options',
            'type'         => 'image_select',
            'title'        => esc_html__('Topbar', 'groppe'),
            'options'      => array(
              'default'     => GROPPE_CS_IMAGES .'/topbar-default.png',
              'custom'      => GROPPE_CS_IMAGES .'/topbar-custom.png',
              'hide_topbar' => GROPPE_CS_IMAGES .'/topbar-hide.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'hide_topbar_select',
            ),
            'radio'     => true,
            'default'   => 'default',
          ),
          array(
            'id'          => 'top_left',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Left', 'groppe'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'          => 'top_right',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Right', 'groppe'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'         => 'topbar_left_width',
            'type'       => 'text',
            'title'      => esc_html__('Top Left Width in %', 'groppe'),
            'attributes' => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'         => 'topbar_right_width',
            'type'       => 'text',
            'title'      => esc_html__('Top Right Width in %', 'groppe'),
            'attributes' => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'    => 'topbar_bg',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Background Color', 'groppe'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),

        ), // End : Fields

      ), // Title Section

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'groppe'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => esc_html__('Select Header Design', 'groppe'),
            'options'      => array(
              'default'     => GROPPE_CS_IMAGES .'/hs-0.png',
              'style_one'   => GROPPE_CS_IMAGES .'/hs-1.png',
              'style_two'   => GROPPE_CS_IMAGES .'/hs-2.png',
              'style_three'   => GROPPE_CS_IMAGES .'/hs-2.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'     => true,
            'default'   => 'default',
            'info'      => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'groppe'),
          ),
          array(
            'id'              => 'header_address_info',
            'title'           => esc_html__('Header Content', 'groppe'),
            'desc'            => esc_html__('Add your header content here. Example : Address Details', 'groppe'),
            'type'            => 'textarea',
            'shortcode'       => true,
            'dependency' => array('header_design', 'any', 'style_three,style_two'),
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
            'dependency'   => array('donate_btn_type|header_design', '==|!=', 'popup|default'),
          ),
          array(
            'id'    => 'transparency_header',
            'type'  => 'switcher',
            'title' => esc_html__('Transparent Header Menu', 'groppe'),
            'info' => esc_html__('Use Transparent Method', 'groppe'),
            // 'dependency'   => array('header_design', '==', 'style_one'),
          ),
          array(
            'id'    => 'transparent_menu_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Color', 'groppe'),
            'info' => esc_html__('Pick your menu color. This color will only apply for non-sticky header mode.', 'groppe'),
            'dependency'   => array('transparency_header', '==|==', 'true'),
          ),
          array(
            'id'    => 'transparent_menu_hover_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Hover Color', 'groppe'),
            'info' => esc_html__('Pick your menu hover color. This color will only apply for non-sticky header mode.', 'groppe'),
            'dependency'   => array('transparency_header', '==|==', 'true'),
          ),
          array(
            'id'              => 'grop_page_logo',
            'type'            => 'image',
            'title'           => esc_html__('Page Logo', 'groppe'),
            'desc'          => esc_html__('Choose custom logo for this page.', 'groppe'),
          ),
          array(
            'id'              => 'grop_page_retina_logo',
            'type'            => 'image',
            'title'           => esc_html__('Retina Logo', 'groppe'),
            'desc'          => esc_html__('Choose custom retina logo for this page.', 'groppe'),
          ),
          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'groppe'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'groppe'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'groppe'),
          ),

          // Enable & Disable
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable & Disable', 'groppe'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'groppe'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'groppe'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Search Icon', 'groppe'),
            'info' => esc_html__('Turn On if you want to show shopping cart icon in navigation bar.', 'groppe'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'shopping_cart',
            'type'  => 'switcher',
            'title' => esc_html__('Shopping Cart', 'groppe'),
            'info' => esc_html__('Turn On if you want to show shopping cart icon in navigation bar.', 'groppe'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'groppe'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'groppe'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'shortcode'  => true,
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'groppe'),
            'desc' => __('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'groppe'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'groppe'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'groppe'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'groppe'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_bar_height',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Height', 'groppe'),
            'options'   => array(
              'height-none' => esc_html__('Default Spacing', 'groppe'),
              'height-custom' => esc_html__('Custom Padding', 'groppe'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_bar_custom_height',
            'type'  => 'text',
            'title' => esc_html__('Title Bar Height', 'groppe'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_bar_height', '==|==', 'default-title|height-custom'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'groppe'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'groppe'),
              'padding-custom' => esc_html__('Custom Padding', 'groppe'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'groppe'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'groppe'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'groppe'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'groppe'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'groppe'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'groppe'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'groppe'),
              'padding-xs' => esc_html__('Extra Small Padding', 'groppe'),
              'padding-sm' => esc_html__('Small Padding', 'groppe'),
              'padding-md' => esc_html__('Medium Padding', 'groppe'),
              'padding-lg' => esc_html__('Large Padding', 'groppe'),
              'padding-xl' => esc_html__('Extra Large Padding', 'groppe'),
              'padding-cnt-no' => esc_html__('No Padding', 'groppe'),
              'padding-custom' => esc_html__('Custom Padding', 'groppe'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'groppe'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'groppe'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'groppe'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'groppe'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'groppe'),
            'label' => esc_html__('Yes, Please do it.', 'groppe'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'groppe'),
            'label' => esc_html__('Yes, Please do it.', 'groppe'),
          ),
          array(
            'id'    => 'hide_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Copyright Bar', 'groppe'),
            'label' => esc_html__('Yes, Please do it.', 'groppe'),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Above Footer Widget
  // -----------------------------------------
    $options[]    = array(
    'id'        => 'above_footer_option',
    'title'     => esc_html__('Above Footer Widget', 'groppe'),
    'post_type' => array('page','post'),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'above_footer_option_section',
        'fields' => array(

          array(
            'id'            => 'above_footer_widget',
            'type'           => 'switcher',
            'title'          => esc_html__('Show Above footer Widget', 'groppe'),
            'info'          => esc_html__('Make sure to add widget in Appearance > widgets > Above Footer Widget', 'groppe'),
          ),
        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'groppe'),
    'post_type' => array('page', 'tribe_events' ),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => GROPPE_CS_IMAGES . '/page-1.png',
              'extra-width'   => GROPPE_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => GROPPE_CS_IMAGES . '/page-3.png',
              'right-sidebar' => GROPPE_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => false,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'groppe'),
            'options'        => groppe_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'groppe'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'groppe'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_name',
            'type'    => 'text',
            'title'   => esc_html__('Name', 'groppe'),
            'info'    => esc_html__('Enter client name', 'groppe'),
          ),
          array(
            'id'      => 'testi_name_link',
            'type'    => 'text',
            'title'   => esc_html__('Name Link', 'groppe'),
            'info'    => esc_html__('Enter client name link, if you want', 'groppe'),
          ),
          array(
            'id'      => 'testi_pro',
            'type'    => 'text',
            'title'   => esc_html__('Profession', 'groppe'),
            'info'    => esc_html__('Enter client profession', 'groppe'),
          ),
          array(
            'id'      => 'testi_pro_link',
            'type'    => 'text',
            'title'   => esc_html__('Profession Link', 'groppe'),
            'info'    => esc_html__('Enter client profession link', 'groppe'),
          ),

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'groppe_vt_metabox_options' );