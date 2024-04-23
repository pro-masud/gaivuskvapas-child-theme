jQuery.noConflict(), jQuery(document).ready(function($) {
	//SHOW MORE
	$(function(){
		// $( '.flickity-prev-next-button' ).append( '<img src="/wp-content/themes/avsa-child/svg/arrow.svg">' );
		$( '.flickity-prev-next-button' ).append( '<svg class="gk-prev-next" xmlns="http://www.w3.org/2000/svg" width="16" height="34" viewBox="0 0 16 34"><path fill="#bfbfbf" d="M.514 15.122c4.121-4.834 8.24-9.668 12.362-14.5 1.696-1.988 4.225 1.244 2.522 3.24-3.667 4.3-7.334 8.6-11 12.903 3.685 4.45 7.37 8.904 11.055 13.356 1.68 2.027-.85 5.26-2.524 3.238L.514 18.36c-.685-.83-.702-2.418 0-3.24z"/></svg>' );
	});
  $('.gk-highlight-text').each(function(){
    var me = $(this);
    me.html( me.text().replace(/(^\w+)/,'<span class="gk-highlighted-text">$1</span>') );
  });	
  
 	pageSize = 10;
	incremSlide = 5;
	startPage = 0;
	numberPage = 0;

	var pageCount =  $(".row.row-collapse.mb").length / pageSize;
	var totalSlidepPage = Math.floor(pageCount / incremSlide);
		
	for(var i = 0 ; i<pageCount;i++){
		$("#pagin").append('<li><a href="#">'+(i+1)+'</a></li> ');
		if(i>pageSize){
		   $("#pagin li").eq(i).hide();
		}
	}

	var prev = $("<li/>").addClass("prev").html("←").click(function(){
	   startPage-=11;
	   incremSlide-=5;
	   numberPage--;
	   slide();
	});

	prev.hide();

	var next = $("<li/>").addClass("next").html("→").click(function(){
	   startPage+=11;
	   incremSlide+=5;
	   numberPage++;
	   slide();
	});

	$("#pagin").prepend(prev).append(next);

	$("#pagin li").first().find("a").addClass("current");

	slide = function(sens){
	   $("#pagin li").hide();
	   
	   for(t=startPage;t<incremSlide;t++){
		 $("#pagin li").eq(t+1).show();
	   }
	   if(startPage == 0){
		 next.show();
		 prev.hide();
	   }else if(numberPage == totalSlidepPage ){
		 next.hide();
		 prev.show();
	   }else{
		 next.show();
		 prev.show();
	   }
	}

	showPage = function(page) {
		  $(".row.row-collapse.mb").hide();
		  $(".row.row-collapse.mb").each(function(n) {
			  if (n >= pageSize * (page - 1) && n < pageSize * page)
				  $(this).show();
		  });        
	}
		
	showPage(1);
	$("#pagin li a").eq(0).addClass("current");

	$("#pagin li a").click(function() {
		 $("#pagin li a").removeClass("current");
		 $(this).addClass("current");
		 showPage(parseInt($(this).text()));
		 $("body,html").animate(
		  {
			scrollTop: $("#scrt").offset().top
		  },
		  500 //speed
		);
	});  
  
});
