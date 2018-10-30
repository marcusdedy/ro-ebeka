<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-image: url();
}
</style>
  <?php 
include "config.php";
$approve_dedy=mysql_query("select count(ro_id) total_apprv from ro_draft where ro_status ='1'");
$cek=mysql_num_rows($approve_dedy);

if($cek){
	
	?>
<?php 
include('config.php');
?>
 
</head>

	<?php 
	while($row=mysql_fetch_array($approve_dedy)){
		?>
<center>
<div id="content"><font size="5" color="red"><a href="home-fin.php?page=form-view-konfirmasi-fin&username=<?=$_SESSION['username']?>"><?php echo $row['total_apprv'];?></font><br> 
						<font size="3" color="#0000FF">	Data Menunggu Konfirmasi Anda</font>
</div>
</center>
		<?php 
	}
	?>
</div>
<body>
<div style="border: 0; padding: 10px; width: 375px; height: 260px; background-image: url(images/home-fin.png);">
</body>
</html>

	    <?php 
	
}else{
	echo "<font color=red><center><b>Tidak ada Data!!</b><center</font>";
}
?>