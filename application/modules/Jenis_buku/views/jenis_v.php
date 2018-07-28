
<!-- page content -->
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
            <h2>Jenis Buku</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <a style="float: right;" href="javascript:void(0)" onclick="return add_jenis()"><button class="btn btn-primary">Tambah Jenis Buku</button></a><br><br>
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Jenis Buku</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;foreach($get as $row){?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row->jenis_buku;?></td>
                        <td>
                        <a class="btn btn-warning" href="javascript:void(0)" onclick="return edit('<?php echo $row->id_jenis_buku;?>')"><i class="fa fa-pencil fa-fw"></i></a>
                        <a class="btn btn-danger" href="jenis_buku/hapus/<?php echo $row->id_jenis_buku;?>" onclick="return confirm('Anda yakin ingin menghapus ? Data yang terhapus tidak akan bisa dikembalikan.');"><i class="fa fa-trash fa-fw"></i></a>
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

<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Tambah Jenis Buku</h3>
              </div>
              
                  <form action="#" id="form" class="form-horizontal">
                      <div class="modal-body form">
                          <div class="form-body">
                              <b>Jenis Buku : </b>
                                  <input name="jenis_buku" id="jenis-add" class="form-control" type="text" required autofocus><br>
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

<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form2" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Edit Jenis Buku</h3>
              </div>
              <div class="modal-body form">
                  <form action="#" id="form2" class="form-horizontal">
                      <input type="hidden" value="" name="id" /> 
                      <div class="form-body">
                          <div class="form-group">
                              <label class="control-label col-md-3">Jenis Buku</label>
                              <div class="col-md-9">
                                  <input name="jenis_buku" id="jenis-edit" class="form-control" type="text" required autofocus>
                                  <span class="help-block"></span>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" id="btnSave" onclick="save2()" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
  function add_jenis()
  {
      $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
  }
</script>
<script type="text/javascript">
  function save(){
    if($('#jenis-add').val() == ''){
        alert('tidak boleh kosong')
    }else{
      $('#btnSave').text('saving...'); //change button text
      $('#btnSave').attr('disabled',true); //set button disable 
      var url;
   
      url = "<?php echo site_url('jenis_buku/proses_tambah_jenis')?>";
   
      // ajax adding data to database
      $.ajax({
          url : url,
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON"
      });
      $('#modal_form').modal('hide');
      location.reload(); // avoid to execute the actual submit of the form.
    }
      
  };
</script>
<script type="text/javascript">
  function edit(id)
  {
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
   
      //Ajax Load data from ajax
      $.ajax({
          url : "<?php echo site_url('jenis_buku/ajax_edit/')?>" + id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
              $('[name="id"]').val(data.id_jenis_buku);
              $('[name="jenis_buku"]').val(data.jenis_buku);
              $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded         
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
  }

  function save2()
  {
    if($('#jenis-edit').val() == ''){
        alert('tidak boleh kosong')
    }else{
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        url = "<?php echo site_url('jenis_buku/edit_jenis')?>";
     
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form2').serialize(),
            dataType: "JSON",
            success: function(data)
            {
     
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    location.reload();
                }             
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
                
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable             
            }
        });
    }
      
  }
</script>