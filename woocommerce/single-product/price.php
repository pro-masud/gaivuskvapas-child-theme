<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
foreach ($product as $prod) {
	if ($prod[1]['product_id']) {
		$is_bundle = $prod[1]['product_id'];
	}
}

if ( (!$product->is_type( 'variable' ))) {
	if ($is_bundle == '') {
		$classes = array();
		if($product->is_on_sale()) $classes[] = 'price-on-sale';
		if(!$product->is_in_stock()) $classes[] = 'price-not-in-stock'; ?>
		<div class="custom_var_price">
			<div class="price-wrapper">
				<?php echo wc_get_stock_html( $product ); // WPCS: XSS ok.
?>
				<p class="price product-page-price <?php echo implode(' ', $classes); ?>">
			  <?php echo $product->get_price_html(); ?></p>
			</div>
			<div class="single-cart-form">
				<p>
					<?php echo __( 'Quantity', 'woocommerce' ); // WPCS: XSS ok.
					?>
				</p>
				<?php do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' ); ?>
			</div>
		</div>
	<?php } ?>
<?php } ?>
