<?php do_action( 'grabgetgo_loop_before' ); ?>


<?php
while ( have_posts() ) : the_post();

	get_template_part( 'content', get_post_format() );

endwhile;
?>


<?php do_action( 'grabgetgo_loop_after' ); ?>
