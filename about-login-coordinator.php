<html>
<head>

  <?php 
include "config.php";
$approve_dedy=mysql_query("select count(ro_id) total_apprv from ro_draft where ro_status ='0'");
$cek=mysql_num_rows($approve_dedy);

if($cek){
	
	?>
<?php 
include('config.php');
?>

<style type="text/css">
body {
	background-image: url();
}
</style>
</head>
	<?php 
	while($row=mysql_fetch_array($approve_dedy)){
		?>
<body>
<div style="border: 0; padding: 10px; width: 700px; height: 310px; background-image: url(images/home-coordinator.jpg);">

<center>
<div id="content">
<br><br>
						
					
						<font size="5" color="red"><a href="home-coordinator.php?page=form-view-konfirmasi-coordinator&username=<?=$_SESSION['username']?>"><?php echo $row['total_apprv'];?></font> <br>
						<font size="3" color="#0000FF">	Data Menunggu Verifikasi Anda</font>

</div>
</center>
</div>
		<?php 
	}
	?>
</body>
</html>
	    <?php 
	
}else{
	echo "<font color=red><center><b>Tidak ada Data!!</b><center</font>";
}
?>