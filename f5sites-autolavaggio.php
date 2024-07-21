<?php
/*
Plugin Name: F5 Sites | Auto Lavaggio
Plugin URI: https://www.f5sites.com/software/wordpress/f5sites-bug-correction-hack-plugin/
Plugin Description: When some 3rd part plugin has a bug and we dont modify it source code to avoid update issues, so we make changes in our custom hack plugin. WordPress F5 Sites DEV projects. 
Author: Francisco Matelli Matulovic
Author URI: https://www.franciscomatelli.com.br/
License: GPLv3
Tags: mu-plugins */

// booking

// Custom post type function
function create_posttype() {
    register_post_type( 'booking',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Bookings' ),
                'singular_name' => __( 'Booking' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'booking'),
            'show_in_rest' => true,
        )
    );
    //
    register_post_type( 'provider',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Providers' ),
                'singular_name' => __( 'Provider' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'provider'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'custom-fields' ),
        )
    );
    //
    // register_post_type( 'booking',
    // // CPT Options
    //     array(
    //         'labels' => array(
    //             'name' => __( 'Bookings' ),
    //             'singular_name' => __( 'Booking' )
    //         ),
    //         'public' => true,
    //         'has_archive' => true,
    //         'rewrite' => array('slug' => 'booking'),
    //         'show_in_rest' => true,
    //     )
    // );
}
add_action( 'init', 'create_posttype' );



function f5_gio_tick_provider() { 
    $message = 'Not a provider';
    global $current_user;
    get_currentuserinfo(); 
    $user_id = $current_user->ID;
    $provider = metadata_exists( 'user', $user_id, "f5_gio_provider" );
    //
    return $user_id." ".$provider;
    //return $user_id.f5_gio_tick($provider);
}
/*
function f5_gio_tick($provider) {
    return {
        <input type="checkbox" id="scales" name="scales" $provider />
        <label for="scales">Scales</label>
    }
}
*/
add_shortcode('f5_gio_tick_provider', 'f5_gio_tick_provider');
