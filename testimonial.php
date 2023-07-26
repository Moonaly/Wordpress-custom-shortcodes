<?php
function testimonial($atts) {
	$atts = shortcode_atts(
		array(
			'postid' => get_the_ID(),
		), 
		$atts
	);
	$post_id = $atts['postid']; 
	ob_start();
	
	/*$currentpostid=get_the_ID();
	$currentlanguage=get_field('language',$currentpostid);
	if ($currentlanguage['value'] == "cn"){
		$test="test";
	} elseif ($currentlanguage['value'] == "my"){
		$test="test";
	}	elseif ($currentlanguage['value'] == "th"){
		$test="test";
	} else {
		$test="test";
	}*/
	?>

  <div class="owl-carousel client_carousel owl-theme">
     <div class="item"> 
         <div class="clientFeedback">
             <div class="chat_bg"></div>
             <div class="circle_pic one"></div>
             <p class="client_comment">“感谢这个优秀的短信平台，让我能够无缝连接世界，信息传递更快捷，交流更流畅！”</p>
             <p class="client_name"><strong>怀珍</strong></p>
         </div>
     </div> 
     <div class="item"> 
         <div class="clientFeedback">
             <div class="chat_bg"></div>
             <div class="circle_pic two"></div>
             <p class="client_comment">“这个短信平台太棒了，高效便捷，让通信无缝对接。赞不绝口！”</p>
             <p class="client_name"><strong>雅淳</strong></p>
         </div>
     </div>
     <div class="item"> 
         <div class="clientFeedback">
             <div class="chat_bg"></div>
             <div class="circle_pic three"></div>
             <p class="client_comment">“NRSTEC was the chosen one for our platform SMS Authentication Solutions. We has sent OTP SMS to protect our customer’s accounts.”</p>
             <p class="client_name"><strong>Melvin</strong></p>
         </div>
     </div>
        <div class="item"> 
        <div class="clientFeedback">
         <div class="chat_bg"></div>
         <div class="circle_pic four"></div>
         <p class="client_comment">“这款短信平台真是出类拔萃，连接世界从未如此简单和高效。感谢为我们提供这样的创新工具！”</p>
         <p class="client_name"><strong>悦欣</strong></p>
        </div>
        </div>
        <div class="item"> 
        <div class="clientFeedback">
         <div class="chat_bg"></div>
         <div class="circle_pic five"></div>
         <p class="client_comment">“We chose NRSTEC for its well-documented SMS API, easy integration, and unique coverage in China. No other provider offered this level of service! ”</p>
         <p class="client_name"><strong>Barnaby</strong></p>
        </div>
        </div>
        <div class="item"> 
        <div class="clientFeedback">
         <div class="chat_bg"></div>
         <div class="circle_pic six"></div>
         <p class="client_comment">“NRSTEC has proved user registation by OTP SMS. Thank you!”</p>
         <p class="client_name"><strong>Camelia</strong></p>
        </div>
        </div>
        <div class="item"> 
        <div class="clientFeedback">
         <div class="chat_bg"></div>
         <div class="circle_pic seven"></div>
         <p class="client_comment">“Impressive collaboration with multiple organizations and tight deadlines. Kudos to NRSTEC team for professional and seamless task-solving.”</p>
         <p class="client_name"><strong>Tristan</strong></p>
        </div>
        </div>
   </div>

<script>
jQuery(document).ready(function(){
	setTimeout(function() {
		var owl = jQuery('.client_carousel');
		owl.owlCarousel({
			margin:15,
			loop: true,
			nav: true,
			autoplay: false,
			dots: false,
			autoHeight: false,
			responsiveClass: true,
			responsive: {
				0: {
					//items: 1.5,
					items: 1,
				},
				768: {
					items: 1,
				},
				1200: {
					items: 1.6,
				}
			},
			onInitialized: function() {
				// Add extra class to the first active item
				owl.find('.owl-item.active').first().addClass('light-bg');
			}
		});
		
		owl.on('translated.owl.carousel', function(event) {
			// Remove the extra class from all items and add it to the first active item
			owl.find('.owl-item').removeClass('light-bg');
			owl.find('.owl-item.active').first().addClass('light-bg');
		});
	}, 100);
});
</script>




	<?php
	return ob_get_clean();
		}
add_shortcode('testimonial','testimonial');

