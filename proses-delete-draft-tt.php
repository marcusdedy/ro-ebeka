<?php
	include "config.php";
	if (isset($_GET['ro_id'])) {
		$ro_id = $_GET['ro_id'];
	//membaca nama file yang akan dihapus
	$query   = "SELECT * FROM ro_draft WHERE ro_id='$ro_id'";
	$hasil   = mysql_query($query);
	$data    = mysql_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada data yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
		if (!empty($ro_id) && $ro_id != "") {
			$hapus = "DELETE FROM ro_draft WHERE ro_id='$ro_id'";
			$sql = mysql_query ($hapus);
			if ($sql) {
				
				?>
					<script language="JavaScript">
					alert('Berhasil Hapus Data!');
					document.location='home-helpdesk.php?page=form-view-data-helpdesk&username=<?=$_SESSION['username']?>';
					</script>
				<?php
						
			} else {
				echo "<h2><font color=red><center>Data gagal dihapus!</center></font></h2>";	
			}
		}
?>