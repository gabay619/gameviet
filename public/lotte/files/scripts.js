/*
	Front-end: Son Nguyen
	Email: ntson1610@gmail.com
	Date: 5/2014
*/

$(window).bind("load", function() {
	//$("#spinner").fadeOut("slow");
	if($(".pro-detail .thumb").length)
	{
		$(".pro-detail .thumb").css("height", $(".pro-detail .thumb img").height());
	}
	
	
	if($(".layer-plax").length) {
		$('.layer-plax').plaxify({"xRange":40,"yRange":0}) 
	}
	
	if($(".plax-member").length) {
 
		$('.plax-member').plaxify({"xRange":130,"yRange":130})
	}
	
	
    //$('#plax-sphere-3').plaxify({"xRange":40,"yRange":40,"invert":true})
    if($(".layer-flax").length) {
    	$.plax.enable()	
    }
	
});

$(document).ready(function() {
    $('.modal').appendTo("body");
    $('nav#sidebar').mmenu();
	
	/* $('.has-sub').hover(function () { 
		$("#hidden-sub").show('slide', { direction: 'up' }, 330);
		$('#hidden-sub').addClass('active');
	},function() { 
		$("#hidden-sub").hide('slide', { direction: 'up' }, 330);
		$('#hidden-sub').removeClass('active');
	}); */
	
	var config = {    
		 sensitivity: 3,    
		 interval: 100,     
		 timeout: 100,    
	};
	$(".has-sub").hoverIntent(function () {
		//$(this).addClass('is-active');
    	//$(this).children('.sub-nav-bar').css("width", "150px");
		$(this).find(".hidden-sub").show('slide', { direction: 'up' }, 330);
        $(this).find('.hidden-sub').addClass('active');
	}, function() {
        $(this).find(".hidden-sub").hide('slide', { direction: 'up' }, 230);
        $(this).find('.hidden-sub').removeClass('active');
		//$(this).removeClass('is-active');
        //$(this).children('.sub-nav-bar').animate({width: "0px"}, 250)
			
	}, config);
	
	if($(".list-pro").length)
	{
		$('.list-pro li').each(function(index){
		    $(this).addClass("item-" + index);
		    $('.list-pro li:first-child').addClass('first');
		    $('.list-pro li:last-child').addClass('last');             
		});
	}
	
	
	//$("#middle").css("min-height", $(window).height() - 81);
	
	
	
	//if($("form.search").length)
	//{
	//	$("form.search").click(function(){
	//	     window.location=$(this).find("a").attr("href");
	//	     return false;
	//	});
	//}
	
	
	
	//fixed menu top
	var navpos = $('#top').offset();
	//console.log(navpos.top);
	$(window).bind('scroll', function() {
	  if ($(window).scrollTop() > navpos.top) {
		$('#top').addClass('fixed'); 
	   }
	   else {
		 $('#top').removeClass('fixed'); 		     
	   }
	});
	
	
	$(".button").on("click", function() {

	  var $button = $(this);
	  var oldValue = $button.parent().find("input").val();
	
	  if ($button.text() == "+") {
		  var newVal = parseFloat(oldValue) + 1;
		} else {
	   // Don't allow decrementing below zero
	    if (oldValue > 0) {
	      var newVal = parseFloat(oldValue) - 1;
	    } else {
	      newVal = 0;
	    }
	  }
	
	  $button.parent().find("input").val(newVal);
	
	});
	
	
	
	//Active slide down
	$(".pop-down").click(function() { 
		$("#wrap-pop").show('slide', { direction: 'up' }, 230);
	});
	$(".close-pop").click(function() { 
		$("#wrap-pop").hide('slide', { direction: 'up' }, 330);
		$("#footer").show();
	});
	$("#more-btn").click(function() { 
		$("#wrap-pop").show('slide', { direction: 'up' }, 230);
		$("#footer").hide();
	});
	
	
	$(".list-promotion").click(function() { 
		$("#footer").show();
	});
	
	//Share social
	//$(".toggle-flyout").click( function(event){
	//
	//	event.preventDefault();
	//
	//	if ($(this).hasClass("isDown") ) {
	//		 $(this).siblings('.flyout').show('slide', { direction: 'right' }, 300);
	//		$(this).removeClass("isDown");
	//	} else {
	//		 $(this).siblings('.flyout').hide('slide', { direction: 'right' }, 200);
	//		$(this).addClass("isDown");
	//	}
	//	return false;
	//
	//
	//});
	
	//Detail Popup
	//$(".pop-detail").click(function() {
	//	var id = $(this).data("id");
	//	if($(window).width() < 481) {
	//		var pr = $("#wrap-pop-detail-" + id).find(".detail-pop");
	//		pr.css("height", $(window).height() - 81);
	//		pr.css("overflow-y", "scroll");
	//		pr.css("-webkit-overflow-scrolling", "touch");
	//		pr.css("padding", "30px 10px  20px");
	//		pr.css("width", "100%");
	//	}
	//	$("#wrap-pop-detail-" + id).show('slide', { direction: 'up' }, 230);
	//
	//});
	//$(".close-pop-detail").click(function() {
	//	$("#middle").css("height", "");
	//	$("#middle").removeClass("zindex");
	//	$("#top").css("z-index", "");
	//	$(".pro-pop-detail").css("height", "");
	//	var id = $(this).data("id");
	//	$("#wrap-pop-detail-" + id).hide('slide', { direction: 'up' }, 330);
	//	if($(window).width() < 481) {
	//		$("#footer").show();
	//	}
	//});
	//$(".pop-detail-bg").click(function() {
	//	var id = $(this).data("id");
	//	var bg = $(this).data("bg");
    //
	//	$(".pop-detail").data("id",id);
	//	$("#promo_bg").css("background-image","url("+bg+")");
	//
	//	$("#wrap-pop").hide('slide', { direction: 'up' }, 330);
	//});
	
	//Search Popup
	$(".pop-search").click(function() { 
		$("#wrap-pop-search").show('slide', { direction: 'up' }, 230); 
		$("#wrap-pop-search .text").focus();
	});
	$(".close-pop-search").click(function() { 
		$("#wrap-pop-search").hide('slide', { direction: 'up' }, 330); 
	});
	
	$(".video-type").click(function() { 
	
		var video = $('#video_background').get(0);
		$('#video_background').attr({'autoplay':'true'});
		video.play();
		
		$('.bx-wrapper').fadeOut();
		$('.video-slide').fadeIn();
		
		 
		if($(window).width() > 480) { 
			$(".info-footer").animate({bottom:"-170px"}, 200); 
		}
		//$(".info-footer").css("height", "40px");   
		$("#type-func .fullscreen").addClass("isDown");
		$("#type-func .image-type").addClass("isPlay");
		 
		
	});
	
	$(".image-type").click(function() { 
		
		var video = $('#video_background').get(0);
		//$('#video_background').attr({'autoplay':'true'});
		if (!video.paused) {
		    video.pause();
		} 
		
		$('.bx-wrapper').fadeIn();
		$('.video-slide').fadeOut();
		 
		if($(window).width() > 480) { 
			$(".info-footer").animate({bottom:"-170px"}, 200); 
		}
		//$(".info-footer").css("height", "40px");   
		$("#type-func .fullscreen").addClass("isDown");
		
		if($(".image-type").hasClass('isPlay')){
			$('#bxslider').bxSlider().stopAuto();
			
		}
		
	});
	
	//Fullscreen
	$("#type-func .fullscreen").click( function(event){
		event.preventDefault();
		if ($(this).hasClass("isDown") ) {
			$(".info-footer").animate({bottom:"0px"}, 200);         
			$(this).removeClass("isDown");
		} else {
			$(".info-footer").animate({bottom:"-170px"}, 200);  
			$(this).addClass("isDown");
		}
		return false;
	});
	
	

    $ ('ul.list-promotion li:even').addClass('even');
    $ ('ul.list-promotion li:odd').addClass('odd');
    
    //Custom scrollbar
	if($(".scroll-pane").length) {
		if($(window).width() > 480) {
			$('.scroll-pane').jScrollPane({autoReinitialise: true});
		}
	}
	
 
	
	if($(".tabs-nav").length) {
		$(".tab-content").not(":first").hide();
	    // adding Active class to first selected tab and show
	    $("ul.tabs-nav li:first").addClass("active").show(); 
	 
	    // Click event on tab
	    $("ul.tabs-nav li").click(function() { 
	        // Removing class of Active tab
	        $("ul.tabs-nav li.active").removeClass("active");
	        // Adding Active class to Clicked tab
	        $(this).addClass("active");
	        // hiding all the tab contents
	        $(".tab-content").hide();       
	        // showing the clicked tab's content using fading effect
	        $($('a',this).attr("href")).fadeIn('slow');
	 
	        return false;
	    });
    }
	 

	
	
	if($(".layer-01").length) {
		$('.layer-01').plaxify({"xRange":30,"yRange":30})
	}
	if($(".layer-02").length) {
		$('.layer-02').plaxify({"xRange":20,"yRange":20})
	}
	if($(".layer-03").length) {
		$('.layer-03').plaxify({"xRange":50,"yRange":50})
	}
	if($(".layer-04").length) {
		$('.layer-04').plaxify({"xRange":20,"yRange":20})
	}
	if($(".layer-05").length) {
		$('.layer-05').plaxify({"xRange":20,"yRange":20}) 
	}
	if($(".layer-plax").length) {
		$('.layer-plax').plaxify({"xRange":40,"yRange":0}) 
	}
	
	if($(".plax-member").length) {
 
		$('.plax-member').plaxify({"xRange":130,"yRange":130})
	}
	
	
    //$('#plax-sphere-3').plaxify({"xRange":40,"yRange":40,"invert":true})
    if($(".layer-flax").length) {
    	$.plax.enable()	
    }
    
    
    // select element styling
    //$('select').each(function(){
		//var title = $(this).attr('title');
		//if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
		//$(this)
		//	.css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
		//	.after('<span class="select">' + title + '</span>')
		//	.change(function(){
		//		val = $('option:selected',this).text();
		//		$(this).next().text(val);
		//		})
    //});
	
});


//$(function(){
//	$('#bxslider').bxSlider({
//        mode: 'horizontal',
//        auto: ($("#bxslider > li").length > 1) ? true: false,
//		pager: ($("#bxslider > li").length > 1) ? true: false,
//		controls: ($("#bxslider > li").length > 1) ? true: false
//   });
//
//});



$(function(){

	$.fn.fancyRadio = function(){
		return $(this).each(function(){
			var p = $(this), 
				container = $('<span class="radio-container"/>'),
				radio = $('<span class="radio"/>');

			p.find('input[type="radio"]').wrap(container);
			p.find('span.radio-container').append(radio);
			p.find('input:checked').parent()
									.find('span.radio').addClass('selected');

			p.find('input[type="radio"]').on('click',function(){
				p.find('span.selected').removeClass('selected');
				$(this).parent().find('span.radio').addClass('selected');
			});
		});
	};

	$('.radio').fancyRadio();
	
	
	
	
	if($(window).width() < 481) {
		$("#wrap-pop.all-promotion").css("height", $(window).height() - 81);
	}
});


$(function(){	
	$('input[placeholder]').each(function(){  
		var input = $(this);        
		$(input).val(input.attr('placeholder'));
					
		$(input).focus(function(){
			if (input.val() == input.attr('placeholder')) {
			   input.val('');
			}
		});
			
		$(input).blur(function(){
		   if (input.val() == '' || input.val() == input.attr('placeholder')) {
			   input.val(input.attr('placeholder'));
		   }
		});
	});
});