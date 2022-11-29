<?php
/**
 * Plugin Name: ShopCred
 * Plugin URI: https://exclusiveblocks.com/shopcred
 * Description: The Best Gutenberg Blocks Collection for WooCommerce
 * Author: DevsCred.com
 * Author URI: https://devscred.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: shop-cred
 *
 * @package ShopCred
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SPC_FILE', __FILE__ );
define( 'SPC_DIR', plugin_dir_path( SPC_FILE ) );
define( 'SPC_URL', plugins_url( '/', SPC_FILE ) );
define( 'SPC_ASSETS', plugins_url( '/assets', SPC_FILE ) );
define( 'SPC_VER', '1.0.0' );
define( 'SPC_ROOT', dirname( plugin_basename( SPC_FILE ) ) );
define( 'SPC_ASSET_VER', get_option( '__spc_asset_version', SPC_VER ) );
define( 'SPC_ADMIN', SPC_DIR . 'admin/' );	
define( 'SPC_ADMIN_URL', plugins_url( '/', __FILE__ ) . 'admin/' );
define( 'SPC_PLUGIN_NAME', 'ShopCred' );

if ( ! defined( 'SPC_TABLET_BREAKPOINT' ) ) {
	define( 'SPC_TABLET_BREAKPOINT', '976' );
}
if ( ! defined( 'SPC_MOBILE_BREAKPOINT' ) ) {
	define( 'SPC_MOBILE_BREAKPOINT', '767' );
}

function shopcred_blocks_init() {

	// // Check if woocommerce installed and activated
	if (! is_plugin_active('woocommerce/woocommerce.php')){
		add_action( 'admin_notices', 'spm_admin_notice_missing_woocommerce' );
		return;
	}

	// Load necessary files.
	
	if ( is_admin() ) {
		require_once SPC_ADMIN . 'class-dashboard-settings.php';
	}

	require_once SPC_DIR . 'includes/class-helper.php';
	require_once SPC_DIR . 'includes/class-block-data.php';
	require_once SPC_DIR . 'includes/class-enqueue.php';
	require_once SPC_DIR . 'includes/class-render-blocks.php';
	require_once SPC_DIR . 'includes/global-attributes/class-global-attributes.php';
	require_once SPC_DIR . 'includes/class-woo-quickview.php';
	
	require_once SPC_DIR . 'includes/class-defaults.php';
	require_once SPC_DIR . 'includes/class-generate-css.php';
	require_once SPC_DIR . 'includes/class-dynamic-css.php';
	require_once SPC_DIR . 'includes/class-enqueue-css.php';
	require_once SPC_DIR . 'includes/class-blocks-manager.php';
	
	require_once SPC_DIR . 'includes/class-rest.php';
}
add_action( 'plugins_loaded', 'shopcred_blocks_init' );

	/**
	 * 
	 * Plugin Redirect Option Added by register_activation_hook
	 * 
	 */
	function spc_plugin_redirect_option() {
		add_option( 'spc_do_update_redirect', true );
	}
	register_activation_hook( __FILE__ , 'spc_plugin_redirect_option' );

	/**
	 * Admin notice
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	function spm_admin_notice_missing_woocommerce() {

		$message = sprintf(
			__( '%1$s requires %2$s to be installed and activated to function properly. %3$s', 'shop-cred' ),
			'<strong>' . __( 'ShopCred', 'shop-cred' ) . '</strong>',
			'<strong>' . __( 'Woocommerce', 'shop-cred' ) . '</strong>',
			'<a href="' . esc_url( admin_url( 'plugin-install.php?s=Woocommerce&tab=search&type=term' ) ) . '">' . __( 'Please click here to install/activate Woocommerce', 'shop-cred' ) . '</a>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p style="padding: 5px 0">%1$s</p></div>', $message );

	}

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_shopcred() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once __DIR__ . '/appsero/client/Client.php';
    }

    $client = new Appsero\Client( '3c1da7cb-634a-422a-965f-8af7494ba70b', 'ShopCred', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_shopcred();
