<h2><?= $title ?></h2>
<!-- <a class="btn btn-primary" href="<?php echo site_url('/pelanggan/create'); ?>">Create</a> -->
<!-- <?php print_r($pelanggans); ?> -->
<table class="table table-hover text-center">
  	<thead>
    	<tr>
      		<th scope="col">Nama Pelanggan</th>
      		<th scope="col"><30 Hari</th>
      		<th scope="col"><60 Hari</th>
      		<th scope="col"><90 Hari</th>
      		<th scope="col">Lebih dari 90 Hari</th>
      		<!-- <th scope="col">Status Pembayaran</th> -->
      		<th scope="col">Action</th>
    	</tr>
  	</thead>
  	<tbody>
  		<?php
  			foreach ($pelanggan as $pelanggans)
  			{ 
  				$ch=0; 
  				$check=false;
  				$deb=0;?>
  				<?php foreach ($invoices as $invoice)
  				{
  					if($pelanggans['id_pelanggan'] === $invoice['id_pelanggan'])
  					{
  						if($invoice['status'] == "Belum Lunas")
  						{
  							$datetime1 = new DateTime($invoice['tgl_invoice']);
							$currentDateTime = date('Y/m/d');
							$datetime2 = new DateTime($currentDateTime);

							$difference = $datetime1->diff($datetime2);

							$temp = $difference->days;
							if($temp > $ch)
							{
								$ch = $temp;
							}
							$deb = $deb + $invoice['utang'];
							$check=true;
  						}
  					}
  				}
  				?>
  				<?php if($ch >= 0 && $check==true)
  				{ ?>
  					<tr>
	  					<td><?php echo $pelanggans['nama_pelanggan']; ?></td>
	  					<?php if($ch <=30)
		  					{
		  						echo "
		  						<td>".number_format($deb)."</td>
			  					<td></td>
			  					<td></td>
			  					<td></td>";
		  					}
		  					elseif($ch <=60)
		  					{
		  						echo "
		  						<td></td>
			  					<td>".number_format($deb)."</td>
			  					<td></td>
			  					<td></td>";
		  					}
		  					elseif($ch <=90)
		  					{
		  						echo "
		  						<td></td>
			  					<td></td>
			  					<td>".number_format($deb)."</td>
			  					<td></td>";
		  					}
		  					else
		  					{
		  						echo "
		  						<td></td>
			  					<td></td>
			  					<td></td>
			  					<td>".number_format($deb)."</td>";
		  					}
	  					?>
	  					<td>
	  						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
	  						<div class="dropdown-menu">
					      		<a class="dropdown-item" href="<?php echo base_url();?>pelanggan/<?php echo $pelanggans['id_pelanggan'];?>">Detail</a>
					    	</div>
	  					</td>
  					</tr>
  				<?php } ?>
  		<?php }
  		?>
  	</tbody>
</table>