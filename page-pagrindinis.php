<?php
header('X-Frame-Options: SAMEORIGIN');
/*
Template name: Page - Pagrindinis
*/
get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>

<div id="content" role="main" class="content-area">

	<section class="main_banner">
		<?php $html = '[ux_slider type="fade" timer="4000" arrows="false" bullets="false"]'; ?>
		<?php $html .= get_main_slider_banners('main_banner'); ?>
		<?php $html .='[/ux_slider]'; ?>
		<?php echo do_shortcode($html); ?>
	</section>
	<section class="pt pb">
		<div class="row">
			<?php echo do_action('aon_menu_sliders'); ?>
		</div>
	</section>
	<section class="pb">
		<div class="row">
			<div class="col text-center uppercase">
				<h2 class="gk-highlight-text"><?php echo get_field('naujausi_produktai')['new_products_block_text'];?>
				</h2>
			</div>
		</div>
		<?php
			echo do_shortcode('[ux_products type="row" columns__sm="2" columns__md="2" show_rating="0" show_quick_view="0" products="4" orderby="date" out_of_stock="exclude" class="has-equal-box-heights equalize-box"]');
			
			//echo do_shortcode('
			//[ux_products order="asc" type="row" columns__md="2" columns__sm="2" col_spacing="small" show_rating="0" show_quick_view="0" products="4" class="has-equal-box-heights equalize-box" out_of_stock="exclude"]
			//');
		?>
	</section>
	<section class="pb pt-half">

		<div class="row">
			<div class="col text-center uppercase">
				<?php
				$prods = get_field('populiariausi_produktai');
				?>
				<h2 class="gk-highlight-text"><?php echo $prods['popular_products']; ?></h2>
			</div>
		</div>
		<?php
			echo do_shortcode('
			[ux_products order="asc" type="row" columns__md="2" columns__sm="2" col_spacing="small" show_rating="0" show_quick_view="0" ids="'.implode(',',$prods['select_products']).'" class="has-equal-box-heights equalize-box"]
			');
		?>
	</section>

	<?php echo do_action('aon_tersimonials'); ?>

	<section class="greyBg pt pb gk-news-grid">
		<div class="row">
			<div class="col uppercase text-center"><h2>Naujausi straipsniai</h2></div>
		</div>
		<?php echo do_shortcode('[blog_posts style="default" class="slider-show-nav" text_align="left" columns="3" columns__md="1" posts="6" slider_nav_style="simple" slider_nav_position="outside" slider_bullets="true"]'); ?>
	</section>
	<section class="greyBg pt pb gk-news-grid">
		<div class="row">
			<div class="col uppercase text-center"><h2>Populiariausi straipsniai</h2></div>
		</div>
		<?php
		$args = array(
			'posts_per_page' => 6,
			'post__in'  => get_option('sticky_posts'),
			'ignore_sticky_posts' => 1
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
			// Create IDS
			$ids = array();
			while ( $the_query->have_posts() ) : $the_query->the_post();
				array_push($ids, get_the_ID());
			endwhile; // end of the loop.

			// Set ids
			$ids = implode(',', $ids);

			//print_r($ids);
		
		echo do_shortcode('[blog_posts style="default" class="slider-show-nav" show_date="false" text_align="left" columns="3" columns__md="1" posts="6" slider_nav_style="simple" slider_nav_position="outside" slider_bullets="true" ids="'.$ids.'"]');
		endif;
		?>
	</section>
</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
