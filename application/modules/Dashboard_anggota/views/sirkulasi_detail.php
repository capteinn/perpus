<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>      
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
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
                <th>Total Hari</th>
                <th>Denda</th>
              </tr>
            </thead>
            <tbody id="tbody-tabel-sirkulasi">
              <?php $no=1; $total=0;foreach($get_detail as $row){?>
                <tr>
                  <td><?php echo $no?></td>
                  <td><?php echo $row->judul_buku;?></td>
                  <td><?php echo $row->jumlah;?></td>
                  <td><?php echo $row->status;?></td>
                  <td><?php 
										
										$tgl_hrs_kembali = date_create($row->hrs_kembali);
											$tgl_kembali = date_create($row->tgl_kembali);
											
											//difference between two dates
											$diff = date_diff($tgl_hrs_kembali,$tgl_kembali);
											if(date('Y-m-d') > $row->hrs_kembali){
												$dendafix = $diff->format("%a");
												echo $dendafix . " hari";
											}else{
												echo "0";
											}
										
										?></td>
                  <td><?php echo "Rp ".number_format($row->denda, 0, ',', '.');?></td>
                </tr>
              <?php $no++; $total += $row->denda; } ?>
								<tr>
									<td class="text-right" colspan="5"><?php echo "<b>Total</b>"; ?></td>
									<td ><?php echo "Rp ".number_format($total, 0, ',', '.'); ?></td>
								</tr>
            </tbody>
          </table>

          <a href="<?php echo base_url()?>Dashboard_anggota"><button class="btn btn-primary">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
