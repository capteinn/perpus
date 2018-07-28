<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>      
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Petugas</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" action="<?php echo base_url()?>petugas/proses_update_petugas" method="post" data-parsley-validate class="form-horizontal form-label-left">
            <?php foreach($get as $row){?>
              <input type="hidden" id="first-name" name="id_petugas" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->id_petugas;?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->nama_petugas;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->username;?>">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ubah Password :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="hidden" class="form-control col-md-7 col-xs-12">
                  <a href="javascript:void(0)" onclick="change_password(<?php echo $row->id_petugas?>)"><button type="button" class="btn btn-info">Ubah Password</button></a>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <a href="<?php echo base_url()?>petugas"><button class="btn btn-danger" type="button">Cancel</button></a>
                                    
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
                  <h3 class="modal-title">Ganti Password Petugas</h3>
              </div>
              
                  <form action="#" id="form" class="form-horizontal">
                      <input type="hidden" name="id_petugas" id="id_petugas">
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
              $('#id_petugas').val(id);
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
   
      url = "<?php echo site_url('petugas/ubah_password')?>";
   
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