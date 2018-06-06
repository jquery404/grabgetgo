<?php get_header(); ?>

<!-- Page -->
<div class="container-fluid limited">
	<div class="row">

		<?php while ( have_posts() ) : the_post();

			do_action( 'grabgetgo_page_before' );

			get_template_part( 'content', 'page' );

			do_action( 'grabgetgo_page_after' );

		endwhile; // End of the loop. ?>

	</div>
</div>
<!-- /Page -->

<?php
do_action( 'grabgetgo_sidebar' );
get_footer();
