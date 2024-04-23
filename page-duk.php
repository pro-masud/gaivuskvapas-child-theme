<?php
/*
Template name: Page - DUK
*/
get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>
<?php $duk = get_field('duk'); ?>
<?php $questions = get_field('questions_&_answers'); ?>
<div id="content" role="main" class="content-area pt-5">
	<div class="row">
		<div class="col page-title uppercase"><h1><?php echo get_the_title(); ?></h1></div>
		<div class="col large-9">
			<div class="row pb">
				<div class="col">
					<div class="gk-page-banner-wrap relative">
						<div class="banner_bg gk-inner-banner absolute">
							<?php echo wp_get_attachment_image($duk['main_banner'], 'full'); ?>
						</div>
						<div class="banner_content duk relative">
							<h2><?php echo $duk['banner_main_text']; ?></h2>
							<?php echo $duk['banner_sub_text']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="duk-accordion mb pb">
			<?php
				$html = '[accordion auto_open="true"]';
				foreach ($questions as $qna) {
					$html .= '[accordion-item title="'.$qna['question_name'].'"]';
						$html .= $qna['answer'];
					$html .= '[/accordion-item]';
				}
				$html .= '[/accordion]';
				echo do_shortcode($html);
			?>
			</div>
			<div class="gk-cf7-wrap">
				<h3><?php echo get_field('additional_text'); ?></h3>
				<?php echo do_shortcode('[contact-form-7 id="32216" title="Kontaktai"]'); ?>
			</div>
		</div>
		<div class="col large-3">
			<?php echo the_widget( 'aon_widget' ); ?>
		</div>
	</div>

	<?php echo do_action('aon_tersimonials'); ?>

</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
