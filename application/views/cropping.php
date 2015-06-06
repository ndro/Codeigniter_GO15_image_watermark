<div class="row">
  <!-- Content -->
	<div class="col-lg-12 text-center v-center">		
		<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/brand-encil.png" alt="Logo GO">
		<h1>Picture Your Self</h1>
		<span class="comment">Atur posisi foto, agar sesuai dengan frame</span>

		<br />
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-8">
				<!-- <h3 class="page-header">Demo:</h3> -->
				<div class="img-container">
					<img src="<?php echo base_url();?>/assets/uploads/<?php echo $file_name; ?>" alt="Picture">
				</div>
			</div>
			<div class="col-md-2">
				<!-- <h3 class="page-header">Data:</h3> -->
				<form method="post" accept-charset="utf-8" action="<?php echo base_url();?>home/proses_crop" >
					<input name="file_name" type="hidden" value="<?php echo $file_name; ?>">
					<input name="raw_name" type="hidden" value="<?php echo $raw_name; ?>">
					<input name="mode" type="hidden" value="<?php echo $mode; ?>">
					<div class="docs-data">
						<div class="input-group">
							<label class="input-group-addon" for="dataX">X</label>
							<input class="form-control" id="dataX" name="x" readonly="true" type="text" placeholder="x">
							<span class="input-group-addon">px</span>
						</div>
						<div class="input-group">
							<label class="input-group-addon" for="dataY">Y</label>
							<input class="form-control" id="dataY" name="y" readonly="true" type="text" placeholder="y">
							<span class="input-group-addon">px</span>
						</div>
						<div class="input-group">
							<label class="input-group-addon" for="dataWidth">Width</label>
							<input class="form-control" id="dataWidth" name="w" readonly="true" type="text" placeholder="width">
							<span class="input-group-addon">px</span>
						</div>
						<div class="input-group">
							<label class="input-group-addon" for="dataHeight">Height</label>
							<input class="form-control" id="dataHeight" name="h" readonly="true" type="text" placeholder="height">
							<span class="input-group-addon">px</span>
						</div>
						<!--<div class="input-group">
							<label class="input-group-addon" for="dataRotate">Rotate</label>
							<input class="form-control" id="dataRotate" name="" readonly="true" type="text" placeholder="rotate">
							<span class="input-group-addon">deg</span>
						</div>-->
						<div class="form-group">
							<input class="btn btn-block btn-primary" type="submit" value="Submit" /><br />
							<a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>home/upload_page_<?php echo $mode; ?>">< Back</a>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-1">
			</div>
		</div>
	</div>

  <!-- Alert -->
  <div class="docs-alert"><span class="warning message"></span></div>

</div> <!-- /row -->