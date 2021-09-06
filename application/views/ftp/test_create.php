<?php echo form_open_multipart('pelanggan/do_upload');?>

<input type="file" name="userfile" id="file" value="Save" />

<br /><br />

<input type="submit" value="upload" />

</form>

<script type="text/javascript">
$("#file").change(function (){
   //$("#file").val($('#file').val().replace('C:\\fakepath\\', ''));
   alert($("#file").val());
   return false;
});
</script>