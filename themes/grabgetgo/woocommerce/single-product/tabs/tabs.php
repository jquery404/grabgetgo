<?php
/**
 * Single Product tabs
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="col-12 my-5">
		<ul class="nav nav-tabs" role="tablist">
			<?php $i=0; foreach ( $tabs as $key => $tab ) : $i++; ?>
				<li class="nav-item">
					<a class="nav-link text-secondary <?php if($i==1) echo "active"; ?>" id="<?php echo esc_attr( $key ); ?>_tab" data-toggle="tab" role="tab" href="#tab-<?php echo esc_attr( $key ); ?>" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
						<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		
		<!-- Tab Content -->
		<div class="tab-content">
		<?php $i=0; foreach ( $tabs as $key => $tab ) : $i++; ?>
			<div class="tab-pane border border-top-0 p-3 <?php if($i==1) echo "show active"; ?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $key ); ?>_tab">
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
			</div>
		<?php endforeach; ?>
		</div>
		<!-- / Tab Content -->
	</div>

<?php endif; ?>
