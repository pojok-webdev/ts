<h2><?php print_r($title); ?></h2>
<!-- https://www.kang-cahya.com/2015/05/membuat-dropdown-select-data-wilayah.html -->

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('pelanggan/update');?>
<div class="form-group">
  <label>Nama Pelanggan</label>
  <input type="text" class="form-control" name="nama" placeholder="Nama Pelanggan" value="<?php echo $pelanggan['nama_pelanggan']; ?>">
</div>

<div class="form-group">
  <label>Alias Pelanggan</label>
  <input type="text" class="form-control" name="nama_alias" placeholder="Alias Pelanggan" value="<?php echo $pelanggan['alias_pelanggan']; ?>">
</div>

<div class="form-group">
      <label for="tipe_pelanggan">Cabang</label>
      <select class="form-control" id="cabang" name="cabang" value="<?php echo $pelanggan['cabang']; ?>">
        <option <?php if($pelanggan['cabang']=='Jakarta') echo 'selected';?> >Jakarta</option>
        <option <?php if($pelanggan['cabang']=='Surabaya') echo 'selected';?> >Surabaya</option>
        <option <?php if($pelanggan['cabang']=='Malang') echo 'selected';?> >Malang</option>
        <option <?php if($pelanggan['cabang']=='Bali') echo 'selected';?> >Bali</option>
      </select>
    </div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <label>No. KTP Pelanggan</label>
      <input type="text" class="form-control" name="no_ktp" placeholder="No. KTP" value="<?php echo $pelanggan['no_ktp_pelanggan']; ?>">
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label>No. Telepon Pelanggan</label>
      <input type="text" class="form-control" name="no_telp" placeholder="No. Telepon" value="<?php echo $pelanggan['no_telp_pelanggan']; ?>">
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <label>Nomor NPWP</label>
      <input type="text" class="form-control" name="npwp" placeholder="Nomor NPWP" value="<?php echo $pelanggan['npwp']; ?>">
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="tipe_pelanggan">Kategori Pelanggan</label>
      <select class="form-control" id="tipe_pelanggan" name="tipe_pelanggan" value="<?php echo $pelanggan['tipe_pelanggan']; ?>">
        <option <?php if($pelanggan['tipe_pelanggan']=='B Tgl 01-10') echo 'selected';?> >B Tgl 01-10</option>
        <option <?php if($pelanggan['tipe_pelanggan']=='B Tgl 11-20') echo 'selected';?> >B Tgl 11-20</option>
        <option <?php if($pelanggan['tipe_pelanggan']=='B Tgl 21-31') echo 'selected';?> >B Tgl 21-31</option>
        <option <?php if($pelanggan['tipe_pelanggan']=='B+1') echo 'selected';?> >B+1</option>
        <option <?php if($pelanggan['tipe_pelanggan']=='B+2') echo 'selected';?> >B+2</option>
        <option <?php if($pelanggan['tipe_pelanggan']=='Anomali') echo 'selected';?> >Anomali</option>
      </select>
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="row">
      <div class="col">
        <h4>Alamat NPWP</h4>
      </div>
      <div>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-alamat-pelanggan" id="btn-edit-alamat-pelanggan">Update</button>
      </div>
    </div>
    <div id="alamat-pelanggan"></div>
  </div>
  <div class="col">
    <div class="row">
      <div class="col">
        <h4>Lokasi Penagihan</h4>
      </div>
      <div>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-lokasi-penagihan" id="btn-edit-lokasi-penagihan">Update</button>
      </div>
    </div>
    <div id="lokasi-penagihan"></div>
  </div>
</div>

<h4>Pembayaran</h4>
<div class="form-group">
  <label>SOP Pembayaran Tagihan</label><br>
  <a href="<?php echo site_url('/pelanggan/sop/'.$pelanggan['id_pelanggan']);?>" class="btn btn-primary">See All Image</a>
  <!-- <div class="row">
    <div class="col">
      <div style="width: 70%; margin-left: auto; margin-right: auto;">
        <a href="<?php echo $pelanggan['sop_pembayaran_tagihan']; ?>" data-lightbox="image" data-title="SOP Pembayaran Tagihan"><img class="img-thumbnail" src="<?php echo $pelanggan['sop_pembayaran_tagihan']; ?>"></a>
      </div>
    </div>
    <div class="col">
      <label>Update SOP Pembayaran Tagihan</label><br>
      <?php echo form_upload(['name'=>'userfile', 'value'=>set_value('userfile'), 'class'=>'btn btn-primary']);?>
    </div>
  </div> -->
</div>

<div class="form-group">
  <label for="sales">Sales</label>
  <select name="sales" class="form-control" id="sales" required>
    <option>- Select Sales -</option>
    <?php
      foreach ($sales as $sale) 
      {
        if($pelanggan['id_sales']==$sale['id_sales'])
          echo "<option value='".$sale['id_sales']."' selected>".$sale['nama_sales']."</option>";
        else
          echo "<option value='".$sale['id_sales']."'>".$sale['nama_sales']."</option>";
      }
    ?>
  </select>
</div>

<div class="form-group">
  <label>Catatan</label>
  <input type="text" class="form-control" name="catatan" placeholder="Catatan" value="<?php echo $pelanggan['catatan']; ?>">
</div>

<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']?>">
<input type="hidden" name="status" id="status" value="<?php echo $pelanggan['status']?>">
<!-- <button type="submit" class="btn btn-default">Submit</button> -->
<?php echo form_submit(['name'=>'submit', 'value'=>'Save','class'=>'btn btn-default']);?>
<?php echo form_close();?>

<div class="modal fade" id="edit-alamat-pelanggan" tabindex="-1" role="dialog" aria-labelledby="edit-alamat-pelangganLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-alamat-pelangganLabel">Update Alamat NPWP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <?php echo form_open('pelanggan/edit_alamat_pelanggan');?> -->
        <form id="form-edit-alamat-pelanggan">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select name="prov_pelanggan" class="form-control" id="provinsi">
                  <option>- Select Provinsi -</option>
                </select>
              </div>
            </div>
            <!-- ==================== -->
            <!-- <div class="col">
              <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" class="form-control" name="kode_pos1" placeholder="Kode Pos">
              </div>
            </div> -->
            <!-- ==================== -->
            <div class="col">
              <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <select name="kab_pelanggan" class="form-control" id="kabupaten">
                  <option>- Select Kabupaten -</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select name="kec_pelanggan" class="form-control" id="kecamatan">
                  <option>- Select Kecamatan -</option>
                </select>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <select name="kel_pelanggan" class="form-control" id="kelurahan">
                  <option>- Select Kelurahan -</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Alamat 1</label>
            <input type="text" class="form-control" name="alamat_pelanggan1" id="alamat_pelanggan1" placeholder="Alamat 1" value="<?php echo set_value('alamat'); ?>">
          </div>

          <div class="form-group">
            <label>Alamat 2</label>
            <input type="text" class="form-control" name="alamat_pelanggan2" id="alamat_pelanggan2" placeholder="Alamat 2" value="<?php echo set_value('alamat'); ?>">
          </div>
          <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-exit-edit-alamat-pelanggan">Close</button>
        <button type="button" class="btn btn-primary" id="btn-save-edit-alamat-pelanggan">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit-lokasi-penagihan" tabindex="-1" role="dialog" aria-labelledby="edit-lokasi-penagihanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-alamat-pelangganLabel">Update Lokasi Penagihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <?php echo form_open('pelanggan/edit_alamat_pelanggan');?> -->
        <form id="form-edit-lokasi-penagihan">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="provinsi_penagih">Provinsi</label>
                <select name="prov_penagih" class="form-control" id="provinsi_penagih">
                  <option>- Select Provinsi -</option>
                </select>
              </div>
            </div>
            <!-- ==================== -->
            <!-- <div class="col">
              <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" class="form-control" name="kode_pos2" placeholder="Kode Pos">
              </div>
            </div> -->
            <!-- ==================== -->
            <div class="col">
              <div class="form-group">
                <label for="kabupaten_penagih">Kabupaten</label>
                <select name="kab_penagih" class="form-control" id="kabupaten_penagih">
                  <option>- Select Kabupaten -</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="kecamatan_penagih">Kecamatan</label>
                <select name="kec_penagih" class="form-control" id="kecamatan_penagih">
                  <option>- Select Kecamatan -</option>
                </select>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="kelurahan_penagih">Kelurahan</label>
                <select name="kel_penagih" class="form-control" id="kelurahan_penagih">
                  <option>- Select Kelurahan -</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Alamat 1</label>
            <input type="text" class="form-control" name="alamat_penagih1" id="alamat_penagih1" placeholder="Alamat 1">
          </div>

          <div class="form-group">
            <label>Alamat 2</label>
            <input type="text" class="form-control" name="alamat_penagih2" id="alamat_penagih2" placeholder="Alamat 2">
          </div>
          <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-exit-edit-lokasi-penagihan">Close</button>
        <button type="button" class="btn btn-primary" id="btn-save-edit-lokasi-penagihan">Save changes</button>
      </div>
    </div>
  </div>
</div>

<hr>

<h4>Layanan Bulanan</h4>
<div id="layanan-alert-place"></div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLayananModal">Add Layanan</button>
<br><br>
<table class='table table-bordered text-center'>
  <thead class='thead-light'>
    <tr>
      <th style='width: 10%;' scope='col'>No</th>
      <th style='width: 45%;' scope='col'>Nama Layanan</th>
      <th style='width: 30%;' scope='col'>Harga Layanan</th>
      <th style='width: 15%;' scope='col'>Action</th>
    </tr>
  </thead>
  <tbody id='div-layanan'></tbody>
</table>
<div class="modal fade" id="addLayananModal" tabindex="-1" role="dialog" aria-labelledby="addLayananModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-layanan-create">
          <div class="form-group">
            <label>Layanan</label>
            <select name="nama_layanan" id="nama_layanan" class="custom-select" required>
              <option value="">- Select Layanan -</option>
              <option value="Internet">Internet</option>
              <option value="Internet IIX">Internet IIX</option>
              <option value="Setup Instalasi">Setup Instalasi</option>
              <option value="Sewa Perangkat">Sewa Perangkat</option>
              <option value="Lain-lain">Lain-lain</option>
              <option value="Penjualan Wireless">Penjualan Wireless</option>
            </select>
          </div>
          <div class="form-group" id="list_layanan_box" style="display: none;">
            <label>Nama Layanan</label>
            <input type="text" list="list_layanan" name="list_layanan" id="list_layanan_id" class="form-control">
            <datalist id="list_layanan">
              <option value="Internet">Internet</option>
            </datalist>
            <input type="hidden" name="id_list" id="id_list" value='0'>
          </div>

          <label>Harga Layanan</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <select name="currency" id="currency" class="custom-select">
                <option value="IDR" selected>IDR</option>
                <option value="USD">USD</option>
                <option value="SGD">SGD</option>
              </select>
            </div>
            <input type="text" class="form-control" name="harga_layanan" id="harga_layanan" placeholder="Harga Layanan" required>
          </div>
          <div class="form-group" id='harga_layanan_box' style="display: none;">
            <label>Harga Layanan (Rupiah)</label>
            <input type="text" class="form-control" name="harga_layanan_rupiah" id="harga_layanan_rupiah" placeholder="Harga Layanan (Rupiah)" required>
          </div>
          <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-create-layanan-close">Close</button>
        <button type="button" class="btn btn-primary" id="btn-create-layanan">Create Layanan</button>
      </div>
    </div>
  </div>
</div>

<hr>

<h4>PIC</h4>
<div id="alert-place"></div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPicModal">Add PIC</button>
<br><br>

<div id="div-pic"></div>

<div class="modal fade" id="addPicModal" tabindex="-1" role="dialog" aria-labelledby="addPicModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add PIC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-pic-create">
          <div class="form-group">
            <label>Nama PIC</label>
            <input type="text" class="form-control" name="nama_pic" placeholder="Nama PIC">
          </div>
          <div class="form-group">
            <label>Jabatan PIC</label>
            <input type="text" class="form-control" name="jabatan_pic" placeholder="Jabatan PIC">
          </div>
          <div class="form-group">
            <label>Email PIC</label>
            <input type="text" class="form-control" name="email_pic" placeholder="Email PIC">
          </div>
          <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-create-pic-close">Close</button>
        <button type="button" class="btn btn-primary" id="btn-create-pic">Create PIC</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addPicContactModal" tabindex="-1" role="dialog" aria-labelledby="addPicContactModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-pic-contact-create">
          <div class="form-group">
            <label>No Telp PIC</label>
            <input type="text" class="form-control" name="no_pic" placeholder="No Telp PIC" pattern="[0-9]">
          </div>
          <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']?>">
          <input type="hidden" name="id_pic" id="id_pic">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-create-pic-contact-close">Close</button>
        <button type="button" class="btn btn-primary" id="btn-create-pic-contact">Create Contact</button>
      </div>
    </div>
  </div>
</div>

<!-- <a href="<?php echo site_url('pic/create');?>">asdf</a> -->
<script type="text/javascript">
$(function () {
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
});

var list_layanan = get_list_layanan();
$("#nama_layanan").change(function(){
  if($(this).val()=="Lain-lain")
  {
    $("#list_layanan_box").css({
      'display' : 'block'
    });
    $("#list_layanan").empty();
    for(var i=0; i<list_layanan.length; i++)
    {
      $("#list_layanan").append("<option value='"+list_layanan[i]['nama_list']+"'>"+list_layanan[i]['nama_list']+"</option>")
    }
  }
  else
  {
    $("#list_layanan_box").css({
      'display' : 'none'
    });
  }
});

$("#list_layanan_id").change(function(){
  var found=false;
  var temp_id="0";
  for(var i=0; i<list_layanan.length; i++)
  {
    if($(this).val()==list_layanan[i]['nama_list'])
    {
      // found=true;
      temp_id=list_layanan[i]['id_list'];
      break;
    }
  }
  $("#id_list").val(temp_id);
  // if(found) alert(temp_id);
  // else alert(temp_id);
});

$("#currency").change(function(){
  if($(this).val()=="IDR")
  {
    $("#harga_layanan_box").css({
      'display' : 'none'
    });
  }
  else
  {
    $("#harga_layanan_box").css({
      'display' : 'block'
    });
  }
});

function get_list_layanan()
{
  var layanan = [];

  <?php
    foreach($list_layanan as $list):
      $id_list = $list['id_list'];
      $nama_list = $list['nama_list'];
      $insert = [
        'id_list'=>$id_list, 
        'nama_list'=>$nama_list
      ];
      $array = json_encode($insert);
      echo "layanan.push($array);";
    endforeach
  ?>
  return layanan;
}

$(document).ready(function(){

  fetch_data();
  fetch_layanan();
  
  set_id_to_nama_lokasi();

  function fetch_layanan()
  {
    $.ajax({
      url: "<?php echo site_url('pelanggan/get_layanan_pelanggan'); ?>",
      type: "POST",
      data: {"id_pelanggan":"<?php echo $pelanggan['id_pelanggan']; ?>"},
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $("#div-layanan").empty();
          var num=0;
          for(var i=0; i<data.layanan.length; i++)
          {
            if(data.layanan[i]['status']=="Active")
            {
              $("#div-layanan").append(
                "<tr>"+
                  "<th class='align-middle'>"+(++num)+"</th>"+
                  "<td class='align-middle' style='padding:0;'>"+
                      "<select name='nama_layanan' id='nama_layanan"+i+"' class='custom-select' required style='border: none; border-width: 0; box-shadow: none; width: 100%; line-height:3em; padding: 0; padding-left: 20px; text-align:center;'>"+
                        "<option value=''>- Select Layanan -</option>"+
                        "<option value='Internet' "+(data.layanan[i]['nama_layanan'] == 'Internet' ? 'selected' : '')+">Internet</option>"+
                        "<option value='Internet IIX' "+(data.layanan[i]['nama_layanan'] == 'Internet IIX' ? 'selected' : '')+">Internet IIX</option>"+
                        "<option value='Setup Instalasi' "+(data.layanan[i]['nama_layanan'] == 'Setup Instalasi' ? 'selected' : '')+">Setup Instalasi</option>"+
                        "<option value='Sewa Perangkat' "+(data.layanan[i]['nama_layanan'] == 'Sewa Perangkat' ? 'selected' : '')+">Sewa Perangkat</option>"+
                        "<option value='Lain-lain' "+(data.layanan[i]['nama_layanan'] == 'Lain-lain' ? 'selected' : '')+">Lain-lain</option>"+
                        "<option value='Penjualan Wireless' "+(data.layanan[i]['nama_layanan'] == 'Penjualan Wireless' ? 'selected' : '')+">Penjualan Wireless</option>"+
                      "</select>"+
                      "<div id='datalist-edit"+i+"'></div>"+
                  "</td>"+
                  //"<th class='align-middle'>"+data.layanan[i]['nama_layanan']+"</th>"+
                  "<th>"+
                  "<div class='input-group'>"+
                    "<div class='input-group-prepend'>"+
                      "<select name='currency' id='edit_currency"+i+"' class='custom-select'>"+
                        "<option value='IDR' "+(data.layanan[i]['currency'] == 'IDR' ? 'selected' : '')+">IDR</option>"+
                        "<option value='USD' "+(data.layanan[i]['currency'] == 'USD' ? 'selected' : '')+">USD</option>"+
                        "<option value='SGD' "+(data.layanan[i]['currency'] == 'SGD' ? 'selected' : '')+">SGD</option>"+
                      "</select>"+
                    "</div>"+
                    // "+new Intl.NumberFormat(['ban', 'id']).format(parseInt(data.layanan[i]['harga_layanan']))+"
                    "<input type='text' class='form-control' name='harga_layanan' id='edit_harga_layanan"+i+"' value='"+data.layanan[i]['harga_layanan']+"'>"+
                  "</div>"+
                  "<div id='edit_harga_layanan_rupiah_box"+i+"'></div>"+
                  "</th>"+
                  // "<th class='align-middle'>"+data.layanan[i]['currency']+" "+new Intl.NumberFormat(['ban', 'id']).format(parseInt(data.layanan[i]['harga_layanan']))+"</th>"+
                  "<th><a class='btn btn-danger' style='color: white;' id='btn_delete_layanan"+i+"'>Delete</a></th>"+
                "</tr>"
              );
              if(data.layanan[i]['nama_layanan'] == 'Lain-lain')
              {
                $("#datalist-edit"+i).append("<br><br><input type='text' class='form-group' list='list_layanan_edit"+i+"' nama='list_layanan' id='list_layanan_edit_id"+i+"' value='"+data.layanan[i]['nama_list']+"' style='border: none; border-width: 0; line-height:3em; box-shadow: none; width: 100%; padding-left: 20px; margin-top:-10px; text-align:center;'><datalist id='list_layanan_edit"+i+"'></datalist>");
                for(var j=0; j<data.list_layanan.length; j++)
                {
                  $("#list_layanan_edit"+i).append("<option value='"+data.list_layanan[j]['nama_list']+"'>"+data.list_layanan[j]['nama_list']+"<option>");
                }
              }

              if(data.layanan[i]['currency']!='IDR')
              {
                $("#edit_harga_layanan_rupiah_box"+i).append(
                  "<br><label>Rupiah</label>"+
                  "<input type='text' class='form-control' name='harga_layanan_rupiah' id='edit_harga_layanan_rupiah"+i+"' value='"+data.layanan[i]['harga_layanan_rupiah']+"'>"
                );
              }
              $("#nama_layanan"+i).change({index: i, id: data.layanan[i]["id_layanan"], list: data.list_layanan}, showInputEditLayanan);
              $("#datalist-edit"+i).change({index: i, id: data.layanan[i]["id_layanan"], list: data.list_layanan, nama_layanan: 'Lain-lain'}, editInputLayananLain);
              $("#edit_currency"+i).change({index: i, layanan: data.layanan[i]}, editCurrencyLayanan);
              $("#edit_harga_layanan"+i).change({index: i, layanan: data.layanan[i]}, editHargaLayanan);
              $("#edit_harga_layanan_rupiah"+i).change({index: i, layanan: data.layanan[i]}, editHargaLayananRupiah);
              $("#btn_delete_layanan"+i).click({index: i, layanan: data.layanan[i]}, deleteLayanan);
              // $("#add-button-pic-contact"+i).click({id: 1}, add_value_hidden_pic);
              // $("#delete_pic"+i).click({id: 1}, delete_pic);
              // $("#edit_pic"+i).click({id: 1, index: i}, show_edit_form_pic);
            }
          }
            
        }
        //console.log(data.layanan);
      },
      error: function(request, status, error)
      {
        console.log(request.responseText);
      }
    });
  }

  function deleteLayanan(event)
  {
    var i = event.data.index;
    var id = event.data.layanan['id_layanan'];
    $.ajax({
      url: "<?php echo site_url('pelanggan/delete_layanan'); ?>",
      type: 'POST',
      dataType: 'json',
      data: {id: id},
      success: function(data)
      {
        // console.log(data);
        if(data.status)
        {
          fetch_layanan();
        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
  }

  function editHargaLayananRupiah(event)
  {
    var i = event.data.index;
    var value = $("#edit_harga_layanan"+i).val();
    var value_rupiah = $("#edit_harga_layanan_rupiah"+i).val();
    var currency = $("#edit_currency"+i).val();
    var id = event.data.layanan['id_layanan'];

    $.ajax({
      url: "<?php echo site_url('pelanggan/edit_harga_layanan_dollar'); ?>",
      type: 'POST',
      dataType: 'json',
      data: {value: value, id: id, currency: currency, value_rupiah: value_rupiah},
      success: function(data)
      {
        // console.log(data);
        if(data.status)
        {
          fetch_layanan();
        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
  }

  function editHargaLayanan(event)
  {
    var i = event.data.index;
    var value = $("#edit_harga_layanan"+i).val();
    var currency = $("#edit_currency"+i).val();
    var id = event.data.layanan['id_layanan'];
    //if confirmation yes
    if(currency=="IDR")
    {
      $.ajax({
        url: "<?php echo site_url('pelanggan/edit_harga_layanan_rupiah'); ?>",
        type: 'POST',
        dataType: 'json',
        data: {value: value, id: id, currency: currency},
        success: function(data)
        {
          // console.log(data);
          if(data.status)
          {
            fetch_layanan();
          }
        },
        error: function (request, status, error) {
          console.log(request.responseText);
        }
      });
    }
    else
    {
      if($("#edit_harga_layanan_rupiah"+i).val()!="")
      {
        var value_rupiah = $("#edit_harga_layanan_rupiah"+i).val();
        $.ajax({
          url: "<?php echo site_url('pelanggan/edit_harga_layanan_dollar'); ?>",
          type: 'POST',
          dataType: 'json',
          data: {value: value, id: id, currency: currency, value_rupiah: value_rupiah},
          success: function(data)
          {
            // console.log(data);
            if(data.status)
            {
              fetch_layanan();
            }
          },
          error: function (request, status, error) {
            console.log(request.responseText);
          }
        });
      }
    }

  }

  function editCurrencyLayanan(event)
  {
    var i = event.data.index;
    var value = $("#edit_currency"+i).val();
    var id = event.data.layanan['id_layanan'];
    var temp = event.data.layanan['harga_layanan_rupiah'];

    if(value!="IDR")
    {
      $("#edit_harga_layanan_rupiah_box"+i).empty();
      $("#edit_harga_layanan_rupiah_box"+i).append(
        "<br><label>Rupiah</label>"+
        "<input type='text' class='form-control' name='harga_layanan_rupiah' id='edit_harga_layanan_rupiah"+i+"' "+(event.data.layanan['currency'] == value ? 'value='+temp : '')+">"
      );
    }
    else
    {
      $("#edit_harga_layanan_rupiah_box"+i).empty();
    }
  }

  function editInputLayananLain(event)
  {
    var i = event.data.index;
    var nama_layanan = event.data.nama_layanan;
    var value = $("#list_layanan_edit_id"+i).val();
    var id = event.data.id;
    var list = event.data.list;
    var list_id = "0";
    var found = false;
    for(var x=0; x<list.length; x++)
    {
      if(value==list[x]['nama_list'])
      {
        list_id=list[x]['id_list'];
        found=true;
      }
    }
    $.ajax({
      url: "<?php echo site_url('pelanggan/edit_nama_layanan_lain'); ?>",
      type: 'POST',
      dataType: 'json',
      data: {value: value, id: id, id_list: list_id, nama_layanan: nama_layanan},
      success: function(data)
      {
        // console.log(data);
        if(data.status)
        {
          fetch_layanan();
        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
    
    // console.log(event.data);
  }

  function showInputEditLayanan(event){
    var i = event.data.index;
    var value = $("#nama_layanan"+i).val();
    var id = event.data.id;
    var list = event.data.list;
    // console.log(value);
    if(value=="Lain-lain")
    {
      // console.log("$datalist-edit"+event.data.index);
      $("#datalist-edit"+i).append("<br><br><input type='text' class='form-group' list='list_layanan_edit"+i+"' nama='list_layanan' id='list_layanan_edit_id"+i+"' style='border: none; border-width: 0; line-height:3em; box-shadow: none; width: 100%; padding-left: 20px; margin-top:-10px; text-align:center;'><datalist id='list_layanan_edit"+i+"'></datalist>");
      for(var j=0; j<list.length; j++)
      {
        $("#list_layanan_edit"+i).append("<option value='"+list[j]['nama_list']+"'>"+list[j]['nama_list']+"<option>");
      }
      // console.log("Temp");
    }
    else
    {
      //if(confirmation==yes)
      $("#datalist-edit"+i).empty();
      $.ajax({
        url: "<?php echo site_url('pelanggan/edit_nama_layanan'); ?>",
        type: 'POST',
        dataType: 'json',
        data: {value: value, id: id},
        success: function(data)
        {
         // console.log(data);
          if(data.status)
          {
            fetch_layanan();
          }
        },
        error: function (request, status, error) {
          console.log(request.responseText);
        }
      });
      //else fetch_layanan();
    }
  }

  $('#btn-create-layanan').on('click', function(){
    $.ajax({
      url: "<?php echo site_url('pelanggan/create_layanan'); ?>",
      type: "POST",
      data: $('#form-layanan-create').serialize(),
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $("#harga_layanan_box").css({
            'display' : 'none'
          });
          $("#list_layanan_box").css({
            'display' : 'none'
          });
          $('#btn-create-layanan-close').click();
          $('#form-layanan-create')[0].reset();
          $('#layanan-alert-place').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> Layanan created successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          setTimeout(function() { $(".close").click(); }, 3000);
          //alert('Record created');
          fetch_layanan();
        }
        else
        {
          //alert('gagal');
        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
    //alert('ok');
  });

  function fetch_data()
  {
    $.ajax({
      url: "<?php echo site_url('pic/getPicById'); ?>",
      type: "POST",
      data: {"id_pelanggan":"<?php echo $pelanggan['id_pelanggan']; ?>"},
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $( "#div-pic" ).empty();
          for (var i = 0; i < data.pics.length; i++) 
          {
            $("#div-pic").append(
              "<div class='row'>"+
                "<div class='col'>"+
                  "<div id='pic-text"+i+"' style='display: block;'>"+
                    "<span class='align-middle'>PIC : "+data.pics[i]['nama_pic']+" - "+data.pics[i]['jabatan_pic']+" - "+data.pics[i]['email_pic']+"</span>"+
                  "</div>"+
                  "<div id='pic-edit-form"+i+"' style='display: none;'>"+
                    "<form id='form-edit_pic"+i+"'>"+
                      "<div class='form-row'>"+
                        "<div class='form-group col-md-6'>"+
                          "<label for='edit-name'>Name</label>"+
                          "<input type='text' class='form-control' name='edit-name' id='edit-name' placeholder='Name' value='"+data.pics[i]['nama_pic']+"'>"+
                        "</div>"+
                        "<div class='form-group col-md-6'>"+
                          "<label for=edit-jabatan>Jabatan</label>"+
                          "<input type='text' class='form-control' name='edit-jabatan' id='edit-jabatan' placeholder='Jabatan' value='"+data.pics[i]['jabatan_pic']+"'>"+
                        "</div>"+
                        "<div class='form-group col-md-6'>"+
                          "<label for=edit-jabatan>Email</label>"+
                          "<input type='text' class='form-control' name='edit-email' id='edit-email' placeholder='Email' value='"+data.pics[i]['email_pic']+"'>"+
                        "</div>"+
                        // "<div class='form-group col-md-6'>"+
                        //   "<label for=edit-jabatan>Jabatan</label>"+
                        //   "<input type='text' class='form-control' name='edit-email' id='edit-email' placeholder='Email' value='"+data.pics[i]['email_pic']+"'>"+
                        // "</div>"+
                      "</div>"+
                      "<input type='hidden' name='id_pic_edit' id='id_pic_edit'>"+
                    "</form>"+
                  "</div>"+
                "</div>"+
                "<div class='col'>"+
                  "<button type='button' class='btn btn-danger btn-sm float-right' id='delete_pic"+i+"'>Delete PIC</button>"+
                  "<button type='button' class='btn btn-warning btn-sm float-right' id='edit_pic"+i+"' value='edit-pic'>Update PIC</button>"+
                  "<button type='button' class='btn btn-primary btn-sm float-right' data-toggle='modal' data-target='#addPicContactModal' id='add-button-pic-contact"+i+"'>Add Contact</button>"+
                "</div>"+
              "</div>"
            );

            $("#add-button-pic-contact"+i).click({id: data.pics[i]['id_pic']}, add_value_hidden_pic);
            $("#delete_pic"+i).click({id: data.pics[i]['id_pic']}, delete_pic);
            $("#edit_pic"+i).click({id: data.pics[i]['id_pic'], index: i}, show_edit_form_pic);

            $("#div-pic").append(
              "<table class='table table-bordered text-center'>"+
                "<thead class='thead-light'>"+
                  "<tr>"+
                    "<th style='width: 10%;' scope='col'>No</th>"+
                    "<th style='width: 65%;' scope='col'>Contact Number</th>"+
                    "<th style='width: 25%;' scope='col'>Action</th>"+
                  "</tr>"+
                "</thead>"+
                "<tbody id='tbody"+i+"'>"
            );

            var num=0;
            for (var j = 0; j < data.contact.length; j++)
            {
              if(data.pics[i]['id_pic']==data.contact[j]['id_pic'])
              {
                $("#tbody"+i).append(
                  "<tr>"+
                    "<th class='align-middle' scope='row'>"+(++num)+"</th>"+
                    "<td class='align-middle' style='padding:0;'>"+
                      "<form id='edit_contact' style='margin:0;'>"+
                        "<input type='text' name='no_pic' id='edit_contact_id"+j+"' placeholder='No Telp PIC' pattern='[0-9]' style='border: none; border-width: 0; box-shadow: none; width: 100%; line-height:3em; padding: 0; text-align:center;' value='"+data.contact[j]['no_pic']+"'>"+
                      "</form>"+
                    "</td>"+
                    "<td>"+
                      "<button class='btn btn-danger' id='delete_contact"+j+"' value='"+data.contact[j]['id']+"'>Delete</button>"+
                    "</td>"+
                  "</tr>"
                );

                $("#delete_contact"+j).click({id: data.contact[j]['id']}, delete_contact);
                $("#edit_contact_id"+j).change({id: data.contact[j]['id'], el_id: $("#edit_contact_id"+j)}, edit_contact);
              }
            }

            $("#div-pic").append(
                "</tbody>"+
              "</table>"
            );
            //$("#div-pic").append("<div><p>Nama PIC : "+data.pics[i]['nama_pic']+"</p><p>Jabatan PIC : "+data.pics[i]['jabatan_pic']+"</p></div>");
          }
        }
      },
      error: function(request, status, error)
      {
        console.log(request.responseText);
      }
    });
  }

  function set_id_to_nama_lokasi()
  {
    var id_pelanggan = <?php echo $pelanggan['id_pelanggan']; ?>;
    $.ajax({
      url: "<?php echo site_url('pelanggan/getname'); ?>",
      type: "POST",
      data: {"id":id_pelanggan},
      dataType: 'json',
      success: function(data)
      {
        //console.log(data);
        if(data.status)
        {
          $("#alamat-pelanggan").empty();
          if(data.alamat_pelanggan0 == "0") $("#alamat-pelanggan").append("");
          else $("#alamat-pelanggan").append("<p>"+data.alamat_pelanggan0+"</p>");
          if(data.alamat_pelanggan1 == "0") $("#alamat-pelanggan").append("");
          else $("#alamat-pelanggan").append("<p>"+data.alamat_pelanggan1+"</p>");

          if(data.kelurahan!=null && data.kecamatan!=null) $("#alamat-pelanggan").append("<p>"+data.kelurahan['nama']+" - "+data.kecamatan['nama']+"</p>");
          else if(data.kelurahan!=null) $("#alamat-pelanggan").append("<p>"+data.kelurahan['nama']+"</p>");
          else if(data.kecamatan!=null) $("#alamat-pelanggan").append("<p>"+data.kecamatan['nama']+"</p>");
          else $("#alamat-pelanggan").append("");

          if(data.kabupaten!=null) $("#alamat-pelanggan").append("<p>"+data.kabupaten['nama']+"</p>");
          else $("#alamat-pelanggan").append("");

          if(data.provinsi!=null) $("#alamat-pelanggan").append("<p>"+data.provinsi['nama']+"</p>");
          else $("#alamat-pelanggan").append("");

          $("#lokasi-penagihan").empty();
          if(data.lokasi_penagihan0 == "0") $("#lokasi-penagihan").append("");
          else $("#lokasi-penagihan").append("<p>"+data.lokasi_penagihan0+"</p>");
          if(data.lokasi_penagihan1 == "0") $("#lokasi-penagihan").append("");
          else $("#lokasi-penagihan").append("<p>"+data.lokasi_penagihan1+"</p>");

          if(data.kelurahan_lok!=null && data.kecamatan_lok!=null) $("#lokasi-penagihan").append("<p>"+data.kelurahan_lok['nama']+" - "+data.kecamatan_lok['nama']+"</p>");
          else if(data.kelurahan_lok!=null) $("#lokasi-penagihan").append("<p>"+data.kelurahan_lok['nama']+"</p>");
          else if(data.kecamatan_lok!=null) $("#lokasi-penagihan").append("<p>"+data.kecamatan_lok['nama']+"</p>");
          else $("#lokasi-penagihan").append("");

          if(data.kabupaten_lok!=null) $("#lokasi-penagihan").append("<p>"+data.kabupaten_lok['nama']+"</p>");
          else $("#lokasi-penagihan").append("");

          if(data.provinsi_lok!=null) $("#lokasi-penagihan").append("<p>"+data.provinsi_lok['nama']+"</p>");
          else $("#lokasi-penagihan").append("");
        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
  }

  $("#provinsi").change(function (){
    $.ajax({
      url: "<?php echo site_url('pelanggan/change_provinsi'); ?>",
      type: "POST",
      data: {"id_prov":$(this).val()},
      dataType: 'json',
      success: function(data)
      {
        $("#kabupaten").empty();
        $("#kabupaten").append(data.kabupaten);
        $("#kecamatan").empty();
        $("#kecamatan").append(data.kecamatan);
        $("#kelurahan").empty();
        $("#kelurahan").append(data.kelurahan);
      },
      error: function (request, status, error) 
      {
        console.log(request.responseText);
      }
    });
  });

  $("#kabupaten").change(function (){
    $.ajax({
      url: "<?php echo site_url('pelanggan/change_kabupaten'); ?>",
      type: "POST",
      data: {"id_kab":$(this).val()},
      dataType: 'json',
      success: function(data)
      {
        $("#kecamatan").empty();
        $("#kecamatan").append(data.kecamatan);
        $("#kelurahan").empty();
        $("#kelurahan").append(data.kelurahan);
      },
      error: function (request, status, error) 
      {
        console.log(request.responseText);
      }
    });
  });

  $("#kecamatan").change(function (){
    $.ajax({
      url: "<?php echo site_url('pelanggan/change_kecamatan'); ?>",
      type: "POST",
      data: {"id_kec":$(this).val()},
      dataType: 'json',
      success: function(data)
      {
        $("#kelurahan").empty();
        $("#kelurahan").append(data.kelurahan);
      },
      error: function (request, status, error) 
      {
        console.log(request.responseText);
      }
    });
  });

  $("#provinsi_penagih").change(function (){
    $.ajax({
      url: "<?php echo site_url('pelanggan/change_provinsi'); ?>",
      type: "POST",
      data: {"id_prov":$(this).val()},
      dataType: 'json',
      success: function(data)
      {
        $("#kabupaten_penagih").empty();
        $("#kabupaten_penagih").append(data.kabupaten);
        $("#kecamatan_penagih").empty();
        $("#kecamatan_penagih").append(data.kecamatan);
        $("#kelurahan_penagih").empty();
        $("#kelurahan_penagih").append(data.kelurahan);
      },
      error: function (request, status, error) 
      {
        console.log(request.responseText);
      }
    });
  });

  $("#kabupaten_penagih").change(function (){
    $.ajax({
      url: "<?php echo site_url('pelanggan/change_kabupaten'); ?>",
      type: "POST",
      data: {"id_kab":$(this).val()},
      dataType: 'json',
      success: function(data)
      {
        $("#kecamatan_penagih").empty();
        $("#kecamatan_penagih").append(data.kecamatan);
        $("#kelurahan_penagih").empty();
        $("#kelurahan_penagih").append(data.kelurahan);
      },
      error: function (request, status, error) 
      {
        console.log(request.responseText);
      }
    });
  });

  $("#kecamatan_penagih").change(function (){
    $.ajax({
      url: "<?php echo site_url('pelanggan/change_kecamatan'); ?>",
      type: "POST",
      data: {"id_kec":$(this).val()},
      dataType: 'json',
      success: function(data)
      {
        $("#kelurahan_penagih").empty();
        $("#kelurahan_penagih").append(data.kelurahan);
      },
      error: function (request, status, error) 
      {
        console.log(request.responseText);
      }
    });
  });

  function edit_alamat_lengkap_pelanggan()
  {
    <?php 
      $alamat_pelanggan = explode("|", $pelanggan['alamat_pelanggan']);
      $alamat = explode(" - ", $alamat_pelanggan[2]);
    ?>
    var id_prov=<?php echo $alamat_pelanggan[4]; ?>;
    var id_kab=<?php echo $alamat_pelanggan[3]; ?>;
    var id_kec=<?php echo $alamat[1]; ?>;
    var id_kel=<?php echo $alamat[0]; ?>;

    $.ajax({
      url: "<?php echo site_url('pelanggan/fetchdata'); ?>",
      type: "POST",
      data: {"id_prov":id_prov, "id_kab":id_kab, "id_kec":id_kec, "id_kel":id_kel},
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          //console.log(data);
          $("#provinsi").empty();
          $("#provinsi").append(data.provinsi);
          $("#kabupaten").empty();
          $("#kabupaten").append(data.kabupaten);
          $("#kecamatan").empty();
          $("#kecamatan").append(data.kecamatan);
          $("#kelurahan").empty();
          $("#kelurahan").append(data.kelurahan);
          $("#alamat_pelanggan1").val("<?php echo $alamat_pelanggan[1]; ?>");
          var alamat2 = "<?php echo $alamat_pelanggan[0]; ?>";
          if(alamat2 == "0") $("#alamat_pelanggan2").val("");
          else $("#alamat_pelanggan2").val(alamat2);
        }
        else
        {

        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
  }

  function edit_lokasi_penagihan()
  {
    <?php 
      $lokasi_penagihan = explode("|", $pelanggan['lokasi_penagihan']);
      $lokasi = explode(" - ", $lokasi_penagihan[2]);
    ?>
    var id_prov=<?php echo $lokasi_penagihan[4]; ?>;
    var id_kab=<?php echo $lokasi_penagihan[3]; ?>;
    var id_kec=<?php echo $lokasi[1]; ?>;
    var id_kel=<?php echo $lokasi[0]; ?>;

    $.ajax({
      url: "<?php echo site_url('pelanggan/fetchdata'); ?>",
      type: "POST",
      data: {"id_prov":id_prov, "id_kab":id_kab, "id_kec":id_kec, "id_kel":id_kel},
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          //console.log(data);
          $("#provinsi_penagih").empty();
          $("#provinsi_penagih").append(data.provinsi);
          $("#kabupaten_penagih").empty();
          $("#kabupaten_penagih").append(data.kabupaten);
          $("#kecamatan_penagih").empty();
          $("#kecamatan_penagih").append(data.kecamatan);
          $("#kelurahan_penagih").empty();
          $("#kelurahan_penagih").append(data.kelurahan);
          $("#alamat_penagih1").val("<?php echo $lokasi_penagihan[1]; ?>");
          var alamat2 = "<?php echo $lokasi_penagihan[0]; ?>";
          if(alamat2 == "0") $("#alamat_penagih2").val("");
          else $("#alamat_penagih2").val(alamat2);
        }
        else
        {

        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
  }

  function show_edit_form_pic(event){
    if($("#edit_pic"+event.data.index).val()=='edit-pic')
    {
      $("#pic-edit-form"+event.data.index).css('display', 'block');
      $("#pic-text"+event.data.index).css('display', 'none');
      $("#edit_pic"+event.data.index).val('done-edit-pic').text('Done Update PIC').removeClass('btn-warning').addClass('btn-info');
      $("#id_pic_edit").val(event.data.id);
      //alert('edit');
    }
    else if($("#edit_pic"+event.data.index).val()=='done-edit-pic')
    {
      $.ajax({
        url: "<?php echo site_url('pic/edit'); ?>",
        type: "POST",
        data: $('#form-edit_pic'+event.data.index).serialize(),
        dataType: 'json',
        success: function(data)
        {
          if(data.status)
          {
            $("#pic-edit-form"+event.data.index).css('display', 'none');
            $("#pic-text"+event.data.index).css('display', 'block');
            $("#edit_pic"+event.data.index).val('edit-pic').text('Update PIC').removeClass('btn-info').addClass('btn-warning');
            $("#id_pic_edit"+event.data.index).removeAttr('value');
            $('#alert-place').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> PIC updated successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            setTimeout(function() { $(".close").click(); }, 3000);
            //alert('Record created');
            fetch_data();
          }
          else
          {
            //alert('gagal');
          }
        },
        error: function (request, status, error) {
          console.log(request.responseText);
        }
      });
      
      $("#pic-edit-form"+event.data.index).css('display', 'none');
      $("#pic-text"+event.data.index).css('display', 'block');
      $("#edit_pic"+event.data.index).val('edit-pic').text('Update PIC').removeClass('btn-info').addClass('btn-warning');
      $("#id_pic_edit"+event.data.index).removeAttr('value');
      //alert('done');
    }
  }

  function add_value_hidden_pic(event){
    $("#id_pic").val(event.data.id);
  }

  function edit_contact(event)
  {
    $.ajax({
      url: "<?php echo site_url('pic/edit_contact'); ?>",
      type: "POST",
      data: {"id":event.data.id, "value":event.data.el_id.val()},
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $('#alert-place').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> Contact updated successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          setTimeout(function() { $(".close").click(); }, 3000);
          //alert('Record created');
          fetch_data();
        }
        else
        {
          //alert('gagal');
        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
    //console.log('edited to '+event.data.el_id.val());
  }

  function delete_contact(event)
  {
    $.ajax({
      url: "<?php echo site_url('pic/delete_contact'); ?>",
      type: "POST",
      data: {"id":event.data.id},
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $('#alert-place').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> Contact deleted successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          setTimeout(function() { $(".close").click(); }, 3000);
          //alert('Record created');
          fetch_data();
        }
        else
        {
          //alert('gagal');
        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
  }

  function delete_pic(event)
  {
    $.ajax({
      url: "<?php echo site_url('pic/delete'); ?>",
      type: "POST",
      data: {"id":event.data.id},
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $('#alert-place').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> PIC deleted successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          setTimeout(function() { $(".close").click(); }, 3000);
          //alert('Record created');
          fetch_data();
        }
        else
        {
          //alert('gagal');
        }
      },
      error: function (request, status, error) {
        alert(request.responseText);
      }
    });
  }

  $('#btn-save-edit-alamat-pelanggan').on('click', function(){
    $.ajax({
      url: "<?php echo site_url('pelanggan/edit_alamat_pelanggan')?>",
      type: "POST",
      data: $('#form-edit-alamat-pelanggan').serialize(),
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $('#btn-exit-edit-alamat-pelanggan').click();
          $('#form-edit-alamat-pelanggan')[0].reset();
          // $('#alert-place').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> Contact created successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          // setTimeout(function() { $(".close").click(); }, 3000);
          set_id_to_nama_lokasi();
        }
      },
      error: function (request, status, error) {
        alert(request.responseText);
      }
    });
  });

  $('#btn-save-edit-lokasi-penagihan').on('click', function(){
    $.ajax({
      url: "<?php echo site_url('pelanggan/edit_lokasi_penagihan')?>",
      type: "POST",
      data: $('#form-edit-lokasi-penagihan').serialize(),
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $('#btn-exit-edit-lokasi-penagihan').click();
          $('#form-edit-lokasi-penagihan')[0].reset();
          // $('#alert-place').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> Contact created successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          // setTimeout(function() { $(".close").click(); }, 3000);
          set_id_to_nama_lokasi();
        }
      },
      error: function (request, status, error) {
        alert(request.responseText);
      }
    });
  });

  $('#btn-create-pic-contact').on('click', function(){
    $.ajax({
      url: "<?php echo site_url('pic/create_contact'); ?>",
      type: "POST",
      data: $('#form-pic-contact-create').serialize(),
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $('#btn-create-pic-contact-close').click();
          $('#form-pic-contact-create')[0].reset();
          $('#alert-place').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> Contact created successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          setTimeout(function() { $(".close").click(); }, 3000);
          //alert('Record created');
          fetch_data();
        }
        else
        {
          //alert('gagal');
        }
      },
      error: function (request, status, error) {
        alert(request.responseText);
      }
    });
  });

  $('#btn-edit-alamat-pelanggan').click(function() {
    edit_alamat_lengkap_pelanggan();
  });

  $('#btn-edit-lokasi-penagihan').click(function() {
    edit_lokasi_penagihan();
  });

  $('#btn-create-pic-contact-close').click(function() {
    $('#id_pic').removeAttr('value');
  });

  $('#btn-create-pic').on('click', function(){
    $.ajax({
      url: "<?php echo site_url('pic/create'); ?>",
      type: "POST",
      data: $('#form-pic-create').serialize(),
      dataType: 'json',
      success: function(data)
      {
        if(data.status)
        {
          $('#btn-create-pic-close').click();
          $('#form-pic-create')[0].reset();
          $('#alert-place').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> PIC created successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          setTimeout(function() { $(".close").click(); }, 3000);
          //alert('Record created');
          fetch_data();
        }
        else
        {
          //alert('gagal');
        }
      },
      error: function (request, status, error) {
        console.log(request.responseText);
      }
    });
    //alert('ok');
  });
});
</script>