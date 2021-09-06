<?php 
	// if($this->session->has_userdata('user'))
	// {
	// 	print_r($this->session->userdata('user'));
	// }
?>
<div class="container">
<h1><?= $title ?></h1>
<p>Welcome <?php echo $this->session->userdata('user')['nama']; ?></p>
</div>