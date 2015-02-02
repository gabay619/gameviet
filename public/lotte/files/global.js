


jQuery.fn.exists = function () { return jQuery(this).length > 0; }	

	$(document).ready(function() {

		
			if ($(".fancybox-popup").exists())
			{
				$(".fancybox-popup").fancybox({
					//padding		: 5,
					prevEffect	: 'fade',
					nextEffect	: 'fade',
					beforeShow : function(){
					 //this.title = $(this.element).find('img').attr('alt');
					},
					/*maxWidth	: 800,
					maxHeight	: 600,*/
					fitToView	: false,
					width		: 440,
					height		: 500,
					autoSize	: false,
					closeClick	: true,
					openEffect	: 'fade',
					closeEffect	: 'fade',
					afterLoad: function(){
						if ($(this.element).data("width")>0)
						   this.width = $(this.element).data("width");
						if ($(this.element).data("height")>0)
						   this.height = $(this.element).data("height");
					},
					beforeClose	: function() {
									if ($(this.element).data("action")=='reload')
										document.location.reload(true);
								},
		
				});
			}
		$('.OrderCart').click( function () {
				var id = $(this).data("id");
				var url = "ajax/add_to_cart.php";
				var data_post = "id=" + id;
					$.ajax({
					   beforeSend: function(){
							$('.cartNumber').animate({
								opacity: 0.3
							  }, 50, function() {
								// Animation complete.
							  });
					   },
					   type: 'POST',
					   dataType: 'html',
					   url : url,
					   data: data_post,
					   success: function(msg){
						var f = msg.split('|||');
						if (msg)
						{
							$('.cartNumber').html(f[0]);
							$('.cartNumber').animate({
								opacity: 1
							  }, 50, function() {
								// Animation complete.
							 });
						}
					   }
					});
			});
		$('.RemoveCart').click( function () {
				var id = $(this).data("id");
				var thisproduct = $(this);
				
				updateCart(id,'sub',thisproduct);
				
				var url = "ajax/remove_to_cart.php";
				var data_post = "id=" + id;
					$.ajax({
					   beforeSend: function(){
							$('.cartNumber').animate({
								opacity: 0.3
							  }, 50, function() {
								// Animation complete.
							  });
							$(thisproduct).parent().parent().fadeOut('fast');
					   },
					   type: 'POST',
					   dataType: 'html',
					   url : url,
					   data: data_post,
					   success: function(msg){
						var f = msg.split('|||');
						if (msg)
						{
							$('.cartNumber').html(f[0]);
							$('.cartNumber').animate({
								opacity: 1
							  }, 50, function() {
								// Animation complete.
							 });
						}
					   }
					});
		});
		$(".buttonAddCart").on("click", function() {
				var id = $(this).data("id");
				var thisproduct = $(this);
				updateCart(id,'add',thisproduct);
		});
		$(".buttonSubCart").on("click", function() {
				var id = $(this).data("id");
				var thisproduct = $(this);
				updateCart(id,'sub',thisproduct);
		});
	});


function updateCart(id,action,that)
{
	var url = "ajax/addmore_to_cart.php";
	var data_post = "id=" + id + "&action=" + action;
		$.ajax({
		   beforeSend: function(){
				$('.TotalPriceCart').animate({
					opacity: 0.3
				  }, 50, function() {
					// Animation complete.
				  });
				$('#lastprice-'+id).animate({
					opacity: 0.3
				  }, 50, function() {
					// Animation complete.
				  });
		   },
		   type: 'POST',
		   dataType: 'html',
		   url : url,
		   data: data_post,
		   success: function(msg){
			var f = msg.split('|||');
			if (msg)
			{
				$('.TotalPriceCart').html(f[1]);
				$('.TotalPriceCart').animate({
					opacity: 1
				  }, 50, function() {
					// Animation complete.
				 });
				$('#lastprice-'+id).html(f[0]);
				$('#lastprice-'+id).animate({
					opacity: 1
				  }, 50, function() {
					// Animation complete.
				  });
			}
		   }
		});
}

function pop_click(url,width, height) {
    var leftPosition, topPosition;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    window.open(url,'sharer', windowFeatures);
    return false;
}
function fixedEncodeURIComponent (str) {
  return encodeURIComponent(str).replace(/[!'()]/g, escape).replace(/\*/g, "%2A");
}