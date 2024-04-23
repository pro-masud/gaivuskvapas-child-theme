<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>

	<div class="custom_cart_colaterals">
		<div class="cart_colaterals_head dark">
			<div class="subtotal_name"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
			<div class="shipping_name"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></div>
			<div class="total_name"><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
		</div>
		<div class="cart_colaterals_content">
			<div class="cart_totals_subtotal"><?php wc_cart_totals_subtotal_html(); ?></div>
			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<div class="shipping"><?php wc_cart_totals_shipping_html(); ?></div>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

			<?php endif; ?>


			<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

			<div class="order-total"><?php wc_cart_totals_order_total_html(); ?></div>

			<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
		</div>


		<div class="cart_colaterals_footer">
			<div class="coupon">
				<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
					<?php wc_cart_totals_coupon_label( $coupon ); ?>
					<?php wc_cart_totals_coupon_html( $coupon ); ?>
				<?php endforeach; ?>
			</div>
			<div class="move_next"><?php do_action( 'woocommerce_proceed_to_checkout' ); ?></div>
		</div>
	</div>
	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
