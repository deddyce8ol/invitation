<?php echo $this->session->flashdata('message');?>
<section class="content-header">
	<h1><?php echo $title." <small>".$subtitle."</small>";?></h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-default collapsed-box">
			  <div class="box-header with-border">
			    <h3 class="box-title">Pencarian Rinci</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
			    </div>
			  </div>
			  <div class="box-body">
			    <?php echo form_open($action_cari, 'class="form-horizontal"');?>
				    <div class="form-group">
	                  <label for="subject" class="col-sm-2 control-label">Kepada</label>
	                  <div class="col-sm-10">
	                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Kepada" value="<?php echo $cari_subject;?>">
	                  </div>
	                </div>
	                <div class="form-group">
	                    <label for="date_confirm" class="col-sm-2 control-label">Tanggal Konfirmasi:</label>
	                    <div class="col-sm-10">
		                    <div class="input-group">
		                      <div class="input-group-addon">
		                        <i class="fa fa-calendar"></i>
		                      </div>
		                      <input type="text" class="form-control pull-right active" id="date_confirm" name="date_confirm" value="<?php echo $date_confirm;?>">
		                    </div>
	                    </div>
	                </div>
	                <div class="form-group">
	                  <label for="status" class="col-sm-2 control-label">Status</label>
	                  <div class="col-sm-10">
	                  	<select name="status" id="status" class="form-control">
	                  		<option value="">::Pilih Status::</option>
	                  		<?php
	                  		$sOpt = array('1' => 'Sudah Konfirmasi', '2' => 'Belum Konfirmasi');
	                  		foreach ($sOpt as $key => $value) {
	                  			$selected = "";
	                  			if ($cari_status == $key) {
	                  				$selected = " selected='selected' ";
	                  			}
	                  			echo "<option value='".$key."' ".$selected.">".$value."</option>";
	                  		}
	                  		?>
	                  	</select>
	                  </div>
	                </div>
	                <div class="form-group">
	                	<div class="col-sm-2">
	                	</div>
	                	<div class="col-sm-10">
	                		<button type="submit" class="btn btn-info">Cari</button>
	                	</div>
	                </div>
			    <?php echo form_close();?>
			  </div>
			</div>
			<div class="box">
				<div class="box-header">
					<?php echo anchor($add_action, 'Tambah', 'class="btn btn-success"');?>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="20">No</th>
								<th>Kode Undangan</th>
								<th>Sandi</th>
								<th>Kuota</th>
								<th>Sisa Kuota</th>
								<th>Kepada</th>
								<th>Kontak</th>								
								<th>Tanggal Konfirmasi</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							if (count($list)>0) {
								foreach ($list as $r) {
									$no++;
									$perwakilan = anchor('perwakilan/detil/'.$r->code, '<i class="fa fa-user"></i>', 'class="btn btn-xs btn-default edit" title="Perwakilan"');
									$edit = anchor('invitation/edit/'.$r->code, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-default edit" title="Edit"');
									$delete = anchor('invitation/delete/'.$r->code, '<i class="fa fa-times"></i>', 'class="btn btn-xs btn-danger delete" title="Delete" onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini ?\')"');
									$aksi = $perwakilan." ".$edit." ".$delete;
									$slot_sisa = $r->slot - $r->slot_isi;
									echo "<tr>";
									echo "<td>".$no."</td>";
									echo "<td>".$r->code."</td>";
									echo "<td>".$r->password."</td>";
									echo "<td>".$r->slot."</td>";
									echo "<td>".$slot_sisa."</td>";
									echo "<td>".$r->subject."</td>";
									echo "<td>".$r->kontak."</td>";									
									echo "<td>".$this->indo_date->tgl_indo($r->date_confirm)."</td>";
									echo "<td>".$aksi."</td>";									
									echo "</tr>";
								}
							}
							else {
								echo "<tr><td colspan='7'>Data Tidak Ada</td></tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function() {
		//Date range picker
        $('#date_confirm').daterangepicker({format: "YYYY-MM-DD"});
	});
</script>