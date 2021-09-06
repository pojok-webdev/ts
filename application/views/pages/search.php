<br>
<h2><?= $title ?></h2>
<br>
<!-- <?php print_r($pelanggans); ?> -->

<table class="table table-hover text-center">
  	<thead>
    	<tr>
      		<th scope="col">Nama Pelanggan</th>
      		<th scope="col">Tipe Pelanggan</th>
      		<th scope="col">Action</th>
    	</tr>
  	</thead>
  	<tbody>
  		<?php foreach($pelanggans as $pelanggan) : ?>
	    	<tr class="table-secondary">
	      	<th scope="row"><?php echo $pelanggan['nama_pelanggan']; ?></th>
	      		<td><?php echo $pelanggan['tipe_pelanggan']; ?></td>
	      		<!-- <td><?php echo $pelanggan['lokasi_penagihan']; ?></td> -->
	      		<!-- <td><img src="<?php echo $pelanggan['sop_pembayaran_tagihan']; ?>"></td> -->
	      		<td>
		      		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
				    <div class="dropdown-menu">
				      	<a class="dropdown-item" href="<?php echo site_url('/pelanggan/'.$pelanggan['id_pelanggan']); ?>">Detail</a>
				      	<a class="dropdown-item" href="pelanggan/edit/<?php echo $pelanggan['id_pelanggan']; ?>">Edit</a>
				      	<a class="dropdown-item" href="pelanggan/delete/<?php echo $pelanggan['id_pelanggan']; ?>">Delete</a>
				      	<!-- <div role="separator" class="dropdown-divider"></div>
				      	<a class="dropdown-item" href="#">Separated link</a> -->
				    </div>
	      		</td>
	    	</tr>
    	<?php endforeach; ?>
  	</tbody>
</table> 