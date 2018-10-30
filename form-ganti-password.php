

<?php 
include('config.php');
?>

<html>
<head>
<title>Update User</title>
</head>

<body>
<h1><em><strong>Update Your Password</strong></em></h1>

<?php 
$id = $_SESSION['username'];

$query = mysql_query("select * from ms_user where username='$id'") or die(mysql_error());

$data = mysql_fetch_array($query);
?>

<form name="update_data" action="update-password.php" method="post">
<input type="hidden" name="edit_pass" value="<?php echo $id; ?>" />
<table border="0" cellpadding="5" cellspacing="0">
    <tbody>
    	<tr>
        	<td>Username</td>
        	<td>:</td>
        	<td><input type="text" name="username" maxlength="20" required value="<?php 
echo $_SESSION['username'];?>" disabled /></td>
        </tr>
    	<tr>
        	<td>Password</td>
        	<td>:</td>
        	<td><input type="password" name="password" maxlength="20" required value="" /></td>
        </tr>
        <tr>
        	<td align="right" colspan="3"><input type="submit" name="submit"  value="Simpan" /></td>
        </tr>
    </tbody>
</table>
</form>

</body>
</html>