<!DOCTYPE html>
<html >
<head >
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{title}</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<script src="<?php echo base_url();?>public/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
jQuery(document).ready(function(){
	jQuery('#ads_display').hide();
});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2844311273596299",
    enable_page_level_ads: true
  });
</script>
<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<script>var site_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>public/dist/js/angular/angular.min.js"></script>
<script src="<?php echo base_url();?>public/dist/js/angular/angular-resource.min.js"></script>
<script src="<?php echo base_url();?>public/dist/js/angular/angular-resource.min.js"></script>
<script src="<?php echo base_url();?>app/global.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111415090-1"></script>
<script>

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111415090-1');
</script>

</head>
<body ng-app="uregApps" class="hold-transition skin-blue sidebar-mini" style="background:#e3b802;">
<div class="wrapper">
<header ng-controller="appHeader" class="main-header">
    <a href="<?php echo base_url();?>" class="logo"><span class="logo-mini">{{resller.shortcut_name_company}}</span><span class="logo-lg">{{resller.shortcut_name_company}}</span></a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"> {user_domain}</span> <i class="fa  fa-info-circle"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>public/default.png" class="img-circle" alt="User Image">
                <p>
                  <small>{user_domain} </small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>cms/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>exits" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>