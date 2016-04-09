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
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="20">No</th>
								<th>Tipe Konten</th>
								<th>Kategori</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							if (count($list)>0) {
								foreach ($list as $r) {
									$no++;
									$edit = anchor('category/manage/edit/'.$r->id_type, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-default edit" title="Edit"');
									$delete = anchor('category/manage/delete/'.$r->id_type, '<i class="fa fa-times"></i>', 'class="btn btn-xs btn-danger delete" title="Delete" onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini ?\')"');
									$aksi = $edit." ".$delete;
									echo "<tr>";
									echo "<td>".$no."</td>";
									echo "<td>".$r->type."</td>";
									echo "<td>".$r->category."</td>";
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