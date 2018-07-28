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
            <br />
            <form id="demo-form2" action="<?php echo base_url()?>sirkulasi/proses_update_sirkulasi" method="post" data-parsley-validate class="form-horizontal form-label-left">
            <?php foreach($get as $row){?>
            <input type="hidden" name="id_sirkulasi" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->id_sirkulasi;?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Peminjaman
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kode" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->kode_peminjaman;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Anggota
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="anggota" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->nama_anggota;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Petugas
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="hidden" id="first-name" name="petugas" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->id_petugas;?>" readonly>
                  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->nama_petugas;?>" <input type="text" id="first-name" name="kode" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->kode_peminjaman;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Pinjam
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tgl_pinjam" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->tgl_pinjam;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Kembali
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tgl_kembali" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->tgl_kembali;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="status" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->status_sirkulasi;?>" readonly>
                </div>
              </div>
            <?php } ?>
            </form>
          </div>
          <div class="x_title">
            <h2>Detail Sirkulasi Buku</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
              </tr>
            </thead>
            <tbody id="tbody-tabel-sirkulasi">
              <?php $no=1 ;foreach($get_detail as $row){?>
                <tr>
                  <td><?php echo $no?></td>
                  <td><?php echo $row->judul_buku;?></td>
                  <td><?php echo $row->jumlah;?></td>
                  <td><?php echo $row->status;?></td>
                  <td><?php echo $row->tgl_kembali;?></td>
                  <td><?php echo "Rp ".number_format($row->denda, 0, ',', '.');?></td>
                </tr>
              <?php $no++; } ?>
            </tbody>
          </table>

          <a href="<?php echo base_url()?>sirkulasi"><button class="btn btn-primary">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
