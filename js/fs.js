jQuery(document).ready(function($){

	function jQbody() {
		return (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
	};

	$(window).load(function(){
		$('#area_t div').each(function(){
			if ( $(this).find('.atjs').next().attr('class')=='plane_hover' ) {
				$(this).find('.atjs').fadeOut().next().fadeIn(1000).fadeOut().prev().fadeIn(800);
			} else {
				$(this).find('.atjs').next().fadeIn(1000).fadeOut(800);
			}
		});
	});

	$('#area_t div').hover(function(){
		if ( $(this).find('.atjs').next().attr('class')=='plane_hover' )
			$(this).find('.atjs').fadeOut(200).next().fadeIn(400);
		else
			$(this).find('.atjs').next().fadeIn(400);
	}, function(){
		if ( $(this).find('.atjs').next().attr('class')=='plane_hover' )
			$(this).find('.atjs').next().fadeOut(200).prev().fadeIn(400);
		else
			$(this).find('.atjs').next().fadeOut(200);
	});
	$('#area_t div a').click(function(){
		var class_name=$(this).parent().attr('class');
		switch (class_name)
		{
			case 'cloud_gc_hover': {
					jQbody().animate({scrollTop: $('#fc_select').offset().top},800);
					$('#fc_select').find('option:eq(0)').attr("selected",true);
				} break;
			case 'cloud_fc_hover': {
					$('#fc_select').find('option:eq(1)').attr("selected",true);
					jQbody().animate({scrollTop: $('#fc_select').offset().top},800);
				} break;
			case 'cloud_cp_hover': {
					$('#fc_select').find('option:eq(2)').attr("selected",true);
					jQbody().animate({scrollTop: $('#fc_select').offset().top},800);
				} break;
			case 'cloud_p_hover': {
					$('#fc_select').find('option:eq(3)').attr("selected",true);
					jQbody().animate({scrollTop: $('#fc_select').offset().top},800);
				} break;
			case 'cloud_fcn_hover': {
					$('#fc_select').find('option:eq(4)').attr("selected",true);
					jQbody().animate({scrollTop: $('#fc_select').offset().top},800);
				} break;
			default: {}
		};
		return false;
	});

	var fly_aready=0;
	var	$w_follow_Fun = function() {
		if (fly_aready==0) {
			var st=$(document).scrollTop(),
					area_m=$('#area_m').scrollTop(),
					window_H=$(window).height(),
					fly_dot=area_m+window_H/3;

			if (st > fly_dot) {
				$('#photo1').animate({'right':'80px'},600);
				$('#photo2').animate({'right':'30px'},1200);
				fly_aready=1;
			};
		};
	};
	$(window).bind('scroll', $w_follow_Fun);

});
