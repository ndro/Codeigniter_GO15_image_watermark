<div class="row">
	<div id="error">
		<?php echo validation_errors(); ?>
	</div>
	<div class="col-lg-12 text-center v-center">

		<h1>Ganesha Open 2015</h1>
		<p class="lead">Ayo ubah foto anda di semua medsos...!!</p>

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
			</div>
			<div class="col-lg-5">
			</div>
			
		</form>

	</div>

</div> <!-- /row -->