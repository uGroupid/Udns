<script> 
var page = '<?php echo $page; ?>';
var urlDataJobWork = url_global + 'cms/core/jobs?page='+page;4
</script>
<script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
<!-- Main Quill library -->
<div class="row" >
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<button style="margin-top: 15px;" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Thêm mới công việc</button>
				<div class="modal modal-default fade" id="modal-default" style="display: none;">
          <div class="modal-dialog"  style="width: 90%;">
          <div class="modal-content">
			<form id="FrAddNewsWorks" name="FrAddNewsWorks" method="post" action="#">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="ResetAddNews">Thêm mới công việc</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>(*) Nhân viên tiếp nhận công việc</label>
						<select id="nhanvien_works" name="nhanvien_works" class="form-control">
							<?php foreach($datanhanvien as $nhanvien){?>
								<option value="<?php echo (string)$nhanvien['manhanvien']?>" ><?php echo $nhanvien['manhanvien'].'-'.$nhanvien['name'];?></option>
							<?php } ?>
						</select>
					</div>
			
					<div class="form-group">
						<label>(*) Tiêu đề công việc</label>
						<textarea id="title_works" name="title_works" class="form-control" rows="3" placeholder="nhập tiêu đề công việc ..." ></textarea>
					</div>
					<div class="form-group">
						<label>(*) Nội dung công việc</label>
						<textarea id="editor1" id="contents_work" name="contents_work" class="form-control editor" rows="3" placeholder="nhập nội dung công việc ..."  ></textarea>
					</div>
					<div class="form-group" style="max-width: 42%;" >
						<label>(*) Hình Thức Chia sẻ </label>
						<select id="share_works" name="share_status" class="form-control">
							<option value="Work_Personal">Cá Nhân Chỉ mình nhân viên chỉ định có thể đọc và trả lời công việc</option>
							<option value="Work_Public" >Cộng Đồng Bất kỳ nhân viên nào của rila works có thể trả lời và xem công việc</option>
						</select>
					</div>
				<div class="msg" style="color:red;"> </div>
				</div>
				<script>
					CKEDITOR.replace( 'editor1' );
				</script>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="button" id="AddNewsWorks" class="btn btn-success">Đồng ý thêm mới</button>
				</div>
				
			</form>
			</div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
				<ul class="pagination pagination-sm no-margin pull-right" style=" display: inline-grid;height: 55px;"></ul>
			</div>
			<div ng-controller="WorksBaseCtrl" class="box-body no-padding">
			<script src="<?php echo base_url();?>app/base/angular_work.js"></script>
				<div id="response_data" > 
					<div class="col-md-6" style="margin-bottom: 14px">
							<div class="input-group">
							<input ng-model="searchjobs" type="text" name="q" class="form-control" placeholder="Tìm kiếm công việc...">
								<span class="input-group-btn">
									<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
									</button>
								</span>
							</div>
							
					</div>
					<div class="col-md-6" style="margin-bottom: 14px">
						<?php $next = $page+1;?>
						<a id="next" href="<?php echo base_url().'work?page='.$next;?>"  class="btn btn-default pull-right "> Next  <i class="fa fa-chevron-circle-right"> </i></a>
						<?php $prev = $page-1;?>
						<a id="prev" href="<?php echo base_url().'work?page='.$prev;?>"  class="btn btn-default " style="float: right;margin-right: 10px;"> <i class="fa fa-chevron-circle-left"> </i> Prev </a>
					</div>
					<table class="table table-striped">
						<tr>
							<th> <a class="title_field" href="" ng-click="sortField = 'macongviec' ;  reverse = !reverse "> ID Công Việc </a> </th>
							<th> <a class="title_field" href="" ng-click="sortField = 'name' ;  reverse = !reverse ">Tên Công việc </a></th>
							<th> <a class="title_field" href="" ng-click="sortField = 'manhanvien' ;  reverse = !reverse ">Mã nhân viên thực hiện </a></th>
							<th> <a class="title_field" href="" ng-click="sortField = 'namenhanvien';  reverse = !reverse ">Tên Nhân viên nhận thực hiện</a> </th>
							<th> <a class="title_field" href="" ng-click="sortField = 'status';  reverse = !reverse">Trạng Thái công việc</a></th>
							<th> <a class="title_field" href="" ng-click="sortField = 'date_create';  reverse = !reverse">ngày tạo công việc </a></th>
							<th> <a class="title_field" href="" ng-click="sortField = 'date_close';  reverse = !reverse">Ngày kết thúc </a></th>
							<th> <a class="title_field" href="" ng-click="sortField = 'danhgia'; reverse = !reverse">Đánh Giá </a></th>
							<th> <a class="title_field"> Quyền </a></th>
							<th>  </th>
						<tr>
						<tbody>
						<tr ng-repeat="works in jobs | orderBy:sortField | filter:searchjobs " >
							<td>{{works.macongviec}}</td>
							<td>{{works.name}}</td>
							<td>{{works.manhanvien}}</td>
							<td>{{works.namenhanvien}}</td>
							<td>{{works.status}}</td>
							<td>{{works.date_create}}</td>
							<td>{{works.date_close}}</td>
							<td>{{works.danhgia}}</td>
							<td>{{works.share_note}}</td>
							<td> <a class="btn btn-info" href="<?php echo base_url(); ?>/work/ticket?flag={{works.share_note}}&jobs={{works.macongviec}}"> Chi tiết </a> </td>
							
						</tr>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
.title_field {
    color: #000 !important;
    font-weight: normal !important;
    font-size: 13px !important;
    font-family: Aria !important;
    text-transform: uppercase !important;
}
</style>
<script src="<?php echo base_url();?>app/works.js"></script>