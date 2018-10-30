<body bgcolor="#EEF2F7">
<?php
// di sini dibuat untuk membuat nomor urut 
include "config.php";
$marcusdedy=date("Ymd");
$today=date("Y-m-d");
$marcus = "SELECT max(update_number) AS last FROM ro_approve WHERE update_date LIKE '$today%'";
$dedy = mysql_query($marcus);
$data  = mysql_fetch_array($dedy);
$lastNoTransaksi = $data['last'];
$nextNoUrut = $lastNoTransaksi + 1;
$nextNoTransaksi = sprintf('%03s', $nextNoUrut);
?>

<?php
	include "config.php";
	
	$ro_id						= $_POST['ro_id'];
	$amount_approved			= $_POST['amount_approved'];
	$cih_total					= $_POST['cih_total'];
	$user_update				= $_POST['user_update'];
	$update_date				= DATE("Y-m-d");
	$update_time				= date("h:i:sa");
	$update_number				= $nextNoTransaksi ;
	$ro_id_approve				= $marcusdedy. $nextNoTransaksi ;
	
	//validasi data jika data kosong
	if (empty(	$_POST['ro_id'])) {
	?>
		<script language="JavaScript">
			alert('Cek Ulang Informasi!');
			window.close();
		</script>
	<?php
	}
	
	else {
	
	$input	= "insert into ro_approve (ro_id_approve, ro_id, amount_approved, information_rejected, user_update, update_date, update_time, update_number) values ('$ro_id_approve', '$ro_id', '$amount_approved', 'OK', '$user_update', '$update_date', '$update_time', '$update_number')";
	
	$query_input =mysql_query($input);

	$update=" update ro_draft set ro_status = '1'
				WHERE ro_id ='$ro_id'";
	$query_update =mysql_query($update);
		if ($query_update) {
		//Jika Sukses
	?>
		<script language="JavaScript">
		alert('Proses Approve Berhasil!');
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