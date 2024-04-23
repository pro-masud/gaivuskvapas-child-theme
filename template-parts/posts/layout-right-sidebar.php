<?php
	do_action('flatsome_before_blog');
?>
<div class="container gk-shop-breads">
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
			echo gk_blog_menu_fn();
		?>
</div>
<?php if(!is_single() && flatsome_option('blog_featured') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
<?php
	if(!is_single() && !is_archive() && !is_search()) {
		if (have_posts()) {
			// $ids = array();
			// while ( have_posts() ) : the_post();
			// 	array_push($ids, get_the_ID());
			// endwhile; // end of the loop.
			// $first_post = reset($ids);
			echo '<div class="row">';
			echo '<div class="col">';
			echo '<h2>Naujausias straipsnis</h2>';
			echo '<div class="first-newest-post">';
				echo do_shortcode('[blog_posts style="normal" posts="1" type="row" columns="1" columns__md="1" image_size="large" text_align="left" excerpt_length="50" readmore="Skaityti toliau"]');
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}
?>

<div class="row <?php if(flatsome_option('blog_layout_divider')) echo ' ';?>">
	<div class="large-9 col">
	<?php if(!is_single() && !is_archive() && !is_search() && flatsome_option('blog_featured') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>
	<?php
		if(is_single()){
			get_template_part( 'template-parts/posts/single');
			comments_template();
		} elseif(flatsome_option('blog_style_archive') && (is_archive() || is_search())){
			echo '<h1>Straipsniai</h1>';
			get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style_archive') );
		} else {
			echo '<h1>Straipsniai</h1>';
			get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style') );
		}
	?>
	</div> <!-- .large-9 -->
	<?php
	if (is_mobile()) { ?>
		<div class="gk-woo-pagination">
			<?php flatsome_posts_pagination(); ?>
		</div>
		<?php
		if ( is_category() ) :
			// show an optional category description
			$category_description = category_description();
			if ( ! empty( $category_description ) ) :
				echo apply_filters( 'category_archive_meta', '<div class="col mt taxonomy-description">' . $category_description . '</div>' );
			endif;

		elseif ( is_tag() ) :
			// show an optional tag description
			$tag_description = tag_description();
			if ( ! empty( $tag_description ) ) :
				echo apply_filters( 'tag_archive_meta', '<div class="col mt taxonomy-description">' . $tag_description . '</div>' );
			endif;

		endif;
		?>
	<?php }
	?>
	<div class="post-sidebar large-3 col">
		<?php get_sidebar(); ?>
	</div><!-- .post-sidebar -->
	<?php
	if (!is_mobile()) { ?>
		<div class="gk-woo-pagination">
			<?php flatsome_posts_pagination(); ?>
		</div>
	<?php
	}
	?>

</div><!-- .row -->


<?php
	do_action('flatsome_after_blog');
?>
