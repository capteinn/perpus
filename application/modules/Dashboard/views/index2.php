

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row top_tiles">
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-users"></i></div>
          <div class="count"><?php echo $anggota;?></div>
          <h3>Total Anggota</h3>
          <p></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-book"></i></div>
          <div class="count"><?php echo $buku;?></div>
          <h3>Total Buku</h3>
        </div>
      </div>
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-shopping-cart"></i></div>
          <div class="count"><?php echo $pinjam;?></div>
          <h3>Total Peminjaman</h3>
        </div>
      </div>
<!--       <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-check-square-o"></i></div>
          <div class="count">179</div>
          <h3>New Sign ups</h3>
          <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
      </div> -->
    </div>
		<div class="row">

      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Buku yang paling banyak dipinjam</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="10">No.</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Sudah Dipinjam</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;foreach($get as $row){?>
                    <tr>
                        <td width="10"><?php echo $no++;?></td>
                        <td><a target="_blank" href="<?php echo base_url().'assets/images/buku/original/'.$row->gambar_buku;?>"><img style="width:100px" src="<?php echo base_url().'assets/images/buku/resized/'.$row->gambar_buku;?>"></a></td>
                        <td><?php echo $row->judul_buku;?></td>    
                        <td style="font-size: 20px;"><b><?php echo $row->sering;?></b></td>
                    </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
			<div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Anggota Meminjam Terbanyak</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="10">No.</th>
                  <th>Nama Anggota</th>
                  <th>NIM</th>
                  <th>Angkatan</th>
                  <th>Sudah Meminjam</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;foreach($getA as $row){?>
                    <tr>
                        <td width="10"><?php echo $no++;?></td>
                        <td><?php echo $row->nama_anggota;?></td>
                        <td><?php echo $row->nim_anggota; ?></td>
                        <td><?php echo $row->angkatan;?></td>    
                        <td style="font-size: 20px;"><b><?php echo $row->sering;?></b>x</td>
                    </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

