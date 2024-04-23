<?php
	function flatsome_checkout_breadcrumb_class($endpoint){
		$classes = array();
		if($endpoint == 'cart' && is_cart() ||
			$endpoint == 'checkout' && is_checkout() && !is_wc_endpoint_url('order-received') ||
			$endpoint == 'order-received' && is_wc_endpoint_url('order-received')) {
			$classes[] = 'current';
		} else{
			$classes[] = 'hide-for-small';
		}
		return implode(' ', $classes);
	}
	$steps = get_theme_mod('cart_steps_numbers', 0);
?>
<div class="row">
	<div class="col">

		<?php do_action('aon_breadcrumbs_hook'); ?>
		<h1 class="uppercase"><?php echo the_title(); ?></h1>
	</div>
</div>
