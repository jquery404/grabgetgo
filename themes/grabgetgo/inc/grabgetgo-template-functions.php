<?php

if ( ! function_exists( 'grabgetgo_site_social' ) ) {
	
	function grabgetgo_site_social() {
		?>
		<div class="topbar-social">
			<a href="#" class="topbar-social-item fa fa-facebook"></a>
			<a href="#" class="topbar-social-item fa fa-instagram"></a>
			<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
			<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
			<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
		</div>
		<?php
	}
}

if ( ! function_exists( 'grabgetgo_site_branding' ) ) {
	
	function grabgetgo_site_branding() {
		?>
		<!-- Middle Header -->
		<div class="middle-header" id="middle-header">
			<div class="container-fluid limited position-relative">

        <div class="row">

					<div class="input-search-wrapper invisible">
						<form action="#" method="post">
							<input type="text" class="form-control" id="input-search" placeholder="Search" aria-label="Search">
							<span class="rounded-circle bg-dark text-white toggle-search"><i class="small material-icons">close</i></span>
							<input type="submit" hidden="hidden">
						</form>
					</div>

          <div class="col-4 d-flex d-md-none align-items-center">
            <a href="#" class="text-dark" data-toggle="modal" data-target="#menuModal"><i class="fa fa-bars fa-2x md-2"></i></a>
          </div>

          <div class="col-4 col-md-auto d-flex align-items-center justify-content-center justify-content-md-start">
            <?php grabgetgo_site_title_or_logo(); ?>
            <div class="d-block d-md-none"><?php grabgetgo_product_search(); ?></div>
          </div>

          <div class="col d-none d-md-block position-static">
            <?php grabgetgo_product_search(); ?>
          </div>

          <div class="col-4 col-md-auto d-flex align-items-center justify-content-end pl-0">
            <nav class="nav nav-counter">

              <!-- <a href="#" class="nav-link toggle-search"><i class="fa fa-search fa-2x" alt="search"></i></a> -->
              
              <a href="account-wishlist.html" class="nav-link counter d-none d-lg-block">
              	<span>0</span>
              	<i class="material-icons" alt="wishlist">favorite_border</i>
              </a>
              
              <a href="#" class="nav-link counter" data-toggle="modal" data-target="#cartModal">
              	<span><?php grabgetgo_cart_count(); ?></span>
              	<i class="material-icons">shopping_cart</i>
              </a>

            </nav>
          </div>

        </div>

      </div>
    </div>
    <!-- /Middle Header -->

		<?php //grabgetgo_product_search(); ?>
		
		

		<?php
	}
}

if ( ! function_exists( 'grabgetgo_site_title_or_logo' ) ) {
	// Display the site title or logo
	function grabgetgo_site_title_or_logo( $echo = true, $mobile = false ) {

		$cssClass = ($mobile == true) ? 'd-block d-md-none img-fluid' : 'd-none d-md-block img-fluid';
		
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) 
		{
			$logo_id = get_theme_mod( 'custom_logo' ); 

			$html    = sprintf( '<a href="%1$s" class="logo" rel="home" itemprop="url">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image($logo_id, 'full', false,
					array(
						'class'     => $cssClass,
						'data-size' => $size,
						'itemprop'  => 'logo'
					)
				)
			);
		} 
		elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) 
		{
			$logo    = site_logo()->logo;
			$logo_id = get_theme_mod( 'custom_logo' ); 
			$logo_id = $logo_id ? $logo_id : $logo['id']; 
			$size    = site_logo()->theme_size();
			$html    = sprintf( '<a href="%1$s" class="logo" rel="home" itemprop="url">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image(
					$logo_id,
					$size,
					false,
					array(
						'class'     => 'site-logo attachment-' . $size,
						'data-size' => $size,
						'itemprop'  => 'logo'
					)
				)
			);

			$html = apply_filters( 'jetpack_the_site_logo', $html, $logo, $size );
		} 
		else 
		{
			$tag = is_front_page() ? 'h1' : 'div';

			$html = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="'.$cssClass.'">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
		}

		if ( ! $echo ) 
		{
			return $html;
		}

		echo $html;
	}
}

if ( ! function_exists( 'grabgetgo_site_top_menu' ) ) {
	
	function grabgetgo_site_top_menu() {
		?>
		<!-- Top Header -->
    <div class="top-header">
      <div class="container-fluid limited">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-between">

              <nav class="nav d-none d-lg-flex">
                <a class="nav-link" href="#"><i class="fa fa-glass"></i> Get Minimum 30-70% Off On Over 1,50,000 Styles!</a>
              </nav>


              <?php grabgetgo_top_navigation(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Top Header -->
				
		

		<?php
	}
}

if ( ! function_exists( 'grabgetgo_secondary_navigation' ) ) {
	
	function grabgetgo_secondary_navigation() {
	    if ( has_nav_menu( 'secondary' ) ) {
		    ?>
		    <nav class="secondary-navigation" role="navigation" aria-label="<?php esc_html_e( 'Secondary Navigation', 'grabgetgo' ); ?>">
			    <?php
				    wp_nav_menu(
					    array(
						    'theme_location'	=> 'secondary',
						    'fallback_cb'		=> '',
					    )
				    );
			    ?>
		    </nav><!-- #site-navigation -->
		    <?php
		}
	}
}

if ( ! function_exists( 'grabgetgo_top_navigation' ) ) {
	
	function grabgetgo_top_navigation() {
		?>
		
			<nav 
				class="nav ml-auto"
				role="navigation" 
				aria-label="<?php esc_html_e( 'Top Navigation', 'grabgetgo' ); ?>">
		
			<?php
			$params = array(
					'menu'						=> 'Top Menu',
			    'menu_class'			=> 'nav-link d-none d-sm-block',
					'container'       => false,
				  'echo'            => false,
				  'depth'           => 0,
					'theme_location'	=> 'primary',
			);
			echo strip_tags(wp_nav_menu( $params ), '<a>' );
			?>
			</nav>
		
		<?php
	}
}

if ( ! function_exists( 'grabgetgo_brand_menu_social' ) ) {
	
	function grabgetgo_brand_menu_social() {

			if ( function_exists( 'grabgetgo_site_title_or_logo' ) )
				grabgetgo_site_title_or_logo();

			if ( function_exists( 'grabgetgo_primary_navigation_wrapper' ) )
				grabgetgo_primary_navigation_wrapper();


			if ( function_exists( 'grabgetgo_primary_navigation' ) )
				grabgetgo_primary_navigation();


			if ( function_exists( 'grabgetgo_primary_navigation_wrapper_close' ) )
				grabgetgo_primary_navigation_wrapper_close();
	?>
		

	<?php	
	}
}

if ( ! function_exists('grabgetgo_mobile_header_menu')){

	function grabgetgo_mobile_header_menu(){
	?>	
		<!-- Modal Menu -->
		<div class="modal fade modal-menu" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <?php grabgetgo_site_title_or_logo('true', 'true'); ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="list-group list-group-no-border" id="list-menu" data-children=".list-submenu">
              <?php grabgetgo_top_navigation(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal Menu -->
	
	<?php
	}
}


if ( ! function_exists( 'grabgetgo_footer_quickview_modal' ) ) {
	function grabgetgo_footer_quickview_modal() {
	?>
	
	<!-- Quickview Modal -->
	<div class="modal fade modal-quickview" id="quickviewModal" tabindex="-1" role="dialog" aria-labelledby="quickviewModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          
        </div>
      </div>
    </div>
    <!-- /Quickview Modal -->
	<?php
	}
}


if ( ! function_exists( 'grabgetgo_footer_widgets' ) ) {
	
	function grabgetgo_footer_widgets() {
		$rows    = intval( apply_filters( 'grabgetgo_footer_widget_rows', 1 ) );
		$regions = intval( apply_filters( 'grabgetgo_footer_widget_columns', 5 ) );

		for ( $row = 1; $row <= $rows; $row++ ) :

			// Defines the number of active columns in this footer row.
			for ( $region = $regions; 0 < $region; $region-- ) {
				if ( is_active_sidebar( 'footer-' . strval( $region + $regions * ( $row - 1 ) ) ) ) {
					$columns = $region;
					break;
				}
			}

			if ( isset( $columns ) ) : ?>
				<div class="row"><?php

					for ( $column = 1; $column <= $columns; $column++ ) :
						$footer_n = $column + $regions * ( $row - 1 );

						if ( is_active_sidebar( 'footer-' . strval( $footer_n ) ) ) : 
							if(strval( $footer_n ) == 1) 
								$footer_n_class = 'col-6 col-lg-3';
							else if(strval( $footer_n ) == 2 
									|| strval( $footer_n ) == 3
									|| strval( $footer_n ) == 4) 
								$footer_n_class = 'col-6 col-lg-3';
							else $footer_n_class = 'w-size8 respon3';

						?>

							<div class="<?php echo $footer_n_class; ?>">
								<?php dynamic_sidebar( 'footer-' . strval( $footer_n ) ); ?>
							</div><?php

						endif;
					endfor; ?>

				</div>
				<?php

				unset( $columns );
			endif;
		endfor;
	}
}



if ( ! function_exists( 'grabgetgo_get_sidebar' ) ) {
	
	function grabgetgo_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'grabgetgo_paging_nav' ) ) {
	
	function grabgetgo_paging_nav() {
		global $wp_query;

		$args = array(
			'screen_reader_text' => ' ',
			'next_text' => _x( 'Next', 'Next post', 'grabgetgo' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'grabgetgo' ),
			);
		?>
		<!-- Pagination -->
		<div class="pagination flex-m flex-w p-r-50">

			<?php 
			//the_posts_pagination( $args ); 
			grabgetgo_post_pagination($args); 
			?>

		</div>

		<?php
	}
}

if ( ! function_exists( 'grabgetgo_post_wrapper' ) ) {
	function grabgetgo_post_wrapper() {

	}
}

if ( ! function_exists( 'grabgetgo_post_header' ) ) {
	
	function grabgetgo_post_header() {

		do_action( 'grabgetgo_post_content_before' );
		?>

		<div class="item-blog-txt p-t-33">

		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
			grabgetgo_posted_on();
		} 
		else {
			the_title(sprintf('<h4 class="p-b-11"><a href="%s" class="m-text24" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>');

			if ( 'post' == get_post_type() ) {
				echo '<div class="s-text8 flex-w flex-m p-b-21">'; 
				grabgetgo_posted_on();
				echo '</div>';
			}

		}
		?>

		</div>
		<?php
	}
}

if ( ! function_exists( 'grabgetgo_post_content' ) ) {
	
	function grabgetgo_post_content() {
		?>
		<div class="entry-content p-b-12">

		<?php
		the_content(
			sprintf(
				__( 'Continue reading %s', 'grabgetgo' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);

		do_action( 'grabgetgo_post_content_after' );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'grabgetgo' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'grabgetgo_post_meta' ) ) {
	
	function grabgetgo_post_meta() {
		
	}
}

if ( ! function_exists( 'grabgetgo_posted_on' ) ) {
	
	// Prints HTML with meta information for the current post-date/time and author.
	function grabgetgo_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( '%s', 'post date', 'grabgetgo' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo wp_kses( apply_filters( 'grabgetgo_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on ), array(
			'span' => array(
				'class'  => array(),
			),
			'a'    => array(
				'href'  => array(),
				'title' => array(),
				'rel'   => array(),
			),
			'time' => array(
				'datetime' => array(),
				'class'    => array(),
			),
		) );
	}
}

if ( ! function_exists( 'grabgetgo_post_thumbnail' ) ) {
	
	function grabgetgo_post_thumbnail( $size = 'full' ) {
		if ( has_post_thumbnail() ) {
			echo '<a href="'. esc_url( get_permalink() ) .'" class="item-blog-img pos-relative dis-block hov-img-zoom">';

			the_post_thumbnail( $size, [
				'class' => 'img-fluid',
				'title' => '',
				'alt'		=> ''
			]);
			echo '<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">'.get_the_date( 'd M, Y' ). '</span></a>';
		}
	}
}

if ( ! function_exists( 'grabgetgo_display_comments' ) ) {
	
	function grabgetgo_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'grabgetgo_homepage_content' ) ) {
	
	function grabgetgo_homepage_content() {
		while ( have_posts() ) {
			the_post();

			get_template_part( 'content', 'homepage' );

		} // end of the loop.
	}
}

if ( ! function_exists( 'grabgetgo_main_page_content' ) ) {
	
	function grabgetgo_main_page_content() {
		?>
		<!-- Home Slider -->
		<div class="container-fluid">
			<div class="row">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'grabgetgo' ),
					'after'  => '</div>',
				) );
			?>
			</div>
		</div>
		<!-- /Home Slider -->
		<?php
	}
}

if ( ! function_exists( 'grabgetgo_page_content' ) ) {
	
	function grabgetgo_page_content() {
		the_content();
	}
}


if ( ! function_exists( 'grabgetgo_page_header' ) ) {
	
	function grabgetgo_page_header() {
	?>
	<div class="title"><h1><?php echo WC()->cart->get_cart_contents_count(); ?> items in your trolly</h1></div>
	<?php
	}
}



if ( ! function_exists( 'grabgetgo_homepage_product_wrap' ) ) {
	
	function grabgetgo_homepage_product_wrap() {
	?>
	<div class="container-fluid limited mt-5">
	<?php
	}
}

if ( ! function_exists( 'grabgetgo_homepage_product_wrap_close' ) ) {
	
	function grabgetgo_homepage_product_wrap_close() {
	?>
	</div>
	<?php
	}
}


if ( ! function_exists( 'grabgetgo_product_categories' ) ) {
	
	function grabgetgo_product_categories( $args ) {

		if ( grabgetgo_is_woocommerce_activated() ) {

			$args = apply_filters( 'grabgetgo_product_categories_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'child_categories' 	=> 0,
				'orderby' 			=> 'name',
				'title'				=> __( 'Top Categories', 'grabgetgo' ),
			) );

			$shortcode_content = grabgetgo_do_shortcode( 'product_categories', apply_filters( 'grabgetgo_product_categories_shortcode_args', array(
				'number'  => intval( $args['limit'] ),
				'columns' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'parent'  => esc_attr( $args['child_categories'] ),
			) ) );


			/**
			 * Only display the section if the shortcode returns product categories
			 */
			if ( false !== strpos( $shortcode_content, 'product' ) ) {
			?>


				<!-- Top Categories -->
	      <div class="row mb-5 compact" aria-label="<?php echo esc_attr__( 'Top Categories', 'grabgetgo' ); ?>">
	        <div class="col-12">
	        	<div class="title"><h1>Top Categories</h1></div>
	        </div>

	        <?php echo $shortcode_content; ?>

	      </div>
	      <!-- /Top Categories -->
			<?php
			}
		}
	}
}

if ( ! function_exists( 'grabgetgo_featured_products' ) ) {
	
	function grabgetgo_featured_products( $args ) {

		if ( grabgetgo_is_woocommerce_activated() ) {

			$args = apply_filters( 'grabgetgo_featured_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'orderby' => 'date',
				'order'   => 'desc',
				'title'   => __( 'Just For You', 'grabgetgo' ),
			) );

			$shortcode_content = grabgetgo_do_shortcode( 'featured_products', apply_filters( 'grabgetgo_featured_products_shortcode_args', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
				'orderby'  => esc_attr( $args['orderby'] ),
				'order'    => esc_attr( $args['order'] ),
			) ) );

			
			// Only display the section if the shortcode returns products
			
			if ( false !== strpos( $shortcode_content, 'product' ) ) {
			?>

				<!-- New In -->
				<div class="row mb-3 compact" aria-label="<?php echo esc_attr__( 'Featured Products', 'grabgetgo' ); ?>">
					<div class="col-12">
	        	<div class="title"><h1><?php echo wp_kses_post( $args['title'] ); ?></h1></div>
	        </div>
						
					<?php echo $shortcode_content; ?>
				</div>
				<!-- /New In -->


			<?php
			}
		}
	}
}

if ( ! function_exists( 'grabgetgo_recent_products' ) ) {
	
	function grabgetgo_recent_products( $args ) {

		if ( grabgetgo_is_woocommerce_activated() ) {

			$args = apply_filters( 'grabgetgo_recent_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'title'				=> __( 'New In', 'grabgetgo' ),
			) );

			$shortcode_content = grabgetgo_do_shortcode( 'recent_products', apply_filters( 'grabgetgo_recent_products_shortcode_args', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
			) ) );

			/**
			 * Only display the section if the shortcode returns products
			 */
			if ( false !== strpos( $shortcode_content, 'product' ) ) {
			?>
				<!-- Recent Product -->
				<div class="row mb-3 compact" aria-label="<?php echo esc_attr__( 'Recent Products', 'grabgetgo' ); ?>">
					<div class="col-12">
	        	<div class="title"><h1><?php echo wp_kses_post( $args['title'] ); ?></h1></div>
	        </div>
						
					<?php echo $shortcode_content; ?>
				</div>
				<!-- /Recent Product -->

			<?php
			}
		}
	}
}

if ( ! function_exists( 'grabgetgo_on_sale_products' ) ) {
	
	function grabgetgo_on_sale_products( $args ) {

		if ( grabgetgo_is_woocommerce_activated() ) {

			$args = apply_filters( 'grabgetgo_on_sale_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'title'   => __( 'On Sale', 'grabgetgo' ),
			) );

			$shortcode_content = grabgetgo_do_shortcode( 'sale_products', apply_filters( 'grabgetgo_on_sale_products_shortcode_args', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
			) ) );

			/**
			 * Only display the section if the shortcode returns products
			 */
			if ( false !== strpos( $shortcode_content, 'product' ) ) {
			?>

				<!-- On Sale Product -->
				<div class="row mb-3 compact" aria-label="<?php echo esc_attr__( 'On Sale Products', 'grabgetgo' ); ?>">
					<div class="col-12">
	        	<div class="title"><h1><?php echo wp_kses_post( $args['title'] ); ?></h1></div>
	        </div>
						
					<?php echo $shortcode_content; ?>
				</div>
				<!-- /On Sale Product -->

			<?php

			}
		}
	}
}

if ( ! function_exists( 'grabgetgo_popular_products' ) ) {
	
	function grabgetgo_popular_products( $args ) {

		if ( grabgetgo_is_woocommerce_activated() ) {

			$args = apply_filters( 'grabgetgo_popular_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'title'   => __( 'Popular Products', 'grabgetgo' ),
			) );

			$shortcode_content = grabgetgo_do_shortcode( 'top_rated_products', apply_filters( 'grabgetgo_popular_products_shortcode_args', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
			) ) );

			/**
			 * Only display the section if the shortcode returns products
			 */
			if ( false !== strpos( $shortcode_content, 'product' ) ) { ?>

				<!-- Popular Product -->
				<div class="row mb-3 compact" aria-label="<?php echo esc_attr__( 'Popular Products', 'grabgetgo' ); ?>">
					<div class="col-12">
	        	<div class="title"><h1><?php echo wp_kses_post( $args['title'] ); ?></h1></div>
	        </div>
						
					<?php echo $shortcode_content; ?>
				</div>
				<!-- /Popular Product -->

			<?php
			}
		}
	}
}

if ( ! function_exists( 'grabgetgo_best_selling_products' ) ) {
	
	function grabgetgo_best_selling_products( $args ) {

		if ( grabgetgo_is_woocommerce_activated() ) {

			$args = apply_filters( 'grabgetgo_best_selling_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'title'	  => esc_attr__( 'Best Sellers', 'storefront' ),
			) );

			$shortcode_content = grabgetgo_do_shortcode( 'best_selling_products', apply_filters( 'grabgetgo_best_selling_products_shortcode_args', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
			) ) );

			
			// Only display the section if the shortcode returns products
			
			if ( false !== strpos( $shortcode_content, 'product' ) ) {
			?>	
				<!-- Best Selling Product -->
				<div class="row mb-3 compact" aria-label="<?php echo esc_attr__( 'Best Selling Products', 'grabgetgo' ); ?>">
	        <div class="col-12">
	        	<div class="title"><h1><?php echo wp_kses_post( $args['title'] ); ?></h1></div>
	        </div>
						
					<?php echo $shortcode_content; ?>
				</div>
				<!-- /Best Selling Product -->

			<?php
			}
		}
	}
}

if ( ! function_exists( 'grabgetgo_instagram_sell_snapppt' ) ) {
	
	function grabgetgo_instagram_sell_snapppt( $args ) {
		?>
		<!-- Shop Instagram Product -->
		<div class="row mb-5">

      <div class="col-12">
        <div class="title text-center">
					<h1><i class="fa fa-instagram"></i> TAG US ON IG. #GRABGETGO</h1>
				</div>
      </div>
     
     <div class="col-12">
				<!-- <script src='https://snapppt.com/widgets/widget_loader/c93d45a5-bed4-41fe-9642-6390dd16746f/grid.js' defer class='snapppt-widget'></script> -->
      </div>
    </div>
    <!-- /Shop Instagram Product -->

		<?php
	}
}

