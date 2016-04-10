	<?php echo $this->session->flashdata('message');?>
<section id="table-half">
	<div class="container">
		<div class="row">
			<div class="col-md-4 editContent"><h2><?php echo $subject;?></h2>
				<p class="sep-bottom desc-text">
					Anda memiliki
					<strong><?php echo $slot;?></strong> orang yang akan mewakili undangan ini, silahkan tambahkan perwakilan yang akan datang
				<br>Kirimkan kami nomor kontak yang bisa dihubungi agar kami bisa konfirmasi ulang kehadiran anda, terimakasih</p>
				<input type="text" class="form-controll" name="kontak" id="kontak" value="<?php echo $kontak;?>">
				<button id="proses_kontak">Proses</button><div class="confirm-kontak"></div>
			</div>
			<div class="col-md-8">
				<?php
					if ($perwakilan_num < $slot) {						
						echo '<a class="btn btn-primary" data-toggle="modal" href="#modal-perwakilan">'.$btn_label.'</a> ';
					} 
					echo anchor('confirmation/finish', 'Selesai dan Konfirmasi', 'class="btn btn-success finish-confirmation" onclick="javasciprt: return confirm(\'Klik tombol Ok untuk menyelesaikan proses registrasi dan konfirmasi ?\')"');
				?>
				<div class="table-responsive tableWrapper data-perwakilan">
					<table class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th>
								Nama & Email
							</th>
							<th>
								Kontak
							</th>
							<th>
								Sosial Media
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($perwakilan) {
							$no = 0;
							foreach ($perwakilan as $p) {
								$no++;
								$edit = anchor('#', '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-success edit" data-code="'.$p->code.'" data-id="'.$p->id.'" title="Edit"');
								$delete = anchor('confirmation/perwakilan_delete/'.$p->id, '<i class="fa fa-times"></i>', 'class="btn btn-xs btn-danger delete" title="Delete" onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini ?\')"');
								$aksi = $edit." ".$delete;
								echo "<tr>";
									echo "<td>".$aksi."</td>";
									// echo "<td>".$no."</td>";
									echo "<td>".$p->name."<br><small>".$p->email."</small></td>";
									echo "<td>".$p->telp."</td>";
									echo "<td>";
									if ($p->fb!="") {
										echo "<small><i class='icon icon-facebook'></i> ".$p->fb."</small>";
										echo "<br>";
									}
									if ($p->tw!="") {
										echo "<small><i class='icon icon-twitter'></i> ".$p->tw."</small>";
										echo "<br>";
									}
									if ($p->ig!="") {
										echo "<small><i class='icon icon-instagram'></i> ".$p->ig."</small>";
										echo "<br>";
									}
									echo "</td>";
								echo "</tr>";
							}
						}
						else {
							echo "<tr><td colspan='4' align='center'>Belum ada data perwakilan</td></tr>";
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
					<h3 class="title modal-title">Modal title</h3>
				</div>
				<div class="modal-body">
					<div class="form-container">
						<div class="error-container"></div>
						<?php include "form_perwakilan.php"; ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button"  class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" id="proses" class="btn btn-primary">Proses</button>
				</div>
			</div>
		</div>
	</div>
	<?php include "appjs.php";?>