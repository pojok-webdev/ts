<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/combobox.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php $tempKredit= 0 ;?><?php $tempDebit= 0 ;?>
<br>
<div class="container text-center">    
  <div>
    <div>
      	<h3>History piutang</h3>
      	<br>
      	<?php 
      		if($this->session->userdata('user')['jabatan']=='A' || $this->session->userdata('user')['jabatan']=='B') 
  			{ 
  				if($this->session->userdata('user')['jabatan']=='A') { ?>
  				<a class="btn btn-primary" href="<?php echo site_url('invoice/create/'.$pelanggan['id_pelanggan']); ?>">Create Tagihan</a>
  				<?php } ?>
  				<a class="btn btn-primary" href="<?php echo site_url('pembayaran/create_pembayaran/'.$pelanggan['id_pelanggan']); ?>">Create Pembayaran</a>
  				<?php
  			}
		?>
      	
      	<br><br>
      	<div class="row">
			<div class="col-3">
				<div class="form-group text-left">
					<label for="min_date">From</label>
		  			<input type="date" class="form-control" name="min_date" id='min_date' required>
				</div>
			</div>
			<div class="col-3">
				<div class="form-group text-left">
					<label for="min_date">To</label>
		  			<input type="date" class="form-control" name="max_date" id='max_date' required>
				</div>
			</div>
			<div class="col-3">
			</div>
			<div class="col-3">
				<br>
				<a class="btn btn-secondary btn-block" style="color: white;" id="reset">RESET</a>
			</div>
		</div>

		<table class="table table-hover text-center">
		<thead>
			<th scope="col">Tanggal</th>
			<th scope="col">No. Bukti</th>
			<th scope="col">Keterangan</th>
			<th scope="col">Debit (Rp)</th>
			<th scope="col">Kredit (Rp)</th>
			<th scope="col">Saldo Akhir</th>
			<th></th>
		</thead>
		<tbody id='tbody'></tbody>

		<!-- <thead class="table-info">
			<td colspan="3">Total kredit</td>
			<td><?php echo "".$tempKredit; ?></td>
			<td></td>
		</thead> -->

		</table>
    </div>

  </div>
</div>
<br>
<script type="text/javascript">
	var list = getArrayList();
	init();
	//console.log($("#month").val()=="");

	function init()
	{
		var now = new Date();
	    var day = ("0" + now.getDate()).slice(-2);
	    var month = ("0" + (now.getMonth() + 1)).slice(-2);
	    var today = now.getFullYear()+"-"+(month)+"-"+(day);
	    var init = "2010-01-01";
	    var oldDate = new Date(today);

	    $('#min_date').val(init);
	    $('#max_date').val(today);
	    var min = new Date($('#min_date').val());
	    var max = new Date($('#max_date').val());
	    //console.log(min+" - "+max);

	    $('#min_date').datepicker({
	      dateFormat: 'yy-mm-dd',
	      changeMonth: true,
	      changeYear: true,
	      showButtonPanel: true,
	      maxDate: max
	    });
	    $('#max_date').datepicker({
	      dateFormat: 'yy-mm-dd',
	      changeMonth: true,
	      changeYear: true,
	      showButtonPanel: true,
	      minDate: min
	    });
	    sort(list);
		appendData(list);
	};

	$('#min_date').change(function(){
		var min_date = new Date($('#min_date').val());
		var max_date = new Date($('#max_date').val());
		$('#max_date').datepicker('destroy');
		$('#max_date').datepicker({
	      dateFormat: 'yy-mm-dd',
	      changeMonth: true,
	      changeYear: true,
	      showButtonPanel: true,
	      minDate: min_date
	    });
		var temp=[];
		for(var i=0; i<list.length; i++)
		{
			var tempDate = new Date(list[i]['compare']);
			if(tempDate >= min_date && tempDate <= max_date) temp.push(list[i]);
		}
		//list=temp;
		sort(temp);
		appendData(temp);
		// console.log(list);
	});

	$('#max_date').change(function(){
		var min_date = new Date($('#min_date').val());
		var max_date = new Date($('#max_date').val());
		$('#min_date').datepicker('destroy');
		$('#min_date').datepicker({
	      dateFormat: 'yy-mm-dd',
	      changeMonth: true,
	      changeYear: true,
	      showButtonPanel: true,
	      maxDate: max_date
	    });
		var temp=[];
		for(var i=0; i<list.length; i++)
		{
			var tempDate = new Date(list[i]['compare']);
			if(tempDate >= min_date && tempDate <= max_date) temp.push(list[i]);
		}
		//list=temp;
		sort(temp);
		appendData(temp);
	});

	$('#reset').click(function(){
		$('#min_date').datepicker('destroy');
		$('#max_date').datepicker('destroy');
		init();
	});

	function sort(list)
	{
		list.sort(function(a,b){
			var A = a['compare'].toUpperCase();
			var B = b['compare'].toUpperCase();
			if (A < B) return -1;
			if (A > B) return 1;
			return 0;
		});
	}

	function getArrayList()
	{
		var list = [];
		<?php
			for ($i=0; $i < sizeof($invoice); $i++)
			{
				if($invoice[$i]->id_pelanggan === $pelanggan['id_pelanggan'])
				{
					$id_invoice = $invoice[$i]->id_invoice;
					$id_pelanggan = $invoice[$i]->id_pelanggan;
					$nama_pelanggan = $invoice[$i]->nama_pelanggan;
					$id_pic = $invoice[$i]->id_pic;
					$no_invoice = $invoice[$i]->no_invoice;
					$tgl_invoice = $invoice[$i]->tgl_invoice;
					$tgl_jatuhtempo = $invoice[$i]->tgl_jatuhtempo;
					$keterangan = $invoice[$i]->keterangan;
					$price = $invoice[$i]->price;
					$utang = $invoice[$i]->utang;
					$status = $invoice[$i]->status;
					$insert = [
						'id_invoice'=>$id_invoice, 
						'id_pelanggan'=>$id_pelanggan,
						'nama_pelanggan'=>$nama_pelanggan,
						'id_pic'=>$id_pic, 
						'no_invoice'=>$no_invoice, 
						'tgl_invoice'=>$tgl_invoice, 
						'tgl_jatuhtempo'=>$tgl_jatuhtempo, 
						'keterangan'=>$keterangan, 
						'price'=>$price,
						'utang'=>$utang,
						'status'=>$status,
						'compare'=>$tgl_invoice
					];
					$array = json_encode($insert);
					echo "list.push($array);";

					foreach($payments as $payment)
					{
						if($invoice[$i]->no_invoice === $payment['no_invoice'])
						{
							$tgl_pembayaran = $payment['tgl_pembayaran'];
							$jumlah_pembayaran = $payment['jml_pembayaran'];
							$keterangan = $payment['keterangan'];
							$id_pembayaran = $payment['id_pembayaran'];
							$no_invoice = $payment['no_invoice'];
							$payment_insert = [
								'tgl_pembayaran'=>$tgl_pembayaran,
								'jml_pembayaran'=>$jumlah_pembayaran,
								'keterangan'=>$keterangan,
								'id_pembayaran'=>$id_pembayaran,
								'no_invoice'=>$no_invoice,
								'compare'=>$tgl_pembayaran
							];
							$payment_array = json_encode($payment_insert);
							echo "list.push($payment_array);";
						}
					}
				}
			}
		?>
		return list;
	}
	
	function appendData(list)
	{
		$("#tbody").empty();

		var tempKredit = 0;
		for (var i = 0; i < list.length; i++)
		{
			if(list[i]['id_pembayaran']!=null)
			{
				tempKredit -= parseInt(list[i]['jml_pembayaran']);
				$("#tbody").append(
					"<tr>"+
						"<th scope=row>"+list[i]['tgl_pembayaran']+"</th>"+
						"<th scope=row>"+list[i]['no_invoice']+"</th>"+
						"<th scope=row>"+list[i]['keterangan']+"</th>"+
						"<td id=id01></td>"+
						"<th scope='row' class='text-right'>"+new Intl.NumberFormat(['ban', 'id']).format(parseInt(list[i]['jml_pembayaran']))+"</th>"+
						"<th scope='row' class='text-right'>"+new Intl.NumberFormat(['ban', 'id']).format(parseInt(tempKredit))+"</th>"+
						"<td>"+
							"<?php if($this->session->userdata('user')['jabatan']=='A') { ?>"+
							"<div class=dropdown>"+
								"<button class=btn btn-success>Action List</button>"+
								"<div class=dropdown-content>"+
									
									"<a class=btn btn-primary href='<?php echo base_url();?>pembayaran/edit_pembayaran/"+list[i]['id_pembayaran']+"'>Edit</a>"+
									"<a class=btn btn-danger href='<?php echo base_url();?>pembayaran/delete_pembayaran/"+list[i]['id_pembayaran']+"'>Delete</a>"+
									
								"</div>"+
							"</div>"+
							"<?php } ?>"+
			            "</td>"+
					"</tr>"
				);
			}
			else
			{
				tempKredit += parseInt(list[i]['price']);
				$("#tbody").append(		
					"<tr class= light>"+
						"<td scope=row>"+list[i]['tgl_invoice']+"</td>"+
						"<td scope=row>"+list[i]['no_invoice']+"</td>"+
						"<td id=id01>"+list[i]['keterangan']+"</td>"+
						"<td id='id01' class='text-right'>"+new Intl.NumberFormat(['ban', 'id']).format(parseInt(list[i]['price']))+"</td>"+
						"<td scope=row></td>"+
						"<td scope='row' class='text-right'>"+new Intl.NumberFormat(['ban', 'id']).format(parseInt(tempKredit))+"</td>"+
						"<td>"+
							"<div class=dropdown>"+
								"<button class=btn btn-success>Action List</button>"+
								"<div class=dropdown-content>"+
									"<a class=btn btn-primary href='<?php echo base_url();?>invoice/"+list[i]['id_invoice']+"'>Detail</a>"+
									"<?php if($this->session->userdata('user')['jabatan']=='A') { ?>"+
									"<a class=btn btn-primary href='<?php echo base_url();?>invoice/edit/"+list[i]['id_invoice']+"'>Edit</a>"+
									"<a class=btn btn-danger href='<?php echo base_url();?>invoice/delete/"+list[i]['id_invoice']+"' onClick=return confirm('Are you sure you want to delete?')>Delete</a>"+
									"<?php } ?>"+
								"</div>"+
							"</div>"+
			            "</td>"+
					"</tr>"
				);
			}
		}
	}
</script>

