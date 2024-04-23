jQuery.noConflict(), jQuery(document).ready(function($) {
	let vxx2 = document.getElementById("skonis");
	if (vxx2) {
		let vxx = vxx2.value;
		if (vxx != '') {
			let vx = document.getElementsByClassName("price-wrapper");
			$(vx).css("display", "none");
		}
	}
	$('#skonis').on('change', function() {
		if (this.value != '') {
			let vx = document.getElementsByClassName("price-wrapper");
			$(vx).css("display", "none");
		} else {
			let vx = document.getElementsByClassName("price-wrapper");
			$(vx).css("display", "block");
		}
	});
	let url_path = window.location.href;
	if (url_path) {
		var parts = url_path.split("/");
		var last_part = parts[parts.length-1];
		if (last_part.split('#')[last_part.split('#').length-1] === 'comments') {
			console.log('c');
			let tab_x = document.getElementById("tab-description");
			$(tab_x).removeClass("active");
			let tab = document.getElementById("tab-reviews");
			$(tab).addClass("active");
			$("body,html").animate(
			  	{
					scrollTop: ($("#reviews .product-rating").offset().top-200)
			  	},
			  500 //speed
			);
		} else {
			console.log(last_part.split('#'));
		}
	}
	$(".woocommerce-review-link").click(function(){
		let tba = document.getElementById("tab-title-description");
		$(tba).removeClass("active");
		let tbx = document.getElementById("tab-title-reviews");
		$(tbx).addClass("active");
	});
	
	
});


