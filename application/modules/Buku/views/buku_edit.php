<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>      
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Buku</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" action="<?php echo base_url()?>buku/proses_update_buku" method="post" data-parsley-validate class="form-horizontal form-label-left">
            <?php foreach($get as $row){?>  
              <input type="hidden" id="first-name" name="id_buku" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->id_buku;?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Buku <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kode" disabled class="form-control col-md-7 col-xs-12" value="<?php echo $row->kode_buku;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Judul Buku <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="judul" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->judul_buku;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Gambar Buku <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php if($row->gambar_buku==''){ echo 'belum ada gambar';}else{?><a href="<?=base_url()?>assets/images/buku/resized/<?=$row->gambar_buku;?>" target="blank"><img style="width: 100px;height: 100px;" src="<?=base_url()?>assets/images/buku/original/<?=$row->gambar_buku;?>"></a><?php } ?>
                                        <a href="#" onclick="return change_picture('<?php echo $row->id_buku;?>')">Ubah Gambar</a>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Penerbit Buku <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="penerbit" required="required" value="<?php echo $row->penerbit_buku;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Buku <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="jenis" required="required">
                    <?php foreach($get_jenis as $row2){?>
                      <option value="<?php echo $row2->id_jenis_buku;?>" <?php if($row->id_jenis_buku == $row2->id_jenis_buku){echo 'selected';}?>><?php echo $row2->jenis_buku;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Buku <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="kategori" required="required">
                    <?php foreach($get_kategori as $row2){?>
                      <option value="<?php echo $row2->id_kategori_buku;?>" <?php if($row->id_kategori_buku == $row2->id_kategori_buku){echo 'selected';}?>><?php echo $row2->kategori_buku;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Buku <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" type="number" name="jumlah" required="required" value="<?php echo $row->jumlah_buku;?>">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <a href="<?php echo base_url()?>buku"><button class="btn btn-danger" type="button">Cancel</button></a>                
                </div>
              </div>
            </form>
            <?php } ?>
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
                    <h3 class="modal-title">Upload Gambar</h3>
                </div>
                <div class="modal-body form">
                    <form action="#" enctype="multipart/form-data" id="form" class="form-horizontal">
                        <input type="hidden" value="" name="id" /> 
                        <input type="hidden" value="" name="gambar" /> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Gambar Baru</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="filefoto" />
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
  function change_picture(id)
    {
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
     
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('buku/ajax_ubah_gambar/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
      
                $('[name="id"]').val(data.id_buku);
                $('[name="gambar"]').val(data.gambar_buku);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Ganti Gambar'); // Set title to Bootstrap modal title
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        url = "<?php echo site_url('buku/ubah_gambar')?>";

        var formData = new FormData();
        formData.append('filefoto', $('input[type=file]')[0].files[0]);
        //var form = $('form').get(0); 
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: new FormData(form),
             contentType: false,  
             cache: false,  
             processData:false,
             
            //data: $('#form').serialize(),

            dataType: "JSON",
        });
        $('#modal_form').modal('hide');
        //reload_table();
        location.reload();
    }
</script>