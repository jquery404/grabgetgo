<?php get_header(); ?>

<!-- content page -->
<section class="bgwhite p-t-60">
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-lg-9 p-b-75">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_attr__( 'Search Results for: %s', 'grabgetgo' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php get_template_part( 'loop' );

			else :

				get_template_part( 'content', 'none' );

			endif; ?>

		</div>

		<div class="col-md-4 col-lg-3 p-b-75">
			<?php do_action( 'grabgetgo_sidebar' ); ?>
		</div>
		
	</div>
</section>
<!-- .content page -->


<?php
get_footer();
