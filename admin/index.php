<?php include 'head.php';?>
<br>
<Br>
<br>
<Br><br>
<Br><br>
<Br>
<center>
	<style>
      .tr_border-none {
           border-style: none !important;
      }
  </style>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
<form method="post">
	<table class="table">
		<tr>
			<Td colspan=2 align=center class="tr_border-none">
				<h1>Admin Panel</h1>
			</Td>
		</tr>
		<Tr>
			<tD class="tr_border-none">
				Admin ID
			</tD>
			<td class="tr_border-none">
				<input type="email" class="form-control" name="txtid">
			</td>
		</Tr>
		<Tr>
			<tD class="tr_border-none">
				Admin Password
			</tD>
			<td class="tr_border-none">
				<input type="password" class="form-control" name="txtpass">
			</td>
		</Tr>
		<Tr>
			<td colspan="2" align="center" class="tr_border-none">
				<input type="submit" class="btn btn-primary px-3 d-none d-lg-flex" name="btnlogin" value="Login">
			</td>
		</Tr>
	</table>
</center>
</form>
</div>
</div>
<?php

if(isset($_POST['btnlogin'])){

	extract($_POST);
	$_SESSION['admin']=$txtid;
$q=pg_query("select * from tbladmin where aemail='$txtid' and apass='$txtpass'");
if(pg_num_rows($q)>0){
	?>
	<script type="text/javascript">
		alert("Login Success");
		window.location.href="viewcontact.php";
	</script>
	<?php
}
else{
	?>
	<script type="text/javascript">
		alert("Invalid Credentials");
	</script>
	<?php
}
}
?>