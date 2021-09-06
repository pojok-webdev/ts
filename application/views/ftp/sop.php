<h2><?php echo $title; ?></h2>
<!-- <div class="form-group">
  <label>SOP Pembayaran Tagihan</label><br>
  <div class="btn btn-primary" id="add_file">Add More File</div>
  <div id='input-file-field'></div>
</div> -->
<a href="<?php echo base_url(); ?>pelanggan/edit/<?php echo $id_pelanggan; ?>" class="btn btn-warning">Back</a>
<div id='field'>
	<?php echo form_open_multipart('pelanggan/add_image');?>
		<input type='file' name='userfile' class='btn btn-primary' id='inputImg' style='margin-top:5px; margin-right: 5px;'>
		<input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
		<button class="btn btn-info" id="add_file">Add File</button>
	</form>
</div>

<br><br>
<!-- <h2><?php print_r($dokumen); ?></h2> -->

<?php
	for ($i=0; $i < count($dokumen); $i++)
	{
		$data['dokumen']=$dokumen[$i]['id'];
		$data['id_pelanggan']=$dokumen[$i]['id_pelanggan'];
		echo 
			"<div class='row'>".
				"<div class='col'>".
					"<div style='width: 70%; margin-left: auto; margin-right: auto;'>".
						"<a href='".base_url()."/assets/image/uploads/".$dokumen[$i]['dokumen_path']."' data-lightbox='image' data-title='SOP Pembayaran Tagihan'><img class='img-thumbnail' src='".base_url()."/assets/image/uploads/".$dokumen[$i]['dokumen_path']."'></a>".
					"</div>".
				"</div>".
				"<div class='col'>".
					//"<a href='' class='btn btn-primary'>Edit</a>".
					"<a href='".base_url()."pelanggan/sop/delete/".$dokumen[$i]['id']."' class='btn btn-danger'>Delete</a>".
				"</div>".
			"</div>"
		;
	}
?>

<script type="text/javascript">
	// $("#add_file").click(function()
	// {

	// });
</script>