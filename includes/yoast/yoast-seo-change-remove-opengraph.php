<?php

// PV2015: lib/yoast-seo-change-remove-opengraph.php

/* Enforce HTTP Open Graph URLs in Yoast SEO
 * Credit: stodorovic https://github.com/stodorovic
 * Last Tested: Feb 06 2017 using Yoast SEO 4.2.1 on WordPress 4.7.2
 */
 
add_filter( 'wpseo_opengraph_url', 'tedx_opengraph_url' );

function tedx_opengraph_url( $url ) {
        return str_replace( 'https://', 'http://', $url );
}

