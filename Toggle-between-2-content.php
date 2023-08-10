<?php

function toggle_hiw($atts) {
// Attributes
$atts = shortcode_atts(
	array(
		'postid' => get_the_ID(),
	), 
	$atts
);
// Attributes in var
$post_id = $atts['postid']; 
ob_start();
?>

<div id="switch_package">
	<div class="switch_left active">Mobile App</div>
	<div class="switch_center">
		<label class="switch">
			<input type="checkbox" id="toggle_check" checked="">
			<span class="slider round"></span>
		</label></div>
	<div class="switch_right">Website</div>
</div>

<script>
/******************Secretary Pricing***********/
jQuery(document).ready(function(){
jQuery("#hiw_mobile").hide();
  jQuery("#toggle_check").click(function() {
    if(jQuery(this).prop('checked') === true){
      jQuery("#hiw_website").slideDown('fast');
      jQuery("#hiw_mobile").slideUp('fast');
      jQuery(".switch_right").addClass('active');
      jQuery(".switch_left").removeClass('active');
    } else {
      jQuery("#hiw_website").slideUp('fast');
      jQuery("#hiw_mobile").slideDown('fast');
      jQuery(".switch_right").removeClass('active');
      jQuery(".switch_left").addClass('active');
    }
  });
  jQuery(".switch_left").click(function() {
       jQuery(':checkbox').prop('checked', false).removeAttr('checked');
        if(jQuery("#toggle_check").prop('checked') === true){
      jQuery("#hiw_website").slideDown('fast');
      jQuery("#hiw_mobile").slideUp('fast');
      jQuery(".switch_right").addClass('active');
      jQuery(".switch_left").removeClass('active');
    } else {
      jQuery("#hiw_website").slideUp('fast');
      jQuery("#hiw_mobile").slideDown('fast');
      jQuery(".switch_right").removeClass('active');
      jQuery(".switch_left").addClass('active');
    }
  });
  jQuery(".switch_right").click(function() {
       jQuery(':checkbox').prop('checked', true).attr('checked', 'checked');
        if(jQuery("#toggle_check").prop('checked') === true){
      jQuery("#hiw_website").slideDown('fast');
      jQuery("#hiw_mobile").slideUp('fast');
      jQuery(".switch_right").addClass('active');
      jQuery(".switch_left").removeClass('active');
    } else {
      jQuery("#hiw_website").slideUp('fast');
      jQuery("#hiw_mobile").slideDown('fast');
      jQuery(".switch_right").removeClass('active');
      jQuery(".switch_left").addClass('active');
    }
  });
  
 
  
});    
</script>

<?php
return ob_get_clean();
	}
add_shortcode('toggle_hiw','toggle_hiw');
