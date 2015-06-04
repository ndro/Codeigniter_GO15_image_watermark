<div class="row">
	<div id="error">
		<?php echo validation_errors(); ?>
	</div>
	<div class="col-lg-12 text-center v-center">		
		<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/logo-head.png" alt="Logo GO">
		<h1>Picture Your Self</h1>
		<p class="lead">
			Ayo ubah foto anda di semua medsos...!!
		</p>
		<div class="col-lg-4">
			<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/done-kiri.jpg" alt="Foto kiri" width="400">
			<br />
		</div>
		<div class="col-lg-4">
			<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/done-keep.jpg" alt="Foto Keep Calm" width="400">
			<br />
		</div>
		<div class="col-lg-4">
			<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/done-kanan.jpg" alt="Foto Kanan" width="400">
			<br />
		</div>
		
		<br />
		
		<span>*note: gambarnya yang berbentuk kotak jika ingin hasil maksimal (ex: 800x800, 500x500)</span>

		<br />

		<?php echo $error;?>
		<form class="form-inline" role="form" enctype='multipart/form-data' method="post" action="<?php echo base_url(); ?>home/proses_upload">
			<div class="col-lg-5">
			</div>
			<div class="form-group col-lg-2">
				<h4>Choose Your Photo</h4>
				<div class="input-group">
					<span class="input-group-btn">
						<span class="btn btn-primary btn-file">
							Browse&hellip; <input type="file" name="userfile">
						</span>
					</span>
					<input type="text" class="form-control" readonly>
				</div>
				<br />
				<input class="btn btn-block btn-primary" type="submit" value="Upload" />
				<br />
				<br />
			</div>
			<div class="col-lg-5">
			</div>
			
		</form>
		

	</div>

</div> <!-- /row -->