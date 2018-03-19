
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/udns_home.css">
<section id="header-area" class="header-area overlay-section">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<div class="header-text-area">
		<div> <img style="height: 50px;" title="Logo UDNS" src="<?php echo base_url(); ?>/logo/logo_udns_3.png" ></div>
		<h1 class="color-whites" style="padding-top: 5px;padding-bottom: 5px" >Free DNS Control Panel for Businesses or Individuals.</h1>
		
		</div>
		<a href="<?php echo base_url(); ?>sign" style="margin-top:10px;" class=" btn btn-warning btn-lg btn-flat"> SIGN IN </a>
		<a href="<?php echo base_url(); ?>reseller" style="margin-top:10px;" class=" btn btn-default btn-lg btn-flat"> REGISTER FREE </a>
		</div>
		<div class="col-sm-6">
		<div class="header-form-area">
		<div class="make-offer-form">
		<form method="#" action="#" id="bidForm">
		
		<div class="row">
		<div class="col-sm-6">
		<h3 class="color-white">DNS FREE</h3>
		
		<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-code-fork"> NS1:</i></span>
			<input id="name" type="text" class="form-control" name="bidname" value="NS1.UDNS.ASIA" required="" readonly>
		</div>
		</div>
		<div class="col-sm-6">
		<h3 class="color-white">DNS PREMIUM</h3>
		<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-code-fork"> NS1:</i></span>
			<input id="name" type="text" class="form-control" name="bidname" value="NS1.UGROUP.ASIA" required="" readonly>
		</div>
		</div>
		</div>
		<div class="row">
		 <div class="col-sm-6">
		<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-code-fork"> NS2:</i></span>
			<input id="name" type="text" class="form-control" name="bidname" value="NS2.UDNS.ASIA" required="" readonly>
		</div>
		</div> 
		<div class="col-sm-6">
		<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-code-fork"> NS2:</i></span>
			<input id="name" type="text" class="form-control" name="bidname" value="NS2.UGROUP.ASIA" required="" readonly>
		</div>
		</div>
		
		</div>
		<div class="row">
		 <div class="col-sm-6">
		<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-code-fork"> NS Bak:</i></span>
			<input id="name" type="text" class="form-control" name="bidname" value="NS3.UDNS.ASIA" required="" readonly>
		</div>
		</div> 
		<div class="col-sm-6">
		<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-code-fork"> NS Dyn:</i></span>
			<input id="name" type="text" class="form-control" name="bidname" value="NS3.UGROUP.ASIA" required="" readonly>
		</div>
		
		</div>
		<a style="margin-top:10px; margin-left: 15px; width: 44.3%;" class=" btn btn-success btn-flat"> <i class="fa fa-cart-plus"></i> OFFER UPGRADE PREMIUM</a>
		</div>
		
		</form>
		</div>
		</div>
		</div>
		</div>
	</div>
</section>


<section class="feature-area section-padding" style="padding-top: 0px !important; padding-bottom: 0px !important;">
	<div id="main-menu-container" class="nav-tid">
		<div class="container">
			<nav class="navbar navbar-tid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
					
					</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="http://udns.asia" title="Free DNS Control Panel for Businesses or Individuals.">Home</a></li>
						<li><a href="http://web.ureg.asia" title="Web design">Web design</a></li>
						<li><a href="http://domain.ureg.asia" title="Domain">Domain</a></li>
						<li><a href="http://udns.asia" title="DNS">DNS</a></li>
						<li><a href="http://email.ureg.asia" title="Emails">Emails</a></li>
						<li><a href="http://hosting.ureg.asia" title="Hosting">Hosting</a></li>
						<li><a href="http://ssl.ureg.asia" title="SSL">SSL</a></li>
						<li><a href="http://ads.ugroup.asia" title="Advertising">Advertising</a></li>
						<li><a href="http://support.ugroup.asia" title="Support">Support</a></li>
						<li><a href="http://ugroup.asia" title="Contact">Contact</a></li>
						<li><a href="http://tools.udns.asia" title="Tools">Tools</a></li>
						<li><a href="#" title="HOTLINE  (+84) 123-7711-777">HOTLINE (+84) 123-7711-777</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</section>
<script>
$("document").ready(function($){
    var nav = $('#main-menu-container');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
});
</script>
<style>
.f-nav{  /* To fix main menu container */
    z-index: 9999;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
}
#main-menu-container {
    text-align: center; /* Assuming your main layout is centered */
}
#main-menu {
    display: inline-block;
    width: 1024px; /* Your menu's width */
}
</style>
<section class="feature-area section-padding" style="background: #fff;">
	<div class="container" >
		<div class="row" >
		<div class="col-md-12 " >
		<h2 class="text-center section-title">Quality services with your domain</h2>
			<div class="row no-margin">
				<div class="col-md-4 feature-cell">
					<div class="feature-icon">
						<i class="fa fa-star-o" aria-hidden="true"></i>
					</div>
					<h4 class="feature-title">Strong Keywords</h4>
					<div class="feature-text">Gone studies to titles have audiences of and concepts was motivator</div>
				</div>
				<div class="col-md-4 feature-cell">
					<div class="feature-icon">
						<i class="fa fa-line-chart" aria-hidden="true"></i>
					</div>
					<h4 class="feature-title">Quality SEO Rankings</h4>
					<div class="feature-text">Gone studies to titles have audiences of and concepts was motivator</div>
				</div>
				<div class="col-md-4 feature-cell">
					<div class="feature-icon">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
					<h4 class="feature-title">500+ Backlinks</h4>
					<div class="feature-text">Gone studies to titles have audiences of and concepts was motivator</div>
				</div>
				<div class="col-md-4 feature-cell">
					<div class="feature-icon">
						<i class="fa fa-minus-square-o" aria-hidden="true"></i>
					</div>
					<h4 class="feature-title">Short URL</h4>
					<div class="feature-text">Gone studies to titles have audiences of and concepts was motivator</div>
				</div>
				<div class="col-md-4 feature-cell">
					<div class="feature-icon">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>
					</div>
					<h4 class="feature-title">SEO Friendly Keyword</h4>
					<div class="feature-text">Gone studies to titles have audiences of and concepts was motivator</div>
				</div>
				<div class="col-md-4 feature-cell">
					<div class="feature-icon">
						<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					</div>
					<h4 class="feature-title">Attactive URL</h4>
					<div class="feature-text">Gone studies to titles have audiences of and concepts was motivator</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>
<div class="container" style="background: #000;     width: 100%; height:600px;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
      <div class="item active">
        <iframe width="100%" height="600px" src="https://www.youtube.com/embed/72snZctFFtA?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<div class="carousel-caption">
           <h2>What Is Domain Name Systems</h2>
		    <span>www.udns.asia</span>
        </div>
	  </div>
    </div>
  </div>
</div>



<section class="contact section-padding" style="background: #fff;">
 <div class="container">
	<h2 class="text-center section-title">Contact With Us</h2>
	<div class="row">
	   <div class="col-sm-6">
		  <div class="locations">
			 <i class="fa fa-phone"></i>
			 <span>(+84)123.7711.777</span>
		  </div>
		  <div class="locations">
			 <i class="fa fa-envelope-o"></i>
			 <span><a href="mailto:support@youremail.com">support@udns.asia</a></span>
		  </div>
		  <div class="locations">
			 <i class="fa fa-map-marker"></i>
			 <span>Hai Ba Trung District,Hanoi City, Vietnam.</span>
		  </div>
		  <div class="social-link">
			 <ul class="list-inline">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				</li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				</li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
				</li>
			 </ul>
		  </div>
	   </div>
	   <div class="col-sm-6">
		  <div class="contact-form">
			 <form method="post" action="contact.php" id="contactForm">
				<div class="row">
				   <div class="col-sm-6">
					  <div class="input-field">
						 <input class="form-control" placeholder="Full Name" name="contactname" id="contactName" type="text" required="">
						 <i class="fa fa-user"></i>
					  </div>
				   </div>
				   <div class="col-sm-6">
					  <div class="input-field">
						 <input class="form-control" placeholder="Email Address" name="contactemail" id="contactEmail" type="text" required="">
						 <i class="fa fa-envelope"></i>
					  </div>
				   </div>
				   <div class="col-sm-6">
					  <div class="input-field">
						 <input class="form-control" placeholder="Phone Number" name="contactphone" id="contactPhone" type="text" required="">
						 <i class="fa fa-phone"></i>
					  </div>
				   </div>
				   <div class="col-sm-6">
					  <div class="input-field">
						 <input class="form-control" placeholder="Subject" name="contactsubject" id="contactSubject" type="text" required="">
						 <i class="fa fa-folder font-15"></i>
					  </div>
				   </div>
				   <div class="col-xs-12">
					  <div class="input-field">
						 <textarea class="form-control" rows="5" placeholder="Your Message" name="contactmessage" id="contactMessage"></textarea>
						 <i class="fa fa-comment"></i>
					  </div>
				   </div>
				   <div class="col-xs-12 mb-15 t-center">
					  <button type="submit" class="btn btn-warning btn-flat btn-lg submit-btn">Send Message
					  <i class="fa fa-send"></i>
					  </button>
				   </div>
				   <div>
					  <div class="form-response" id="contactResponse"></div>
				   </div>
				</div>
			 </form>
		  </div>
	   </div>
	</div>
 </div>
</section>
<div id="site-footer" class="hidden-print">
<div class="container font-14">
		
		<div class="row margin-bottom-20">
			
			<div class="col-md-4 col-lg-6">
				<h4 style="margin-top: 10px;margin-bottom: 10px;font-size: 20px;font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit;color: #fff;text-align: left;">About us</h4>
				<ul style="list-style: none;font-size: 18px; color: #fff;     margin-left: -7%; float: left;width: 100%;">
					<li style="list-style: none;font-size: 18px; color: #fff;"class="sm-margin-right-20 xs-only-text-center mobile-block xs-margin-bottom-20"><a style="list-style: none;font-size: 18px; color: #fff; text-align: left;"href="<?php echo base_url();?>" title="Careers" class="underline">Careers</a></li>
					<li style="list-style: none;font-size: 18px; color: #fff;"class="sm-margin-right-20 xs-only-text-center mobile-block xs-margin-bottom-20"><a style="list-style: none;font-size: 18px; color: #fff; text-align: left;"href="<?php echo base_url();?>" title="Site Map"  class="underline">Site Map</a></li>
					<li style="list-style: none;font-size: 18px; color: #fff;"class="sm-margin-right-20 xs-only-text-center mobile-block xs-margin-bottom-20"><a style="list-style: none;font-size: 18px; color: #fff; text-align: left;"href="<?php echo base_url();?>" title="Privacy Policy"  class="underline">Privacy Policy</a></li>
					<li style="list-style: none;font-size: 18px; color: #fff;"class="sm-margin-right-20 xs-only-text-center mobile-block xs-margin-bottom-20"><a style="list-style: none;font-size: 18px; color: #fff; text-align: left;"href="<?php echo base_url();?>" title="Contact Us"  class="underline">Contact Us</a></li>
					<li style="list-style: none;font-size: 18px; color: #fff;"class="sm-margin-right-20 xs-only-text-center mobile-block xs-margin-bottom-20"><a style="list-style: none;font-size: 18px; color: #fff; text-align: left;"href="<?php echo base_url();?>reseller"title="Register Free"   class="underline">Register Free</a></li>
					<li style="list-style: none;font-size: 18px; color: #fff;"class="sm-margin-right-20 xs-only-text-center mobile-block xs-margin-bottom-20"><a style="list-style: none;font-size: 18px; color: #fff; text-align: left;"href="<?php echo base_url();?>sign" title="Sign In"  class="underline">Sign In</a></li>
				</ul>
				<p class="social-links xs-only-text-center sm-only-text-center">
					<a style="font-size: 40px;padding: 10px; color: #754c24;" href="//www.uGroup.asia/news/" class="rss margin-right-20">
						<span class="sr-only">The Group Real Estate Blog</span><i class="fa fa-rss"></i></a>
					<a style="font-size: 40px;padding: 10px; color: #754c24;" href="//www.facebook.com/root.ug/" class="facebook margin-right-20" target="_blank">
						<span class="sr-only">Facebook</span><i class="fa fa-facebook-official"></i></a>
					<a style="font-size: 40px;padding: 10px; color: #754c24;" href="//twitter.com/uGroup_Offical" class="twitter margin-right-20" target="_blank">
						<span class="sr-only">Twitter</span><i class="fa fa-twitter-square"></i></a>
				</p>
			</div>
			<div class="col-md-8 col-lg-6 text-right">
				<div class="xs-only-text-center sm-only-text-center">
					
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="footer-area text-center" style="background-color: #754c24;">

	 <div class="container">
		<div class="copyright-text">© <?php echo date("Y",time());?> The uGroup, Inc. All rights reserved.</div>
	 </div>
  </footer>