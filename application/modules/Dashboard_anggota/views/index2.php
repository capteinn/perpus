

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
          <div class="count"><?php echo count($get);?></div>
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

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Sirkulasi Buku</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Peminjaman</th>
                  <th>Anggota</th>
                  <th>Petugas</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;foreach($get as $row){?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row->kode_peminjaman;?></td>
                        <td><?php echo $row->nama_anggota;?></td>
                        <td><?php echo $row->nama_petugas;?></td>
                        <td><?php echo date("d F Y", strtotime($row->tgl_pinjam)); ?></td>
                        <td><?php echo date("d F Y", strtotime($row->tgl_kembali));?></td>
                        <td><?php echo $row->status_sirkulasi;?></td>
                        <td><a href="<?php echo base_url()?>Dashboard_anggota/detail/<?php echo $row->id_sirkulasi ?>" class="btn btn-success">Detail</a></td>
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

