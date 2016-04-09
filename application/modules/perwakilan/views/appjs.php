<script type="text/javascript">
	var base_url = "<?php echo base_url();?>";

	$(document).ready(function() {
		$('#modal-perwakilan').on('show.bs.modal', function (e) {
			$("#form_perwakilan")[0].reset();
			var inv_code = "<?php echo $inv_code;?>";
			$("#code").val(inv_code);			
		})
		$("#form_perwakilan").submit(function(event) {
			event.preventDefault();
			$.ajax({
				url: base_url + 'perwakilan/add_proses',
				type: 'POST',
				dataType: 'json',
				data: $("#form_perwakilan").serialize(),
				success: function(response){
					if (response.status == "success") {
						console.log(response.message);
						location.reload();
					}
					else {
						alert(response.message);
					}
				},
				error: function(response){
					alert("Data Gagal di Proses");
					// console.log("error");
					console.log(response);
				}
			})
		});
	});
</script>