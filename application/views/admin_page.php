<!DOCTYPE html>
<html>
<?php
if(isset($this->session->userdata['logged_in']))
{
	$username = ($this->session->userdata['logged_in']['username']);
	$email = ($this->session->userdata['logged_in']['email']);
}
else
{
	header("location: login");
}
?>
<head>
	<title>Admin Page</title>
	
</head>
<body>
	<div id="profile">
		<?php
		echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
		echo "<br/>";
		echo "<br/>";
		echo "Welcome to Admin Page";
		echo "<br/>";
		?>
		<b id="logout"><a href="logout">Logout</a></b>
		<!-- <b id="create_cus_page"><a href="create_cus_page">Add New Customer</a></b> -->
	</div>
	<br/>
</body>
</html>