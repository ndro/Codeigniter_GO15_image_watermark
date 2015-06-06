<div class="row">
	<div id="error">
		<?php echo validation_errors(); ?>
	</div>
	<div class="col-lg-12 text-center ">		
		<a href="<?php echo base_url(); ?>">
			<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/logo-head.png" alt="Logo GO">
		</a>
		<h1>Picture Your Self</h1>
		<p class="lead">
			Ayo ubah semua foto anda semua di media sosial  dan sebarkan semangat Ganesha Open 2015 !!!
		</p>
		<span class="error"><?php echo $error;?></span>
		<span class="comment">Silahkan pilih frame yang diinginkan</span>
		<br />
		<div class="col-lg-4">
			<div class="tilt pic">
				<a href="<?php echo base_url(); ?>home/upload_page_left" title="Template 1">
					<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/done-kiri.jpg" alt="Foto kiri" width="400">
				</a>
			</div>
			<br />&nbsp;
			<br />
			<br />
		</div>
		
		<div class="col-lg-4">
			<div class="tilt pic">
				<a href="<?php echo base_url(); ?>home/upload_page_keep" title="Template 2">
					<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/done-keep.jpg" alt="Foto Keep Calm" width="400">
				</a>
			</div>
			<br />&nbsp;
			<br />
			<br />
		</div>
		<div class="col-lg-4">
			<div class="tilt pic">
				<a href="<?php echo base_url(); ?>home/upload_page_right" title="Template 3">
					<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/done-kanan.jpg" alt="Foto Kanan" width="400">
				</a>
			</div>
			<br />&nbsp;
			<br />
			<br />

		</div>
	
	</div>

</div> <!-- /row -->