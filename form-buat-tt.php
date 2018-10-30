<?php 
    session_start();
    $access = $_SESSION['access'];
    if(!isset($_SESSION['username']) && $access!="Helpdesk"){
        ?>
            <script language="JavaScript">
                alert('Anda Harus Login. Silahkan Login kembali!');
                document.location='index.php';
            </script>
        <?php
    }
?>

<html>

    <head>
    <title>Form Create Trouble Ticket</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
        <link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css">
    <script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
    </head>

 

<script src="jquery-2.2.4.min.js"></script> <!-- Load library jquery -->
<script src="process.js"></script> <!-- Load file process.js -->
    
<div style="border:0; padding:10px; width:924px; height:auto;">
<?php
include "config.php";
?>

<body> 

<form name="form_buat_tt" action="home-helpdesk.php?page=proses-buat-tt" method="post">
  <div align="center"></div>
  <table width="904" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr height="26">
		  <td width="22%" height="54">&nbsp;</td>
		  <td width="1%">&nbsp;</td>
		  <td width="77%" align="center"><font color="orange" size="6"><b><u>Form Create Trouble Ticket</u></b></font></td>
		</tr>
    <tbody>
        <tr>
            <td height="33">ID Ticket</td><td>:</td>
        	<td><input name="ticket_id" type="text" required value="" size="35" maxlength="35"></td>
        </tr>
        <tr>
		<td height="38">Site ID</td>
		  <td>:</td>
		  <td><input name="site_id" type="text" required id="site_id_provider" size="15" /> 
            <input type="text" name="site_name_provider" id="site_name_provider" readonly size="50"  />
            &nbsp;<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><b>Cari</b></button>    
        <tr>
          <td height="83">&nbsp;</td>
          <td>&nbsp;</td>
          <td><p>
            <input name="tower_id" type="text" id="tower_id" value="" size="20" readonly> 
            <input name="tower_name" type="text" id="tower_name" value="" size="40" readonly>
          </p>
          <p>
            <textarea name="tower_address" cols="71" readonly id="tower_address"></textarea>
          </p></td>
        </tr>
        <tr>
        	<td height="44">Remark</td><td>:</td>
        	<td><input name="remark" type="text" required value="" size="50"></td>
        </tr>
    	<tr>
        	<td height="69">Note</td><td>:</td>
        	<td><textarea name="note_request" cols="50" rows="3" required></textarea></td>
        </tr>
        <tr>
        	<td height="36">Nominal Request</td><td>:</td>
        	<td><input name="nominal_request" type="text" required value="" size="15" maxlength="15" > 
        	  <font color="red" size="1">&lt;-Input nominal tanpa tanda baca</font>
          </td>
        </tr>
        <tr>
          <td height="28" valign="bottom"><strong>Transfer ke</strong></td>
          <td valign="bottom">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="32">Nomor Rekening</td><td>:</td>
            <td><input name="account_number" type="text" required value="" size="20"></td>
        </tr>
        <tr>
            <td height="27">A/N Rekening</td><td>:</td>
            <td><input name="account_name" type="text" required value="" size="50"></td>
        </tr>
        <tr>
        	<td height="45">User</td><td>:</td>
        	<td><input name="user_create" type="text" value="<?php echo $_SESSION['username'];?>" size="25" maxlength="10" readonly /></td>
        </tr>
      <tr>
        	<td align="left" colspan="3"><br>        	  
            <input type="submit" class="btn btn-info" name="submit" value="Simpan" />
            <input type="button" class="btn btn-danger" value="Batal" onClick="window.close();" title="Batal" /></td><td width="0%"></td>
      </tr>
    </tbody>
</table>
</form>
 

<p>
  
</p>	

       <!-- Modal ms site-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cari Site</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Site ID</th>
                                    <th>Site Provider</th>
                                    <th>Tower ID</th>
                                    <th>Tower Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data yang ditampilkan dari master site
                                mysql_connect('localhost', 'root', 'cahbagoes');
                                mysql_select_db('ro_ebeka');
                                $query = mysql_query('SELECT * FROM ms_site');
                                while ($data = mysql_fetch_array($query)) {
                                    ?>
                                    <tr class="pilih" data-site_id_provider="<?php echo $data['site_id_provider']; ?>" data-site_name_provider="<?php echo $data['site_name_provider']; ?>" data-site_provider_information="<?php echo $data['site_provider_information']; ?>" data-tower_id="<?php echo $data['tower_id']; ?>" data-tower_name="<?php echo $data['tower_name']; ?>" data-tower_address="<?php echo $data['tower_address']; ?>">
                                        <td><?php echo $data['site_id_provider']; ?></td>
                                        <td><?php echo $data['site_provider_information']; ?></td>
                                        <td><?php echo $data['tower_id']; ?></td>
                                        <td><?php echo $data['tower_name']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
//            jika dipilih, akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("site_id_provider").value = $(this).attr('data-site_id_provider');
                document.getElementById("site_name_provider").value = $(this).attr('data-site_name_provider');
                document.getElementById("tower_id").value = $(this).attr('data-tower_id');
                document.getElementById("tower_name").value = $(this).attr('data-tower_name');
                document.getElementById("tower_address").value = $(this).attr('data-tower_address');
                $('#myModal').modal('hide');
            });
      

//            tabel lookup 
            $(function () {
                $("#lookup").dataTable();
            });

        </script>

</body>
</html>
