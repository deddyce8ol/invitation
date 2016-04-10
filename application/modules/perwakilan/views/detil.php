<?php echo $this->session->flashdata('message');?>
<section class="content-header">
	<h1><?php echo $inv_subject." <small>".$inv_code."</small>";?></h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<a class="btn btn-primary" data-toggle="modal" data-code="<?php echo $inv_code;?>" href='#modal-perwakilan'><?php echo $btn_label;?></a>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="20">No</th>
								<th>Email</th>
								<th>Nama</th>
								<th>Telp</th>
								<th>Facebook</th>
								<th>Twitter</th>
								<th>Instagram</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							if (count($result)>0) {
								foreach ($result as $r) {
									$no++;
									$edit = anchor('perwakilan/edit/'.$r->id, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-default edit" title="Edit"');
									$delete = anchor('perwakilan/delete/'.$r->id, '<i class="fa fa-times"></i>', 'class="btn btn-xs btn-danger delete" title="Delete" onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini ?\')"');
									$aksi = $edit." ".$delete;
									echo "<tr>";
									echo "<td>".$no."</td>";
									echo "<td>".$r->email."</td>";
									echo "<td>".$r->name."</td>";
									echo "<td>".$r->telp."</td>";
									echo "<td>".$r->fb."</td>";
									echo "<td>".$r->tw."</td>";
									echo "<td>".$r->ig."</td>";
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

<div class="modal fade" id="modal-perwakilan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<?php include "form.php";?>
			</div>
		</div>
	</div>
</div>
<?php include "appjs.php";?>