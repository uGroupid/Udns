	<script src="<?php echo base_url();?>app/base/angular_work.js"></script>
<script src="<?php echo base_url();?>app/record_clients.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>public/plugins/pace/pace.min.css">
<script src="<?php echo base_url();?>public/bower_components/PACE/pace.min.js"></script>
<div class="content-wrapper">
<section class="content-header">
<h1>Domain Control Panel
<!--<small> {title_main}</small>--></h1>
  <ol class="breadcrumb">
	<li><a target="_blank" href="http://support.ureg.asia"> <i class="fa  fa-support"></i> Supporting documentation </a> </li>
	
  </ol>
</section>
<div class="col-md-11" align="center" style="text-align: center;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- uDNS - Responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5897893410301469"
     data-ad-slot="2067778267"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</div>
<hr>
<section class="content" ng-controller="WorksBaseCtrl">
<div class="row" >
	<div class="col-xs-12">
		<div class="skin-blue sidebar-mini pace-done" style="height: auto; min-height: 100%;">
			<div class="pace  pace-inactive">
				<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
				<div class="pace-progress-inner"></div>
				</div>
				<div class="pace-activity"></div>
			</div>
		</div>
		<div class="box">
		<div class="box-header">
			<div id="ads_display" style="width: 100%; height: 300px; display: none;">
				<div class="sponsor_ads" style="width: 100%; height: 500px; display: block;"> 
				<div class="col-md-12">
				<div class="col-md-4">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- uDNS - 300x250 A -->
				<ins class="adsbygoogle"
					 style="display:inline-block;width:300px;height:250px"
					 data-ad-client="ca-pub-5897893410301469"
					 data-ad-slot="5145012529"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
				</div>
				<div class="col-md-4">
					<div class="col-md-12">
						<div class="time_runing" style="width: 200px;height: 200px;border-radius: 100%;border: 1px solid #fff;background: #ca7d0b;text-align: center;margin: 10px auto;">
							<span id="timer" style="font-size: 120px;margin: 10px auto;color: #fff;text-align: center;width: 100%;float: left;"></span>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6">
							<button id="script_ads" class="btn btn-default btn-lg"> Skip Ads </button>
						</div>
						<div class="col-md-6">
							<button id="waiting_ads_ads" class="btn btn-success btn-lg" disabled> Vui lòng chờ</button>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- uDNS - 300x250 B -->
					<ins class="adsbygoogle"
						 style="display:inline-block;width:300px;height:250px"
						 data-ad-client="ca-pub-5897893410301469"
						 data-ad-slot="8871013857"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</div>
				</div>
			</div>
			<div id="fr_zone_display">
			<button id="partner_add"style="margin-top: 15px;margin-bottom: 10px;" type="button" class="btn btn-success"  >ADD NEW RECORD</button>
			<form id="FrAddNewsWorks" style="display:none;background: #f9f9f9;">
		
				<div class="modal-header">
				
					<h4 class="modal-title" id="ResetAddNews">Add New Record</h4>
				</div>
				<div class="modal-body">
				<div class="form-group" style="max-width: 42%;" >
						<label>(*) Type Record </label>
						<select id="type_record" name="type_record" class="form-control" required>
							<option value="A"> A</option>
							<option value="AAAA">AAAA</option>
							<option value="CNAME" >CNAME</option>
							<option value="TXT" >TXT</option>
							<option value="MX" >MX</option>
							<!--<option value="RURL" >REDIRECT URL </option>-->
							<option value="IURL" >IFRAME URL</option>
						</select>
				</div>
				<div class="form-group">
					<label>(*) NAME RECORD </label>
						<input id="name_record" name="name_record" type="text" class="form-control" placeholder="Enter ..." required />
				</div>
				<div class="form-group">
					<label>(*) DATA RECORD</label>
					<input id="data_record" name="data_record" type="text" class="form-control" placeholder="Enter ..." required>
				</div>
				<div class="form-group" id="aux" style="display:none">
					<label>(*) AUX</label>
					<input id="data_aux"  name="aux" type="text" value="10" class="form-control" placeholder="Enter ..." required>
				</div>
				<div ng-repeat="zones in zone" > 
					<input id="id_zone" name="id_zone" type="hidden" value="{{zones._id.$id}}" >
				</div>
				<div class="msg" style="color:red;"> </div>
				<div class="msg_url" style="color:red;"> ( Note *) if you make a redirect for the primary domain. We will delete all remaining records..</div>
				</div>
				<div class="modal-footer">
					<button id="close_add" type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="button" id="AddRecord" class="btn btn-success">Agree, Continue</button>
					<div id="btn_append"> </div>
				</div>
			
			</form>
			<ul class="pagination pagination-sm no-margin pull-right" style=" display: inline-grid;height: 55px;"></ul>
			</div>
		</div>
			<div  class="box-body no-padding">
		
				<div id="response_data" class="col-xs-12" style="margin: 0px;" > 
					  <table class="table table-striped">
							<tr ng-repeat="zones in zone" > 
								<td class="col-md-3 reponse_tables_td"> Zone Name : <span class="label label-primary"> {{zones.name_zone}}</span></td>
								<td class="col-md-3 reponse_tables_td"> Zone Load:  <span class="label label-warning">{{zones.active}}</span></td> 
								<td class="col-md-3 reponse_tables_td"> Zone Status:<span class="label label-success"> {{zones.status}} </span></td>
								<td class="col-md-3 reponse_tables_td"> <div>  Record Max: <span class="label label-success">{{totals.item}}/175 </span> </div></td>
							</tr>
						  </table>
					<table class="table table-striped ">
						<tr >
							<th class="reponse_tables_td"> <a class="title_field" href="" ng-click="sortField = 'name_record' ;  reverse = !reverse ">Name Record </a></th>
							<th class="reponse_tables_td"> <a class="title_field" href="" ng-click="sortField = 'type_record' ;  reverse = !reverse "> Type Record </a></th>
							<th class="reponse_tables_td"> <a class="title_field" href="" ng-click="sortField = 'data_record';  reverse = !reverse ">Data Record</a> </th>
							<th class="reponse_tables_td"> <a class="title_field" href="" ng-click="sortField = 'aux';  reverse = !reverse"> Aux </a></th>
							<th class="reponse_tables_td">  </th>
						<tr>
						<tbody>
						<tr  ng-repeat="works in record | orderBy:sortField | filter:searchjobs " >
							<td class="reponse_tables_td" >{{works.name_record}}</td>
							<td class="reponse_tables_td" >{{works.type_record}}</td>
							<td class="reponse_tables_td" >{{works.data_record}}</td>
							<td class="reponse_tables_td" >{{works.aux}}</td>
							<td class="reponse_tables_td" > <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{works._id.$id}}">
								<i class="fa fa-trash-o"> </i>
							</button>
							<div class="modal modal-danger fade" id="modal-danger-{{works._id.$id}}">
								<div class="modal-dialog">
									<div class="modal-content">
										<form>
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span></button>
											<h4 class="modal-title">Remove (Record ID): {{works._id.$id}}</h4>
										</div>
										<div class="modal-body">
											<p> Are you sure you want to delete this record? </p>
											<ul>	
												<li> Name Record: {{works.name_record}}</li>
												<li> Type Record: {{works.type_record}}</li>
												<li> Data Record: {{works.data_record}}</li>
												<li> Aux:  {{works.aux}}</li>
											</ul>
											<i>Remember that the record will not exist if you delete the record. (if you delete this record will not exist. It will not work for 7200 seconds) </i>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
											<a type="button" href="<?php echo base_url()?>cms/remove_record?id_record={{works._id.$id}}&id_zone={{works.id_zone}}"  class="btn btn-outline">Agree, I delete this record</a>
										</div>
									</form>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
						</td>
						</tr>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
@media screen and (max-width: 850px) {
	.reponse_tables_td {
		border-top: 1px solid #f4f4f4;
		font-size: 20px !important;
		width: 100% !important;
		float: left !important;
		    margin-right: -30px !important;
		word-wrap: break-word;
	}
}
.title_field {
    color: #000 !important;
    font-weight: normal !important;
    font-size: 13px !important;
    font-family: Aria !important;
    text-transform: uppercase !important;
}
</style>
</section>
</div>
