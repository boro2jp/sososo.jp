<?php
// APIの封鎖
function my_filter_rest_endpoints( $endpoints ) {
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P[\d]+)'] );
    }
    return $endpoints;
}

add_filter( 'rest_endpoints', 'my_filter_rest_endpoints', 10, 1 );