<?php
// Sesion Di jalankan
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);
$koneksi=mysql_connect("localhost", "root", "cahbagoes");
$db=mysql_select_db("ro_ebeka",$koneksi);

$query = "SELECT * FROM ms_user WHERE username = '$username'";
$hasil = mysql_query($query) or die("Error");
$data  = mysql_fetch_array($hasil);

if ($data['username'] && $password==$data['password']){

    // jika sesuai, maka buat session
        $_SESSION['username'] = $data['username'];
		$_SESSION['name'] = $data['name'];
        $_SESSION['access'] = $data['access'];
		$_SESSION['branch'] = $data['branch'];
        if($data['access']=="Helpdesk"){
            header("location:../home-helpdesk.php");
        }else if($data['access']=="Koordinator"){
            header("location:../home-coordinator.php");
        }else if ($data['access']=="Finance"){
			header("location:../home-fin.php");
		}
}
else{
		?>
		<script language="JavaScript">
			alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
			document.location='../index.php';
		</script>
		<?php
    }
?>