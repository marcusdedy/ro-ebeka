<div style="border:0; padding:10px; width:924px; height:auto;">
<head>
	        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
        <link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css">
    <script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
  <?php 

    session_start();
    $access = $_SESSION['access'];
    if(!isset($_SESSION['username']) && $access!="Koordinator"){
		?>
			<script language="JavaScript">
				alert('Anda Harus Login. Silahkan Login kembali!');
				document.location='index.php';
			</script>
		<?php
    }
?>
	<?php
		include "config.php";
		if (isset($_GET['ro_id'])) {
			$ro_id	= $_GET['ro_id'];
			$query	= "select * from ro_draft where ro_id = '$ro_id'";
			$hasil	= mysql_query($query);
			$data   = mysql_fetch_array($hasil);
			$ro_id			= $data['ro_id'];
			$ticket_id		= $data['ticket_id'];
			$site_id		= $data['site_id'];
			$remark	= $data['remark'];
			$nominal_request				= $data['nominal_request'];
			

		}
		else {
			die ("Error. Tidak ada Data yang dipilih Silakan cek kembali! ");	
		}
	?>
<form action="proses-approve.php" method="POST" name="form_approve" >
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr height="26">
				<td width="4%">&nbsp;</td>
				<td width="12%">&nbsp;</td>
				<td width="84%"><font color="orange" size="5"><b>Approval</b></font></td>
			</tr>
		<tr height="36">
			<td height="27">&nbsp;</td>
			<td>ID</td>
			<td><input name="ro_id" type="text" value="<?=$ro_id?>" size="25" readonly /></td>
		</tr>
		<tr height="36">
			<td height="27">&nbsp;</td>
			<td>Ticket ID</td>
			<td><input name="ticket_id" type="text" value="<?=$ticket_id?>" size="25" readonly /></td>
		</tr>
		<tr height="36">
		  <td height="30">&nbsp;</td>
		  <td>Site ID</td>
		  <td><input name="site_id" type="text" value="<?=$site_id?>" size="20" maxlength="20" readonly /></td>
	  </tr>
      		<tr height="36">
		  <td height="28">&nbsp;</td>
		  <td>Remark</td>
		  <td><input name="remark" type="text" value="<?=$remark?>" size="40" readonly /></td>
	  </tr>
      <tr height="36">
		  <td height="35">&nbsp;</td>
		  <td>Nominal</td>
		  <td><input name="amount_approved" type="text" value="<?=$nominal_request?>" size="20" />
	    	<font color="red" size="2">&lt;- Nominal yang anda approve</font></td>
	  </tr>

		<tr height="36">
			<td>&nbsp;</td>
			<td>User</td>
			<td><input name="user_update" type="text" value="<?php echo $_SESSION['username'];?>" size="25" maxlength="10" readonly /></td>
		</tr>
		<tr height="36">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" class="btn btn-info" name="submit" value="Simpan" />&nbsp;&nbsp;&nbsp;
				
				<input type="button" class="btn btn-danger" value="Batal" onClick="window.close();" title="Batal" /></td>
		</tr>
		<tr height="36">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>

	</table>

</form>
<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</div>