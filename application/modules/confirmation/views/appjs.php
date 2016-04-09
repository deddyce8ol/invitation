<script type="text/javascript">
	var base_url = "<?php echo base_url();?>";
	$(document).ready(function() {
		$('#modal-perwakilan').on('show.bs.modal', function (e) {
			$("#form_perwakilan")[0].reset();
			$("#modal-perwakilan .modal-title").html("Form Perwakilan");
			var inv_code = "<?php echo $code;?>";
			$("#modal-perwakilan #code").val(inv_code);	
			$("#modal-perwakilan #mode").val("add");	
		});
		$("#proses").click(function(event) {
			event.preventDefault();
			$.ajax({
				url: base_url + 'confirmation/proses',
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
			});
			return false;
		});
		$(".data-perwakilan").on('click', '.edit', function(event) {
			event.preventDefault();
			$("#modal-perwakilan").modal('show');
			var code = $(this).data('code');
			var id = $(this).data('id');
			$.ajax({
				url: base_url + 'confirmation/edit_perwakilan/' + code + '/' + id,
				dataType: 'json',
				success: function (response){
					if (response.status == "success") {
						$('#modal-perwakilan').show();
						$("#modal-perwakilan #mode").val("edit");	
						$("#modal-perwakilan #code").val(response.code);	
						$("#modal-perwakilan #id").val(response.id);	
						$("#modal-perwakilan #name").val(response.name);	
						$("#modal-perwakilan #email").val(response.email);	
						$("#modal-perwakilan #telp").val(response.telp);	
						$("#modal-perwakilan #fb").val(response.fb);	
						$("#modal-perwakilan #tw").val(response.tw);	
						$("#modal-perwakilan #ig").val(response.ig);	
					}
					else {
						alert(response.message);
					}
				},
				error: function (response){
					alert("Error" + response);
				}
			});
			
			/* Act on the event */
		});
		$("#proses_kontak").click(function(event) {
			var url_action = base_url + "confirmation/proses_kontak";
			var code = "<?php echo $this->session->userdata('code');?>";
			var kontak = $("#kontak").val();
			$.ajax({
				url: url_action,
				type: 'POST',
				dataType: 'json',
				data: {kontak: kontak},
				success: function(response){
					console.log(response);
					if (response.status == "success") {
						$(".confirm-kontak").html('<span class="label label-success">' + response.message + '</span>');
						$("#kontak").val(kontak);
					}
					else {
						$(".confirm-kontak").html(response.message);
					}
				},
				error: function(response){
					alert("Gagal proses kontak");
					console.log(response);
				}
			});
		});
	});
</script>