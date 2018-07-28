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
            <h2>Edit Anggota</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" action="<?php echo base_url()?>anggota/proses_update_anggota" method="post" data-parsley-validate class="form-horizontal form-label-left">
            <?php foreach($get as $row){?>
              <input type="hidden" id="first-name" name="id_anggota" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->id_anggota;?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->nama_anggota;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="alamat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->alamat_anggota;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="jk" required="required">
                    <option value="L" <?php if($row->jk == 'L'){echo 'selected';}?>>L</option>
                    <option value="P" <?php if($row->jk == 'P'){echo 'selected';}?>>P</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kelas <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="kelas">
                    <?php foreach($get_kelas as $row2){?>
                      <option value="<?php echo $row2->id_kelas;?>" <?php if($row2->id_kelas == $row->id_kelas){echo 'selected';}?>><?php echo $row2->nama_kelas;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No Telp <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="last-name" name="no_tlp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->no_tlp;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jurusan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="jurusan">
                    <?php foreach($get_jurusan as $row2){?>
                      <option value="<?php echo $row2->id_jurusan;?>" <?php if($row2->id_jurusan == $row->id_jurusan){echo 'selected';}?>><?php echo $row2->nama_jurusan;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Angkatan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="last-name" name="angkatan" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->angkatan;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NIM <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="nim" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->nim_anggota;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ubah Password :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="hidden" class="form-control col-md-7 col-xs-12">
                  <a href="javascript:void(0)" onclick="change_password(<?php echo $row->id_anggota?>)"><button type="button" class="btn btn-info">Ubah Password</button></a>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <a href="<?php echo base_url()?>anggota"><button class="btn btn-danger" type="button">Cancel</button></a>
                                    
                </div>
              </div>
            <?php } ?>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Ganti Password Anggota</h3>
              </div>
              
                  <form action="#" id="form" class="form-horizontal">
                      <input type="hidden" name="id_anggota" id="id_anggota">
                      <div class="modal-body form">
                          <div class="form-body">
                              <b>Password Baru : </b>
                                  <input name="password" class="form-control" type="password" required autofocus><br>
                                  <span class="help-block"></span>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                  </form>
              
              
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
  function change_password(id)
  {
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $.ajax({
          success: function(data)
          {
              $('#id_anggota').val(id);
              $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
          }
      });
  }
</script>
<script type="text/javascript">
  function save(){
      $('#btnSave').text('saving...'); //change button text
      $('#btnSave').attr('disabled',true); //set button disable 
      var url;
   
      url = "<?php echo site_url('anggota/ubah_password')?>";
   
      // ajax adding data to database
      $.ajax({
          url : url,
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON"
      });
      $('#modal_form').modal('hide');
      //location.reload(); // avoid to execute the actual submit of the form.
  };
</script>