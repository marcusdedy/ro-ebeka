<?php
	include "config.php";
	if (isset($_GET['ro_id'])) {
		$ro_id = $_GET['ro_id'];
	//membaca nama file yang akan diinput
	$query   = "SELECT * FROM ro_draft WHERE ro_id='$ro_id'";
	$hasil   = mysql_query($query);
	$data    = mysql_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada Data Silakan cek kembali! ");	
	}
	//proses insert data
		if (!empty($ro_id) && $ro_id != "") {
			$update = "update ro_draft set ro_status = '4' where ro_id = '$ro_id'";
			$sql = mysql_query ($update);
			if ($sql) {		
				?>
					<script language="JavaScript">
					alert('Konfirmasi Ticket Berhasil Disimpan!!!');
					document.location='home-helpdesk.php?page=form-view-konfirmasi-helpdesk&username=<?=$_SESSION['username']?>';
					</script>
				<?php		
			} else {
				echo "<h2><font color=red><center>Data gagal dihapus!</center></font></h2>";	
			}
		}
	mysql_close($Open);
?>