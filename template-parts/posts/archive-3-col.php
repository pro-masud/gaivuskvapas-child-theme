<?php if ( have_posts() ) : ?>



<?php



	// Create IDS

	$ids = array();

	while ( have_posts() ) : the_post();

		array_push($ids, get_the_ID());

	endwhile; // end of the loop.

	$url = parse_url(home_url( $wp->request ));

	if(!is_single() && !is_archive() && !is_search()) {

		$posts_wo_first = array_shift($ids);

	}

	

	if ($url['path'] == '/straipsniai') {

		/*$ids_a = implode(',', $ids);

		$ids_b = explode(',', $ids_a);

		$ids = array_slice($ids_b, 2);

		$ids = implode(',', $ids);*/

		$ids = implode(',', $ids);

	} else {

		$ids = implode(',', $ids);

	}



	

	$readmore = __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'flatsome' );

?>



<?php echo do_shortcode('[blog_posts type="row" depth="' . flatsome_option('blog_posts_depth') . '" depth_hover="' . flatsome_option('blog_posts_depth_hover') . '" text_align="' . get_theme_mod( 'blog_posts_title_align', 'center' ) . '" columns="3" ids="' . $ids . '"]'); ?>



<?php else : ?>



	<?php get_template_part( 'template-parts/posts/content','none'); ?>



<?php endif; ?>

