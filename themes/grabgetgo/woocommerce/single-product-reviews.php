<?php
/**
 * Display single product reviews (comments)
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<?php if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) ) { 

		$rating_count = $product->get_rating_count();
		$average      = $product->get_average_rating();

		$fivestar_percentage = floor($product->get_rating_count(5)/$rating_count * 100);
		$fourstar_percentage = floor($product->get_rating_count(4)/$rating_count * 100);
		$threestar_percentage = floor($product->get_rating_count(3)/$rating_count * 100);
		$twostar_percentage = floor($product->get_rating_count(2)/$rating_count * 100);
		$onestar_percentage = floor($product->get_rating_count(1)/$rating_count * 100);
	?>

	<div class="row">
	    <div class="col-4 col-md-3 text-center py-2">
	        <h1 class="rating-num"><?php echo $product->get_average_rating(); ?></h1>
	        
	        <div class="woocommerce-product-rating d-inline-block">
						<?php echo wc_get_rating_html( $average, $rating_count ); ?>
					</div>
	        <div>
	            <i class="fa fa-users"></i> <?php echo $count; ?> reviews
	        </div>
	    </div>

	    <div class="col-8 col-md-4">
	        <div class="row">
	        		<div class="col-3 text-right p-0">5 stars&nbsp;</div>
	        		<div class="col-9 p-0">
	                <div class="progress pull-left w-75 rounded-0 my-1">
	                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $fivestar_percentage;?>%">
	                    </div>
	                </div>
	                <div class="pull-left px-2"><?php echo $product->get_rating_count(5); ?></div>
	            </div>
	            <!-- end 5 -->

	            <div class="col-3 text-right p-0">4 stars&nbsp;</div>
	        		<div class="col-9 p-0">
	                <div class="progress pull-left w-75 rounded-0 my-1">
	                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $fourstar_percentage;?>%">
	                    </div>
	                </div>
	                <div class="pull-left px-2"><?php echo $product->get_rating_count(4); ?></div>
	            </div>
	            <!-- end 4 -->

	            <div class="col-3 text-right p-0">3 stars&nbsp;</div>
	        		<div class="col-9 p-0">
	                <div class="progress pull-left w-75 rounded-0 my-1">
	                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $threestar_percentage;?>%">
	                    </div>
	                </div>
	                <div class="pull-left px-2"><?php echo $product->get_rating_count(3); ?></div>
	            </div>
	            <!-- end 3 -->

	            <div class="col-3 text-right p-0">2 stars&nbsp;</div>
	        		<div class="col-9 p-0">
	                <div class="progress pull-left w-75 rounded-0 my-1">
	                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $twostar_percentage;?>%">
	                    </div>
	                </div>
	                <div class="pull-left px-2"><?php echo $product->get_rating_count(2); ?></div>
	            </div>
	            <!-- end 2 -->

	            <div class="col-3 text-right p-0">1 stars&nbsp;</div>
	        		<div class="col-9 p-0">
	                <div class="progress pull-left w-75 rounded-0 my-1">
	                    <div class="progress-bar bg-" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $onestar_percentage;?>%">
	                    </div>
	                </div>
	                <div class="pull-left px-2"><?php echo $product->get_rating_count(1); ?></div>
	            </div>
	            <!-- end 1 -->

	            
	        </div>
	        <!-- end row -->
	    </div>
	</div>

<hr/>
<?php } ?>



<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<?php if ( have_comments() ) : ?>
			
			<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
						'title_reply_after'    => '</span>',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
										'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
										'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></p>',
						),
						'label_submit'  => __( 'Submit', 'woocommerce' ),
						'logged_in_as'  => '',
						'comment_field' => '',
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . '</label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
						</select></div>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
