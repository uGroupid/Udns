<div class="container" ng-controller="applogin">
  <!-- /.login-logo -->
<div class="row">
  <div class="lockscreen-logo">
    <a href="<?php echo base_url();?>sign"><b>{{resller}}</b></a>
  </div>
  <!-- User name -->
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item" style="width: 800px;text-align: center;">
	<h3> Technical Assistance Center {{resller}}</h3>
	<p style="width: 800px;    text-align: justify;"> 
		Please do not hesitate to send us any information about the help center of {{resller}} follow the link below.
		<span>Technical Support of {{resller}}., Please create an account in the help center and then submit information for assistance. DNS account issues or DNS records. </span>
		<br><a href="http://support.ugroup.asia/support/" class="btn btn-danger"> <i class="fa  fa-hand-o-right"> </i> Go to the Tech Support Center {{resller}}</a>  <a class="btn btn-primary" title="Recovery password uDNS " href="<?php echo base_url();?>helpcenter/recovery_password"> Or Recovery password uDNS  </a>
	</p>
  </div>
 
 
</div>
  {msg}
  <!-- /.login-box-body -->
</div>