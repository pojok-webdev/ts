
<div class="container">
	<h2><?= $title ?></h2>
	<div class="row">
		<div class="col-1">
			<br>
			<?php if($this->session->userdata('user')['jabatan']=='A' || $this->session->userdata('user')['jabatan']=='B') { ?>
				<a class="btn btn-primary" href="<?php echo site_url('/pelanggan/create'); ?>">Create</a>
			<?php } ?>
		</div>
		<div class="col-2">
			<div class="form-group">
				<label for="sort">Sort By</label>
				<select class="form-control" id="sort" name="sort">
					<option value="0">- Sort By -</option>
					<option value="nama_pelanggan">Nama Pelanggan</option>
					<option value="tipe_pelanggan">Kategori Pelanggan</option>
				</select>
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				<label for="cabang">Filter Cabang</label>
				<select class="form-control" id="cabang" name="cabang">
					<option value="0">- Select Cabang -</option>
					<option value="Jakarta">Jakarta</option>
					<option value="Surabaya">Surabaya</option>
    				<option value="Malang">Malang</option>
    				<option value="Bali">Bali</option>
				</select>
			</div>
		</div>
		<!-- <div class="col-2">
			<div class="form-group">
				<label for="prov">Filter Provinsi</label>
				<select class="form-control" id="prov" name="prov">
					<option value="0">- Provinsi -</option>
					<?php
			          	foreach ($provinsi as $prov) 
			          	{
		            		echo "<option value='".$prov['id']."'>".$prov['nama']."</option>";
			          	}
			        ?>
				</select>
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				<label for="kab">Filter Kabupaten</label>
				<select class="form-control" id="kab" name="kab">
					<option value="">- Kabupate -</option>
				</select>
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				<label for="kec">Filter Kecamatan</label>
				<select class="form-control" id="kec" name="kec">
					<option value="">- Kecamatan -</option>
				</select>
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				<label for="kel">Filter Kelurahan</label>
				<select class="form-control" id="kel" name="kel">
					<option value="">- Kelurahan -</option>
				</select>
			</div>
		</div> -->
		<div class="col-1">
			<br>
			<a class="btn btn-primary" id='btn-reset' style="color: white;">Reset</a>
		</div>
		<!-- <div class="col-3">
			<div class="form-group">
				<label for="min">Min</label>
				<input type="date" class="form-control" name="min" id='min' ng-model="formData.date">
			</div>
		</div>
		<div class="col-3">
			<div class="form-group">
				<label for="max">Max</label>
				<input type="date" class="form-control" name="max" id='max' ng-model="formData.date">
			</div>
		</div> -->
	</div>
	<!-- <?php print_r($pelanggans); ?> -->

	<table class="table table-hover text-center">
	  	<thead>
	    	<tr>
	      		<th scope="col">Nama Pelanggan</th>
	      		<th scope="col">Kategori Pelanggan</th>
	      		<th scope="col">Action</th>
	    	</tr>
	  	</thead>
	  	<tbody id='tbody'>
	  		<?php foreach($pelanggans as $pelanggan) : ?>
	  			<?php if($pelanggan->active == '1') { ?>
		    	<tr class="table-secondary">
		      	<th scope="row"><?php echo $pelanggan->name; ?></th>
		      		<td><?php echo $pelanggan->alias; ?></td>
		      		<td>
			      		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
					    <div class="dropdown-menu">
					      	<a class="dropdown-item" href="<?php echo site_url('/pelanggan/'.$pelanggan->id); ?>">Detail</a>
						</div>
		      		</td>
		    	</tr>
		    	<?php } ?>
	    	<?php endforeach; ?>
	  	</tbody>
	</table>
</div>
<script type="text/javascript">
	var list = [];
	$("#btn-reset").click(function(){
		// $("#prov").val(0);
		// $("#kab").val(0);
		// $("#kec").val(0);
		// $("#kel").val(0);
		$("#cabang").val(0);
		$("#sort").val(0);
		sort();
		// filter(0, 0, 0, 0);
	});
	// $("#prov").change(function (){
 //    	var url = "<?php echo site_url('pelanggan/add_ajax_kab');?>/"+$(this).val();
 //    	$('#kab').load(url);
 //    	filter($("#prov").val(), 0, 0, 0);
 //    	return false;
 // 	});
 //  	$("#kab").change(function (){
 //    	var url = "<?php echo site_url('pelanggan/add_ajax_kec');?>/"+$(this).val();
 //    	$('#kec').load(url);
 //    	filter($("#prov").val(), $("#kab").val(), 0, 0);
 //    	return false;
 //  	});
 //  	$("#kec").change(function (){
 //    	var url = "<?php echo site_url('pelanggan/add_ajax_kel');?>/"+$(this).val();
 //    	$('#kel').load(url);
 //    	filter($("#prov").val(), $("#kab").val(), $("#kec").val(), 0);
 //    	return false;
 //  	});
 //  	$("#kel").change(function (){
 //  		filter($("#prov").val(), $("#kab").val(), $("#kec").val(), $("#kel").val());
 //  	});

 //  	function filter(a, b, c, d) 
 //  	{
 //  		var pelanggan = [];
	// 	<?php
	// 		foreach ($pelanggans as $pelanggan):
	// 			$array = json_encode($pelanggan);
	// 			echo "pelanggan.push($array);";
	// 		endforeach
	// 	?>
 //  		$.ajax({
 //  			url: '<?php echo site_url('pelanggan/filter'); ?>',
 //  			type: 'POST',
 //  			dataType: 'json',
 //  			data: {a: a, b: b, c: c, d: d, pelanggan: pelanggan},
	// 		success: function(result)
 //      		{
 //      			//console.log(result);
	//         	if(result)
	//         	{
	//         		list = result;
	//         		if($("#sort").val()!=0)
	//         		{
	//         			sort();
	//         		}
	//         		print(result);
	//         	}
 //      		},
 //      		error: function (request, status, error) {
 //        		console.log(request.responseText);
 //      		}
 //  		})
 //  	}

 	$('#cabang').change(function(){
 		sort();
 	});

	$('#sort').change(function()
	{
		sort();
	});

  // 	function sort()
  // 	{
  // 		var val = $("#sort").val();
		// var pelanggan = [];
		// if($("#prov").val()!=0)
		// {
		// 	pelanggan = list;
		// }
		// else
		// {
		// 	<?php
		// 		foreach($pelanggans as $pelanggan):
		// 			$nama_pelanggan = $pelanggan['nama_pelanggan'];
		// 			$tipe_pelanggan = $pelanggan['tipe_pelanggan'];
		// 			$id_pelanggan = $pelanggan['id_pelanggan'];
		// 			$insert = [
		// 				'nama_pelanggan'=>$nama_pelanggan,
		// 				'tipe_pelanggan'=>$tipe_pelanggan,
		// 				'id_pelanggan'=>$id_pelanggan
		// 			];
		// 			$array = json_encode($insert);
		// 			echo "pelanggan.push($array);";
		// 		endforeach
		// 	?>
		// }
		// if(val=='nama_pelanggan')
		// {
		// 	pelanggan.sort(function(a,b){
		// 		var A = a['nama_pelanggan'].toUpperCase();
		// 		var B = b['nama_pelanggan'].toUpperCase();
		// 		if (A < B) return -1;
		// 		if (A > B) return 1;
		// 		return 0;
		// 	});
		// 	// console.log(pelanggan);
		// }
		// else if(val == 'tipe_pelanggan')
		// {
		// 	pelanggan.sort(function(a,b){
		// 		var A = a['tipe_pelanggan'].toUpperCase();
		// 		var B = b['tipe_pelanggan'].toUpperCase();
		// 		if (A < B) return -1;
		// 		if (A > B) return 1;
		// 		return 0;
		// 	});
		// 	// console.log(pelanggan);
		// }
		// print(pelanggan);
  // 	}

	function sort()
  	{
  		var val = $("#sort").val();
  		var cabang = $("#cabang").val();
		var pelanggan = [];
		<?php
			foreach($pelanggans as $pelanggan):
				if($pelanggan['status']=="Active")
				{
					$nama_pelanggan = $pelanggan['nama_pelanggan'];
					$tipe_pelanggan = $pelanggan['tipe_pelanggan'];
					$id_pelanggan = $pelanggan['id_pelanggan'];
					$cabang = $pelanggan['cabang'];
					$insert = [
						'nama_pelanggan'=>$nama_pelanggan,
						'tipe_pelanggan'=>$tipe_pelanggan,
						'id_pelanggan'=>$id_pelanggan,
						'cabang'=>$cabang
					];
					$array = json_encode($insert);
					echo "pelanggan.push($array);";
				}
			endforeach
		?>
		
		if(cabang!=0)
		{
			var temp = [];
			for (var i = 0; i < pelanggan.length; i++) 
			{
				if(pelanggan[i]['cabang']==cabang)
				{
					temp.push(pelanggan[i]);
				}
			}
			pelanggan = temp;
		}
		
		if(val=='nama_pelanggan')
		{
			pelanggan.sort(function(a,b){
				var A = a['nama_pelanggan'].toUpperCase();
				var B = b['nama_pelanggan'].toUpperCase();
				if (A < B) return -1;
				if (A > B) return 1;
				return 0;
			});
			// console.log(pelanggan);
		}
		else if(val == 'tipe_pelanggan')
		{
			pelanggan.sort(function(a,b){
				var A = a['tipe_pelanggan'].toUpperCase();
				var B = b['tipe_pelanggan'].toUpperCase();
				if (A < B) return -1;
				if (A > B) return 1;
				return 0;
			});
			// console.log(pelanggan);
		}
		print(pelanggan);
  	}

	function print(pelanggan)
	{
		$("#tbody").empty();
		
		for (var i = 0; i < pelanggan.length; i++)
		{
			$("#tbody").append(
				"<tr class='table-secondary'>"+
		      		"<th scope='row'>"+pelanggan[i]['nama_pelanggan']+"</th>"+
		      		"<td>"+pelanggan[i]['tipe_pelanggan']+"</td>"+
		      		"<td>"+
			      		"<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Action</button>"+
					    "<div class='dropdown-menu'>"+
					      	"<a class='dropdown-item' href='pelanggan/"+pelanggan[i]['id_pelanggan']+"'>Detail</a>"+
					      	"<?php if($this->session->userdata('user')['jabatan']=='A') { ?>"+
					      	"<a class='dropdown-item' href='pelanggan/edit/"+pelanggan[i]['id_pelanggan']+"'>Edit</a>"+
					      	"<a class='dropdown-item' href='pelanggan/delete/"+pelanggan[i]['id_pelanggan']+"'>Delete</a>"+
					      	"<?php }?>"+
					    "</div>"+
		      		"</td>"+
		    	"</tr>"
			);
		}
	}
</script>