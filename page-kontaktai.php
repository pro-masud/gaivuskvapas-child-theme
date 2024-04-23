<?php
/*
Template name: Page - Kontaktai
*/
get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>
<?php $contact_us = get_field('contact_us'); ?>
<div id="content" role="main" class="content-area pt-5 kontaktai-page">
	<div class="row mb">
		<div class="col large-12 page-title uppercase"><h1><?php echo get_the_title(); ?></h1></div>
		<div class="col large-9">
			<div class="row">
				<div class="col">
					<div class="gk-page-banner-wrap contact-banner relative">
						<div class="banner_bg gk-inner-banner absolute">
							<?php echo wp_get_attachment_image($contact_us['main_banner'], 'full'); ?>
						</div>
						<div class="banner_content relative">
							<h2><?php echo $contact_us['banner_main_text']; ?></h2>
							<div class="contact-banner-button-wrap">
								<a class="button alt-color" href="tel:<?php echo $contact_us['phone_number'] ?>"><?php echo wp_get_attachment_image($contact_us['phone_icon'], 'full') . $contact_us['phone_number']; ?></a>
								<a class="button alt-color" href="mailto:<?php echo $contact_us['email'] ?>"><?php echo wp_get_attachment_image($contact_us['email_icon'], 'full') . $contact_us['email']; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php echo do_shortcode('[contact-form-7 id="32216" title="Kontaktai"]'); ?>
			<?php echo the_content(); ?>
		</div>
		<div class="col large-3">
			<?php echo the_widget( 'aon_widget' ); ?>
		</div>
	</div>

	<?php echo do_action('aon_tersimonials'); ?>


</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
