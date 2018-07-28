<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan SMK YPBI MARTAPURA OKU TIMUR</title>
	<link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/responsiveslides.css') ?>" rel="stylesheet">
	<style type="text/css">
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
		  min-height: 500px;    /* Set slide height here */
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="<?php echo base_url()?>home">PERPUSTAKAAN SMK YPBI MARTAPURA OKU TIMUR</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav navbar-right">
			      	<li><a href="<?php echo base_url()?>home/buku">Daftar Buku</a></li>
			      	<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="<?php echo base_url()?>login_anggota">Login Anggota</a></li>
			            <li><a href="<?php echo base_url()?>login">Login Petugas</a></li>
			          </ul>
			        </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
		</div>
	</nav>

	<div class="container">
		<!-- <div>
	        <ul class="rslides">
	            <li><img src="<?php echo base_url()?>assets/images/pict1.jpeg" alt="" width="1000px" ></li>
	            <li><img src="<?php echo base_url()?>assets/images/pict2.jpeg" alt=""  width="1000px" ></li>
	          </ul>
	      </div> -->
	    <center>
	    	<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel" style="width:1000px;">
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			    <li data-target="#myCarousel" data-slide-to="3"></li>
			    <li data-target="#myCarousel" data-slide-to="4"></li>
			  </ol>


			<div class="carousel-inner">
			    <div class="item active">
			      <img src="<?php echo base_url()?>assets/images/pict1.jpeg" alt="">
			    </div>

			    <div class="item">
			      <img src="<?php echo base_url()?>assets/images/pict2.jpeg" alt="">
			    </div>

			    <div class="item">
			      <img src="<?php echo base_url()?>assets/images/pict3.jpg" alt="">
			    </div>

			    <div class="item">
			      <img src="<?php echo base_url()?>assets/images/pict4.jpg" alt="">
			    </div>

			    <div class="item">
			      <img src="<?php echo base_url()?>assets/images/pict5.jpg" alt="">
			    </div>
			</div>

			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>	
	    </center>
		
	</div>

	<script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/responsiveslides.min.js') ?>"></script>
	<!-- <script>
	  $(function() {
	    $(".rslides").responsiveSlides();
	  });
	</script> -->
	<!-- <script type="text/javascript">
		$('.carousel-control.left').click(function() {
		  $('#myCarousel').carousel('prev');
		});

		$('.carousel-control.right').click(function() {
		  $('#myCarousel').carousel('next');
		});
	</script> -->
</body>
</html>