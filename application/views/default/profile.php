<link rel="stylesheet" href="<?php echo base_url();?>public/plugins/pace/pace.min.css">
<script src="<?php echo base_url();?>public/bower_components/PACE/pace.min.js"></script>
<div class="content-wrapper">
<section class="content-header">
<h1>Domain Control Panel
<small> {title_main}</small></h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> {title_main}</a></li>
	<li class="active"></li>
  </ol>
</section>
<section class="content" ng-controller="WorksBaseCtrl">
<div class="row" >
	<div class="col-xs-12">
	
		<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Infomation Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="#">
              <div class="box-body">
			   <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="email" class="form-control" id="Username" value="<?php echo $profileInfo['username'];?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="Email" name="email" value="<?php echo $profileInfo['email'];?>" placeholder="abczyx@abcxyz-servermail">
                </div>
               
				<div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="phone" class="form-control" id="Phone" name="phone" value="<?php echo $profileInfo['phone'];?>" placeholder="(+xx)-xxxxx">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Auth</label>
                  <input type="text" class="form-control" id="Auth" value="<?php echo $profileInfo['auth'];?>"  readonly>
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Date Update</label>
                  <input type="text" class="form-control" id="DateUpdate" value="<?php echo $profileInfo['update_date'];?>" readonly>
                </div>
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
				<input type="hidden" name="cmd" value="UpdateProfile"/>
                <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
		
		<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="#">
              <div class="box-body">
			   <div class="form-group">
                  <label for="exampleInputEmail1">Password Old</label>
                  <input type="text" class="form-control" id="passwordsold" value="" name="passwordold" placeholder="Your old password">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password New</label>
                  <input type="text" class="form-control" id="passwords" name="passwordnew" value="" placeholder="Your New password: 01234abc!@#">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
				<input type="hidden" name="cmd" value="UpdatePassword">
                <button type="submit" class="btn btn-danger">Update Passwords</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
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
