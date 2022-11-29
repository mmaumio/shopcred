<?php
/**
 * Enqueue Styles and Scripts actions and filters.
 *
 * @package ShopCred
 */

class ShopCred_Enqueue {

	/**
	 * Instance.
	 *
	 * @access private
	 * @var object Instance
	 * @since 1.0.0
	 */
	private static $instance;

	/**
	 * 
	 * @since 1.0.0
	 */

	public static $fonts_url;

	/**
	 * Initiator.
	 *
	 * @since 1.0.0
	 * @return object initialized object of class.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'enqueue_block_editor_assets', [ $this, 'block_editor_assets' ] );
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_frontend_scripts' ] );
		// Hook: Block assets.
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_google_fonts' ] );
		add_action( 'enqueue_block_editor_assets', [ __CLASS__, 'enqueue_google_fonts' ] );	
		add_filter( 'block_categories_all', [ $this, 'add_block_category' ] );
		add_filter( 'shopcred_do_content', [ $this, 'get_widget_styling' ] );
		add_action('template_redirect', [ $this, 'track_product_view' ], 20);

		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_frontend_woo_scripts' ] );
	}

	/**
	 * Recent Views Set Cookies
     * 
     * @since v.2.1.0
	 * @return NULL
	 */
    public function track_product_view() {
        if ( ! is_singular( 'product' ) ) {
            return;
        }
    
        global $post;
    
        if (empty($_COOKIE['__spc_recently_viewed'])) {
            $viewed_products = array();
        } else {
            $viewed_products = (array) explode('|', sanitize_text_field($_COOKIE['__spc_recently_viewed']));
        }

        if ( ! in_array($post->ID, $viewed_products) ) {
            $viewed_products[] = $post->ID;
        }
    
        if ( sizeof( $viewed_products ) > 30 ) {
            array_shift( $viewed_products );
        }
    
        wc_setcookie( '__spc_recently_viewed', implode( '|', $viewed_products ) );
    }

	/**
	 * Enqueue Gutenberg block assets for backend editor.
	 *
	 * @uses {wp-blocks} for block type registration & related functions.
	 * @uses {wp-element} for WP Element abstraction — structure of blocks.
	 * @uses {wp-i18n} to internationalize the block's text.
	 * @uses {wp-editor} for WP editor styles.
	 * @since 1.0.0
	 */
	public function block_editor_assets() {
		if( ! class_exists('woocommerce') ) {
	        return;
        }

		global $pagenow, $post;

		$shopcred_deps = array( 'react', 'react-dom', 'wp-api', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-compose', 'wp-data', 'wp-date', 'wp-element', 'wp-hooks', 'wp-i18n', 'wp-plugins' );

		if ( 'widgets.php' === $pagenow ) {
			unset( $shopcred_deps[2] );
		}

		//block-editor style
		wp_enqueue_style( 'spc-block-editor-style', SPC_ASSETS . '/css/block-editor.css' );
		wp_enqueue_style( 'spc-block-style', SPC_URL . 'build/index.css', is_admin() ? array( 'wp-editor' ) : null, null );
		wp_enqueue_style( 'spc-swiper-style', SPC_ASSETS . '/css/swiper-bundle.min.css' );
		wp_enqueue_script( 'spc-swiper-script', SPC_ASSETS . '/js/swiper-bundle.min.js', [ 'jquery' ], null, true );
		wp_enqueue_script('spc-product-carousel-script', SPC_ASSETS . '/js/swiper-init.js', ['jquery', 'spc-swiper-script'], null, true );
		wp_enqueue_script('spc-isotop-script', SPC_ASSETS . '/js/isotop.min.js', [], SPC_VER, true );
		wp_enqueue_script('spc-isotop-init', SPC_ASSETS . '/js/isotop.init.js', ['jquery', 'spc-swiper-script'], SPC_VER, true );

		wp_enqueue_style( 'spc-slick-style', SPC_ASSETS . '/css/slick.min.css' );
		wp_enqueue_script( 'spc-slick-script', SPC_ASSETS . '/js/slick.min.js', [ 'jquery', 'imagesloaded' ], null, true );
	
		wp_enqueue_script( 'spc-deactivate-blocks', SPC_URL . 'assets/js/deactivated-blocks.js', array( 'wp-blocks', 'wp-dom-ready' ), SPC_VER, true );
		// Register block editor script for backend.
		wp_enqueue_script( 'spc-block-script', SPC_URL . 'build/index.js', $shopcred_deps, null, true );
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'shop-cred', 'shop-cred' );
		}
		
		$defaults = ShopCred_Defaults::get_block_defaults();

		$blocks       = array();
		$saved_blocks = get_option( 'spc_save_settings' );

		if ( is_array( $saved_blocks ) ) {
			foreach ( $saved_blocks as $slug => $data ) {

				if ( isset( $saved_blocks[ $slug ] ) ) {
					if ( 0 == $data ) {
						array_push( $blocks, $slug );
					}
				}
			}
		}
		
		
		wp_localize_script(
			'spc-deactivate-blocks',
			'spc_deactivate_blocks',
			array(
				'deactivated_blocks' => $blocks,
			)
		);

		// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
		wp_localize_script(
			'spc-block-script',
			'spc_block_object',
			[
				'pluginDirPath'        				=> plugin_dir_path( __DIR__ ),
				'pluginDirUrl'         				=> plugin_dir_url( __DIR__ ),
				'category'             				=> 'shop-cred',
				'ajax_url'             				=> admin_url( 'admin-ajax.php' ),
				'image_sizes'          				=> ShopCred_Helper::get_image_sizes(),
				'post_types'           				=> ShopCred_Helper::get_post_types(),
				'all_taxonomy'         				=> ShopCred_Helper::get_related_taxonomy(),
				'taxonomy_list'        				=> ShopCred_Helper::get_taxonomy_list(),
				'filters_taxonomy_list'         	=> ShopCred_Helper::filter_taxonomy_list(),
				'filters_tag_list'         			=> ShopCred_Helper::filter_tags_list(),
				'config'         	   				=> '',
				'settings'             				=> '',
				'spc_ajax_nonce' 					=> wp_create_nonce( 'shopcred_blocks_ajax_nonce' ),
				'prebuilt_libraries' 				=> apply_filters( 'shopcred_blocks_custom_prebuilt_libraries', array() ),
				'showDesignLibrary' 				=> apply_filters( 'shopcred_blocks_design_library_enabled', true ),
				'spc_home_url'        				=> home_url(),
				'collapse_panels'                   => 'enabled',
			]
		);
	}


	/**
	 * Enqueue both Front+Back end Scripts/Style
	 * 
	 */
	public function enqueue_frontend_scripts() {
		global $post;

		$id = get_the_ID();
		
		if ( !is_admin() ) {

			wp_enqueue_style( 'spc-woo-product-style', SPC_URL . 'build/style-index.css' );

			if ( has_block( 'spc/woo-product', $id ) || ShopCred_Helper::is_shopcred() ) {
			
				wp_enqueue_style( 'spc-swiper-style', SPC_ASSETS . '/css/swiper-bundle.min.css' );
				wp_enqueue_script( 'spc-swiper-script', SPC_ASSETS . '/js/swiper-bundle.min.js', [], null, true );
				wp_enqueue_script('spc-product-carousel-script', SPC_ASSETS . '/js/swiper-init.js', [], null, true );
				wp_enqueue_script('spc-isotop-script', SPC_ASSETS . '/js/isotop.min.js', [], null, true );
				wp_enqueue_script('spc-isotop-init', SPC_ASSETS . '/js/isotop.init.js', ['jquery', 'spc-swiper-script'], null, true );
			}

		}
					
	}


	/**
	 * Do Google Fonts.
	 *
	 * @since 1.0.0
	 */
	public static function enqueue_google_fonts() {
		self::$fonts_url = ShopCred_Data::get_google_fonts_uri();

		if ( self::$fonts_url ) {
			wp_enqueue_style( 'shopcred-google-fonts', self::$fonts_url, array(), null, 'all' );
		}
	}

	
	/**
	 * Do ajax load more product or quickview.
	 *
	 * @since 1.0.0
	 */
	public static function enqueue_frontend_woo_scripts() {
	
		wp_enqueue_script('spc-product-quickview', SPC_ASSETS . '/js/woo-quick-vew.js', ['jquery'], null, true );
		wp_enqueue_script('spc-woo-product', SPC_ASSETS . '/js/product-loadmore.js', ['jquery'], null, true );
		wp_localize_script('spc-woo-product', 'spc_localize_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('shopcred_blocks_ajax_nonce')
        ));
	}

	

	/**
	 * Adding a new (custom) block category.
	 *
	 * @param   array $block_categories                         Array of categories for block types.
	 * @param   WP_Block_Editor_Context $block_editor_context   The current block editor context.
	 */
	function add_block_category( $block_categories ) {
		
		return array_merge(
			$block_categories,
			[
				[
					'slug'  => 'shop-cred',
					'title' => esc_html__( 'ShopCred', 'shop-cred' ),
				],
			]
		);
	}

	/**
	 * Set our CSS print method.
	 *
	 * @param string $method Existing method.
	 */
	public function shopcred_set_css_print_method( $method ) {
		$method = shopcred_get_option( 'css_print_method' );

		if ( is_single() ) {
			$method = 'inline';
		}

		return $method;
	}


	/**
	 * Process all widget content for potential styling.
	 *
	 * @since 1.0.0
	 * @param string $content The existing content to process.
	 */
	public function get_widget_styling( $content ) {
		$widget_blocks = get_option( 'widget_block' );

		foreach ( (array) $widget_blocks as $block ) {
			if ( isset( $block['content'] ) ) {
				$content .= $block['content'];
			}
		}

		return $content;
	}

}

ShopCred_Enqueue::get_instance();