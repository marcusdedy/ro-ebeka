<?php
include('config.php');

//tangkap data dari form
$id = $_POST['edit_pass'];
$password = md5($_POST['password']);


//update data di database sesuai user_id
$query = mysql_query("update ms_user set password='$password', update_date = sysdate() where username='$id'") or die(mysql_error());

if ($query) {
}
?>

<script language="JavaScript">
		alert('Password Berhasil Diganti!');
		document.location='login/logout.php';
		</script>
        