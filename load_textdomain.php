<?php

/**
 * Load the plugin text domain for translation.
 *
 * @since    1.0.0
 */
function guru_load_plugin_textdomain() {
	$domain = 'bemyguru';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

	load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
	load_plugin_textdomain( $domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'guru_load_plugin_textdomain', 1 );
