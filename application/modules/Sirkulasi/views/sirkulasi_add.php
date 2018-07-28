<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>      
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tambah Sirkulasi Buku</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
						<div class="form-group text-center">
              <label class="control-label col-xs-12 text-center" for="last-name">Tanggal Pinjam <br><h1><b><?php echo date('d F Y') ?></b></h1></label>
            </div>
            <br />
            <form id="demo-form2" action="<?php echo base_url()?>sirkulasi/proses_tambah_sirkulasi" method="post" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Anggota <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="anggota" required="required">
                    <?php foreach($get_anggota as $row){?>
                      <option value="<?php echo $row->id_anggota;?>"><?php echo $row->nama_anggota;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Petugas <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $nama_petugas;?>">
                  <input type="hidden" id="last-name" name="petugas" required="required" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $id_petugas;?>">
                </div>
              </div>
                  <input type="hidden" name="tgl_pinjam" required="required" readonly class="form-control col-md-7 col-xs-12" value="<?php echo date('Y-m-d'); ?>" >
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Kembali <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tgl_kembali" required="required" class="form-control col-md-7 col-xs-12 datepicker">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Save and Continue</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <a href="<?php echo base_url()?>sirkulasi"><button class="btn btn-danger" type="button">Cancel</button></a>
                                    
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>