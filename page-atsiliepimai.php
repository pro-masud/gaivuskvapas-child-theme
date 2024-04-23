<?php
/*
Template name: Page - Atsiliepimai
*/
get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>
<?php $testimonials = get_field('testimonials'); ?>
<div id="content" role="main" class="content-area">
	<?php echo do_action('aon_tersimonials'); ?>

	<div class="row mb pt" id="scrt">
		<div class="col large-12 page-title uppercase"><h1><?php echo get_the_title(); ?></h1></div>
		<div class="col large-9">
			<div class="row pb">
				<div class="col">
					<div class="gk-page-banner-wrap relative gk-mobile-banner">
						<div class="banner_bg gk-inner-banner absolute">
							<?php echo wp_get_attachment_image($testimonials['main_banner'], 'full'); ?>
						</div>
						<div class="banner_content relative">
							<?php echo $testimonials['banner_main_text']; ?>
						</div>
					</div>
				</div>
			</div>
			<section class="gk-testimonials">
				<?php echo get_prod_testimonials(); ?>
			</section>
		</div>
		<div class="col large-3">
			<?php echo the_widget( 'aon_widget' ); ?>
		</div>
	</div>




</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
