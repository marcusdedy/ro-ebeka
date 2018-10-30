<body bgcolor="#EEF2F7">
<?php
// di sini dibuat untuk membuat nomor urut 
include "config.php";
$marcusdedy=date("Ymd");
$today=date("Y-m-d");
$marcus = "SELECT max(transfer_number) AS last FROM ro_trf WHERE update_date_trf LIKE '$today%'";
$dedy = mysql_query($marcus);
$data  = mysql_fetch_array($dedy);
$lastNoTransaksi = $data['last'];
$nextNoUrut = $lastNoTransaksi + 1;
$nextNoTransaksi = sprintf('%03s', $nextNoUrut);
?>

<?php
	include "config.php";
	
	$ro_id_approve						= $_POST['ro_id_approve'];
	$amount_transfer					= $_POST['amount_transfer'];
	$transfer_date				= $_POST['transfer_date'];
	$information_transfer		= $_POST['information_transfer'];
	$user_update_trf			= $_POST['user_update_trf'];
	$update_date_trf				= DATE("Y-m-d");
	$update_time_trf				= date("h:i:sa");
	$transfer_number				= $nextNoTransaksi ;
	$ro_id_trf				= $marcusdedy. $nextNoTransaksi ;

	$lokasi_file = $_FILES['file_attachment']['tmp_name'];
	$nama_file   = $_FILES['file_attachment']['name'];
	$folder = "files/$nama_file";
	

	//validasi data jika data kosong
	if (empty(	$_POST['ro_id_approve'])) {
	?>
		<script language="JavaScript">
			alert('Cek Ulang Informasi!');
			window.close();
		</script>
	<?php
	}
	
	else {
	
	$input	= "insert into ro_trf (ro_id_trf, ro_id_approve, amount_transfer, transfer_date, information_transfer, user_update_trf, update_date_trf, update_time_trf, transfer_number, file_name) values ('$ro_id_trf', '$ro_id_approve', '$amount_transfer', '$transfer_date', '$information_transfer', '$user_update_trf', '$update_date_trf', '$update_time_trf', '$transfer_number', '$nama_file')";
	
	$query_input =mysql_query($input);

	$update=" update ro_draft  set ro_status = '2' where ro_id = (
				select ro_id from ro_approve where ro_id_approve = '$ro_id_approve')";
	$query_update =mysql_query($update);
		if (move_uploaded_file($lokasi_file,"$folder")) {
		//Jika Sukses
	?>	
		<script language="JavaScript">
		alert('Proses Simpan Berhasil!');
		window.close();
		</script>
	<?php
	}
	else {
	//Jika Gagal
	echo "Gagal Proses, Silahkan diulangi!";
	}
	}

?>
</body>