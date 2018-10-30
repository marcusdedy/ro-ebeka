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
		if (isset($_GET['ro_id_approve'])) {
			$ro_id_approve	= $_GET['ro_id_approve'];
			$query	= "SELECT b.ro_id_approve, a.ticket_id, a.site_id, a.remark,
       a.nominal_request, a.account_number,
       a.account_name, a.date_create,
       a.user_create, b.amount_approved,
       b.update_date, b.user_update
  FROM ro_draft a
       INNER JOIN ro_approve b
          ON (a.ro_id = b.ro_id)
 WHERE (b.ro_id_approve = '$ro_id_approve' ) and (a.ro_status = 1)";
			$hasil	= mysql_query($query);
			$data   = mysql_fetch_array($hasil);
			$ro_id_approve   = $data['ro_id_approve'];
			$ticket_id       = $data['ticket_id'];
     	 	$site_id         = $data['site_id'];
			$remark          = $data['remark'];
			$nominal_request = $data['nominal_request'];
	      	$account_number  = $data['account_number'];
	      	$account_name    = $data['account_name'];
	      	$date_create     = $data['date_create'];
	      	$user_create     = $data['user_create'];
	      	$amount_approved = $data['amount_approved'];
	      	$update_date     = $data['update_date'];
	      	$user_update     = $data['user_update'];
			

		}
		else {
			die ("Error. Tidak ada Data yang dipilih Silakan cek kembali! ");	
		}
	?>
<form action="proses-konfirmasi-fin.php" method="POST" name="form_konfirmasi_fin" enctype="multipart/form-data">
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr height="26">
				<td width="4%">&nbsp;</td>
				<td width="12%">&nbsp;</td>
				<td width="84%"><font color="orange" size="5"><b>Transfer Confirmation</b></font></td>
			</tr>
		<tr height="36">
			<td height="27">&nbsp;</td>
			<td>ID</td>
			<td><input name="ro_id_approve" type="text" value="<?=$ro_id_approve?>" size="25" readonly /></td>
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
		  <td>Nominal Transfer</td>
		  <td><input name="amount_transfer" type="text" value="<?=$amount_approved?>" size="20" />
	    	<font color="red" size="2">&lt;- Nominal Transfer</font></td>
	  </tr>
	  <tr height="36">
		  <td height="35">&nbsp;</td>
		  <td>Date Transfer</td>
		  <td><input type="text" name="transfer_date" size="15" placeholder="Tanggal Transfer"  class="required date" value=""/>
         <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form_konfirmasi_fin.transfer_date);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a></td>
	  </tr>
	  <tr height="36">
		  <td height="28">&nbsp;</td>
		  <td>Transfer Note</td>
		  <td><textarea name="information_transfer" cols="50" rows="3" required></textarea></td>
	  </tr>
	  <tr height="36">
		  <td height="35">&nbsp;</td>
		  <td>File Attachment</td>
		  <td><input name="file_attachment" type="file" required /></td>
	  </tr>
		<tr height="36">
			<td>&nbsp;</td>
			<td>User</td>
			<td><input name="user_update_trf" type="text" value="<?php echo $_SESSION['username'];?>" size="25" maxlength="10" readonly /></td>
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