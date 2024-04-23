<?php
/*
Template name: Page - Apie mus
*/
get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>
<?php $info = get_field('informacija'); ?>
<?php $promo = get_field('promo'); ?>
<div id="content" role="main" class="content-area pt-5 heading-padding">
	<div class="row mb">
		<div class="col page-title uppercase"><h1><?php echo get_the_title(); ?></h1></div>
		<div class="col large-9">
			<div class="content"><?php echo the_content(); ?></div>
			<div class="advantages">
				<h4><?php echo $info['privalumu_pagrindinis_tekstas'] ?></h4>
				<?php $x = 1; ?>
					<ul>
					<?php
					if ($info['privalumai']) :
					foreach ($info['privalumai'] as $privalumas) { ?>
						<li><?php echo $x.'. '.$privalumas['privalumas']; ?></li>
						<?php $x++; ?>
			  <?php } endif; ?>
					</ul>
			</div>
			<div class="rekommendations">
				<h4><?php echo $info['rekomendaciju_pagrindinis_tekstas'] ?></h4>
				<?php $x = 1; ?>
					<ul>
					<?php
					if ($info['rekomendacijos']) :
					foreach ($info['rekomendacijos'] as $privalumas) { ?>
						<li><?php echo $x.'. '.$privalumas['rekomendacija']; ?></li>
						<?php $x++; ?>
			  <?php } endif; ?>
					</ul>
			</div>
			<?php if ($info['papildomas_tekstas']) : ?>
				<div class="rekommendations mt pb">
					<?php echo $info['papildomas_tekstas']; ?>
				</div>
			<?php endif; ?>
			<?php if ($promo['promo_pavadinimas']) : ?>
				<div class="promo mt">
					<h2 class="mb"><?php echo $promo['promo_pavadinimas'] ?></h2>
					<?php echo wp_get_attachment_image($promo['nuotrauka'], 'full'); ?>
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
