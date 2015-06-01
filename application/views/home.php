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
			<div class="form-group">
				<input class="btn btn-lg " type="file" name="userfile" size="15" />
				<br /><br />
				<input class="btn btn-lg btn-primary" type="submit" value="Upload" />
			</div>
		</form>

	</div>

</div> <!-- /row -->