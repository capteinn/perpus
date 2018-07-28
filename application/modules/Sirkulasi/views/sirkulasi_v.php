
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Sirkulasi Buku</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <a style="float: right;" href="<?php echo base_url()?>sirkulasi/tambah_sirkulasi"><button class="btn btn-primary">Tambah Sirkulasi</button></a><br><br>
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
                  <th>Action</th>
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
                        <td><span class="badge primary"><?php echo $row->status_sirkulasi;?></span></td>
                        <td>
                        <?php if($row->status_sirkulasi != 'selesai'){ ?>
												<a class="btn btn-warning" href="sirkulasi/edit/<?php echo $row->id_sirkulasi;?>"><i class="fa fa-pencil fa-fw"></i></a>
												<?php } ?>
                        <a class="btn btn-info" href="sirkulasi/detail/<?php echo $row->id_sirkulasi;?>"><i class="fa fa-search fa-fw"></i></a>
                        </td>
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
