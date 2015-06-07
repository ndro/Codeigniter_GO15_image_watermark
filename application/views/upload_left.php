<div class="row">
	<div class="col-lg-12 text-center v-center">
		<a href="<?php echo base_url(); ?>">
			<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/brand-encil.png" alt="Logo GO">
		</a>
		<h1>Picture Your Self</h1>
		<span class="comment">*note: max size 2MB</span>

		<br />

		<div class="row">
			<form class="form-inline" role="form" enctype='multipart/form-data' method="post" action="<?php echo base_url(); ?>home/proses_upload">
				<div class="col-lg-5">
				</div>
				<div class="form-group col-lg-2">
					<h4 class="lead">Pilih foto yang akan digunakan</h4>
					<input name="mode" readonly="true" type="hidden" value="left">
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
					&nbsp;
					<br />
				</div>
				<div class="col-lg-5">
				</div>
			</form>
		</div>
		
		<div class="row">
			<span class="comment">Frame yang dipilih (Klik <a href="<?php echo base_url();?>" style="color:#1db047">disini</a> untuk mengganti frame)</span>
			<br />
			<br />
			<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/your-kiri.png" alt="Foto Kiri" width="400">
			&nbsp;
			<br />
		</div>

	</div>

</div> <!-- /row -->