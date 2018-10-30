<?php
  include "config.php";
?>

<head>

</head>

<center>
  <font color="orange" size="3"><b>Confirmation Trouble Ticket</b></font>
</center>
<body>
<form action="home-fin.php?page=form-view-konfirmasi-fin&username=<?=$_SESSION['username']?>" method="post" name="postform">
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
		$Tampil=mysql_query("SELECT b.ro_id_approve, a.ticket_id, a.site_id, a.remark,
       a.nominal_request, a.account_number,
       a.account_name, a.date_create,
       a.user_create, b.amount_approved,
       b.update_date, b.user_update
  FROM ro_draft a
       INNER JOIN ro_approve b
          ON (a.ro_id = b.ro_id)
 WHERE (a.ro_status = 1)");
		$jumlah=mysql_fetch_array(mysql_query(" SELECT sum(b.amount_approved) as subtotal
  FROM ro_draft a
       INNER JOIN ro_approve b
          ON (a.ro_id = b.ro_id)
 WHERE (a.ro_status = 1)"));
		
	}else{
		// create by Marcuz Dedy
		?>
		<?php
		
		$Tampil=mysql_query(" SELECT b.ro_id_approve, a.ticket_id, a.site_id, a.remark,
       a.nominal_request, a.account_number,
       a.account_name, a.date_create,
       a.user_create, b.amount_approved,
       b.update_date, b.user_update
  FROM ro_draft a
       INNER JOIN ro_approve b
          ON (a.ro_id = b.ro_id)
 WHERE (ro_draft.ticket_id like '%$ticket_id%' ) and (a.ro_status = 1)");

		$jumlah=mysql_fetch_array(mysql_query(" SELECT sum(b.amount_approved) as subtotal
  FROM ro_draft a
       INNER JOIN ro_approve b
          ON (a.ro_id = b.ro_id)
 WHERE (ro_draft.ticket_id like '%$ticket_id%' ) and (a.ro_status = 1) "));
	}
	
	?>
</p>

<table width="1223" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr bgcolor="#0066FF">
    <th width="3%" height="30"><font color="#FFFFFF">No         </font></td>&nbsp;</th>
    <th width="10%" ><font color="#FFFFFF">Ticket ID  </font></th>
    <th width="8%" ><font color="#FFFFFF">Site ID   </font></th>
    <th width="13%" ><font color="#FFFFFF">Remark   </font></th>
    <th width="8%" ><font color="#FFFFFF">Nominal Request  </font></th>
    <th width="8%" ><font color="#FFFFFF">Acc Number </font></th>
    <th width="10%" ><font color="#FFFFFF">Acc Name    </font></th>
    <th width="7%" ><font color="#FFFFFF">Date Create    </font></th>
    <th width="7%" ><font color="#FFFFFF">User Create   </font></th>
    <th width="8%" ><font color="#FFFFFF">Nominal Approv    </font></th>
    <th width="7%" ><font color="#FFFFFF">Aprrov Date    </font></th>
    <th width="7%" ><font color="#FFFFFF">User Approv   </font></th>
    <th width="4%" ><font color="#FFFFFF">Action    </td>&nbsp; </th>
  </tr>

	<tr bgcolor="#0066FF">
  </tr>

<?php
$no=0;
      while (	$hasil   = mysql_fetch_array ($Tampil)) {
      $ro_id_approve    = stripcslashes($hasil['ro_id_approve']);
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
      <td align="center" bgcolor="#EEF2F7"><?=$date_create?><div align="center"></div></td>
      <td align="center" bgcolor="#EEF2F7"><?=$user_create?><div align="center"></div></td>
      <td align="right" bgcolor="#EEF2F7"><?=number_format($amount_approved,0,',',',')?><div align="center"></div></td>
      <td align="center" bgcolor="#EEF2F7"><?=$update_date?><div align="center"></div></td>
      <td align="center" bgcolor="#EEF2F7"><?=$user_update?><div align="center"></div></td>
      <td bgcolor="#EEF2F7">
        <div align="center">
          <a href="javascript:void(0);"
            onclick="window.open('form-konfirmasi-trf-fin.php?ro_id_approve=<?php echo $ro_id_approve; ?>','nama_window_pop_up','height = 500, width = 700, resizable = 0')" > <img src="images/icon/Check_24x24.png" title = "Transfer"/></a>
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
 	<td colspan="9" align="center" bgcolor="#FFFFCC"><strong>TOTAL </strong></td><td align="center" bgcolor="#FFFFCC"><?php echo number_format($jumlah['subtotal'],0,',',',');?>
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
<script type="text/JavaScript">
 //loading 
    
     $('#tampilan').hide();
     $("#loading").fadeIn();

//fungsi tampildata
    function tampildata() {
    $.ajax({
        type:"POST",
        url:"nama file yang akan di load.html",
        success: function(html){
            $("#loading").fadeOut();
            $('#tampilan').html(html);
            $('#tampilan').fadeIn(2000);
           
    }
    });
    }
    
    tampildata();
</script>