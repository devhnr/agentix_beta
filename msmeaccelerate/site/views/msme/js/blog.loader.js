$.ajax({
	type:'GET',
	url:'https://www.zenerom.in/blog/wp-json/wp/v2/posts?posts_per_page=3&order=desc',
	dataType:'json',
	success:function(resp){
		var html = '';
		if(resp.length > 0){
			for(var i=0;i < resp.length;i++){
				html += '<div class="col-md-6 col-lg-4">';
				html += '<div class="blog-entry">';
				html += '<a href="'+resp[i].link+'" class="block-20 d-flex align-items-end" style="background-image: url('+resp[i].featured_image_url+');">';
				html += '<div class="meta-date text-center p-2">';
				html += '<span class="day">'+resp[i].smalldate.date+'</span>';
				html += '<span class="mos">'+resp[i].smalldate.month+'</span>';
				html += '<span class="yr">'+resp[i].smalldate.year+'</span>';
				html += '</div>';
				html += '</a>';

				html += '<div class="text bg-white p-4">';
				html += '<h3 class="heading"><a href="'+resp[i].link+'">'+resp[i].title.rendered+'</a></h3>';
				html += '<p>'+resp[i].excerpt_content+'</p>';
				html += '<div class="d-flex align-items-center mt-4">';
				html += '<p class="mb-0"><a href="'+resp[i].link+'" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>';
				html += '<p class="ml-auto mb-0">';
				if(resp[i].commentcount){
					html += '<a href="#" class="meta-chat"><span style="position: relative;top: 3px;margin-right: 4px;" class="icon-chat"></span>'+resp[i].commentcount+'</a>';
				}else{
					html += '<a href="#" class="meta-chat"><span style="position: relative;top: 3px;margin-right: 4px;" class="icon-chat"></span>0</a>';
				}
				html += '</p>';
				html += '</div>';
				html += '</div>';

				html += '</div>';
				html += '</div>';
			}

			//console.log(html);
			$('.blog_section').html(html);
		}
		//console.log(resp);
		//$('.blog_section').html();
	}
});
$.ajax({
	type:'GET',
	url:'https://www.zenerom.in/blog/wp-json/wp/v2/posts?posts_per_page=2&order=desc',
	dataType:'json',
	success:function(resp){
		var fhtml = '';
		if(resp.length > 0){
			for(var i=0;i < resp.length;i++){
				fhtml += '<div class="block-21 mb-4 d-flex">';
		  fhtml += '<a href="'+resp[i].link+'" class="blog-img mr-4" style="background-image: url('+resp[i].featured_image_url+');"></a>';
		  fhtml += '<div class="text">';
		  fhtml += '<h3 class="heading"><a href="'+resp[i].link+'">'+resp[i].title.rendered+'</a></h3>';
		  fhtml += '<div class="meta">';
		  fhtml += '<div><a href="'+resp[i].link+'"><span class="icon-calendar"></span> '+resp[i].smalldate.month+' '+resp[i].smalldate.date+', '+resp[i].smalldate.year+'</span>';
		  fhtml += '</div>';
		  fhtml += '</div>';
		  fhtml += '</div>';
		  fhtml += '</div>';
			}

			//console.log(fhtml);
			$('.foot_blog').html(fhtml);
		}
		//console.log(resp);
		//$('.blog_section').html();
	}
});