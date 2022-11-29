<?php
/**
 * Set our block attribute defaults.
 *
 * @package ShopCred
 */

class ShopCred_Defaults {

	/**
	 * Instance.
	 *
	 * @access private
	 * @var object Instance
	 * @since 1.0.0
	 */
	private static $instance;

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
	 * 
	 * @var array
	 * @since 1.0.0
	 */
	public static $defaults = [];


	/**
	 * Set our block defaults.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function get_block_defaults() {

		self::$defaults['grid'] = array(
	
			'gap' => 10,
			'gapTablet' => 20,
			'gapMobile' => 15,
			'columnSpacing' => 'default',
			'bgImg' => '',
			'bgColor' => '#FFF',
			'bgImgSize' => 'auto', 
			'bgImgPosition' => '50% 50%', 
			'bgImgRepeat' => 'no-repeat',
			'bgImgAttachment' => 'scroll',
			'overlay' => '',
			'overlayBgImg' => '',
			'overlayBgImgSize' => 'cover', 
			'overlayBgImgPosition' => '50% 50%', 
			'overlayBgImgRepeat' => 'no-repeat',
			'overlayBgImgAttachment' => 'scroll',
			'overlayOpacity' => 0.3,
			'topPadding' => "15",
			'rightPadding' => "20",
			'bottomPadding' => "15",
			'leftPadding' => "20",
			'paddingUnit' => "px",
			'paddingSyncUnits' => true,
			'gridOverlayGradient' => [ [
				'backgroundType' => 'solid',
				'backgroundHoverType' => 'solid',
			] ],
			'gridGradientDirection' => 90,
			'gridGradientColorOne' => "#cdfdff",
			'gridGradientColorStopOne' => 20,
			'gridGradientColorTwo' => "#32b3b9",
			'gridGradientColorStopTwo' =>80,
			'borderColor' => '#FFF',
			'borderWidth' => 0,
			'borderRadiusTop' => '5',
			'borderRadiusRight' => '5',
			'borderRadiusBottom' => '5',
			'borderRadiusLeft' => '5',
			'borderRadiusUnit' => 'px',
			'overlayGradType' => 'linear',
			'overlayGradLoc' => '',
			'overlaySecond' =>'',
			'overlayGradLocSecond' => '',
		);

		self::$defaults['woo-product'] = array(
			'columns' => 3,
			'tcolumns' => 2,
			'mcolumns' => 1,
			'equalHeight' => true,
			'post_type'   => 'grid',
			'postType' => 'product',
			'postsToShow'=> 6,
			'offset' => 0,
			'categories' => '',
			'postDisplaytext' => 'Post not found!',
			'displaySaleTag' => 'Sale Text',
			'layoutConfig' => '["spc/product-tags","spc/product-image","spc/product-meta","spc/product-title", "spc/product-rating", "spc/product-price", "spc/product-excerpt", "spc/cart-button"]',
			'PcontentOrder' => '["spc/product-tags","spc/product-image","spc/product-meta","spc/product-title", "spc/product-rating", "spc/product-price", "spc/product-excerpt", "spc/cart-button"]',
			'productGridMainMargin'                => [
				[
					'desk' 		=> [ '20', '0', '20', '0' ],
					'tablet' 	=> [ '15', '15', '15', '15' ],
					'mobile' 	=> [ '10', '10', '10', '10' ]
				],
			],
			'productGridMainMarginUnit' => 'px',
			'productHotTagPosX'         => [
				[
					'desk' 		=> '30',
					'tablet' 	=> '40',
					'mobile' 	=> '40',
				],
			],
			'productHotTagPosXUnit' => '%',
			'productHotTagPosY'     => [
				[
					'desk' 		=> '20',
					'tablet' 	=> '20',
					'mobile' 	=> '20',
				],
			],
			'productHotTagPosYUnit' => 'px',
			'dicntTagBgColor' => '#3BC473',
			'productDiscntTagPosX'     => [
				[
					'desk' 		=> '20',
					'tablet' 	=> '20',
					'mobile' 	=> '20',
				],
			],
			'productDiscntTagPosXUnit' => 'px',
			'productDiscntTagPosY'     => [
				[
					'desk' 		=> '20',
					'tablet' 	=> '20',
					'mobile' 	=> '20',
				],
			],
			'productDiscntTagPosYUnit' => 'px',
			'productStockTagPosX'     => [
				[
					'desk' 		=> '20',
					'tablet' 	=> '20',
					'mobile' 	=> '20',
				],
			],
			'productStockTagPosXUnit' => 'px',
			'productStockTagPosY'     => [
				[
					'desk' 		=> '20',
					'tablet' 	=> '20',
					'mobile' 	=> '20',
				],
			],
			'productStockTagPosYUnit' => 'px',
			//carousel
			'pGridSlideShow' => 3,
			'tpGridSlideShow' => 2,
			'mpGridSlideShow' => 1,
			'displayProductTitle' => true,
			'displayProductImage' => true,
			'displayProductTaxonomy' => true,
			'displayProductCartbtn' => true,
			'displayProductRating' => false,
			'productCarouselEffect'  => 'slide',
			'productCarouselAutoplay'  => true,
			'productCarouselDelay'  => 5000,
			'productCarouselLoop'  => true,
			'productCarouselSpeed'  => 500,
			'productCarouselPauseOnHover'  => true,
			'productCarouselSlidesPerView'  => 3,
			'productCarouselSlidesPerViewTablet'  => 2,
			'productCarouselSlidesPerViewMobile'  => 1,
			'productCarouselSlidesPerColumnEnable'  => false,
			'productCarouselSlidesPerColumn'  => 1,
			'productCarouselSlidesGridEnable'  => false,
			'productCarouselSlidesGridNumber'  => 1,
			'productCarouselSpaceBetween'  => 15,
			'productCarouselGrabCursor'  => true,
			'productCarouselObserver'  => true,
			'productCarouselObserveParents'  => true,
			'productCarouselBreakpoints'  => 768,
			'productCarouselPagination'  => true,
			'productCarouselPaginationType'  => 'bullets',
			'productCarouselNavigation'  => true,
			'productCarouselNavigationNextEl'  => 'spc-carousel-nav-next',
			'productCarouselNavigationPrevEl'  => 'spc-carousel-nav-prev',
			'productCarouselProgressBar'  => false,
			//tags
			'hotText' => 'Hot',
			'stockText' => 'In Stock',
			//container
			'displayLayoutType' => 'grid',
			'gContainerAlignment' => 'left',
			'gContainerBoxBGColor' => '#fff',
			'gContainerBGHColor' => '#fff',
			'gContainerBoxPadding' => [
				[
					'desk' 		=> [ '20', '20', '20', '20' ],
					'tablet' 	=> [ '15', '15', '15', '15' ],
					'mobile' 	=> [ '10', '10', '10', '10' ]
				],
			],
			'gContainerBoxPaddingUnit' => 'px',
			'gContainerBoxPaddingSyncUnits' => true,
			'gContainerBoxBR' => [
				[
					'desk' 		=> [ '0', '0', '0', '0' ],
					'tablet' 	=> [ '0', '0', '0', '0' ],
					'mobile' 	=> [ '0', '0', '0', '0' ]
				],
			],
			'gContainerBoxBRUnit' => 'px',
			'gContainerBoxBorderStyleNormal' => "none",
			'gContainerBoxBorderWidthNormal'=> 1,
			'gContainerBoxBorderColorNormal' => "#000000",
			'gContainerBoxBorderStyleHover' => "none",
			'gContainerBoxBorderWidthHover'=> 1,
			'gContainerBoxBorderColorHover' => "#000000",
			'gContainerBoxShadowColor' => '#0000001a',
			'gContainerBoxShadowHOffset' => 0,
			'gContainerBoxShadowVOffset' => 10,
			'gContainerBoxShadowBlur' => 30,
			'gContainerBoxShadowSpread' => 0,
			'gContainerBoxShadowPosition' => "outset",
			'gContainerBoxShadowColorHover' => '#000',
			'gContainerBoxShadowHOffsetHover' => 0,
			'gContainerBoxShadowVOffsetHover' => 0,
			'gContainerBoxShadowBlurHover' => 0,
			'gContainerBoxShadowSpreadHover' => 0,
			'gContainerBoxShadowPositionHover' => "outset",
			//preset
			//quick View
			'displayQuickView' => true,
			'gQuickViewText' => "",
			'gQuickViewColor' => '#000',
			'gQuickViewHColor' => '#000',
			'gQuickViewFontSize' => 16,
			'gQuickViewFontSizeTablet' => 16,
			'gQuickViewFontSizeMobile' => 16,
			'gQuickViewFontFamily' => "Inter",
			'gQuickViewFontWeight' => "500",
			'gQuickViewFontSizeType' => 'px',
			'gQuickViewLineHeight' => 40,
			'gQuickViewLineHeightTablet' => 40,
			'gQuickViewLineHeightMobile' => 40,
			'gQuickViewLineHeightType' => 'px',
			'gQuickViewLoadGoogleFonts' => true,
			'gQuickViewTextTransform' => '',
        	'gQuickViewLetterSpacing' => null,
			'gQuickViewAlignment' => 'center',
			'gQuickViewPosTop' => '',
			'gQuickViewPosBottom' => '10',
			'gQuickViewPosLeft' => '',
			'gQuickViewPosRight' => '10',
			'gQuickViewBGColor' => '#FFFF',
			'gQuickViewBGHColor' => '#FFF',
			'gQuickViewSpacing' => 15,
			'gQuickViewPadding' => [
				[
					'desk' 		=> [ '0', '0', '0', '0' ],
					'tablet' 	=> [ '0', '0', '0', '0' ],
					'mobile' 	=> [ '0', '0', '0', '0' ]
				],
			],
			'gQuickViewPaddingUnit' => 'px',
			'gQuickViewBR' => [
				[
					'desk' 		=> [ '0', '0', '0', '0' ],
					'tablet' 	=> [ '0', '0', '0', '0' ],
					'mobile' 	=> [ '0', '0', '0', '0' ]
				],
			],
			'gQuickViewBRUnit' => 'px',
			'gQuickViewBorderStyleNormal' => "solid",
			'gQuickViewBorderWidthNormal'=> 1,
			'gQuickViewBorderColorNormal' => "#fff",
			'gQuickViewBorderStyleHover' => "solid",
			'gQuickViewBorderWidthHover'=> 1,
			'gQuickViewBorderColorHover' => "#fff",
			'gQuickViewBoxShadowColor' => '#0000001a',
			'gQuickViewBoxShadowHOffset' => 0,
			'gQuickViewBoxShadowVOffset' => 0,
			'gQuickViewBoxShadowBlur' => 0,
			'gQuickViewBoxShadowSpread' => 0,
			'gQuickViewBoxShadowPosition' => "outset",
			'gQuickViewBoxShadowColorHover' => '#000',
			'gQuickViewBoxShadowHOffsetHover' => 0,
			'gQuickViewBoxShadowVOffsetHover' => 0,
			'gQuickViewBoxShadowBlurHover' => 0,
			'gQuickViewBoxShadowSpreadHover' => 0,
			'gQuickViewBoxShadowPositionHover' => "outset",

			//Title
			'productTitleColor' => '#000000',
			'productTitleFontSize' => 18,
			'productTitleFontSizeTablet' => 16,
			'productTitleFontSizeMobile' => 14,
			'productTitleFontFamily' => "Inter",
			'productTitleFontWeight' => "500",
			'productTitleFontSizeType' => 'px',
			'productTitleLineHeight' => 1.5,
			'productTitleLineHeightTablet' => 1.5,
			'productTitleLineHeightMobile' => 1.5,
			'productTitleLineHeightType' => 'em',
			'productTitleLoadGoogleFonts' => true,
			'productTitleTextTransform' => 'capitalize',
			'productTitleLetterSpacing' => null,
			'productTitleMargin' => [
				[
					'desk' 		=> [ '0', '0', '0', '0' ],
					'tablet' 	=> [ '0', '0', '0', '0' ],
					'mobile' 	=> [ '0', '0', '0', '0' ]
				],
			],
			'productTitleMarginUnit' => 'px',
			//Taxonomy
			'productTaxonomyColor' => '#00000080',
			'productTaxonomyFontSize' => 11,
			'productTaxonomyFontSizeTablet' => 11,
			'productTaxonomyFontSizeMobile' => 11,
			'productTaxonomyFontFamily' => "Inter",
			'productTaxonomyFontWeight' => "500",
			'productTaxonomyFontSizeType' => 'px',
			'productTaxonomyLineHeight' => 1.5,
			'productTaxonomyLineHeightTablet' => 1.5,
			'productTaxonomyLineHeightMobile' => 1.5,
			'productTaxonomyLineHeightType' => 'em',
			'productTaxonomyLoadGoogleFonts' => true,
			'productTaxonomyTextTransform' => '',
        	'productTaxonomyLetterSpacing' => null,
			'productTaxonomyMargin' => [
				[
					'desk' 		=> [ '15', '0', '0', '0' ],
					'tablet' 	=> [ '10', '0', '0', '15' ],
					'mobile' 	=> [ '10', '0', '0', '0' ]
				],
			],
			'productTaxonomyMarginUnit' => 'px',
			'productTaxonomyBGColor' => '#FFFF',
			'productTaxonomyBGHColor' => '#FFF',
			'productTaxonomyPadding' => [
				[
					'desk' 		=> [ '4', '10', '4', '10' ],
					'tablet' 	=> [ '4', '10', '4', '10' ],
					'mobile' 	=> [ '4', '10', '4', '10' ]
				],
			],
			'productTaxonomyPaddingUnit' => 'px',
            'productTaxonomyBR' => [
				[
					'desk' 		=> [ '48', '48', '48', '48' ],
					'tablet' 	=> [ '48', '48', '48', '48' ],
					'mobile' 	=> [ '48', '48', '48', '48' ]
				],
			],
			'productTaxonomyBRUnit' => 'px',
			'productTaxonomyBorderStyleNormal' => "solid",
			'productTaxonomyBorderWidthNormal'=> 1,
			'productTaxonomyBorderColorNormal' => "#00000026",
			'productTaxonomyBorderStyleHover' => "solid",
			'productTaxonomyBorderWidthHover'=> 1,
			'productTaxonomyBorderColorHover' => "#fff",
			'productTaxonomyBoxShadowColor' => '#0000001a',
			
			//rating
			'ratingSize' => 18,
			'ratingNormalColor' => '#d3ced2',
			'ratingActiveColor' => '#FF5656',
			'ratingMargin' => [
				[
					'desk' 		=> [ '8', '0', '8', '0' ],
					'tablet' 	=> [ '8', '0', '8', '15' ],
					'mobile' 	=> [ '8', '0', '8', '0' ]
				],
			],
			'ratingMarginUnit' => 'px',
			
			//Excerpt
			'productExcerptColor' => '#00000080',
			'productExcerptFontSize' => 15,
			'productExcerptFontSizeTablet' => 16,
			'productExcerptFontSizeMobile' => 16,
			'productExcerptFontFamily' => "Inter",
			'productExcerptFontWeight' => "500",
			'productExcerptFontSizeType' => 'px',
			'productExcerptLineHeight' => 1.5,
			'productExcerptLineHeightTablet' => 1.5,
			'productExcerptLineHeightMobile' => 1.5,
			'productExcerptLineHeightType' => 'em',
			'productExcerptLoadGoogleFonts' => true,
			'productExcerptTextTransform' => '',
			'productExcerptLetterSpacing' => null,
			'productExcerptMargin' => [
				[
					'desk' 		=> [ '20', '0', '15', '0' ],
					'tablet' 	=> [ '15', '0', '15', '15' ],
					'mobile' 	=> [ '15', '0', '15', '0' ]
				],
			],
			'productExcerptMarginUnit' => 'px',
			
			'productPriceCurrentColor' => '#000',
			'productPriceDelColor' => '#F24949',
			//Price
			'productPriceColor' => '#000',
			'productPriceFontSize' => 22,
			'productPriceFontSizeTablet' => 18,
			'productPriceFontSizeMobile' => 16,
			'productPriceFontFamily' => "Inter",
			'productPriceFontWeight' => "600",
			'productPriceFontSizeType' => 'px',
			'productPriceLineHeight' => 1.5,
			'productPriceLineHeightTablet' => 1.5,
			'productPriceLineHeightMobile' => 1.5,
			'productPriceLineHeightType' => 'em',
			'productPriceLoadGoogleFonts' => true,
			'productPriceTextTransform' => '',
			'productPriceLetterSpacing' => null,
			'productPriceMargin' => [
				[
					'desk' 		=> [ '0', '0', '8', '0' ],
					'tablet' 	=> [ '0', '0', '8', '15' ],
					'mobile' 	=> [ '0', '0', '8', '0' ]
				],
			],
			'productPriceDelFontSizeUnit' => 'px',
			'productPriceDelFontSize'     => [
				[
					'desk' 		=> '16',
					'tablet' 	=> '16',
					'mobile' 	=> '16',
				],
			],
			'productPriceMarginUnit' => 'px',			
			//cart btn
			'addToCartbtnText' => 'Add to Cart',
			'addToCartbtnFontSize' => 14,
			'addToCartbtnFontSizeType' => 'px',
			'addToCartbtnFontSizeTablet' => 14,
			'addToCartbtnFontSizeMobile' => 12,
			'addToCartbtnFontFamily' => '',
			'addToCartbtnFontWeight' => '500',
			'addToCartbtnLineHeight' => 1,
			'addToCartbtnLineHeightTablet' => 1,
			'addToCartbtnLineHeightMobile' => 1,
			'addToCartbtnLineHeightType' => 'em',
			'addToCartbtnLoadGoogleFonts' => true,
			'addToCartbtnTextTransform' => 'uppercase',
			'addToCartbtnLetterSpacing' => 0.2,
			'addToCartbtnColor' => '#000',
			'addToCartbtnHcolor' => '#fff',
			'addToCartbtnBgColor' => '#fff',
			'addToCartbtnBgHcolor' => '#000',
			'addToCartbtnSpaceing' => '20',
			'addToCartbtnPadding' => [
				[
					'desk' 		=> [ '15', '24', '15', '24' ],
					'tablet' 	=> [ '12', '20', '12', '20' ],
					'mobile' 	=> [ '10', '15', '10', '15' ]
				],
			],
			'addToCartbtnPaddingUnit' => 'px',
			'addToCartbtnMargin' => [
				[
					'desk' 		=> [ '8', '0', '8', '0' ],
					'tablet' 	=> [ '8', '0', '8', '15' ],
					'mobile' 	=> [ '8', '0', '8', '0' ]
				],
			],
			'addToCartbtnMarginUnit' => 'px',
			'addToCartbtnBorderStyle' => 'solid',
			'addToCartbtnBorderWidth' => '1',
			'addToCartbtnBorderColor' => '#000',
			'addToCartbtnBorderHStyle' => 'solid',
			'addToCartbtnBorderHWidth' => '1',
			'addToCartbtnBorderHColor' => '#000',
			'addToCartbtnBR' => [
				[
					'desk' 		=> [ '0', '0', '0', '0' ],
					'tablet' 	=> [ '0', '0', '0', '0' ],
					'mobile' 	=> [ '0', '0', '0', '0' ]
				],
			],
			'addToCartbtnBRUnit' => 'px',
			'addToCartbtnBoxShadowColor' => '#000',
			'addToCartbtnBoxShadowHOffset' => 0,
			'addToCartbtnBoxShadowVOffset' => 0,
			'addToCartbtnBoxShadowBlur' => 0,
			'addToCartbtnBoxShadowSpread' => 0,
			'addToCartbtnBoxShadowPosition' => "outset",
			//tags
			'saleTagBgColor' => '#3DCC87',
			'hotTagBgColor' => '#FF5656' ,
			'dicntTagBgBRColor' =>  '#3DCC87',
			'saleTagBRColor' =>  '#3DCC87',
			'hotTagBRColor' =>  '#3DCC87',
			'dicntTagBRColor' =>  '#3DCC87',
			'gProductTagsColor' => '#ffffff',
			'gProductTagsHColor' => '#ffffff',
			'gProductTagsFontSize' => 10,
			'gProductTagsFontFamily' => "Inter",
			'gProductTagsFontWeight' => "500",
			'gProductTagsFontSizeType' => 'px',
			'gProductTagsLineHeight' => 1.5,
			'gProductTagsLineHeightType' => 'em',
			'gProductTagsLoadGoogleFonts' => true,
			'gProductTagsTextTransform' => 'uppercase',
        	'gProductTagsLetterSpacing' => null,
			'gProductTagsAlignment' => 'center',
			'gProductTagsBgColor' => '#3DCC87',
			'gProductTagsBgHColor' => '#3DCC87',
			'gProductTagsSpacing' => 15,
			'gProductTagsPadding' => [
				[
					'desk' 		=> [ '5', '15', '5', '15' ],
					'tablet' 	=> [ '5', '15', '5', '15' ],
					'mobile' 	=> [ '5', '10', '5', '10' ]
				],
			],
			'gProductTagsPaddingUnit' => 'px',
			'gProductTagsBR' => [
				[
					'desk' 		=> [ '50', '50', '50', '50' ],
					'tablet' 	=> [ '50', '50', '50', '50' ],
					'mobile' 	=> [ '50', '50', '50', '50' ]
				],
			],
			'gProductTagsBRUnit' => 'px',
			'gProductTagsBRHover' => [
				[
					'desk' 		=> [ '50', '50', '50', '50' ],
					'tablet' 	=> [ '50', '50', '50', '50' ],
					'mobile' 	=> [ '50', '50', '50', '50' ]
				],
			],
			'gProductTagsBRHoverUnit' => 'px',
			'gProductTagsBorderStyleNormal' => "solid",
			'gProductTagsBorderWidthNormal'=> 1,
			'gProductTagsBorderColorNormal' => "#3BC473",
			'gProductTagsBorderStyleHover' => "solid",
			'gProductTagsBorderWidthHover'=> 1,
			'gProductTagsBorderColorHover' => "#3BC473",
			'gProductTagsBoxShadowColor' => '#0000001a',
			'gProductTagsBoxShadowHOffset' => 0,
			'gProductTagsBoxShadowVOffset' => 10,
			'gProductTagsBoxShadowBlur' => 30,
			'gProductTagsBoxShadowSpread' => 0,
			'gProductTagsBoxShadowPosition' => "outset",
			'gProductTagsBoxShadowColorHover' => '#000',
			'gProductTagsBoxShadowHOffsetHover' => 0,
			'gProductTagsBoxShadowVOffsetHover' => 0,
			'gProductTagsBoxShadowBlurHover' => 0,
			'gProductTagsBoxShadowSpreadHover' => 0,
			'gProductTagsBoxShadowPositionHover' => "outset",
			//pagination
			'displayProductPagination' => false,
			'productPaginationMarkup' => '',
			'productPaginationAlignment' => 'center',
		    'productPaginationPGMargin' => [
				[
					'desk' 		=> ['20', '0', '20', '0'],
					'tablet' 	=> ['15', '15', '15', '15'],
					'mobile' 	=> ['10', '10', '10', '10']
				],
			],
			'productPaginationPGMarginUnit' => 'px',
			'productPaginationPGFontSize' => '16',
			'productPaginationPGFontSizeType' => 'px',
			'productPaginationPGFontSizeTablet' => '14',
			'productPaginationPGFontSizeMobile' => 'px',
			'productPaginationPGFontFamily' => '',
			'productPaginationPGFontWeight' => '300',
			'productPaginationPGLineHeightType' => 'em',
			'productPaginationPGLineHeight' => '1',
			'productPaginationPGLineHeightTablet' => '1',
			'productPaginationPGLineHeightMobile' => '1',
			'productPaginationPGLoadGoogleFonts' => true,
			'productPaginationTextTransform' => '',
        	'productPaginationLetterSpacing' => null,
			'productPaginationPGColor' => '#000',
			'productPaginationPGHcolor' => '#fff',
			'productPaginationPGBgColor' => '#fff',
			'productPaginationPGBgHcolor' => '#000',
			'productPaginationPGSpaceing' => '20',
			'productPaginationSpecing' => 10,
			'productPaginationPGPadding' => [
				[
					'desk' 		=> [ '6', '15', '6', '15' ],
					'tablet' 	=> [ '6', '15', '6', '15' ],
					'mobile' 	=> [ '6', '15', '6', '15' ]
				],
			],
			'productPaginationPGPaddingUnit' => 'px',
			'productPaginationPGBorderStyle' => 'solid',
			'productPaginationPGBorderWidth' => '1',
			'productPaginationPGBorderColor' => '#000',
			'productPaginationPGBorderHStyle' => 'solid',
			'productPaginationPGBorderHWidth' => '1',
			'productPaginationPGBorderHColor' => '#000',
			'productPaginationPGBR' => [
				[
					'desk' 		=> [ '0', '0', '0', '0' ],
					'tablet' 	=> [ '0', '0', '0', '0' ],
					'mobile' 	=> [ '0', '0', '0', '0' ]
				],
			],
			'productPaginationPGBRUnit' => 'px',			
			'productPaginationPGBoxShadowColor' => '#000',
			'productPaginationPGBoxShadowHOffset' => 0,
			'productPaginationPGBoxShadowVOffset' => 0,
			'productPaginationPGBoxShadowBlur' => 0,
			'productPaginationPGBoxShadowSpread' => 0,
			'productPaginationPGBoxShadowPosition' => "outset",
			//loadmore
			'loadMoreProduct' => false,
			'loadMoreProductMarkup' => '',
			'quickViewText' => 'Quick View',
			//loadmore btn style
			'gButtonAlignment' => 'center',
			'gButtonText' => 'Load More',
			'gButtonTopSpace' => '10',
			'gButtonBottomSpace' => '10',
			'gButtonFontSize' => '14',
			'gButtonFontSizeType' => 'px',
			'gButtonFontSizeTablet' => '14',
			'gButtonFontSizeMobile' => 'px',
			'gButtonFontFamily' => 'Inter',
			'gButtonFontWeight' => '500',
			'gButtonLineHeightType' => 'em',
			'gButtonLineHeight' => '1',
			'gButtonLineHeightTablet' => '1',
			'gButtonLineHeightMobile' => '1',
			'gButtonLoadGoogleFonts' => true,
			'gButtonTextTransform' => 'uppercase',
        	'gButtonLetterSpacing' => 0.2,
			'gButtonColor' => '#fff',
			'gButtonHcolor' => '#000',
			'gButtonBgColor' => '#000',
			'gButtonBgHcolor' => '#fff',
			'gButtonSpaceing' => '20',
			'gButtonPadding' => [
				[
					'desk' 		=> ['12', '22', '12', '22'],
					'tablet' 	=> ['8', '15', '8', '15'],
					'mobile' 	=> ['8', '15', '8', '15']
				],
			],
			'gButtonPaddingUnit' => 'px',
			'gButtonMargin' => [
				[
					'desk' 		=> ['20', '0', '0', '0'],
					'tablet' 	=> ['20', '0', '0', '0'],
					'mobile' 	=> ['20', '0', '0', '0']
				],
			],
			'gButtonMarginUnit' => 'px',
			'gButtonBorderStyle' => 'solid',
			'gButtonBorderWidth' => '1',
			'gButtonBorderColor' => '#000',
			'gButtonBorderHStyle' => 'solid',
			'gButtonBorderHWidth' => '1',
			'gButtonBorderHColor' => '#000',
			'gButtonBR' => [
				[
					'desk' 		=> ['0', '0', '0', '0'],
					'tablet' 	=> ['0', '0', '0', '0'],
					'mobile' 	=> ['0', '0', '0', '10']
				],
			],
			'gButtonBRUnit' => 'px',
			'gButtonBoxShadowColor' => '#000',
			'gButtonBoxShadowHOffset' => 0,
			'gButtonBoxShadowVOffset' => 0,
			'gButtonBoxShadowBlur' => 0,
			'gButtonBoxShadowSpread' => 0,
			'gButtonBoxShadowPosition' => "outset",
			'gButtonBoxShadowHoverColor' => '#000',
			'gButtonBoxShadowHOHoverffset' => 0,
			'gButtonBoxShadowVOHoverffset' => 0,
			'gButtonBoxShadowHoverBlur' => 0,
			'gButtonBoxShadowHoverSpread' => 0,
			'gButtonBoxShadowHoverPosition' => "outset",
			//swiper arrows
			'gSwiperArrowsIconColor' => '#fff',
			'gSwiperArrowsIconHColor' => '#000',
			'gSwiperArrowsBGColor' => '#000',
			'gSwiperArrowsBGHColor' => '#fff',
			'gSwiperArrowsBoxSize' => '50',
			'gSwiperArrowsBoxSizeTablet' => '50',
			'gSwiperArrowsBoxSizeMobile' => '30',
			'gSwiperArrowsIconSize' => '16',
			'gSwiperArrowsIconSizeTablet' => '16',
			'gSwiperArrowsIconSizeMobile' => '14',
			'gSwiperLeftArrowsPosX' => '30',
			'gSwiperLeftArrowsPosXTablet' => '30',
			'gSwiperLeftArrowsPosXMobile' => '20',
			'gSwiperLeftArrowsPosXUnit' => 'px',
			'gSwiperLeftArrowsPosXSyncUnits' => true,
			'gSwiperLeftArrowsPosY' => '50',
			'gSwiperLeftArrowsPosYTablet' => '50',
			'gSwiperLeftArrowsPosYMobile' => '50',
			'gSwiperLeftArrowsPosYUnit' => 'px',
			'gSwiperLeftArrowsPosYSyncUnits' => true,
			'gSwiperRightArrowsPosX' => '30',
			'gSwiperRightArrowsPosXTablet' => '30',
			'gSwiperRightArrowsPosXMobile' => '20',
			'gSwiperRightArrowsPosXUnit' => 'px',
			'gSwiperRightArrowsPosXSyncUnits' => true,
			'gSwiperRightArrowsPosY' => '50',
			'gSwiperRightArrowsPosYTablet' => '50',
			'gSwiperRightArrowsPosYMobile' => '30',
			'gSwiperRightArrowsPosYUnit' => 'px',
			'gSwiperRightArrowsPosYSyncUnits' => true,
			'gSwiperArrowsBR' => [
				[
					'desk' 		=> ['50', '50', '50', '50'],
					'tablet' 	=> ['50', '50', '50', '50'],
					'mobile' 	=> ['50', '50', '50', '50']
				],
			],
			'gSwiperArrowsBRUnit' => 'px',
		
			'gSwiperArrowsBRH' => [
				[
					'desk' 		=> ['50', '50', '50', '50'],
					'tablet' 	=> ['50', '50', '50', '50'],
					'mobile' 	=> ['50', '50', '50', '50']
				],
			],
			'gSwiperArrowsBRHUnit' => 'px',		
			'gSwiperArrowsBorderStyleNormal' => "none",
			'gSwiperArrowsBorderWidthNormal'=> 1,
			'gSwiperArrowsBorderColorNormal' => "#000000",
			'gSwiperArrowsBorderStyleHover' => "none",
			'gSwiperArrowsBorderWidthHover'=> 1,
			'gSwiperArrowsBorderColorHover' => "#000000",
			'gSwiperArrowsShadowColor' => '#0000001a',
			'gSwiperArrowsShadowHOffset' => 0,
			'gSwiperArrowsShadowVOffset' => 10,
			'gSwiperArrowsShadowBlur' => 30,
			'gSwiperArrowsShadowSpread' => 0,
			'gSwiperArrowsShadowPosition' => "outset",
			'gSwiperArrowsShadowColorHover' => '#000',
			'gSwiperArrowsShadowHOffsetHover' => 0,
			'gSwiperArrowsShadowVOffsetHover' => 0,
			'gSwiperArrowsShadowBlurHover' => 0,
			'gSwiperArrowsShadowSpreadHover' => 0,
			'gSwiperArrowsShadowPositionHover' => "outset",
			//swiper dots
			'gSwiperDotsColor' => '#000',
			'gSwiperDotsHColor' => '#fff',
			'gSwiperDotsBGColor' => '#e5e5e5',
			'gSwiperDotsBGHColor' => '#000',
			'gSwiperDotsBR' => [
				[
					'desk' 		=> ['50', '50', '50', '50'],
					'tablet' 	=> ['50', '50', '50', '50'],
					'mobile' 	=> ['50', '50', '50', '50']
				],
			],
			'gSwiperDotsBRUnit' => 'px',	
			'gSwiperDotsBRH' => [
				[
					'desk' 		=> ['50', '50', '50', '50'],
					'tablet' 	=> ['50', '50', '50', '50'],
					'mobile' 	=> ['50', '50', '50', '50']
				],
			],
			'gSwiperDotsBRHUnit' => 'px',
			'gSwiperDotsBorderStyleNormal' => "none",
			'gSwiperDotsBorderWidthNormal'=> 1,
			'gSwiperDotsBorderColorNormal' => "#000000",
			'gSwiperDotsBorderStyleHover' => "none",
			'gSwiperDotsBorderWidthHover'=> 1,
			'gSwiperDotsBorderColorHover' => "#000000",
			'gSwiperDotsShadowColor' => '#0000001a',
			'gSwiperDotsShadowHOffset' => 0,
			'gSwiperDotsShadowVOffset' => 10,
			'gSwiperDotsShadowBlur' => 30,
			'gSwiperDotsShadowSpread' => 0,
			'gSwiperDotsShadowPosition' => "outset",
			'gSwiperDotsShadowColorHover' => '#000',
			'gSwiperDotsShadowHOffsetHover' => 0,
			'gSwiperDotsShadowVOffsetHover' => 0,
			'gSwiperDotsShadowBlurHover' => 0,
			'gSwiperDotsShadowSpreadHover' => 0,
			'gSwiperDotsShadowPositionHover' => "outset",

		);
	
		return apply_filters( 'ShopCred_Defaults', self::$defaults );
	}

	/**
	 * Get defaults for our general options.
	 *
	 * @since 1.0.0
	 */
	public static function get_option_defaults() {
		return apply_filters(
			'shopcred_option_defaults',
			array(
				'css_print_method' => 'file',
				'sync_responsive_previews' => true,
			)
		);
	}

}

ShopCred_Defaults::get_instance();


