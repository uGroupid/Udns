<div class="container" ng-controller="applogin">
  <!-- /.login-logo -->
<div class="row">
  <div class="lockscreen-logo">
    <a href="<?php echo base_url();?>sign"><b>{{resller}}</b> Cpanel</a>
  </div>
  <!-- User name -->
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item" style="width: 800px;text-align: center;">
	
	
	<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info" style="text-align: left;">
        <div class="box-header with-border">
            <h4 style="text-align: center;" > Thông Tin Khởi Tạo </h4>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
       
            <div class="box-body">
             <?php 
				$response = json_decode($results);
				if(empty($response)){
					
				}else{
				$code = $response->results->message->code;
					if($code == 1000){
						echo "<pre>";
						print_r($response->results->message->message);
						print_r($params_create['params']['data']);
						echo "</pre>";
					}else{
						echo "<pre>";
						print_r($response->results->message->message);
						echo "</pre>";
					}
				}
				
			 ?>
            </div>
			<div class="col-md-12">
					{msg}
			</div>
            <!-- /.box-body -->
            <div class="box-footer">
				
				<div class="col-md-6">
					<a class="btn btn-block btn-default btn-flat" href="<?php echo base_url();?>reseller"> Quay Lại Đăng Ký </a> 
				</div>
				<div class="col-md-6">
					<a class="btn btn-block btn-success btn-flat" href="<?php echo base_url();?>sign"> Vào Đăng Nhập</a>
				</div>				
            </div>
            <!-- /.box-footer -->
        
    </div>
    <!-- /.box -->
</div>
  </div>
<script src="<?php echo base_url();?>app/reseller_register.js">

</script>