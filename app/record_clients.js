jQuery(document).ready(function() {
	var count=30;
	var divshow = document.createElement('div.sponsor_ads');
    jQuery("#ads_display").hide();
    jQuery("#aux").css('display', 'none');
	jQuery(".msg_url").css('display', 'none');
    jQuery("#partner_add").click(function() {
        jQuery().toggle();
        var toggle_switch = jQuery(this);
        jQuery("#FrAddNewsWorks").toggle(function() {
            if (jQuery(this).css('display') == 'none') {
                jQuery("#FrAddNewsWorks").css('display', 'none');
            } else {
                jQuery("#FrAddNewsWorks").css('display', 'block');
            }
        });
    });
    jQuery("#close_add").click(function() {
        jQuery("#FrAddNewsWorks").css('display', 'none');
    });
	jQuery("#script_ads").click(function() {
        jQuery('#ads_display').hide();
		divshow.setAttribute('style', 'display:none');
		jQuery('#fr_zone_display').show();
		Action_zone();
    });

    jQuery("#type_record").change(function() {
        jQuery("#aux").css('display', 'none');
        var type_record = jQuery("#type_record").val();
        if (type_record == "MX") {
            jQuery("#aux").css('display', 'block');
        }
		if(type_record == "IURL"){
			 jQuery(".msg_url").css('display', 'block');
		}else{
			 jQuery(".msg_url").css('display', 'none');
		}
    });
	
    jQuery('#AddRecord').click(function() {
        jQuery(".msg").empty();
        var check_record = validate_record();
        if (check_record === true) {
            var id_zone = jQuery("#id_zone").val();
            if (id_zone !== null || id_zone !== '') {
				
				jQuery.get(site_url + 'cms/api/AdCheck', function(objAdCheck) {
					if(objAdCheck == 1) {
						DisplayAds();
					}else{
						Action_zone();
					}
				});
				
            } else {
                jQuery(".msg").append("The session has expired please reload the page!");
            }
        }
    });
	function Action_zone(){
		var params = Array();
				var id_zone = jQuery("#id_zone").val();
                var type_record = jQuery("#type_record").val();
                var name_record = jQuery("#name_record").val();
                var data_record = jQuery("#data_record").val();
                var aux = jQuery("#data_aux").val();
                jQuery("#type_record").prop("disabled", true);
                jQuery("#name_record").prop("disabled", true);
                jQuery("#data_record").prop("disabled", true);
                jQuery("#data_aux").prop("disabled", true);
                jQuery("#AddRecord").prop("disabled", true);
                params.push({
                    id_zone: id_zone,
                    type_record: type_record,
                    name_record: name_record,
                    data_record: data_record,
                    aux: aux
                });
                jQuery.post(site_url + 'cms/record', { params }, function(obj){
					var result = JSON.parse(obj)
					var code = result.message.code;
					if(code == 1000){
						var reload_btn = '<input type="button" class="btn btn-danger" value="Refresh Page" onClick="window.location.reload()">';
						templ_reponse_success(result.message.message + 'Please reload the page');
						jQuery("#AddRecord").remove();
						jQuery.get(site_url + 'cms/ZoneUpdate/'+id_zone, function(obj) {
							jQuery("#btn_append").append(reload_btn); 
						});
					}
					if(code == 2035){
						templ_reponse_error(result.message.message);
						jQuery("#type_record").prop("disabled", false);
						jQuery("#name_record").prop("disabled", false);
						jQuery("#data_record").prop("disabled", false);
						jQuery("#data_aux").prop("disabled", false);
						jQuery("#AddRecord").prop("disabled", false);
					}
                });
	}
    function templ_reponse_success(msg){
		jQuery(".msg").empty();
        var tmp = '';
        tmp += '<div class="alert alert-success alert-dismissible">';
			tmp += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
			tmp += '<h4><i class="icon fa fa-ban"></i> Alert!</h4>' + msg;
        tmp += '</div>';
        jQuery(".msg").append(tmp);
    }

    function templ_reponse_error(msg) {
		jQuery(".msg").empty();
        var tmp = '';
        tmp += '<div class="alert alert-danger alert-dismissible">';
        tmp += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        tmp += '<h4><i class="icon fa fa-ban"></i> Alert!</h4>' + msg;
        tmp += '</div>';
        jQuery(".msg").append(tmp);
    }
	function DisplayAds(){
		 
		var counter=setInterval(timer, 1000); 
		jQuery(function(){
		  setTimeout(function(){
			jQuery('#ads_display').show(function(){
			  divshow.setAttribute('style', 'display:block');
			  jQuery('#fr_zone_display').hide();
			  jQuery('#script_ads').hide();
			  setTimeout(function(){
					jQuery('#script_ads').show();
					divshow.setAttribute('style', 'display:none');
			  }, 6000)
			  setTimeout(function(){
				  
				jQuery('#ads_display').hide();
				divshow.setAttribute('style', 'display:none');
				jQuery('#fr_zone_display').show();
				Action_zone();
			  }, 30000)
			})
		  }, 1000)
		});
	}
	
	function timer()
	{
	 
	  count=count-1;
	  if (count < 0)
	  {
		 clearInterval(counter);
		 return;
	  }
		document.getElementById("timer").innerHTML=count;
	 
	}
	function CheckAds(){
		return true;
	}

	function validate_record() {
		var reponse = true;
		jQuery(".msg").empty();
		var type_record = jQuery("#type_record").val();
		var name_record = jQuery("#name_record").val();
		var data_record = jQuery("#data_record").val();
		var aux = jQuery("#data_aux").val();
		if (type_record == "A") {
			var checkname_record_A = CheckisValidIpHostname(name_record);
			var checkdata_record_A = CheckIsValidIP(data_record);
			if (checkname_record_A == null || checkname_record_A == false) {
				jQuery(".msg").append("error name_record");
				return reponse = null;
			} else if (checkdata_record_A == null || checkdata_record_A == false) {
				jQuery(".msg").append("error data_record");
				return reponse = null;
			}

		}
		if (type_record == "AAAA") {
			var checkname_record_AAAA = CheckisValidIpHostname(name_record);
			var checkdata_record_AAAA = CheckIpv6(data_record);
			if (checkname_record_AAAA == null || checkname_record_AAAA == false) {
				jQuery(".msg").append("error name_record");
				return reponse = null;
			} else if (checkdata_record_AAAA == null || checkdata_record_AAAA == false) {
				jQuery(".msg").append("error data_record");
				return reponse = null;
			}
		}
		if (type_record == "CNAME") {
			var checkname_record_CNAME = CheckisValidIpHostname(name_record);
			var checkdata_record_CNAME = CheckIsValidDomain(data_record);
			if (checkname_record_CNAME == null || checkname_record_CNAME == false) {
				jQuery(".msg").append("error name_record");
				return reponse = null;
			} else if (checkdata_record_CNAME == null || checkdata_record_CNAME == false) {
				jQuery(".msg").append("error data_record");
				return reponse = null;
			}
		}
		if (type_record == "MX") {
			var checkname_record_MX = CheckIsValidDomain(name_record);
			var checkdata_record_MX = CheckIsValidDomain(data_record);
			var checkaux = CheckisValidMX(aux);
			if (checkname_record_MX == null || checkname_record_MX == false) {
				jQuery(".msg").append("error name_record");
				return reponse = null;
			} else if (checkdata_record_MX == null || checkdata_record_MX == false) {
				jQuery(".msg").append("error data_record");
				return reponse = null;
			}
			if (checkaux == null || checkaux == false) {
				jQuery(".msg").append("error aux");
				return reponse = null;
			}
		}
		if (type_record == "TXT") {
			var checkname_record_TXT = CheckIsValidDomain(name_record);
			if (checkname_record_TXT == null || checknamecheckname_record_TXT_record == false) {
				jQuery(".msg").append("error name_record");
				return reponse = null;
			} else if (data_record == null || data_record == false) {
				jQuery(".msg").append("error data_record");
				return reponse = null;
			}
		}
		if (type_record == "RURL") {
			var checkname_record_RURL = CheckisValidIpHostname(name_record);
			if (checkname_record_RURL == null || checkname_record_RURL == false) {
				jQuery(".msg").append("error name_record");
				return reponse = null;
			} else if (data_record == null || data_record == false) {
				jQuery(".msg").append("error data_record");
				return reponse = null;
			}

		}
		if (type_record == "IURL") {
			var checkname_record_IURL = CheckisValidIpHostname(name_record);
			if (checkname_record_IURL == null || checkname_record_IURL == false) {
				jQuery(".msg").append("error name_record");
				return reponse = null;
			} else if (data_record == null || data_record == false) {
				jQuery(".msg").append("error data_record");
				return reponse = null;
			}

		}
		return reponse;
	}
	
	function CheckIsValidDomain(domain) {
		var re = new RegExp(/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/);
		return domain.match(re);
	}

	function CheckIsValidIP(domain) {
		var re = new RegExp(/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/);
		return domain.match(re);
	}

	function CheckisValidIpHostname(domain) {
		var re = new RegExp(/^(([a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.)*([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9])$/);
		return domain.match(re);
	}

	function CheckisValidMX(domain) {
		var re = new RegExp(/^(0?[0-9]|[0-5][0-0])$/);
		return domain.match(re);
	}

	function CheckIpv6(domain) {
		return /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$|^(([a-zA-Z]|[a-zA-Z][a-zA-Z0-9\-]*[a-zA-Z0-9])\.)*([A-Za-z]|[A-Za-z][A-Za-z0-9\-]*[A-Za-z0-9])$|^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$/.test(domain);
	}
});

