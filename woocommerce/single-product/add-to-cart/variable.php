<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<td class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label></td>
						<td class="value">
							<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
								echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				 ?>
				<div class="custom_var_price">
					<?php global $product;

					$classes = array();
					if($product->is_on_sale()) $classes[] = 'price-on-sale';
					if(!$product->is_in_stock()) $classes[] = 'price-not-in-stock'; ?>
					
					<?php
						$prices = $product->get_variation_prices( true );
						$price_html = '';
						if($prices) {
							$min_price     = current( $prices['price'] );
							$max_price     = end( $prices['price'] );
							$min_reg_price = current( $prices['regular_price'] );
							$max_reg_price = end( $prices['regular_price'] );

							if($product->is_on_sale()) {
								if ( $min_price !== $max_price ) {
									if ( $min_reg_price !== $max_reg_price ) {
										$price_html = wc_format_sale_price(wc_format_price_range( $min_reg_price, $max_reg_price ), wc_format_price_range( $min_price, $max_price ));
									} else {
										$price_html = wc_format_sale_price(wc_price( $min_reg_price), wc_format_price_range( $min_price, $max_price ));
									}
								} else {
									if ( $min_reg_price !== $max_reg_price ) {
										$price_html = wc_format_sale_price(wc_format_price_range( $min_reg_price, $max_reg_price ), wc_price( $min_price ));
									} else {
										$price_html = wc_format_sale_price(wc_price( $min_reg_price), wc_price( $min_price ));
									}
								}
							} else {
								if ( $min_price !== $max_price ) {
									$price_html = wc_format_price_range( $min_price, $max_price );
								} else {
									$price_html = wc_price($min_price);
								}
							}
						}
					?>

					<div class="price-wrapper hide_on_select">
						<p class="price product-page-price <?php echo implode(' ', $classes); ?>">
						<?php 
							if($price_html) {
								echo $price_html;
							} else {
								echo $product->get_price_html(); 
							}
						?></p>
					</div>

					<?php //print_r($product); ?>
					<script type="text/template" id="tmpl-variation-template">
						<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
						<div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
					</script>
					<script type="text/template" id="tmpl-unavailable-variation-template">
						<p><?php esc_html_e( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ); ?></p>
					</script>
					<?php do_action( 'woocommerce_single_variation' ); ?>
					<a href="/cart/?add-to-cart=<?php echo esc_attr( $product->get_id() ); ?>" class="button single_add_to_cart_button button alt buy_now_btn newlink disabled">PIRKTI DABAR</a>				
					<script>
						jQuery.noConflict(), jQuery(document).ready(function($) {
							$('input.variation_id').change(function() {
								$('select').blur();
							});
							let add_to_cart_url = $("a.newlink").attr("href");
							$('select').blur( function(){
								$('a.newlink').removeClass('disabled');
								let variation_id = $('input.variation_id').val();
								let new_url = "/cart/?add-to-cart="+variation_id+"";

								if(variation_id) {
									$('.hide_on_select').hide();
								} else {
									$('.hide_on_select').show();
								}

								if (new_url != add_to_cart_url) {
									let quantity = $('.input-text.qty.text').val();
									$("a.newlink").attr("href", ""+new_url+"&quantity="+quantity+"");
								}
								$('.input-text.qty.text').on('change', function() {
									let quantity = this.value;
									$("a.newlink").attr("href", ""+new_url+"&quantity="+quantity+"");
								});
							});
						});
					</script>
				 </div>



				<?php
				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
