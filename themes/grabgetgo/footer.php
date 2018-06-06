

	<!-- Social Footer -->
	<hr>
	<div class="middle-footer">
    <div class="container-fluid limited">
      <div class="row">              
        
				<div class="col-6"> 
          <h3 class="h4 d-inline">Stay Connected</h3>
            
          <ul class="d-inline social-icons">
  
					  <li class="d-inline-block pr-2"> <a href="#"> <i class="fa fa-facebook"></i></a> </li>
					  <li class="d-inline-block pr-2"> <a href="#"> <i class="fa fa-twitter"></i></a> </li>
					  <li class="d-inline-block pr-2"> <a href="#"> <i class="fa fa-youtube"></i></a> </li>
					  <li class="d-inline-block pr-2"> <a href="#"> <i class="fa fa-instagram"></i></a> </li>
					  
					</ul>
					                     
        </div>
               
				<div class="col-6 text-right">
	        <ul class="d-inline payment-icons">  
	          <li class="d-inline-block"><i class="fa fa-cc-visa"></i> </li>
	          <li class="d-inline-block"><i class="fa fa-cc-mastercard"></i> </li>
	          <li class="d-inline-block"><i class="fa fa-paypal"></i></li>
	          <li class="d-inline-block"><i class="fa fa-cc-discover"></i> </li>
	        </ul>
				</div>
				  
            
    	</div>	
  	</div>       
	</div>
	<hr>
	<!-- /Social Footer -->

	<?php do_action( 'grabgetgo_before_footer' ); ?>

	<!-- Footer -->
	<div class="footer">
		<div class="container-fluid limited">
			<?php do_action( 'grabgetgo_footer' ); ?>
		</div>
	</div>
	<!-- /Footer -->

	<!-- Copyright -->
	<div class="copyright">
      Copyright &copy; <?php echo date('Y'); ?> GrabGetGo. All rights reserved.
  </div>
  <!-- /Copyright -->


<?php wp_footer(); ?>

</body>
</html>
