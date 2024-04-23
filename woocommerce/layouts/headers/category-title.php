<style type="text/css">
	.category_menu_item {
		width: 100%;
		text-align: left;
		text-transform: unset;
		background-color: #f55501 !Important;
		display: block;
	}
	.category_menu_item:after {
		content: '';
	    width: 0;
	    height: 0;
	    border: 4px solid transparent;
	    border-top: 5px solid #fff;
	    z-index: 1;
	    position: absolute;
	    top: 5px;
	    bottom: 0;
	    margin: auto;
	    transition: all .2s;
	    margin-left: 10px;
	}
	@media screen and (min-width: 730px) {
		.category_menu_item { display: none; }
		.gk_shop_menu .menu { display: flex !important; }
	}
	@media screen and (max-width: 729px) {
		#menu-parduotuves-navigacija { display: none; }
		ul#menu-parduotuves-navigacija.menu>li ul {
			display: block;
		}
	}
	body {
		overflow-x: hidden;
	}
</style>

<div class="button primary category_menu_item" onclick="jQuery('#menu-parduotuves-navigacija').toggle();">
	Prekių kategorijos
</div>

<div class="container gk-shop-breads uppercase">
		<?php
			// $cats = get_field('shop',29);
			// $html = '<ul>';
			// 	$html .= '<li><a href="/parduotuve/">Visos prekės</a></li>';
			// 	foreach ($cats['pasirinkti_rodomas_kategorijas'] as $category) {
			// 		$html .= '<li>';
			// 			$html .= '<a href="'.get_term_link( $category, 'product_cat' ).'">';
			// 				if( $term = get_term_by( 'id', $category, 'product_cat' ) ){
			// 					$html .= $term->name;
			// 				}
			// 			$html .= '</a>';
			// 		$html .= '</li>';
			// 	}
			// $html .= '</ul>';
			//echo $html;
			echo gk_shop_menu_fn();
		?>
</div>
<div class="shop-page-title category-page-title page-title <?php flatsome_header_title_classes() ?>">

	<div class="flex-row  medium-flex-wrap row">
		<div class="col large-9 flex-row pb-0 remove-flex">
	  <div class="flex-col flex-grow uppercase">
	  	 	 <?php //do_action('flatsome_category_title') ;
				if (is_shop()) {
					echo '<h1>Parduotuvė</h1>';
				}
				if (is_product_category()) {
					echo '<h1>'.get_queried_object()->name.'</h1>';
				}
			 ?>
	  </div><!-- .flex-left -->

	   <div class="flex-col">
	  	 	<?php do_action('flatsome_category_title_alt') ;?>
	   </div><!-- .flex-right -->


	 </div>
	</div><!-- flex-row -->
</div><!-- .page-title -->
