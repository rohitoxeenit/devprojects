<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Bloom
 * @since Bloom 1.0
 */

?>
<section class="h-partners">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="big-text main-color2 text-center mb-3 font-weight-bold"><?php dynamic_sidebar('sidebar-4');?></h2>
			</div>
		</div>
		<div class="row mb-4">
		    <div class="col-md-12">
		        <?php echo do_shortcode('[mc4wp_form id="928"]'); ?>
		    </div>
		</div>
		<div class="row mb-4 ">
		    <div class="col-md-12 text-center">
		        <?php dynamic_sidebar('sidebar-3');?>
		    </div>
		</div>
	</div>
</section>
<footer class="main-footer">
    <div class="footer-buttonssticky">
    	<div class="footer-donate">
    	   <?php dynamic_sidebar('sidebar-2');?>
    	</div>
    	<div class="footer-social">
    	    <?php dynamic_sidebar('sidebar-1');?>
    	</div>
	</div>
</footer>
<!--<script>
    $('#list a[href*="#"]').click(function(e){
	  e.preventDefault();
	  var target = $(this.hash);
	  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	  var targetOffest = target.offset('100').top;
	  var headerHeight = document.getElementByClassName('navbar')[0].offsetHeight;
	  $('html, body').animate({
		  scrollTop: targetOffest
	  }, 1000);
	});
</script>
<script>
    $('body').scrollspy({ target: '#list' })
</script>-->
<script>
$('input#inputInterestTeaching').on('change', function() {
    var value = $(this).val();
    if(value == "Other")
    {
    $('input#inputInterestTeaching').not(this).prop('checked', false);
    }
   if(value != "Other")
   {
       $('input.teacher').prop('checked', false);
   }
    
});

$('input#inputJobLooking').on('change', function() {
    var value = $(this).val();
    if(value == "Other")
    {
    $('input#inputJobLooking').not(this).prop('checked', false);
    }
     if(value != "Other")
   {
       $('input.job').prop('checked', false);
   }
    
});
$('input.intrest').on('change', function() {
    var value = $(this).val();
    if(value == "Other")
    {
    $('input.intrest').not(this).prop('checked', false);
    }
      if(value != "Other")
   {
       $('input#intrest').prop('checked', false);
   }
    
});
$('input.liketocontracted').on('change', function() {
    var value = $(this).val();
    if(value == "No preference")
    {
    $('input.liketocontracted').not(this).prop('checked', false);
    }
      if(value != "No preference")
   {
       $('input#liketocontracted').prop('checked', false);
   }
});
</script>
<?php wp_footer(); ?>
</body>
</html>
