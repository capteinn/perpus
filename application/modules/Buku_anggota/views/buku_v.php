
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Buku</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="10">No.</th>
                  <th>Kode</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Penerbit</th>
                  <th>Jenis</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;foreach($get as $row){?>
                    <tr>
                        <td width="10"><?php echo $no++;?></td>
                        <td><?php echo $row->kode_buku;?></td>
                        <td><a target="_blank" href="<?php echo base_url().'assets/images/buku/original/'.$row->gambar_buku;?>"><img style="width:100px" src="<?php echo base_url().'assets/images/buku/resized/'.$row->gambar_buku;?>"></a></td>
                        <td><?php echo $row->judul_buku;?></td>    
                        <td><?php echo $row->penerbit_buku;?></td>
                        <td><?php echo $row->jenis_buku;?></td>
                        <td><?php echo $row->kategori_buku;?></td>
                        <td><?php echo $row->jumlah_buku;?></td>
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
