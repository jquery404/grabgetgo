<?php
/**
 * Shop breadcrumb
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {
?>
	<div class="breadcrumb-container">
		<div class="container-fluid limited">
			<nav aria-label="breadcrumb">
<?php
	echo $wrap_before;

	for ( $i=0; $i< count($breadcrumb)-1; $i++) {

		echo $before;

		if ( ! empty( $breadcrumb[$i][1] ) && sizeof( $breadcrumb ) !== $i + 1 ) {
			echo '<a href="' . esc_url( $breadcrumb[$i][1] ) . '">' . esc_html( $breadcrumb[$i][0] ) . '</a>';
		} 

		echo $after;

	}

	echo $wrap_after;
?>
			</nav>
		</div>
	</div>
<?php
}
