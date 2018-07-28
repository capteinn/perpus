
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
            <h2>Daftar Anggota</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <a style="float: right;" href="<?php echo base_url()?>anggota/tambah_anggota"><button class="btn btn-primary">Tambah Anggota</button></a><br><br>
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Jenis Kelamin</th>
                  <th>Kelas</th>
                  <th>No Tlp</th>
                  <th>Jurusan</th>
                  <th>Angkatan</th>
                  <th>NIM</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;foreach($get as $row){?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row->nama_anggota;?></td>
                        <td><?php echo $row->alamat_anggota;?></td>
                        <td><?php echo $row->jk;?></td>    
                        <td><?php echo $row->nama_kelas;?></td>
                        <td><?php echo $row->no_tlp;?></td>
                        <td><?php echo $row->nama_jurusan;?></td>
                        <td><?php echo $row->angkatan;?></td>
                        <td><?php echo $row->nim_anggota;?></td>
                        <td>
                        <a class="btn btn-warning" href="anggota/edit/<?php echo $row->id_anggota;?>"><i class="fa fa-pencil fa-fw"></i></a>
                        <a class="btn btn-danger" href="anggota/hapus/<?php echo $row->id_anggota;?>" onclick="return confirm('Anda yakin ingin menghapus ? Data yang terhapus tidak akan bisa dikembalikan.');"><i class="fa fa-trash fa-fw"></i></a>
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
