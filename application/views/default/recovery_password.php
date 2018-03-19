<div class="container" ng-controller="applogin">
  <!-- /.login-logo -->
<div class="row">
  <div class="lockscreen-logo">
    <a href="<?php echo base_url();?>sign"><b>{{resller}}</b></a>
  </div>
  <!-- User name -->
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item" style="width: 800px;text-align: center;">
	<h3> Technical Assistance Center </h3>
	<p> 
		Here we will make a few questions.? before you perform password recovery.
		Please fill in the form below and we will look into the answer and send you a password confirmation email to the administrator of the account.
		Thank you!.
	<p/>
  </div>
	<div class="col-md-12">
	  <!-- general form elements -->
	  <div class="box box-danger">
		<div class="box-header with-border">
		  <h3 class="box-title">Infomation Account recovery </h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="post" action="#">
		  <div class="box-body">
		   <div class="form-group">
			  <label for="exampleInputEmail1">What is an account name?</label>
			  <input type="text" class="form-control" id="passwordsold" value="" name="passwordold" placeholder="Your old password">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">What is the email administrator account name?</label>
			  <input type="text" class="form-control" id="passwords" name="passwordnew" value="" placeholder="Your New password: 01234abc!@#">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">What is an account administrator's phone number?</label>
			  <input type="text" class="form-control" id="passwords" name="passwordnew" value="" placeholder="Your New password: 01234abc!@#">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">What is the domain of the account?</label>
			  <input type="text" class="form-control" id="passwords" name="passwordnew" value="" placeholder="Your New password: 01234abc!@#">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">What IP address is A?</label>
			  <input type="text" class="form-control" id="passwords" name="passwordnew" value="" placeholder="Your New password: 01234abc!@#">
			</div>
		  </div>
		  <!-- /.box-body -->
		  <div class="box-footer">
			<div class="col-md-6">
				<input type="hidden" name="cmd" value="UpdatePassword">
				<button type="submit" class="btn btn-danger">Recovery Submit</button>
				<a href="<?php echo base_url();?>" title="uDNS Service Control Domain Free" class="btn btn-default" >BACK</a>
			</div>
			
		  </div>
		</form>
	  </div>
	  <!-- /.box -->
	</div>
 
</div>
  {msg}
  <!-- /.login-box-body -->
</div>