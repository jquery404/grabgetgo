<?php get_header(); ?>

<!-- Main content -->
<div class="container-fluid limited">
	<div class="row">
		
		<?php if ( have_posts() ) :
			
			get_template_part( 'loop' );

		else :
			
			get_template_part( 'content', 'none' );

		endif; ?>

		<?php do_action( 'grabgetgo_sidebar' ); ?>

	</div>
</div>
<!-- /Main content -->

<?php
get_footer();
