<?php echo $this->session->flashdata('message');?>
<section class="content-header">
	<h1><?php echo $title;?></h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<?php echo anchor('menu/admin/add', 'Tambah Menu', 'class="btn btn-success"');?>
				</div>
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Link</th>
								<th>Icon</th>
								<th>Aktif</th>
								<th>Parent</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							if (count($menu)>0) {
								foreach ($menu as $m) {
									$no++;
									$edit = anchor('menu/admin/edit/'.$m->id_menu, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-default edit" title="Edit"');
									$delete = anchor('menu/admin/delete/'.$m->id_menu, '<i class="fa fa-times"></i>', 'class="btn btn-xs btn-danger delete" title="Delete" onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini ?\')"');
									$aksi = $edit." ".$delete;
									echo "<tr>";
									echo "<td>".$no."</td>";
									echo "<td>".$m->name."</td>";
									echo "<td>".$m->link."</td>";
									echo "<td>".$m->icon."</td>";
									echo "<td>";
										if ($m->is_active == 1) {
											echo "Aktif";
										}
										else {
											echo "Non Aktif";
										}
									echo "</td>";
									echo "<td>";
										if ($m->is_parent == 0) {
											echo "Root Menu";
										}
										else {
											echo "Sub Menu";
										}
									echo "</td>";
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