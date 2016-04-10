<!-- INTRO CENTER FORM -->
		<header id="intro-center-form" class="intro-block cover-bg text-center" style="background-image: url('<?php echo base_url();?>assets/themes/select/images/bg10.jpg');">
			<div class="container">
				<div class="row">
                    <div class="col-md-12 dark-bg">
                        <div class="slogan">
                            <h1>Registrasi dan Konfirmasi Kehadiran Anda</h1>
                            <p>
                                Mengusung tema
                                <strong>"Gotong Royong Penggiat Teknologi di Pontianak"</strong>, kami mengundang Anda untuk berkumpul, berinteraksi dan bergotong-royong dengan para penggiat teknologi lokal dan komunitas kreatif yang ada di Pontianak
                            </p>
                            <p>
                                Hari
                                <strong>Sabtu</strong>, Tanggal <strong>23 April 2016</strong>, Tempat : <strong>Best Western Kota Baru Hotel</strong>, Jl. Sultan Abdurrahman Pontianak
                            </p>
                        </div>
                    </div>
					<div class="col-md-6 col-md-offset-3">
						<div class="form-container">
							<h3 class="title">FORM Konfirmasi</h3>
							<?php echo $this->session->flashdata('message');?>
							<?php echo form_open($form_action, "name='form_confirmation' id='form_confirmation' class='wow bounce'"); ?>
								<div class="form-group">
									<input type="text" class="form-control" id="code" placeholder="Kode Undangan" name="code">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password" placeholder="Sandi" name="password">
								</div>
								<button type="submit" id="contact_submit" data-loading-text="•••" class="btn btn-lg btn-block btn-primary">Registrasi dan Konfirmasi</button>
							<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>
		</header>