<?php echo $this->session->flashdata('message');?>
<section class="content-header">
	<h1><?php echo $title." <small>".$subtitle."</small>";?></h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
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
									echo "<tr>";
									echo "<td>".$no."</td>";
									echo "<td>".$r->code."</td>";
									echo "<td>".$r->password."</td>";
									echo "<td>".$r->slot."</td>";
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