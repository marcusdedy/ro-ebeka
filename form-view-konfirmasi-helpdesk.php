<?php
  include "config.php";
?>

<head>

</head>

<center>
  <font color="orange" size="3"><b>View Confirmation Trouble Ticket</b></font>
</center>
<body>
<form action="home-helpdesk.php?page=form-view-konfirmasi-helpdesk&username=<?=$_SESSION['username']?>" method="post" name="postform">
<table width="705" border="0" align="left">

<tr>
  <td width="146">&nbsp;</td>
  <td width="110">Search Ticket ID</td>
  <td width="435" colspan="2"><input type="text" name="ticket_id" value="<?php if(isset($_POST['ticket_id'])){ echo $_POST['ticket_id']; }?>"/>
    <font color="red" size="1">
      &lt;-- Empty to Show All
    </font>
  </td>
</tr>

<tr>
  <td >&nbsp;</td>
    <td >
    </td>
<td><input type="submit" value="Show Data" name="cari"></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
</form>

<p>

<?php
//di proses jika sudah klik tombol cari
if(isset($_POST['cari'])){
  
  $ticket_id=$_POST['ticket_id'];

  
  if(empty($ticket_id) ){
    $Tampil=mysql_query("SELECT b.ro_id_approve, a.ro_id, a.ticket_id, a.site_id, a.remark,
       a.nominal_request, a.account_number,
       a.account_name, a.date_create,
       a.user_create, b.amount_approved,
       b.update_date, b.user_update,
       c.file_name
  FROM ro_draft a
       INNER JOIN ro_approve b
          ON (a.ro_id = b.ro_id)
        INNER JOIN ro_trf C
        on (b.ro_id_approve = c.ro_id_approve)
 WHERE (a.ro_status = 2)");
    $jumlah=mysql_fetch_array(mysql_query(" SELECT sum(b.amount_approved) as subtotal
  FROM ro_draft a
       INNER JOIN ro_approve b
          ON (a.ro_id = b.ro_id)
 WHERE (a.ro_status = 2)"));
    
  }else{
    // create by Marcuz Dedy
    ?>
    <?php
    
    $Tampil=mysql_query(" SELECT b.ro_id_approve, a.ro_id, a.ticket_id, a.site_id, a.remark,
       a.nominal_request, a.account_number,
       a.account_name, a.date_create,
       a.user_create, b.amount_approved,
       b.update_date, b.user_update,
       c.file_name
  FROM ro_draft a
       INNER JOIN ro_approve b
          ON (a.ro_id = b.ro_id)
        INNER JOIN ro_trf C
        on (b.ro_id_approve = c.ro_id_approve)
 WHERE (ro_draft.ticket_id like '%$ticket_id%' ) and (a.ro_status = 2)");

    $jumlah=mysql_fetch_array(mysql_query(" SELECT sum(b.amount_approved) as subtotal
  FROM ro_draft a
       INNER JOIN ro_approve b
          ON (a.ro_id = b.ro_id)
 WHERE (ro_draft.ticket_id like '%$ticket_id%' ) and (a.ro_status = 2) "));
  }
  
  ?>
</p>

<table width="1223" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr bgcolor="#0066FF">
    <th width="3%" height="30"><font color="#FFFFFF">No         </font></td>&nbsp;</th>
    <th width="10%" ><font color="#FFFFFF">Ticket ID  </font></th>
    <th width="8%" ><font color="#FFFFFF">Site ID   </font></th>
    <th width="20%" ><font color="#FFFFFF">Remark   </font></th>
    <th width="8%" ><font color="#FFFFFF">Nominal Request  </font></th>
    <th width="8%" ><font color="#FFFFFF">Acc Number </font></th>
    <th width="10%" ><font color="#FFFFFF">Acc Name    </font></th>
    <th width="8%" ><font color="#FFFFFF">Nominal Approv    </font></th>
    <th width="7%" ><font color="#FFFFFF">Aprrov Date    </font></th>
    <th width="8%" ><font color="#FFFFFF">User Approv   </font></th>
    <th width="10%" ><font color="#FFFFFF">Action    </td>&nbsp; </th>
  </tr>

  <tr bgcolor="#0066FF">
  </tr>

<?php
$no=0;
      while ( $hasil   = mysql_fetch_array ($Tampil)) {
      $ro_id_approve    = stripcslashes($hasil['ro_id_approve']);
      $ro_id           = stripcslashes($hasil['ro_id']);
      $ticket_id       = stripslashes ($hasil['ticket_id']);
      $site_id         = stripcslashes($hasil['site_id']);
      $remark          = stripslashes ($hasil['remark']);
      $nominal_request    = stripslashes ($hasil['nominal_request']);
      $account_number = stripslashes ($hasil['account_number']);
      $account_name     = stripslashes ($hasil['account_name']);
      $date_create     = stripslashes ($hasil['date_create']);
      $user_create     = stripslashes ($hasil['user_create']);
      $amount_approved     = stripslashes ($hasil['amount_approved']);
      $update_date     = stripslashes ($hasil['update_date']);
      $user_update     = stripslashes ($hasil['user_update']);
      $file_name      = stripcslashes($hasil['file_name']);
    {
  
?>
  
    <tr align="center">
      <td height="19" bgcolor="#EEF2F7"><?php echo $no=$no+1; ?></td>
      <td bgcolor="#EEF2F7"><?=$ticket_id?><div align="center"></div></td>
      <td bgcolor="#EEF2F7"><?=$site_id?><div align="center"></div></td>
      <td align="left" bgcolor="#EEF2F7"><?=$remark?><div align="center"></div></td>
      <td align="right" bgcolor="#EEF2F7"><?=number_format($nominal_request,0,',',',')?><div align="center"></div></td>
      <td align="center" bgcolor="#EEF2F7"><?=$account_number?><div align="center"></div></td>
      <td align="center" bgcolor="#EEF2F7"><?=$account_name?><div align="center"></div></td>
      <td align="right" bgcolor="#EEF2F7"><?=number_format($amount_approved,0,',',',')?><div align="center"></div></td>
      <td align="center" bgcolor="#EEF2F7"><?=$update_date?><div align="center"></div></td>
      <td align="center" bgcolor="#EEF2F7"><?=$user_update?><div align="center"></div></td>
      <td bgcolor="#EEF2F7">
        <div align="center">
          <a href=files\<?=$file_name?>  target="_blank" ><img src="images/icon/Download_24x24.png" title = "Download"/></a>
            &nbsp&nbsp
          <a href="home-helpdesk.php?page=proses-konfirmasi-helpdesk&ro_id=<?=$ro_id?>" onclick="return confirm('Anda akan Konfirmasi Ticket = <?=$ticket_id?> Sudah Selesai !!!')"> <img src="images/icon/Properties_24x24.png" title = "Delete"/></a>
        </div>
      </td>

    </tr>
      
    <tr>
      <td colspan="5" align="center"> 
		    <?php
		      if(mysql_num_rows($Tampil)==0){
			     echo "<font color=red><blink>Tidak ada data yang dicari!</blink></font>";
		        }
		    ?>
      </td>
    </tr>

<?php  
		}
}

?>

<tr>
 	<td colspan="7" align="center" bgcolor="#FFFFCC"><strong>TOTAL </strong></td><td align="center" bgcolor="#FFFFCC"><?php echo number_format($jumlah['subtotal'],0,',',',');?>
  </td>
</tr>

</table>

<?php
}else{
	unset($_POST['cari']);
}
?>
</div>
</body>