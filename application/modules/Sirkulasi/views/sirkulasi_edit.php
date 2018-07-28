<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>      
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-success" href="<?php echo base_url() ?>sirkulasi">Kembali ke Sirkulasi</a>
			</div>
		</div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Sirkulasi Buku</h2>
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
                  <input type="text" id="first-name" name="kode" disabled class="form-control col-md-7 col-xs-12" value="<?php echo $row->kode_peminjaman;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Anggota
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" disabled class="form-control col-md-7 col-xs-12" value="<?php echo $row->nama_anggota;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Petugas
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="hidden" id="first-name" name="petugas" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->id_petugas;?>" readonly>
                  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->nama_petugas;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Pinjam
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tgl_pinjam" disabled class="form-control col-md-7 col-xs-12 datepicker" value="<?php echo $row->tgl_pinjam;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Kembali
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
								<?php if($row->status_sirkulasi != 'selesai'){ ?>
                  <input type="text" name="tgl_kembali" class="form-control col-md-7 col-xs-12 datepicker" value="<?php echo $row->tgl_kembali;?>">
                <?php }else{ ?>
                  <input type="text" name="tgl_kembali" disabled class="form-control col-md-7 col-xs-12 datepicker" value="<?php echo $row->tgl_kembali;?>">
                <?php } ?>
								</div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" disabled class="form-control col-md-7 col-xs-12 datepicker" value="<?php echo $row->status_sirkulasi;?>">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<?php if($row->status_sirkulasi != 'selesai'){ ?>
                  <button type="submit" class="btn btn-success">Save</button>
                  <a href="<?php echo base_url()?>sirkulasi"><button class="btn btn-danger" type="button">Cancel</button></a>
								<?php } ?>
                                    
                </div>
              </div>
            <?php } ?>
            </form>
          </div>
          <div class="x_title">
            <h2>Edit Detail Sirkulasi Buku</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <?php if($get[0]->status_sirkulasi != 'selesai'){ ?>
            <?php foreach($get as $row){?>
              <button type="button" onclick="add_buku(<?php echo $row->id_sirkulasi;?>)" class="btn btn-primary">Tambah Buku</button>
            <?php } ?>
            <?php } ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal Kembali</th>
                <th>Total Hari</th>
                <th>Denda</th>
                <th>Action</th>
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
                  <td>
										<?php 
											$tgl_hrs_kembali = date_create($get[0]->tgl_kembali);
											$tgl_kembali = date_create($row->tgl_kembali);
											
											//difference between two dates
											$diff = date_diff($tgl_hrs_kembali,$tgl_kembali);
											if(date('Y-m-d') > $get[0]->tgl_kembali){
												$dendafix = $diff->format("%a");
												echo $dendafix . " hari";
											}else{
												echo "0";
											}
										?>
									</td>
									<td><?php echo "Rp " . number_format($row->denda,0,',','.'); ?></td>
                  <td>
									<?php if($row->status != 'selesai'){ ?>
                    <a class="btn btn-warning" href="javascript:void(0)" onclick="return edit('<?php echo $row->id_detail_sirkulasi;?>')"><i class="fa fa-pencil fa-fw"></i></a>
                    <a class="btn btn-danger" href="<?php echo base_url()?>sirkulasi/hapus_detail/<?php echo $row->id_detail_sirkulasi;?>" onclick="return confirm('Anda yakin ingin menghapus ? Data yang terhapus tidak akan bisa dikembalikan.');"><i class="fa fa-trash fa-fw"></i></a>
									<?php } ?>
									</td>
                </tr>
              <?php $no++; } ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form2" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Tambah Buku</h3>
              </div>
                  <form action="#" id="form2" class="form-horizontal">
                    <input type="hidden" name="id_sirkulasi" id="id_sirkulasi">
                      <div class="modal-body form">
                          <div class="form-body">
                              <b>Judul Buku : </b>
                              <select class="form-control" name="buku" id="buku-modal-add" required="required">
                              </select>
                              <span class="help-block"></span><br>
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
  <div class="modal fade" id="modal_form" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Edit Detail Sirkulasi Buku</h3>
              </div>
              
                  <form action="#" id="form" class="form-horizontal">
                      <input type="hidden" name="id_detail" id="id_detail">
                      <input type="hidden" name="id_sirkulasi" id="id_sirkulasi">
                      <div class="modal-body form">
                          <div class="form-body">
                              <b>Judul Buku : </b>
                              <select class="form-control" name="buku" id="buku-modal" required="required">
                              </select>
                              <span class="help-block"></span><br>
                              <b>Jumlah Buku : </b>
                              <input name="jumlah" id="jml-edit" readonly class="form-control" type="number" required><br>
                              <span class="help-block"></span>
                              <b>Status Buku : </b>
                              <select class="form-control" name="status" id="status-modal" required="required">
																<option value="pinjam" >pinjam</option>
																<option value="selesai" >selesai</option>
                              </select>
                              <span class="help-block"></span>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" id="btnSave" onclick="save2()" class="btn btn-primary">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                  </form>
              
              
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
  function add_buku(id)
  {
      $.ajax({
          url : "<?php echo site_url('sirkulasi/get_buku/')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            $('[name="id_sirkulasi"]').val(id);
            for (var i = 0; i < data.length; i++) {
                $('[name="buku"]').append('<option value="'+data[i].id_buku+'">'+data[i].judul_buku+'</option>');
            }
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded         
          }
      });
      $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
      $('#form2')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
  }
</script>
<script type="text/javascript">
  function save(){
       
      var url;
      if($('#jumlah-add').val() == 0 || $('#jumlah-add').val() == ''){
        alert('mohon masukkan jumlah buku yang akan dipinjam')
				}else{
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        url = "<?php echo site_url('sirkulasi/proses_tambah_detail_sirkulasi')?>";
   
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form2').serialize(),
            dataType: "JSON"
        });
        $('#modal_form2').modal('hide');
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
          url : "<?php echo site_url('sirkulasi/ajax_edit_detail/')?>" + id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            $('[name="id_detail"]').val(data.detail.id_detail_sirkulasi);
            $('[name="id_sirkulasi"]').val(data.detail.id_sirkulasi);
            for (var i = 0; i < data.get_buku.length; i++) {
              if(data.get_buku[i].id_buku == data.detail.id_buku){
                $('[name="buku"]').append('<option value="'+data.get_buku[i].id_buku+'" selected>'+data.get_buku[i].judul_buku+'</option>');
              }else{
                $('[name="buku"]').append('<option value="'+data.get_buku[i].id_buku+'">'+data.get_buku[i].judul_buku+'</option>');
              }
            }

            if(data.detail.status == 'pinjam'){
              $('#status-modal').val(data.detail.status);
            }else if(data.detail.status == 'denda'){
              $('#status-modal').val(data.detail.status);
            }else if(data.detail.status == 'selesai'){
              $('#status-modal').val(data.detail.status);
            }

            $('[name="jumlah"]').val(data.detail.jumlah)
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded         
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
  }

  function save2()
  { 
    if($('#jml-edit').val() == 0 || $('#jml-edit').val() == ''){
      alert('mohon masukkan jumlah buku yang akan dipinjam')
    }else{
      var url;
      url = "<?php echo site_url('sirkulasi/edit_detail_sirkulasi')?>";
   
      // ajax adding data to database
      $.ajax({
          url : url,
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data)
          {
            //$('#modal_form').modal('hide');
            location.reload();           
          },
      });
    }
      
  }
</script>