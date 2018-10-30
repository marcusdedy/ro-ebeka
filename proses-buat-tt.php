<?php

?>

<?php
// di sini dibuat untuk membuat nomor urut 
include "config.php";
$marcusdedy=date("Ymd");
$today=date("Y-m-d");
$marcus = "SELECT max(number_create) AS last FROM ro_draft WHERE date_create LIKE '$today%'";
$dedy = mysql_query($marcus);
$data  = mysql_fetch_array($dedy);
$lastNoTransaksi = $data['last'];
$nextNoUrut = $lastNoTransaksi + 1;
$nextNoTransaksi = sprintf('%03s', $nextNoUrut);
?>

<?php
	include "config.php";
		$id 				= $_POST['ticket_id'];
		$ticket_id 			= $_POST['ticket_id'];
		$site_id			= $_POST['site_id'];
		$remark 			= $_POST['remark'];
		$note_request		= $_POST['note_request'];
		$nominal_request	= $_POST['nominal_request'];
		$account_number		= $_POST['account_number'];
		$account_name		= $_POST['account_name'];
	 	$date_create 		= DATE("Y-m-d");
		$user_create 		= $_POST['user_create'];
		$time_create		= date("h:i:sa");
		$number_create		= $nextNoTransaksi;
		$ro_id				= $marcusdedy. $nextNoTransaksi ;
	//validasi data jika data kosong
	if (empty($_POST['ticket_id'])) {
?>

	<script language="JavaScript">
		alert('ID Ticket <?=$ticket_id?> Berhasil Diinput!');
		window.close();
	</script>

<?php
	}
	else {
	//Masukan data ke Table skp_other_income_draft
	$input	="insert into ro_draft ( ro_id, ticket_id, site_id, remark, note_request, nominal_request, account_number, account_name, user_create, date_create, time_create, number_create, ro_status) values ('$ro_id', '$ticket_id', '$site_id', '$remark', '$note_request', '$nominal_request', '$account_number', '$account_name', '$user_create', '$date_create', '$time_create', '$number_create', '0')";
	$query_input =mysql_query($input);

		if ($query_input) {
		//Jika Sukses
?>
	<script language="JavaScript">
		alert('ID Ticket <?=$ticket_id?> Berhasil Diinput!');
		window.close();
	</script>

<?php
	} 
		else 
		{
			//Jika Gagal
			echo "ID Ticket Gagal Diinput, Silahkan diulangi!";
		}
	}
	//Tutup koneksi engine MySQL
	mysql_close($Open);
?>