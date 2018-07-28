
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Petugas</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <a style="float: right;" href="<?php echo base_url()?>petugas/tambah_petugas"><button class="btn btn-primary">Tambah Petugas</button></a><br><br>
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;foreach($get as $row){?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row->nama_petugas;?></td>
                        <td><?php echo $row->username;?></td>
                        <td>
                        <a class="btn btn-warning" href="petugas/edit/<?php echo $row->id_petugas;?>"><i class="fa fa-pencil fa-fw"></i></a>
                        <a class="btn btn-danger" href="petugas/hapus/<?php echo $row->id_petugas;?>" onclick="return confirm('Anda yakin ingin menghapus ? Data yang terhapus tidak akan bisa dikembalikan.');"><i class="fa fa-trash fa-fw"></i></a>
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
