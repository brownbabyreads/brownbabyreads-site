<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "_bbr_admin";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => 'Brown Baby Reads Site Options',
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'BBR Admin', 'redux-framework-demo' ),
        'page_title'           => __( 'Brown Baby Reads Site Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    // START HELP TABS
    // $tabs = array(
    //     array(
    //         'id'      => 'redux-help-tab-1',
    //         'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
    //         'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
    //     ),
    //     array(
    //         'id'      => 'redux-help-tab-2',
    //         'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
    //         'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
    //     )
    // );
    // Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    // $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    // Redux::setHelpSidebar( $opt_name, $content );


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    //
    // -> START Basic Fields
    //

    Redux::setSection( $opt_name, [
        'title' => 'General',
        'icon' => 'el-icon-home',
        'fields' => [
            [
                'id' => 'opt-main-logo',
                'type' => 'media',
                'url' => true,
                'title' => 'Site Logo',
                'compiler' => 'true',
                'subtitle' => 'Upload the header logo',
            ],

            [
                'id' => 'section-header-button-callout-start',
                'type' => 'section',
                'title' => 'Header Button Callout',
                'indent' => true
            ],

            [
                'id' => 'opt-header-button-callout-text',
                'type' => 'text',
                'title' => 'Header Button Callout Text',
            ],

            [
                'id' => 'opt-header-button-callout-url',
                'type' => 'text',
                'title' => 'Header Button Callout URL',
            ],

            [
                'id' => 'section-header-button-callout-end',
                'type' => 'section',
                'indent' => false
            ],

            [
                'id' => 'opt-footer-logo',
                'type' => 'media',
                'url' => true,
                'title' => 'Footer Logo',
                'compiler' => 'true',
                'subtitle' => 'Upload the footer logo',
            ],

            [
                'id' => 'opt-footer-copyright-text',
                'type' => 'text',
                'title' => 'Footer Copyright Text',
            ],
        ]
    ]);

    Redux::setSection($opt_name, [
        'title' => 'Social Media',
        'desc' => 'Fill out your social media options below.',
        'id' => 'social-media',
        'fields' => [
            [
                'id' => 'opt-topnav-social-icons',
                'type' => 'select',
                'options' => [
                    'twitter' => 'Twitter',
                    'facebook' => 'Facebook',
                    'instagram' => 'Instagram',
                    'flickr' => 'Flickr',
                ],
                'multi' => true,
                'title' => 'Select Networks To Use',
                 'desc' => 'Choose the networks you want to display in the top and footer nav',
            ],
            [
                'id' => 'topnav-twitter-url',
                'type' => 'text',
                'title' => 'Twitter URL',
                'validate' => 'url',
                'subtitle' => '(<strong>EX:</strong> <code>https://twitter.com/sproutsocial</code>)',
                'required' => ['opt-topnav-social-icons', '=', 'twitter']
            ],
            [
                'id' => 'topnav-facebook-url',
                'type' => 'text',
                'title' => 'Facebook URL',
                'validate' => 'url',
                'subtitle' => '(<strong>EX:</strong> <code>https://www.facebook.com/SproutSocialInc</code>)',
                'required' => ['opt-topnav-social-icons', '=', 'facebook']
            ],
            [
                'id' => 'topnav-flickr-url',
                'type' => 'text',
                'title' => 'Flickr URL',
                'validate' => 'url',
                'subtitle' => '(<strong>EX:</strong> <code>https://www.flickr.com/photos/dog/</code>)',
                'required' => ['opt-topnav-social-icons', '=', 'flickr']
            ],
            [
                'id' => 'topnav-instagram-url',
                'type' => 'text',
                'title' => 'Instagram URL',
                'validate' => 'url',
                'subtitle' => '(<strong>EX:</strong> <code>https://instagram.com/sproutsocial</code>)',
                'required' => ['opt-topnav-social-icons', '=', 'instagram']
            ],
        ]
    ]);

    /*
     * <--- END SECTIONS
     */