<html>
<head>
	<title>Data Perwakilan <?php echo $subject;?></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<?php echo $this->session->flashdata('message');?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $subject;?></h1>
				<hr>
				<p><?php echo $keterangan_undangan;?></p>
				<p>Perwakilan yang dikirim sebanyak : <span class="label label-info"><?php echo $slot;?> Orang</span></p>
				<hr>
				<input type="text" name="kontak" id="kontak" value="<?php echo $kontak;?>">
				<button id="proses_kontak">Proses</button><div class="confirm-kontak"></div>
				<br>
				<br>
				<?php
					if ($perwakilan_num < $slot) {						
						echo '<a class="btn btn-primary" data-toggle="modal" href="#modal-perwakilan">'.$btn_label.'</a>';
					} 
				?>
			</div>
		</div>
		<hr>
		<div class="row data-perwakilan">
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Kontak</th>
						<th>Facebook</th>
						<th>Twitter</th>
						<th>Instagram</th>
						<th></th>
					</tr>
				</thead>	
			<?php
				if ($perwakilan) {
					$no = 0;
					foreach ($perwakilan as $p) {
						$no++;
						$edit = anchor('#', '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-default edit" data-code="'.$p->code.'" data-id="'.$p->id.'" title="Edit"');
						$delete = anchor('confirmation/perwakilan_delete/'.$p->id, '<i class="fa fa-times"></i>', 'class="btn btn-xs btn-danger delete" title="Delete" onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini ?\')"');
						$aksi = $edit." ".$delete;
						echo "<tr>";
							echo "<td>".$no."</td>";
							echo "<td>".$p->name."</td>";
							echo "<td>".$p->email."</td>";
							echo "<td>".$p->telp."</td>";
							echo "<td>".$p->fb."</td>";
							echo "<td>".$p->tw."</td>";
							echo "<td>".$p->ig."</td>";
							echo "<td>".$aksi."</td>";
						echo "</tr>";
					}
				}
				else {
					echo "<tr><td colspan='4' align='center'>Belum ada data perwakilan</td></tr>";
				}
			?>
			</table>
		</div>
	</div>	
	<div class="modal fade" id="modal-perwakilan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<?php include "form_perwakilan.php"; ?>
				</div>
				<div class="modal-footer">
					<button type="button"  class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" id="proses" class="btn btn-primary">Proses</button>
				</div>
			</div>
		</div>
	</div>
	<?php include "appjs.php";?>
</body>
</html>