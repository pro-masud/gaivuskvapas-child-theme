<?php
/*
Template name: Page - Pristatymas
*/
get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>
<?php $delivery = get_field('delivery'); ?>
<div id="content" role="main" class="content-area pt-5">
	<div class="row">
		<div class="col page-title uppercase"><h1><?php echo get_the_title(); ?></h1></div>
		<div class="col large-9">
			<div class="banner mb">
			  <?php echo wp_get_attachment_image($delivery['main_banner'], 'full'); ?>
			</div>
			<div class="content"><?php echo the_content(); ?></div>

			<?php if ($delivery['papildomas_tekstas']) : ?>
				<div class="additional_text">
					<?php echo $delivery['papildomas_tekstas']; ?>
				</div>
			<?php endif; ?>

		</div>
		<div class="col large-3">
			<?php echo the_widget( 'aon_widget' ); ?>
		</div>
	</div>

	<?php echo do_action('aon_tersimonials'); ?>

</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
