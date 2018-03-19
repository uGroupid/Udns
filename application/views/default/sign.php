<div class="login-box" ng-controller="applogin">
  <div class="login-logo">
    <a href="<?php echo base_url();?>" id="logo_reseller" title="{{resller}}"><h1 style="    font-size: 30px;">{{resller}}</h1></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to control panel domain</p>
    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input name="domain_name" type="text" class="form-control" placeholder="Your Domain name">
        <span class="glyphicon glyphicon-global form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button name="cmdLogin" type="submit" value="LoginAccount" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div> 
		<div class="col-xs-4" style="float: right;" >
          <a name="cmdCreatenews" href="<?php echo base_url();?>reseller" class="btn btn-success btn-block btn-flat">Sign Up</a>
        </div>
        <!-- /.col -->
      </div>
	  <a style="margin-top: 10px;width: 100%;" href="<?php echo base_url();?>helpcenter" class="btn btn-info"> <i class="fa  fa-hand-o-right"> </i> Help from the support center</a>
		
    </form>
  </div>
  {msg}
  <!-- /.login-box-body -->
</div>