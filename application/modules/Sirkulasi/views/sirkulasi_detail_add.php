<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>      
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
			<?php 
			if($this->session->flashdata('pesan')){
				echo $this->session->flashdata('pesan'); 
			}
		?>
        <div class="x_panel">
          <div class="x_title">
            <h2>Tambah Detail Sirkulasi</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="form" class="form-horizontal form-label-left">
              <input type="hidden" name="id_sirkulasi" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id_sirkulasi;?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Buku <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="buku" required="required">
                    <?php foreach($get_buku as $row){?>
                      <option value="<?php echo $row->id_buku;?>"><?php echo $row->judul_buku;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="button" class="btn btn-success" onclick="save()">Pinjam</button>
									<a class="btn btn-primary" href="<?php echo base_url() ?>sirkulasi/cekDetail/<?php echo $id_sirkulasi; ?>">Selesai</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>      
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Informasi Sirkulasi Buku</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" action="<?php echo base_url()?>sirkulasi/proses_tambah_sirkulasi" method="post" data-parsley-validate class="form-horizontal form-label-left">
            <?php foreach($sirkulasi as $row){?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Peminjaman
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kode" required="required" class="form-control col-md-7 col-xs-12 info_sirkulasi" value="<?php echo $row->kode_peminjaman;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Anggota
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="anggota" required="required" class="form-control col-md-7 col-xs-12 info_sirkulasi" value="<?php echo $row->nama_anggota;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Petugas
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="petugas" required="required" class="form-control col-md-7 col-xs-12 info_sirkulasi" value="<?php echo $row->nama_petugas;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Pinjam
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tgl_pinjam" required="required" class="form-control col-md-7 col-xs-12 info_sirkulasi" value="<?php echo $row->tgl_pinjam;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Kembali
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tgl_kembali" required="required" class="form-control col-md-7 col-xs-12 info_sirkulasi" value="<?php echo $row->tgl_kembali;?>" readonly>
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
              </tr>
            </thead>
            <tbody id="tbody-tabel-sirkulasi">
              
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var no = 1;
  function save(){
      var url;
        url = "<?php echo site_url('sirkulasi/proses_tambah_detail_sirkulasi')?>";
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
              $('#tbody-tabel-sirkulasi').append('<tr><td>'+no+'</td><td>'+data.judul_buku+'</td><td>'+data.jumlah+'</td><td>'+data.status+'</td></tr>');
              no++;
            },
        });
  };
</script>