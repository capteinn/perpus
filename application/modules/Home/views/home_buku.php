<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan SMK YPBI MARTAPURA OKU TIMUR</title>
	<!-- Bootstrap -->
    <link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/responsiveslides.css') ?>" rel="stylesheet">
	<!-- Datatables -->
    <link href="<?= base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">
		
		 <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/build/css/custom.min.css') ?>" rel="stylesheet">
		<style>
			.navbar-brand {
				color: #717171!important;
				background-color: #f8f8f8;
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
		<div class="row">
			<div class="col-md-12">
				<div class="x_panel">
          <div class="x_title">
            <h1>Daftar Buku</h1>
            <div class="clearfix"></div>
          </div>
					<div class="col-md-">
					
					</div>
          <div class="x_content">
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="10">No.</th>
                  <th>Kode</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Penerbit</th>
                  <th>Jenis</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;foreach($get as $row){?>
                    <tr>
                        <td width="10"><?php echo $no++;?></td>
                        <td><?php echo $row->kode_buku;?></td>
                        <td><a target="_blank" href="<?php echo base_url().'assets/images/buku/original/'.$row->gambar_buku;?>"><img style="width:100px" src="<?php echo base_url().'assets/images/buku/resized/'.$row->gambar_buku;?>"></a></td>
                        <td><?php echo $row->judul_buku;?></td>    
                        <td><?php echo $row->penerbit_buku;?></td>
                        <td><?php echo $row->jenis_buku;?></td>
                        <td><?php echo $row->kategori_buku;?></td>
                        <td style="font-size: 20px;"><b><?php echo $row->jumlah_buku;?></b></td>
                    </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
    <script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/vendors/nprogress/nprogress.js') ?>"></script>
    <!-- validator -->
    <script src="<?= base_url('assets/vendors/validator/validator.js') ?>"></script>
    <!-- jQuery Smart Wizard -->
    <script src="<?= base_url('assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') ?>"></script>
     <!-- Dropzone.js -->
     <script src="<?= base_url('assets/vendors/dropzone/dist/min/dropzone.min.js') ?>"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('assets/vendors/Chart.js/dist/Chart.min.js') ?>"></script>
    <!-- morris.js -->
    <script src="<?= base_url('assets/vendors/raphael/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/morris.js/morris.min.js') ?>"></script>
     <!-- easy-pie-chart -->
     <script src="<?= base_url('assets/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') ?>"></script>
    <!-- gauge.js -->
    <script src="<?= base_url('assets/vendors/gauge.js/dist/gauge.min.js') ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/vendors/iCheck/icheck.min.js') ?>"></script>
    <!-- Skycons -->
    <script src="<?= base_url('assets/vendors/skycons/skycons.j') ?>s"></script>
    <!-- FullCalendar -->
    <script src="<?= base_url('assets/vendors/moment/min/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/fullcalendar/dist/fullcalendar.min.js') ?>"></script>
    <!-- Flot -->
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.pie.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.time.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.stack.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/Flot/jquery.flot.resize.js') ?>"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/flot.curvedlines/curvedLines.js') ?>"></script>
    <!-- DateJS -->
    <script src="<?= base_url('assets/vendors/DateJS/build/date.js') ?>"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('assets/vendors/jqvmap/dist/jquery.vmap.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('assets/vendors/moment/min/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
    <!-- Datatables -->
    <script src="<?= base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/jszip/dist/jszip.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/pdfmake/build/pdfmake.min.j') ?>s"></script>
    <script src="<?= base_url('assets/vendors/pdfmake/build/vfs_fonts.js') ?>"></script>
    <!-- ECharts -->
    <script src="<?= base_url('assets/vendors/echarts/dist/echarts.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/echarts/map/js/world.js') ?>"></script>
    <!-- jQuery Sparklines -->
    <script src="<?= base_url('assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('assets/vendors/jqvmap/dist/jquery.vmap.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.usa.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
    <!-- easy-pie-chart -->
    <script src="<?= base_url('assets/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') ?>"></script>
    
    <script src="<?= base_url('assets/vendors/switchery/dist/switchery.min.js')?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/build/js/custom.js') ?>"></script>
</body>
</html>