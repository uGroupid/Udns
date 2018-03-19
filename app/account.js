jQuery(document).ready(function() {
function loadAppsAccountServiceTotal(){
var AccountServiceTotal = false;
jQuery.ajax({type: 'GET',async: false,url: AppsAccountServiceTotal,success: function(responseAccountServiceTotal) {AccountServiceTotal = Math.round(responseAccountServiceTotal);}});
return AccountServiceTotal;
}
function loadSearchAppsAccountServiceTotal(text_search,option_search){
var AccountSearchServiceTotal = false;
jQuery.ajax({type: 'GET',async: false,url: AppsAccountServiceTotal+'?text_search='+text_search+'&option_search='+option_search,success: function(responseAccountServiceTotal) {AccountSearchServiceTotal = Math.round(responseAccountServiceTotal);}});
return AccountSearchServiceTotal;
}
AppsAccountLoadDatabas();
jQuery("#submit_search").click(function(){
	jQuery('.msg_search').empty();
	var text_search = jQuery("#text_search").val();
	var option_search = jQuery("#option_search").val();
	var textsearch;
	if(text_search === '' || text_search === null){
		jQuery('.msg_search').append('không bỏ trống từ khoá tìm kiếm');
	}else{
		textsearch = 'Từ khoá tìm kiếm: '+text_search+' Thuộc danh mục: '+option_search;
		jQuery('.msg_search').append(textsearch);
		jQuery("#response_data").empty();
		var ajaxObjAccountServiceTotalSearch = loadSearchAppsAccountServiceTotal(text_search,option_search);
		var AppsAcountServiceResponseSearch = AppsAcountServiceResponse+'?text_search='+text_search+'&option_search='+option_search;
		jQuery("#response_data").load(AppsAcountServiceResponseSearch); 
		jQuery(".pagination").bootpag({
			 total: ajaxObjAccountServiceTotalSearch,
			 page: 1,
				maxVisible: 5,
			 leaps: false 
		}).on("page", function(e, num){e.preventDefault();
			jQuery(".loading").empty();
			jQuery(".loading").append('<div class="loading-indication"><img  src="'+url_global+'public/plugins/bootpag/ajax-loader.gif" /> Loading...</div>');
			jQuery("#response_data").load(AppsAcountServiceResponseSearch, {'page': num });
		});
	}
	
});

function AppsAccountLoadDatabas(){
var ajaxObjAccountServiceTotal = loadAppsAccountServiceTotal();
jQuery("#response_data").load(AppsAcountServiceResponse); 
jQuery(".pagination").bootpag({
	 total: ajaxObjAccountServiceTotal,
	 page: 1,
	 maxVisible: 5,
	 leaps: false 
}).on("page", function(e, num){e.preventDefault();
	jQuery(".loading").empty();
	jQuery(".loading").append('<div class="loading-indication"><img  src="'+url_global+'public/plugins/bootpag/ajax-loader.gif" /> Loading...</div>');
	jQuery("#response_data").load(AppsAcountServiceResponse, {'page': num });
});
}
jQuery('#removeAccounts').click(function(){
	var initial = jQuery(this).val();
	alert(initial);
});
jQuery("#emailAdd").empty();
jQuery('#AddNews').click(function(){
jQuery(".msg").empty();
var email = jQuery("#emailAdd").val();
if(email==null){
	jQuery(".msg").append("error email");
}else{
	jQuery.post(url_global+'account/AddAccountCheckAvalible', {email: email}, function(resultAddnews){
			jQuery(".msg").html(resultAddnews);
	});
}
});
});

