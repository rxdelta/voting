//$(document).ready(function(e) {
    $(document).ready(function(e) {
		$('.userinfo-item').attr('editiong','false');
		$('.userinfo-item').hover(
			function(){
				if ($(this).attr('editing')!='true' && $(this).attr('edible')=='true') {
					$(this).children('.userinfo-item-edit').show();
				}
			},function(){
				if ($(this).attr('editing')!='true' && $(this).attr('edible')=='true') {
					$(this).children('.userinfo-item-edit').hide();
				}
			}
		);
		
		$('.userinfo-item-edit').click(
			function() {
				if ($(this).parents('div').attr('edible')=='true') {
					$(this).hide();
					$(this).siblings('.userinfo-item-submit').show();
					$(this).parents('div').attr('editing','true');
					$(this).siblings('.userinfo-item-value').attr('contenteditable',true);
					$(this).siblings('.userinfo-item-value').focus();
					$(this).parents('div.userinfo-item').addClass('userinfo-editing');
				}
			}
		);
		
		$('.userinfo-item-value').dblclick( 
			function() {
				if ($(this).parents('div').attr('edible')=='true') {
					$(this).siblings('.userinfo-item-edit').hide();
					$(this).siblings('.userinfo-item-submit').show();
					$(this).parents('div').attr('editing','true');
					$(this).attr('contenteditable',true);
					$(this).focus();
					$(this).parents('div.userinfo-item').addClass('userinfo-editing');
				}
		});
		
		$('.userinfo-item-submit').click(
			function() {
				var value=$(this).siblings('.userinfo-item-value').html();
				var name=$(this).parent('div').attr('id');
				var el=$(this);
				$.ajax('ui_ajax/edit_user.php?'+name+'='+value).done(
					function(response){
						if(response!=''){
							el.hide();
							el.siblings('.userinfo-item-edit').show();
							el.parent('div').attr('editing','false');
							el.siblings('.userinfo-item-value').attr('contenteditable',false);
							el.parent('div').removeClass('userinfo-editing');
							el.siblings('.userinfo-item-value').html(response);
						}
					}
				);
			}
		);
		
		$('.app').click( function() {
			var rows=5;
			var index=parseInt($(this).attr('index'));
			var id="#app_show"+Math.floor(index / rows);
			var key=$(this).attr('appid');
			
			if (($(this).hasClass('app-selected'))) {
				//this tab was opened, so close app
				$('.app-selected').removeClass('app-selected');
				$(id).html('');
			} else {
				//close and open new tab
				$('.app-show').html('');
				$('.app-selected').removeClass('app-selected');
				$(id).addClass('app-selected');
				$(this).addClass("app-selected");
				
				$.ajax('ui_ajax/show_app.php?id='+key).done(
					function(response){
						if(response!=''){
							window.setTimeout(function() {$(id).html(response);},400);
						} else {
							$(id).html("دریافت اطلاعات ناموفق بود");
						}
					}
				);
			}
		});
    });
	
	reload_candidate = function() {
		$('.election-candidate-moreinfo').click( function() {
			var key=$(this).attr('candidate_id');
			var id='#show-candidate';
			$.ajax('ui_ajax/show_candidate.php?id='+key).done(
					function(response){
						if(response!=''){
							$(id).fadeOut(400, function() {$(id).html(response).fadeIn(400);});
						} else {
							$(id).html("دریافت اطلاعات ناموفق بود");
						}
					}
				);
		});
	}
//});
	
