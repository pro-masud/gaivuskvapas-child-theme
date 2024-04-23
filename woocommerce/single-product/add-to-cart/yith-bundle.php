<?php
/**
 * Bundle add-to-cart template
 *
 * @var array $available_variations The available variations.
 * @var array $attributes           The attributes.
 * @var array $selected_attributes  The selected attributes.
 * @var array $bundled_items        The bundled items.
 *
 * @author  YITH
 * @package YITH\ProductBundles\Templates
 */

defined( 'YITH_WCPB' ) || exit;

/**
 * The bundle product
 *
 * @var WC_Product_Yith_Bundle $product
 */
global $product;

// Late style and scripts loading.
wp_enqueue_style( 'yith_wcpb_bundle_frontend_style' );
wp_enqueue_script( 'yith_wcpb_bundle_frontend_add_to_cart' );

echo wc_get_stock_html( $product ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

$form_data = array(
	'product-id'        => $product->get_id(),
	'per-item-pricing'  => $product->per_items_pricing,
	'ajax-update-price' => apply_filters( 'yith_wcpb_ajax_update_price_enabled', $product->per_items_pricing, $product ),
);

$form_data = apply_filters( 'yith_wcpb_bundle_product_form_data', $form_data, $product );
?>

<?php 
	$bundled_items = $product->get_bundled_items();
	if ( $bundled_items ) {
		foreach ( $bundled_items as $bundled_item ) {
			$bundled_product = $bundled_item->get_product();
			$bundled_post    = get_post( yit_get_base_product_id( $bundled_product ) );
			$quantity        = $bundled_item->get_quantity();
			if ( !$bundled_product->has_enough_stock( $quantity ) || !$bundled_product->is_in_stock() ) {
				$product->set_stock_status('outofstock');
			}
		}
	}
?>

<?php if ( $product->is_in_stock() ) { ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<?php do_action( 'yith_wcpb_before_add_to_cart_form' ); ?>

	<form class="cart yith-wcpb-bundle-form" method="post" enctype='multipart/form-data'
		<?php yith_plugin_fw_html_data_to_string( $form_data, true ); ?>
	>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="custom_var_price">
			<div class="price-wrapper">
				<p class="price product-page-price <?php echo implode(' ', $classes); ?>">
			  <?php echo $product->get_price_html(); ?></p>
			</div>
			<?php

			
			if ( !$product->is_sold_individually() )
				woocommerce_quantity_input( array(
					'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
					'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
				) );
			?>

			<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>"/>

			<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

		</div>

		<?php
		$bi_args = array(
			'product'              => $product,
			'available_variations' => $available_variations,
			'attributes'           => $attributes,
			'selected_attributes'  => $selected_attributes,
			'bundled_items'        => $bundled_items,
		);
		wc_get_template( '/single-product/add-to-cart/yith-bundle-items-list.php', $bi_args, '', YITH_WCPB_TEMPLATE_PATH . '/premium' );

		if ( ! $product->is_purchasable() ) {
			echo '</form>';

			return;
		}
		?>

		<?php
		/**
		 * Action: woocommerce_after_add_to_cart_quantity
		 *
		 * @since 1.2.8
		 */
		do_action( 'woocommerce_after_add_to_cart_quantity' );

		?>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php } else {

	$classes = array();
		if($product->is_on_sale()) $classes[] = 'price-on-sale';
		if(!$product->is_in_stock()) $classes[] = 'price-not-in-stock'; ?>
		<div class="custom_var_price">
			<div class="price-wrapper">
				<?php echo wc_get_stock_html( $product );?>
				<p class="price product-page-price <?php echo implode(' ', $classes); ?>">
			  <?php echo $product->get_price_html(); ?></p>
			</div>
			<div class="single-cart-form">
				<p>
					<?php echo __( 'Quantity', 'woocommerce' ); // WPCS: XSS ok.
					?>
				</p>
				<?php do_action( 'woocommerce_simple_add_to_cart' ); ?>
			</div>
		</div>

		<style type="text/css">
			.product-type-yith_bundle .cwginstock-subscribe-form  {
			    display: block !important;
			}
		</style>

<?php 

		$bi_args = array(
			'product'              => $product,
			'available_variations' => $available_variations,
			'attributes'           => $attributes,
			'selected_attributes'  => $selected_attributes,
			'bundled_items'        => $bundled_items,
		);
		wc_get_template( '/single-product/add-to-cart/yith-bundle-items-list.php', $bi_args, '', YITH_WCPB_TEMPLATE_PATH . '/premium' );


} ?>