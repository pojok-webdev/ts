<h2><?php echo $title; ?></h2>
<h4><?php echo $error['error']; ?></h4>
<!-- https://www.kang-cahya.com/2015/05/membuat-dropdown-select-data-wilayah.html -->
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('pelanggan/create_pelanggan');?>
<!-- <?php echo form_open_multipart('pelanggan/test');?> -->
<div class="form-group">
	<label>Nama Pelanggan</label>
	<input type="text" list="nama_pelanggan" class="form-control" name="nama" placeholder="Nama Pelanggan" required>
  <datalist id="nama_pelanggan"></datalist>
</div>

<div class="form-group">
  <label>Alias Pelanggan</label>
  <input type="text" list="alias_pelanggan" class="form-control" name="nama_alias" placeholder="Alias Pelanggan">
</div>

<div class="form-group">
  <label for="tipe_pelanggan">Cabang</label>
  <select class="form-control" id="cabang" name="cabang" required>
    <option>Jakarta</option>
    <option>Surabaya</option>
    <option>Malang</option>
    <option>Bali</option>
  </select>
</div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <label>No. KTP Pelanggan</label>
      <input type="text" class="form-control" name="no_ktp" placeholder="No. KTP">
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label>No. Telepon Pelanggan</label>
      <input type="text" class="form-control" name="no_telp" placeholder="No. Telepon" required>
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <label>Nomor NPWPP</label>
      <input type="text" list="list_npwp" class="form-control" name="npwp" placeholder="Nomor NPWP" required>
      <datalist id="list_npwp"></datalist>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="tipe_pelanggan">Kategori Pelanggan</label>
      <select class="form-control" id="tipe_pelanggan" name="tipe_pelanggan" required>
        <option>B Tgl 01-10</option>
        <option>B Tgl 11-20</option>
        <option>B Tgl 21-31</option>
        <option>B+1</option>
        <option>B+2</option>
        <option>Anomali</option>
      </select>
    </div>
  </div>
</div>



<h4>Alamat NPWP</h4>
<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="provinsi">Provinsi</label>
      <select name="prov_pelanggan" class="form-control" id="provinsi">
        <option value="">- Select Provinsi -</option>
        <?php
          foreach ($provinsi as $prov) 
          {
            echo "<option value='".$prov['id']."'>".$prov['nama']."</option>";
          }
        ?>
      </select>
      <!-- <input type="text" name="prov_pelanggan" class="form-control" list="provinsi" required>
      <datalist id="provinsi">
        <option>- Select Provinsi -</option>
        <?php
          foreach ($provinsi as $prov) 
          {
            echo "<option value='".$prov['id']."'>".$prov['nama']."</option>";
          }
        ?>
      </datalist> -->
    </div>
  </div>
<!-- ==================== -->
  <div class="form-group">
    <label>Kode Pos</label>
    <input type="text" class="form-control" name="kode_pos1" placeholder="Kode Pos" required>
  </div>
<!-- ==================== -->
  <div class="col">
    <div class="form-group">
      <label for="kabupaten">Kabupaten</label>
      <select name="kab_pelanggan" class="form-control" id="kabupaten">
        <option value="">- Select Kabupaten -</option>
      </select>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="kecamatan">Kecamatan</label>
      <select name="kec_pelanggan" class="form-control" id="kecamatan">
        <option value="">- Select Kecamatan -</option>
      </select>
    </div>
  </div>

  <div class="col">
    <div class="form-group">
      <label for="kelurahan">Kelurahan</label>
      <select name="kel_pelanggan" class="form-control" id="kelurahan">
        <option value="">- Select Kelurahan -</option>
      </select>
    </div>
  </div>
</div>

<div class="form-group">
	<label>Alamat 1</label>
	<input type="text" list="list_alamat_npwp" class="form-control" name="alamat_pelanggan1" placeholder="Alamat 1" required>
  <datalist id="list_alamat_npwp"></datalist>
</div>

<div class="form-group">
  <label>Alamat 2</label>
  <input type="text" class="form-control" name="alamat_pelanggan2" placeholder="Alamat 2">
</div>

<h4>Lokasi Penagihan</h4>
<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="provinsi_penagih">Provinsi</label>
      <select name="prov_penagih" class="form-control" id="provinsi_penagih">
        <option value="">- Select Provinsi -</option>
        <?php
          foreach ($provinsi as $prov) 
          {
            echo "<option value='".$prov['id']."'>".$prov['nama']."</option>";
          }
        ?>
      </select>
    </div>
  </div>
<!-- ==================== -->
  <div class="form-group">
    <label>Kode Pos</label>
    <input type="text" class="form-control" name="kode_pos2" placeholder="Kode Pos" required>
  </div>
<!-- ==================== -->
  <div class="col">
    <div class="form-group">
      <label for="kabupaten_penagih">Kabupaten</label>
      <select name="kab_penagih" class="form-control" id="kabupaten_penagih">
        <option value="">- Select Kabupaten -</option>
      </select>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="kecamatan_penagih">Kecamatan</label>
      <select name="kec_penagih" class="form-control" id="kecamatan_penagih">
        <option value="">- Select Kecamatan -</option>
      </select>
    </div>
  </div>

  <div class="col">
    <div class="form-group">
      <label for="kelurahan_penagih">Kelurahan</label>
      <select name="kel_penagih" class="form-control" id="kelurahan_penagih">
        <option value="">- Select Kelurahan -</option>
      </select>
    </div>
  </div>
</div>

<div class="form-group">
  <label>Alamat 1</label>
  <input type="text" class="form-control" name="alamat_penagih1" placeholder="Alamat 1" required>
</div>

<div class="form-group">
  <label>Alamat 2</label>
  <input type="text" class="form-control" name="alamat_penagih2" placeholder="Alamat 2">
</div>

<h4>Pembayaran</h4>

<div class="form-group">
  <label>SOP Pembayaran Tagihan</label><br>
  <div class="btn btn-primary" id="add_file">Add More File</div>
  <div id='input-file-field'></div>
  <!-- <?php echo form_upload(['name'=>'userfile', 'value'=>set_value('userfile'), 'class'=>'btn btn-primary', 'id'=>'inputImg0']);?> -->
</div>

<div class="form-group">
  <label for="sales">Sales</label>
  <select name="sales" class="form-control" id="sales" required>
    <option>- Select Sales -</option>
    <?php
      foreach ($sales as $sale) 
      {
        echo "<option value='".$sale['id_sales']."'>".$sale['nama_sales']."</option>";
      }
    ?>
  </select>
</div>

<div class="form-group">
  <label>Catatan</label>
  <input type="text" class="form-control" name="catatan" placeholder="Catatan">
</div>

<input type="hidden" name="status" id="status" value="Active">
<!-- <button type="submit" class="btn btn-default">Submit</button> -->
<?php echo form_submit(['name'=>'submit', 'value'=>'Submit','class'=>'btn btn-default']);?>
<?php echo form_close();?>

<script type="text/javascript">
 $(function () {
  var num = 0;
    $( "#tgl_kebiasaan_pembayaran" ).change(function() 
    {
      var max = parseInt($(this).attr('max'));
      var min = parseInt($(this).attr('min'));
      if ($(this).val() > max)
      {
        $(this).val(max);
      }
      else if ($(this).val() < min)
        {
          $(this).val(min);
        }       
    });

    $("#add_file").click(function(){
      num++;
      $("#input-file-field").append(
        "<div id='field"+num+"'><input type='file' name='userfile[]' class='btn btn-primary' id='inputImg"+num+"' style='margin-top:5px; margin-right: 5px;'><div class='btn btn-danger' id='delete"+num+"'>X</div><br></div>"
      );
      $("#delete"+num).click({index: num}, delete_file);
    });
  });

  function delete_file(event)
  {
    $("#field"+event.data.index).remove();
  }
</script>

<script>
$(document).ready(function(){

  $.ajax({
    url: "http://delima.padinet.com:2118/getclient",
    dataType: 'json',
    success: function(data)
    {
      // console.log(data[0]);
      $("#nama_pelanggan").empty();
      $("#list_npwp").empty();
      $("#list_alamat_npwp").empty();
      for(var i=0; i<data.length; i++)
      {
        $("#nama_pelanggan").append("<option value='"+data[i]['name']+"'>"+data[i]['name']+"</option>");
        $("#list_npwp").append("<option value='"+data[i]['npwp']+"'>"+data[i]['npwp']+"</option>");
        $("#list_alamat_npwp").append("<option value='"+data[i]['npwpaddress']+"'>"+data[i]['npwpaddress']+"</option>");
      }
    },
    error: function (request, status, error) {
      alert(request.responseText);
    }
  });

  $("#provinsi").change(function (){
    var url = "<?php echo site_url('pelanggan/add_ajax_kab');?>/"+$(this).val();
    $('#kabupaten').load(url);
    return false;
  });
  $("#kabupaten").change(function (){
    var url = "<?php echo site_url('pelanggan/add_ajax_kec');?>/"+$(this).val();
    $('#kecamatan').load(url);
    return false;
  });
  $("#kecamatan").change(function (){
    var url = "<?php echo site_url('pelanggan/add_ajax_kel');?>/"+$(this).val();
    $('#kelurahan').load(url);
    return false;
  });
  $("#provinsi_penagih").change(function (){
    var url = "<?php echo site_url('pelanggan/add_ajax_kab');?>/"+$(this).val();
    $('#kabupaten_penagih').load(url);
    return false;
  });
  $("#kabupaten_penagih").change(function (){
    var url = "<?php echo site_url('pelanggan/add_ajax_kec');?>/"+$(this).val();
    $('#kecamatan_penagih').load(url);
    return false;
  });
  $("#kecamatan_penagih").change(function (){
    var url = "<?php echo site_url('pelanggan/add_ajax_kel');?>/"+$(this).val();
    $('#kelurahan_penagih').load(url);
    return false;
  });
});
</script>