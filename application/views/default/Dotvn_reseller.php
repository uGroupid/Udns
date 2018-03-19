<div class="container" ng-controller="applogin">
  <!-- /.login-logo -->
<div class="row">
  <div class="lockscreen-logo">
    <a href="<?php echo base_url();?>sign"><b>{{resller}}</b></a>
  </div>
  <!-- User name -->
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item" style="width: 800px;text-align: center;">
	
	
	<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info" style="text-align: left;">
        <div class="box-header with-border">
            <h4 style="text-align: center;" > Create a new DNS Management account for your domain </h4>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="<?php echo base_url()?>reseller/sign_up">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Your Domain:</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="domain_name" id="inputEmail3" placeholder="Ex: example.com" required>
                    </div>
                </div>
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email Domain Administrator</label>

                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required> I agree the terms and policy of {{resller}}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
				<div class="col-md-6">
					<a style="float: left !important;" href="<?php echo base_url();?>sign" class="btn btn-default pull-right">Back Sign in</a>
				</div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-success pull-right">Create now</button>
				</div>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
</div>
  </div>
 
 
</div>
  {msg}
  <!-- /.login-box-body -->
</div>
<script src="<?php echo base_url();?>app/reseller_register.js">

</script>