<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Check stock status.
$out_of_stock = ! $product->is_in_stock();

// Extra post classes.
$classes   = array();
$classes[] = 'product-small';
$classes[] = 'col';
$classes[] = 'has-hover';

if ( $out_of_stock ) $classes[] = 'out-of-stock';

?>

<div <?php fl_woocommerce_version_check( '3.4.0' ) ? wc_product_class( $classes, $product ) : post_class( $classes ); ?>>
	<div class="col-inner">
	<div class="product-small h100 box <?php echo flatsome_product_box_class(); ?>">

    <div class="title-wrapper text-center">
	
	<?php 
		$cname = get_field('prod_sub_name', $product->get_id());
		$prod_url = get_permalink($product->get_id());
		if ($cname) : ?>	
		
			<p class="name product-title">
				<a href="<?php echo $prod_url; ?>"><?php echo $product->get_title(); ?></a>
			</p>
			<p class="category product-cat"><?php echo $cname; ?></p>
			
	<?php endif; ?>
	<?php if (!$cname) : ?>
										
	
			<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>

			
	<?php endif; ?>	

    </div>
		<div class="box-image">
      <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<div class="<?php echo flatsome_product_box_image_class(); ?>">
				<a href="<?php echo get_the_permalink(); ?>">
					<?php
						/**
						 *
						 * @hooked woocommerce_get_alt_product_thumbnail - 11
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						do_action( 'flatsome_woocommerce_shop_loop_images' );
					?>
				</a>
			</div>
			<div class="image-tools is-small top right show-on-hover">
				<?php do_action( 'flatsome_product_box_tools_top' ); ?>
			</div>
			<div class="image-tools is-small hide-for-small bottom left show-on-hover">
				<?php do_action( 'flatsome_product_box_tools_bottom' ); ?>
			</div>
			<div class="image-tools <?php echo flatsome_product_box_actions_class(); ?>">
				<?php do_action( 'flatsome_product_box_actions' ); ?>
			</div>
			<?php if ( $out_of_stock ) { ?><div class="out-of-stock-label"><?php _e( 'Out of stock', 'woocommerce' ); ?></div><?php } ?>
		</div><!-- box-image -->
			<div class="box-text <?php echo flatsome_product_box_text_class(); ?>">
			<?php
				do_action( 'woocommerce_before_shop_loop_item_title' );

				echo '<div class="price-wrapper text-center">';

					if($product->is_on_sale() && $product->is_type('variable')) {
						$prices = $product->get_variation_prices( true );
						if($prices) {
							$min_reg_price = current( $prices['regular_price'] );
							$max_reg_price = end( $prices['regular_price'] );

							if ( $min_reg_price !== $max_reg_price ) {
								echo '<del aria-hidden="true">' . wc_format_price_range( $min_reg_price, $max_reg_price ) . '</del>';
							}
						}
					}
					
				do_action( 'woocommerce_after_shop_loop_item_title' );
				echo '</div>';
				do_action( 'flatsome_product_box_after' );

			?>
			</div>
	</div><!-- box -->
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</div><!-- .col-inner -->
</div><!-- col -->
