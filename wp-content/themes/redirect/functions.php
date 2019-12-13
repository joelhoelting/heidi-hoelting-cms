<?php

// Expose ACF Fields
function create_ACF_meta_in_REST() {
    $postypes_to_exclude = ['acf-field-group','acf-field'];
    $extra_postypes_to_include = ["page"];
    $post_types = array_diff(get_post_types(["_builtin" => false], 'names'),$postypes_to_exclude);

    array_push($post_types, $extra_postypes_to_include);

    foreach ($post_types as $post_type) {
        register_rest_field( $post_type, 'acf', [
            'get_callback'    => 'expose_ACF_fields',
            'schema'          => null,
       ]
     );
    }

}

function expose_ACF_fields( $object ) {
    $ID = $object['id'];
    return get_fields($ID);
}

add_action( 'rest_api_init', 'create_ACF_meta_in_REST' );

// Prevent Wordpress from scaling down largest image
add_filter( 'big_image_size_threshold', '__return_false' );

add_image_size( 'size_400', 400, 0, true);
add_image_size( 'size_600', 600, 0, true );
add_image_size( 'size_800', 800, 0, true );
add_image_size( 'size_1000', 1000, 0, true );
add_image_size( 'size_1200', 1200, 0, true );
add_image_size( 'size_1400', 1400, 0, true );
add_image_size( 'size_1600', 1600, 0, true );
add_image_size( 'size_2000', 2000, 0, true );
add_image_size( 'size_2400', 2400, 0, true );
add_image_size( 'size_2800', 2800, 0, true );