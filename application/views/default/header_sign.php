<!DOCTYPE html>
<html ng-app="rilaApps">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="<?php echo base_url();?>public/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url();?>public/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>public/dist/js/angular/angular.min.js"></script>
	<script src="<?php echo base_url();?>public/dist/js/angular/angular-resource.min.js"></script>
	<script src="<?php echo base_url();?>public/dist/js/data/sign.js"></script>
	<script>
	var rilaApps = angular.module('rilaApps',[]);
	rilaApps.controller("applogin", function($scope, $http){
	$scope.resller = [];
	$http.get('<?php echo base_url();?>layout/angularjs/company_info').success(function(data) {
	$scope.resller = data['company'].shortcut_name_company;
	
	});
	
	});
	</script>
  <title>{title}</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body style="background:#e3b802;" >
