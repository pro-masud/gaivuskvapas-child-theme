<?php
// remove url field from comments
add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}
// Remove Order Notes Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );

function remove_order_notes( $fields ) {
     unset($fields['order']['order_comments']);
     $fields['billing']['billing_phone']['class']   = array('form-row-first'); //  50%
     $fields['billing']['billing_city']['class']   = array('form-row-first'); //  50%
     $fields['billing']['billing_postcode']['class']   = array('form-row-last');  //  50%
     $fields['billing']['billing_email']['class']   = array('form-row-last');  //  50%
     return $fields;
}
add_filter( 'woocommerce_get_image_size_single', function( $size ) {
	return array(
		'height' => 400,
		'width' => 400,
		'crop' => 1,
	);
} );
add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
	return array(
		'height' => 300,
		'width' => 300,
		'crop' => 1,
	);
} );
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
	return array(
		'height' => 140,
		'width' => 140,
		'crop' => 1,
	);
} );
function register_gk_shop_menu() {
  register_nav_menu('gk-shop-menu', 'Parduotuvės navigacija');
  register_nav_menu('gk-blog-menu', 'Straipsnių navigacija');
}
add_action( 'init', 'register_gk_shop_menu' );
function gk_shop_menu_fn() {
	wp_nav_menu( array(
		'theme_location' => 'gk-shop-menu', 'container_class' => 'gk_shop_menu' )
	);
}
function gk_blog_menu_fn() {
	wp_nav_menu( array(
		'theme_location' => 'gk-blog-menu', 'container_class' => 'gk_shop_menu' )
	);
}
//add_action('wp_footer', 'dantis_floating_menu');

add_action( 'wp_dashboard_setup', 'bt_remove_dashboard_widgets' );
function bt_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_primary','dashboard','side' ); // WordPress.com Blog
	remove_meta_box( 'dashboard_plugins','dashboard','normal' ); // Plugins
	remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); // Right Now
	remove_action( 'welcome_panel','wp_welcome_panel' ); // Welcome Panel
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg
	remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
	remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
	remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
	remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
	remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
	remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
	remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
	remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
	remove_meta_box('yith_dashboard_blog_news','dashboard', 'normal'); // Activity
	remove_meta_box('yith_dashboard_products_news','dashboard', 'normal'); // Activity
}
add_filter( 'woocommerce_available_variation', 'my_variation', 10, 3);
function my_variation( $data, $product, $variation ) {
	if(!$data['price_html']) {
		$data['price_html'] = woocommerce_price($variation->price);
	}
    return $data;
}
 /* check if user using smaller mobile device */
function is_mobile() {
	include_once ( get_template_directory() . '/Mobile-Detect/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	if( $detect->isMobile() && !$detect->isTablet() ) {
		return true;
	} else {
		return false;
	}
}
/* check if user using tablet device */
function is_tablet() {
	include_once ( get_template_directory() . '/Mobile-Detect/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	if( $detect->isTablet() ) {
		return true;
	} else {
		return false;
	}
}

///// breads //////
function aon_breadcrumbs_hook() {
    do_action('aon_hook');
}
add_action('aon_breadcrumbs_hook', 'aon_breadcrumbs');
function aon_breadcrumbs() {
	if ( function_exists('yoast_breadcrumb') ) {
	  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
	}
}
///// breads end //////
///// Disable wisvyg //////
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return;
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if($template_file == 'page-pagrindinis.php' || $template_file == 'page-atsiliepimai.php' || $template_file == 'page-duk.php'){
        remove_post_type_support('page', 'editor');
    }
}
///// Disable wisvyg END//////
/// get slider banners ///
function get_main_slider_banners($field_name) {
	$all = get_field($field_name);
	if ($all) {
		foreach ($all as $val) {
			$html .= '<a class="banner_bg" href="'.$val['nuoroda'].'">'.wp_get_attachment_image($val['hero_image'], 'full').'</a>';
		}
	}
	return $html;
}
function aon_menu_sliders() {
    do_action('aon_hook');
}
add_action('aon_menu_sliders', 'aon_function');

function aon_function() {
	$info = get_field('meniu_sliders', '34320');
	if ($info) {
		$split = array_chunk($info, 2);
		$html .= '[ux_slider infinitive="true" nav_style="simple" hide_nav="true" nav_pos="outside" nav_color="dark" bullets="false"]';
			foreach($split as $items) {
				$html .= '<div class="row row-small">';
				foreach ($items as $items_val) {
					$html .='<div class="col large-6 small-6">';

						$html .= '<div class="col-inner">';
							$html .= '<div class="row-banner-bg">'.wp_get_attachment_image($items_val['image'], 'full').'</div>';
							$html .= '<div class="row-banner-content">
													<h2>'.$items_val['text'].'</h2>
													<a href="'.get_term_link( $items_val['menu_url'], 'product_cat' ).'" class="button">Žiūrėti</a>';
							$html .= '</div>';
						$html .= '</div>';
					$html .='</div>';
				}
				$html .= '</div>';
			}
		$html .= '[/ux_slider]';
		echo do_shortcode($html);
	}
}
function aon_tersimonials() {
    do_action('aon_hook');
}
add_action('aon_tersimonials', 'aon_testimonial_function');

function aon_testimonial_function() {
	$info = get_field('testimonials', '34352');
	if ($info) {
		$html .= '

		<section class="yellowBg pt pb">
			<div class="row">
				<div class="col uppercase text-center">
					<h2>Atsiliepimai</h2>
				</div>';
		if (is_mobile()) {
			$split = array_chunk($info, 1);
		} else {
			$split = array_chunk($info, 2);
		}
		
		$html .= '[ux_slider auto_slide="false" infinitive="true" hide_nav="true" nav_pos="outside" nav_style="simple" bullet_style="simple" nav_color="dark" bullets="true"]';
			foreach($split as $items) {
				$html .= '<div class="row">';
				foreach ($items as $items_val) {
					$html .='<div class="col large-6 small-12">';

						$html .= '
							[testimonial stars="'.$items_val['star_count'].'" image="'.$items_val['image'].'" name="'.$items_val['name'].'"]
								<p>'.$items_val['text'].'</p>
							[/testimonial]
						';

					$html .='</div>';
				}
				$html .= '</div>';
			}
		$html .= '[/ux_slider]';
		$html .= '
			</div>
		</section>
		';
		echo do_shortcode($html);
	}
}
function make_footer() {
	$rekv = get_field('rekvizitai', '34359');
	$soc_media = get_field('social_media', '34359');
	$menu = get_field('footer_menu', '34359');
	if ($rekv) {
		$html .= '<div class="row dark">';
			$html .= '<div class="col large-5">';
				$html .= '<h3>'.$rekv['text'].'</h3>';
				$html .= '<div class="company-info">';
					$html .= '<p>'.$rekv['name'].'</p>';
					$html .= '<p>'.$rekv['address'].'</p>';
					$html .= '<p>'.$rekv['bank_acc'].'</p>';
				$html .= '</div>';
				$html .= '<div class="pm">';
					$html .= '<a href="tel:'.$rekv['phone'].'"><img src="/wp-content/themes/gaivuskvapas-child/svg/phone_copy-min.png" />'.$rekv['phone'].'</a>';
					$html .= '<a href="mailto:'.$rekv['email'].'"><img src="/wp-content/themes/gaivuskvapas-child/svg/letter_copy-min.png" />'.$rekv['email'].'</a>';
				$html .= '</div>';
				if ($soc_media) {
					$html .= '<div class="social">';
						$html .= '<a href="'.$soc_media['facebook'].'" target="_blank"><img src="/wp-content/themes/gaivuskvapas-child/svg/facebook-min.png" /></a>';
						$html .= '<a href="'.$soc_media['instagram'].'" target="_blank"><img src="/wp-content/themes/gaivuskvapas-child/svg/instagram-min.png" /></a>';
						$html .= '<a href="'.$soc_media['youtube'].'" target="_blank"><img src="/wp-content/themes/gaivuskvapas-child/svg/youtube-min.png" /></a>';
					$html .= '</div>';
				}
			$html .= '</div>';

			$html .= '<div class="col large-7">';
				$html .= '<div class="footer-menu">';
					foreach ($menu as $menu_item) {
						$html .= '<a href="'.$menu_item['menu_url'].'">'.$menu_item['menu_item'].'</a>';
					}
				$html .= '</div>';
				$html .= '<div class="row row-collapse footer-newsletter-row">';
					$html .= '<div class="col medium-3">';
						$html .= '<h3>Sekite mūsų NAUJIENAS, AKCIJAS ir NUOLAIDAS!</h3>';
					$html .= '</div>';
					$html .= '<div class="col medium-9 gk-newsletter-wrap">';
						$html .= '<h4>Registruokis ir gauk naujienas apie nuolaidas pirmas!</h4>';
						$html .= '[mc4wp_form id="398"]';
					$html .= '</div>';
				$html .= '</div>';
				$html .= '
					<form role="search" method="get" class="searchform" action="https://gaivuskvapas.lt/">
						<div class="flex-row relative">
							<div class="flex-col flex-grow">
								<label class="screen-reader-text" for="woocommerce-product-search-field-0">Ieškoti:</label>
								<input type="search" id="woocommerce-product-search-field-0" class="search-field mb-0" placeholder="Jūsų paieškos tekstas" value="" name="s" autocomplete="off">
								<input type="hidden" name="post_type" value="product">
							</div>
							<div class="flex-col">
								<button type="submit" value="Ieškoti" class="ux-search-submit submit-button secondary button icon mb-0">
								<i class="icon-search"></i></button>
							</div>
						</div>
					</form>
				';
			$html .= '</div>';
		$html .= '</div>';
		echo do_shortcode($html);
	}
}
function get_product_by_comment($comment_id) {
	global $wpdb;
	$posts = $wpdb->get_results("SELECT comment_post_ID FROM $wpdb->comments WHERE comment_ID = '".$comment_id."' ", OBJECT );
	foreach ($posts as $post) {
		return $post->comment_post_ID;
	}
}
function get_prod_testimonials() {

	$args = array(
		'post_type' => 'product',
		'status'      => 'approve',
		'post_status' => 'publish',
		'posts_per_page' => 500

	);
	
	$products = get_posts( $args );
	global $wpdb;

	foreach ($products as $product) {
		$product_id = $product->ID;
		$sql = "SELECT comment_ID as cid
            FROM {$wpdb->comments}
			WHERE comment_author NOT LIKE 'WooCommerce'
			AND
			comment_author NOT LIKE 'gaivuskvapas.lt'
			AND comment_post_ID = '$product_id'
			ORDER BY `comment_date` DESC
            LIMIT 1";
		$info = $wpdb->get_row( $wpdb->prepare( $sql ),ARRAY_A );
		if ($info) {
			foreach ($info as $ids) {
				$good_ids .= $ids.', ';
			}
		}
	}
	$good_ids = str_replace(' ', '', $good_ids);
	$good_ids = substr($good_ids, 0, -1);
	
	$sqlx = "
		SELECT comment_ID
		FROM {$wpdb->comments} 
		WHERE comment_ID IN (".$good_ids.") 
		AND comment_author NOT LIKE 'WooCommerce' 
		AND comment_approved NOT LIKE 'trash'
		ORDER BY `comment_date` DESC
	";
	$infox = $wpdb->get_results( $sqlx, ARRAY_A );

	if ($infox) {
		foreach ($infox as $val) {
			
			foreach ($val as $valx) {
				$comment = get_comment( $valx );
			
				$html = '<div class="row row-collapse mb">';
					$html .= '<div class="col large-3 box text-center">';
						$product_link = get_permalink(get_product_by_comment($comment->comment_ID));
						$html .='<a href="'.$product_link.'">'. wp_get_attachment_image(get_post_thumbnail_id(get_product_by_comment($comment->comment_ID)),"full").'</a>';
						$html .= '
							<div class="product-title"><a href="'.$product_link.'">'
								.get_the_title(get_product_by_comment($comment->comment_ID)).'
							</a></div>';
						$categories = get_the_terms( get_product_by_comment($comment->comment_ID), 'product_cat' );
						if ( $categories && ! is_wp_error( $category ) ) :
							foreach($categories as $category) :
							  $children = get_categories( array ('taxonomy' => 'product_cat', 'parent' => $category->term_id ));

							  if ( count($children) == 0 ) {
								  $html .= '
										<div class="product-cat">'
											.$category->name.
										'</div>';
							  }
							endforeach;
						endif;

					$html .= '</div>';
					$html .= '<div class="col large-9">';
						$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
						$html .= '<div class="date-name">';
							if ($comment->comment_author == 'Anonimas') {
								$author = 'Gaivus kvapas pirkėjas';
							} else {
								$author = $comment->comment_author;
							}
							$html .= '<div class="author">'.$author.'</div>';
							$html .= '<div class="date">'.substr($comment->comment_date, 0, 10).'</div>';
						$html .= '</div>';
						$html .= '<div class="stars">';
							if ( $rating && wc_review_ratings_enabled() ) {
								$html .= ''.wc_get_rating_html( $rating ).'';
							}
						$html .= '</div>';
						$html .= '<div class="comment">'.$comment->comment_content.'</div>';
					$html .= '</div>';

				$html .= '</div>';

				echo $html;
			}
		}
	}
	?>
	<ul class="page-numbers nav-pagination links text-center" id="pagin"></ul>
	<?php wp_reset_postdata();
}

function aon_load_widget() {
    register_widget( 'aon_widget' );
}
add_action( 'widgets_init', 'aon_load_widget' );

class aon_widget extends WP_Widget {

	function __construct() {
		parent::__construct(

			// widgeto id
			'aon_widget',

			// Widgeto pavadinimas
			__('custom post widget', 'aon_widget_domain'),

			// widgeto aprasymas
			array( 'description' => __( 'Custom widget to display posts with photo for ecovis', 'aon_widget_domain' ), )
		);
	}

	 public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		// defininam temoje
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		global $wc_cpdf;
		// widgeto frontas

		$info = get_field('information', 34362);
		//$product = wc_get_product( $info['product'] );
		$html .= '<div class="imag expand-img">'.wp_get_attachment_image($info['delivery_image'],"full").'</div>';

		$html .= '<div class="prod_box gk-sidebar-product">';
				$html .= '<div class="widget_head dark">';
					$html .= '<h3>'.$info['popular_product_header'].'</h3>';
					$html .= '<div class="leading-widget-text">'.$info['popular_product_sub_header'].'</div>';
				$html .= '</div>';
				// div box
				if ($info['product'] > 1) {
					$html .= '[ux_slider nav_style="simple" nav_color="dark" bullets="false" timer="4000"]';
					foreach ($info['product'] as $product) {
						$product_x = wc_get_product( $product );
						$html .= '<div class="product-small box has-equal-box-heights">';
							$html .= '<div class="prod_cont">';
								$html .= '<div class="title-wrapper text-center">';
									$html .= '<p class="name product-title"><a href="'.get_permalink($product).'">'.get_the_title($product).'</a></p>';

								$cat = get_the_terms( $product, 'product_cat' );
								$cname = get_field('prod_sub_name', $product_x->get_id());
								if ($cname) {
									$html .= '<p class="category product-cat">'.$cname.'</p>';
								} else {
									$html .= '<p class="category product-cat">'.$cat[0]->name.'</p>';
								}

								$html .= '</div>';
								$html .= '<div class="box-image">';
									if ( $wc_cpdf->get_value( $product, '_bubble_new' ) ) {

										$bubble_text = $wc_cpdf->get_value( $product , '_bubble_text' ) ? $wc_cpdf->get_value( $product, '_bubble_text' ) : __( 'New', 'flatsome' );

										$html .= '<div class="badge-container absolute right top z-1"><div class="badge callout badge-circle"><div class="badge-inner callout-new-bg is-small new-bubble">' . $bubble_text . '</div></div></div>';
									}
									$html .= '<a href="'.get_permalink($product).'">'
													.wp_get_attachment_image(get_post_thumbnail_id($product),"full").
													'</a>';
								$html .= '</div>';
								$html .= '<div class="box-text box-text-products text-center grid-style-2">
										<div class="price-wrapper text-center">';
											$html .= '<span class="price"><span class="woocommerce-Price-amount amount">'.$product_x->price.'<span class="woocommerce-Price-currencySymbol">€</span></span></span>';
									$html .= '</div>';
									$html .= '<div class="add-to-cart-button">';
									$html .= '<a href="/?add-to-cart='.$product.'" class="primary is-small mb-0 button add_to_cart_button ajax_add_to_cart">Į KREPŠELĮ</a>';
									$html .= '</div>';
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';//end box
					}
					$html .= '[/ux_slider]';
				} else {
					$product = wc_get_product( $info['product'] );
					$html .= '<div class="product-small box has-equal-box-heights">';

						$html .= '<div class="prod_cont">';
							$html .= '<div class="title-wrapper text-center">';
								$html .= '<p class="name product-title"><a href="'.get_permalink($info['product']).'">'.get_the_title($info['product']).'</a></p>';
								$cat = get_the_terms( $product, 'product_cat' );
								$cname = get_field('prod_sub_name', $product_x->get_id());
								if ($cname) {
									$html .= '<p class="category product-cat">'.$cname.'</p>';
								} else {
									$html .= '<p class="category product-cat">'.$cat[0]->name.'</p>';
								}

							$html .= '</div>';
							$html .= '<div class="box-image">';
								if ( $wc_cpdf->get_value( $info['product'], '_bubble_new' ) ) {

									$bubble_text = $wc_cpdf->get_value( $info['product'] , '_bubble_text' ) ? $wc_cpdf->get_value( $info['product'], '_bubble_text' ) : __( 'New', 'flatsome' );

									$html .= '<div class="badge-container absolute right top z-1"><div class="badge callout badge-circle"><div class="badge-inner callout-new-bg is-small new-bubble">' . $bubble_text . '</div></div></div>';
								}
								$html .= '<a href="'.get_permalink($info['product']).'">'
												.wp_get_attachment_image(get_post_thumbnail_id($info['product']),"full").
												'</a>';
							$html .= '</div>';
							$html .= '<div class="box-text box-text-products text-center grid-style-2">
									<div class="price-wrapper text-center">';
										$html .= '<span class="price"><span class="woocommerce-Price-amount amount">'.$product->price.'<span class="woocommerce-Price-currencySymbol">€</span></span></span>';
								$html .= '</div>';
								$html .= '<div class="add-to-cart-button">';
								$html .= '<a href="/?add-to-cart='.$info['product'].'" class="primary is-small mb-0 button add_to_cart_button ajax_add_to_cart">Į KREPŠELĮ</a>';
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';
					$html .= '</div>';//end box
				}
		$html .= '</div>';
		$args2 = array(
            'status'      => 'approve',
            'post_status' => 'publish',
            'post_type'   => 'product',
			'number'      => '3'
        );

        $comments = get_comments( $args2 );
		$html .= '<div class="comments gk-sidebar-comments">';
			$html .= '<div class="widget_head dark">';
				$html .= '<h3>Naujausi Atsiliepimai</h3>';
			$html .= '</div>';
			$html .= '<div class="comment_cont">';
				 foreach( $comments as $comment ) :
					$comId = $comment->comment_ID;
					$rating = intval( get_comment_meta( $comId, 'rating', true ) );
					$html .= '<div class="comment-wrap">';
					$html .= '<div class="date">'.substr($comment->comment_date, 0, 10).'</div>';
					$html .= '<div class="author"><h4>'.$comment->comment_author.'</h4></div>';
					$html .= '<div class="stars">';
						if ( $rating && wc_review_ratings_enabled() ) {
							$html .= ''.wc_get_rating_html( $rating ).'';
						}
					$html .= '
					</div>';
					$html .= '<div class="comment">'.$comment->comment_content.'</div>';
					$html .= '<div class="comment_product">';
						$html .= '<a href="'.get_permalink(get_product_by_comment($comId)).'">';
							$html .= wp_get_attachment_image(get_post_thumbnail_id(get_product_by_comment($comId)),"full");
							$html .= '<div class="prod_name">';
								$html .= '<div class="product-name">'.get_the_title(get_product_by_comment($comId)).'</div>';
								$cat = get_the_terms( get_product_by_comment($comId), 'product_cat' );
								$html .= '<div class="category product-cat">'.$cat[0]->name.'</div>';
							$html .= '</div>';
						$html .= '</a>';
					$html .= '</div>';
					$html .= '</div>';
				endforeach;
			$html .= '</div>';
			$html .= '<div class="comment_foot">';
				$html .= '<a href="/atsiliepimai/" class="button expand primary mb-0">Žiūrėti daugiau</a>';
			$html .= '</div>';
		$html .= '</div>';
		echo do_shortcode($html);
		echo $args['after_widget'];
	}

	// widgeto backas
	public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
	}
	else {
	$title = __( 'New title', 'aon_widget_domain' );
	}
	// admin forma
	?>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<?php
	}

	// updatinam widgeta
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}
}
function aon_load_widget2() {
    register_widget( 'aon_widget_shop' );
}
add_action( 'widgets_init', 'aon_load_widget2' );

class aon_widget_shop extends WP_Widget {

	function __construct() {
		parent::__construct(

			// widgeto id
			'aon_widget_shop',

			// Widgeto pavadinimas
			__('custom shop widget', 'aon_widget_domain'),

			// widgeto aprasymas
			array( 'description' => __( 'Custom widget to display posts with photo for ecovis', 'aon_widget_domain' ), )
		);
	}

	 public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		// defininam temoje
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		global $wc_cpdf;
		// widgeto frontas

		$info = get_field('information', 34362);
		$product = wc_get_product( $info['product'] );
		$html .= '<div class="imag expand-img">'.wp_get_attachment_image($info['delivery_image'],"full").'</div>';

		$html .= '<div class="prod_box gk-sidebar-product">';

				$html .= '<div class="widget_head dark">';
					$html .= '<h3>'.$info['popular_product_header'].'</h3>';
					$html .= '<div class="leading-widget-text">'.$info['popular_product_sub_header'].'</div>';
				$html .= '</div>';

				// div box
				if ($info['product'] > 1) {
					$html .= '[ux_slider nav_style="simple" nav_color="dark" bullets="false" timer="4000"]';
					foreach ($info['product'] as $product) {
						$product_x = wc_get_product( $product );
						$html .= '<div class="product-small box has-equal-box-heights">';
							$html .= '<div class="prod_cont">';
								$html .= '<div class="title-wrapper text-center">';
									$html .= '<p class="name product-title"><a href="'.get_permalink($product).'">'.get_the_title($product).'</a></p>';

								$cat = get_the_terms( $product, 'product_cat' );
								$cname = get_field('prod_sub_name', $product_x->get_id());
								if ($cname) {
									$html .= '<p class="category product-cat">'.$cname.'</p>';
								} else {
									$html .= '<p class="category product-cat">'.$cat[0]->name.'</p>';
								}

								$html .= '</div>';
								$html .= '<div class="box-image">';
									if ( $wc_cpdf->get_value( $product, '_bubble_new' ) ) {

										$bubble_text = $wc_cpdf->get_value( $product , '_bubble_text' ) ? $wc_cpdf->get_value( $product, '_bubble_text' ) : __( 'New', 'flatsome' );

										$html .= '<div class="badge-container absolute right top z-1"><div class="badge callout badge-circle"><div class="badge-inner callout-new-bg is-small new-bubble">' . $bubble_text . '</div></div></div>';
									}
									$html .= '<a href="'.get_permalink($product).'">'
													.wp_get_attachment_image(get_post_thumbnail_id($product),"full").
													'</a>';
								$html .= '</div>';
								$html .= '<div class="box-text box-text-products text-center grid-style-2">
										<div class="price-wrapper text-center">';
											$html .= '<span class="price"><span class="woocommerce-Price-amount amount">'.$product_x->price.'<span class="woocommerce-Price-currencySymbol">€</span></span></span>';
									$html .= '</div>';
									$html .= '<div class="add-to-cart-button">';
									$html .= '<a href="/?add-to-cart='.$product.'" class="primary is-small mb-0 button add_to_cart_button ajax_add_to_cart">Į KREPŠELĮ</a>';
									$html .= '</div>';
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';//end box
					}
					$html .= '[/ux_slider]';
				} else {
					$product = wc_get_product( $info['product'] );
					$html .= '<div class="product-small box has-equal-box-heights">';

						$html .= '<div class="prod_cont">';
							$html .= '<div class="title-wrapper text-center">';
								$html .= '<p class="name product-title"><a href="'.get_permalink($info['product']).'">'.get_the_title($info['product']).'</a></p>';

								$cat = get_the_terms( $product, 'product_cat' );
								$cname = get_field('prod_sub_name', $product_x->get_id());
								if ($cname) {
									$html .= '<p class="category product-cat">'.$cname.'</p>';
								} else {
									$html .= '<p class="category product-cat">'.$cat[0]->name.'</p>';
								}

							$html .= '</div>';
							$html .= '<div class="box-image">';
								if ( $wc_cpdf->get_value( $info['product'], '_bubble_new' ) ) {

									$bubble_text = $wc_cpdf->get_value( $info['product'] , '_bubble_text' ) ? $wc_cpdf->get_value( $info['product'], '_bubble_text' ) : __( 'New', 'flatsome' );

									$html .= '<div class="badge-container absolute right top z-1"><div class="badge callout badge-circle"><div class="badge-inner callout-new-bg is-small new-bubble">' . $bubble_text . '</div></div></div>';
								}
								$html .= '<a href="'.get_permalink($info['product']).'">'
												.wp_get_attachment_image(get_post_thumbnail_id($info['product']),"full").
												'</a>';
							$html .= '</div>';
							$html .= '<div class="box-text box-text-products text-center grid-style-2">
									<div class="price-wrapper text-center">';
										$html .= '<span class="price"><span class="woocommerce-Price-amount amount">'.$product->price.'<span class="woocommerce-Price-currencySymbol">€</span></span></span>';
								$html .= '</div>';
								$html .= '<div class="add-to-cart-button">';
								$html .= '<a href="/?add-to-cart='.$info['product'].'" class="primary is-small mb-0 button add_to_cart_button ajax_add_to_cart">Į KREPŠELĮ</a>';
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';
					$html .= '</div>';//end box
				}
		$html .= '</div>';
		$args2 = array(
            'status'      => 'approve',
            'post_status' => 'publish',
            'post_type'   => 'product',
			'number'      => '3'
        );

        $comments = get_comments( $args2 );
				$html .= '<div class="comments gk-sidebar-comments">';
					$html .= '<div class="widget_head dark">';
						$html .= '<h3>Naujausi Atsiliepimai</h3>';
					$html .= '</div>';
					$html .= '<div class="comment_cont">';
						 foreach( $comments as $comment ) :
							$comId = $comment->comment_ID;
							$rating = intval( get_comment_meta( $comId, 'rating', true ) );
							$html .= '<div class="comment-wrap">';
							$html .= '<div class="date">'.substr($comment->comment_date, 0, 10).'</div>';
							$html .= '<div class="author"><h4>'.$comment->comment_author.'</h4></div>';
							$html .= '<div class="stars">';
								if ( $rating && wc_review_ratings_enabled() ) {
									$html .= ''.wc_get_rating_html( $rating ).'';
								}
							$html .= '
							</div>';
							$html .= '<div class="comment">'.$comment->comment_content.'</div>';
							$html .= '<div class="comment_product">';
								$html .= '<a href="'.get_permalink(get_product_by_comment($comId)).'">';
									$html .= wp_get_attachment_image(get_post_thumbnail_id(get_product_by_comment($comId)),"full");
									$html .= '<div class="prod_name">';
										$html .= '<div class="product-name">'.get_the_title(get_product_by_comment($comId)).'</div>';
										$cat = get_the_terms( get_product_by_comment($comId), 'product_cat' );
										$html .= '<div class="category product-cat">'.$cat[0]->name.'</div>';
									$html .= '</div>';
								$html .= '</a>';
							$html .= '</div>';
							$html .= '</div>';
						endforeach;
					$html .= '</div>';
					$html .= '<div class="comment_foot">';
						$html .= '<a href="/atsiliepimai/" class="button expand primary mb-0">Žiūrėti daugiau</a>';
					$html .= '</div>';
				$html .= '</div>';
				echo do_shortcode($html);
		echo $args['after_widget'];
	}

	// widgeto backas
	public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
	}
	else {
	$title = __( 'New title', 'aon_widget_domain' );
	}
	// admin forma
	?>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<?php
	}

	// updatinam widgeta
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}
}
function action_woocommerce_before_shop_loop() {
	if (is_shop()) {
		$shop_info = get_field('shop', 29);
		if ($shop_info) :
			$html = '
				<div class="gk-page-banner-wrap relative mb">
					<div class="banner_bg gk-inner-banner absolute">
						'.wp_get_attachment_image($shop_info['main_banner'], 'full').'
					</div>
					<div class="banner_content relative">
						'.$shop_info['banner_text'].'
					</div>
				</div>
			';
			echo $html;
		endif;
	}
	if (is_product_category()) {
		$current = get_queried_object()->term_id;
		$thumbnail_id = get_woocommerce_term_meta( $current, 'thumbnail_id', true );
		$terms = get_term_by('id',$current,'product_cat');
		$description = $terms->description;
		$html = '
      <div class="gk-page-banner-wrap relative mb shop-category-banner">
        <div class="banner_bg gk-inner-banner img_half">
			     '.wp_get_attachment_image($thumbnail_id, 'full').'
        </div>
        <div class="banner_content relative">
					'.$description.'
        </div>
		  </div>
		';
		echo $html;
	}
};
if (!is_mobile()) {
  //add_action( 'woocommerce_after_shop_loop', 'action_woocommerce_before_shop_loop', 10, 3 );
} else {
  add_action( 'woocommerce_after_main_content', 'action_woocommerce_before_shop_loop', 999 );
}


/* remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
function woocommerce_template_single_excerpt() {
        return;
} */

function aon_woo_excerp() {
	global $product;
	$html = '
		<div class="product-short-description">
			'.$product->get_short_description().'
		</div>
	';
	echo $html;
}
add_action('wp_enqueue_scripts','load_custom_scripts');
function load_custom_scripts(){
	if ( is_product() ){
		wp_enqueue_script('app', '/wp-content/themes/gaivuskvapas-child/custom/app.js', true, '1.0.2');
	} else {
		wp_enqueue_script('custom_js', '/wp-content/themes/gaivuskvapas-child/custom/custom.js', '', '', true);
	}

}
add_filter('get_comment_author', 'my_comment_author', 10, 1);
function my_comment_author( $author = '' ) {
	$comment = get_comment( $comment_ID );
	if ($comment->comment_author == 'Anonimas' ) {
		$author = 'Gaivus kvapas pirkėjas';
	}
	return $author;
}

function get_comment_count_by_stars($prod_id) {
	global $product;
	$args2 = array(
		'post_type'    => 'product',
		'post_id'      => $prod_id,
		'number'      => ''
	);
	$comments = get_comments( $args2 );
	foreach ($comments as $comment) {
		$comId = $comment->comment_ID;
		$rating[] = intval( get_comment_meta( $comId, 'rating', true ) );
	}
	$all_rating = array_count_values($rating);
	$full_comment_count = $product->get_review_count();
	function get_percentage($total, $number) {
		if ( $total > 0 ) {
			return round($number / ($total / 100),2);
		} else {
			return 0;
		}
	}
  krsort($all_rating);
	foreach ($all_rating as $rating => $count) {
		echo '<div class="custom_rating">';
      echo '<div class="custom_rating_text">' . $rating . ' žvaigždutės</div>';
      echo '<div class="custom_rating_bar"><span style="width:'.get_percentage($full_comment_count,$count).'%"></span></div>';
      echo '<div class="custom_rating_percent text-right">' . get_percentage($full_comment_count,$count) . '%</div>';
    echo '</div>';
	}
}
// put this in functions.php, it will produce code before the form
add_action('woocommerce_checkout_after_customer_details','show_cart_summary',9);

// gets the cart template and outputs it before the form
function show_cart_summary( ) {
  wc_get_template_part( 'cart/cart2' );
}
function wpa_scripts() {
    if( is_page( 'Pagrindinis' ) ) {
		if (is_mobile()) {
			wp_dequeue_style( 'SFSIPLUSmainCss' );
			wp_dequeue_style( 'wgdr' );
			wp_dequeue_style( 'wpv_defaultcss_style' );
			wp_dequeue_style( 'wpv_telinputcss_style' );
			wp_dequeue_style( 'yith_wcpb_bundle_frontend_style' );
		} else {
			wp_dequeue_style( 'SFSIPLUSmainCss' );
			wp_dequeue_style( 'wgdr' );
		}
    }
}

/// uzdedam priority kad krautu po pluginu uzsikrovimo
add_action( 'wp_enqueue_scripts', 'wpa_scripts', 100 );
/* remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);

 */
/* remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);
 */
/*
add_action( 'woocommerce_single_product_summary', 'bbloomer_show_return_policy', 20 );
function bbloomer_show_return_policy() {
	add_action( 'woocommerce_single_product_summary', 'bbloomer_show_return_policy', 20 );
} */
// disable jquery migrate
add_filter( 'wp_default_scripts', $af = static function( &$scripts) {
    if(!is_admin()) {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ) );
    }
}, PHP_INT_MAX );
unset( $af );
// disable wc

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
// add_action( 'wp_enqueue_scripts', 'tm_disable_woocommerce_loading_css_js' );

function tm_disable_woocommerce_loading_css_js() {

	// Check if WooCommerce plugin is active
	if( function_exists( 'is_woocommerce' ) ){
		wp_dequeue_style( 'wp-block-library' );
// 		wp_dequeue_style( 'photoswipe-css' );
		wp_dequeue_style( 'wc-block-style' );
   // wp_dequeue_script('zxcvbn-async');
    //wp_deregister_script('zxcvbn-async');
		//wp_dequeue_script( 'selectWoo' );
		//wp_deregister_script( 'selectWoo' );
		wp_dequeue_script( 'wc-add-payment-method' );
		wp_dequeue_script( 'wc-lost-password' );
		wp_dequeue_script( 'wc_price_slider' );
// 		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-add-to-cart' );
		//wp_dequeue_script( 'wc-cart-fragments' );
		wp_dequeue_script( 'wc-credit-card-form' );
		//wp_dequeue_script( 'wc-checkout' );
		wp_dequeue_script( 'wc-add-to-cart-variation' );
		//wp_dequeue_script( 'wc-cart' );
		wp_dequeue_script( 'wc-chosen' );
		wp_dequeue_script( 'woocommerce' );
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_script( 'jquery-blockui' );
		wp_dequeue_script( 'jquery-placeholder' );
		wp_dequeue_script( 'jquery-payment' );
		wp_dequeue_script( 'fancybox' );
		wp_dequeue_script( 'jqueryui' );
		wp_deregister_script( 'photoswipe' );
		wp_deregister_script( 'photoswipe-ui-default' );

	}
}
add_action( 'wp_enqueue_scripts', 'tm_disable_loading_css_js' );

function tm_disable_loading_css_js() {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wc-block-style' );
}

/* disable guttenberg */
// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);
/*!disable gutenberg */
// Remove cf7 all plugins styles conditionally
add_action( 'wp_enqueue_scripts', 'remove_cf7_scripts', 1001 );
function remove_cf7_scripts() {
    if(is_page_template('page-kontaktai.php')) {
      wp_enqueue_style( 'contact-form-7');

      wp_enqueue_script( 'contact-form-7' );
    }
}
// !Remove cf7 all plugins styles conditionally
function tm_remove_plugin_style(){
    wp_dequeue_style( 'contact-form-7' );

    wp_dequeue_script( 'contact-form-7' );
}
add_action( 'wp_enqueue_scripts', 'tm_remove_plugin_style', 1000 );

//add_action( 'woocommerce_single_product_summary', 'single_product_variable_customization', 3, 0 );
function single_product_variable_customization() {
    global $product;

    // Only for variable products on single product pages
    if ( $product->is_type('variable') && is_product() ) {

    ##  ==>  ==>  Here goes your php code (if needed)  ==>  ==>  ##

    // Passing a variable to javascript
    $string1 = "The selected Variation ID is: ";
    $string2 = "No Variation ID is selected ";
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Initializing
        var myText1 = '<?php echo $string1; ?>', myText2 = '<?php echo $string2; ?>';
        // Get and display the default variation ID after add-to-cart button (initialization)
        console.log($('input.variation_id').val()); // Output in the browser console


        // Get and display the chosen variation ID after add-to-cart button
        $('select').blur( function(){
           

            console.log($('input.variation_id').val()); // Output in the browser console
        });
    });
    </script>
    <?php
    }
}

// add_filter( 'woocommerce_product_tabs', 'wp_woo_rename_reviews_tab', 99);
// function wp_woo_rename_reviews_tab($tabs) {
    // global $product;
    // $check_product_review_count = $product->get_review_count();
    // if ( $check_product_review_count == 0 ) {
        // $tabs['reviews']['title'] = 'Atsiliepimai';
    // } else {
        // $tabs['reviews']['title'] = 'Atsiliepimai ('. $check_product_review_count .')';
    // }
    // return $tabs;
// } 


function gaivuskvapas_front_assets_css_js(){
	wp_enqueue_style('gv-font-awesome', get_theme_file_uri("/assets/css/all.css"));
	wp_register_style('gv-bootstrap', get_theme_file_uri("/assets/css/bootstrap.min.css"));
	wp_register_style('gv-main-css', get_theme_file_uri("/assets/css/style.css"));

	wp_enqueue_script('gv-bootstrap-js', get_theme_file_uri("/assets/js/bootstrap.bundle.min.js"), array(), '1.0.0', true);
	wp_enqueue_script('gv-main-js', get_theme_file_uri("/assets/js/main.js"), array(), '1.0.0', true);
}

add_action("wp_enqueue_scripts", "gaivuskvapas_front_assets_css_js");

function gaivuskvapas_front_assets_css(){
	wp_enqueue_style('gv-responsive-css', get_theme_file_uri("/assets/css/responsive.css"));
}
add_action("wp_enqueue_scripts", "gaivuskvapas_front_assets_css", 999);

if(!function_exists('gv_customize_register')){
	function gv_customize_register( $wp_customize ) {

		$wp_customize->add_section('gv_custom_header', array(
			'title' => __('Custom Header', 'ct-custom'),
			'priority' => 30,
		));

		$wp_customize->add_setting('gv_delivery_info', array(
			'default' => __('Nemokamas pristatymas visoje lietuvoje užsakymams nuo 50€'),
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('gv_delivery_info', array(
			'label' => __('Delivery Info', 'ct-custom'),
			'section' => 'gv_custom_header',
			'type' => 'text',
		));
		
		$wp_customize->add_setting('gv_phone_number', array(
			'default' => __('+370 666 29977'),
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('gv_phone_number', array(
			'label' => __('Phone Number', 'ct-custom'),
			'section' => 'gv_custom_header',
			'type' => 'text',
		));

		$wp_customize->add_setting('gv_email_address', array(
			'default' => 'info@gaivuskvapas.lt',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('gv_email_address', array(
			'label' => __('Email Address', 'ct-custom'),
			'section' => 'gv_custom_header',
			'type' => 'text',
		));
	}
}
add_action( 'customize_register', 'gv_customize_register' );

function theme_name_register_menus() {
    register_nav_menus( array(
        'header-right-menu' => esc_html__( 'Header Right Menu', 'gaivuskvapas' ),
    )
 );
}
add_action( 'after_setup_theme', 'theme_name_register_menus' );

function gv_header_mega_menu(){

}