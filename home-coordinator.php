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




<html>
<head>
	<title>Request Operational EBEKA</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	<script type="text/javascript">
	function MM_popupMsg(msg) { //v1.0
	  alert(msg);
	}
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	</script>
        
</head>
<body>
	<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td width="350" height="115" align="center" bgcolor="#FFFFFF"><img src="images/logo-ebeka.jpg" width="170" height="120"/></td>
	        <td width="900" align="right" bgcolor="#FFFFFF"><img src="images/approv.jpg" width="450" height="112"></td>
		</tr>
	</table>
	<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td><hr></td>
		</tr>
	</table>
 

	<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr bgcolor="#F8F8FF" height="32">
		<td width="10" height="50" bgcolor="#FFFFFF">&nbsp;</td>
		<th width="944" height="22" align="center" valign="middle" bgcolor="#FFFFFF">
	    	<ul id="MenuBar1" class="MenuBarHorizontal">
	        	<li><a href="home-coordinator.php?page=home-coordinator&username=<?=$_SESSION['username']?>" title="Home">Home</a></li>
	          	<li><a href="#" class="MenuBarItemSubmenu">Laporan</a>
	            	<ul>
	              		<li><a href="home-customer.php?page=form-laporan-po-cust&mu_username=<?=$_SESSION['mu_username']?>">Cetak Laporan</a></li>
	            	</ul>
	          	</li>
	          	<li><a href="#" title="Utility" class="MenuBarItemSubmenu">Utility</a>
	            	<ul>
	              		<li><a href="home-customer.php?page=form-ganti-password&mu_username=<?=$_SESSION['mu_username']?>" title="Ganti Password">Ganti Password</a></li>
	            	</ul>
	          	</li>
	          	<li><a href="login/logout.php" title="Log Out">Keluar</a></li>
	        </ul>       
		</td>
			<td width="10" bgcolor="#FFFFFF">&nbsp;</td>
		</tr>
	</table>
	<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr bgcolor="#F8F8FF">
			<td bgcolor="#FFFFFF">&nbsp;</td>
		</tr>
	</table>

	<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr bgcolor="#F8F8FF">
			<td width="10" bgcolor="#FFFFFF">&nbsp;</td>
			<td rowspan="4" valign="top" bgcolor="#FFFFFF">
				<table width="1228" height="auto" bgcolor="white" border="0" cellspacing="0" cellpadding="0">
					<tr height="36" width="938">
						<td>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF"><strong><?php echo "Tanggal : ".date("d-M-y");?></strong>&nbsp;&nbsp;&nbsp;&nbsp;Selamat Datang <u><strong> <?=$_SESSION['name']?></strong></u></font>
					</td>
					</tr>
					<tr>
						<td width="938" align="center" valign="middle">
							<?php
								$page = (isset($_GET['page']))? $_GET['page'] : "main";
								switch ($page)
								{
									case 'form-view-konfirmasi-coordinator' : include "form-view-konfirmasi-coordinator.php"; break;
									case 'main' :
									default : include 'about-login-coordinator.php';	
								}
							?>
						</td>	
					</tr>
				</table>
			</td>
			<td width="10" bgcolor="#FFFFFF">&nbsp;</td>
		</tr>
	</table>

	<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr bgcolor="#F8F8FF">
			<td width="1106" bgcolor="#FFFFFF">&nbsp;</td>
		</tr>
	</table>

	<table width="1250" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr bgcolor="#B0C4DE">
			<td width="1101" height="36" colspan="5" bgcolor="#0000FF"><div align="right" style="margin:0 12px 0 0;"><font color="#FFFFFF"><strong>Copyright &copy; 2018. By Cahbagoes</strong></font><br></div></td>
		</tr>
	</table>
	
	<div align="center"></div>
	<script type="text/javascript">
	var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
	</script>
</body>
</div>
</html>

