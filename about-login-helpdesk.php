<html>
<head>

  <?php 
include "config.php";
$approve_dedy=mysql_query("select count(ro_id) total_apprv from ro_draft where ro_status ='2'");
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
		
<center>
<div id="content">
						<font size="5" color="red"><a href="home-helpdesk.php?page=form-view-konfirmasi-helpdesk&username=<?=$_SESSION['username']?>"><?php echo $row['total_apprv'];?></font><br>
						<font size="3" color="#0000FF">	Data Menunggu Konfirmasi Anda</font>

</div>
</center>
		<?php 
	}
	?>
</div>
<body>
<div style="border: 0; padding: 10px; width: 1100px; height: 310px; background-image: url(images/home-helpdesk.jpg);">
	
</body>
</html>

	    <?php 
	
}else{
	echo "<font color=red><center><b>Tidak ada Data!!</b><center</font>";
}
?>