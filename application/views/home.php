<div class="basic-grey">
    <div id="error">
		<?php echo validation_errors(); ?>
    </div>
    <div id="form">
		<?php echo $error;?>
		<?php echo form_open_multipart('home/proses_upload');?>
			<input type="file" name="userfile" size="20" />
			<br /><br />
			<input type="submit" value="upload" />
		</form>
    </div>
 </div>