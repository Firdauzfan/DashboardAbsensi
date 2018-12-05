<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// Start the session

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VIO Absensi | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
  include('scriptcss.php')
  ?>
  <?php
  include('config/db.php')
  ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
include('header.php');
 ?>
<?php
include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control Absensi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <?php
    if(isset($_POST['tSubmit'])){
    $Nama_Login = $_POST['nama_login'];
    $Pass = $_POST['password'];

    	if (empty($_POST['nama_login']) || empty($_POST['password'])) {
     	echo "<script>";
        echo "alert('Nama dan Password Harus Diisi')";
       	echo "</script>";
     	}else{

    	 //$dept_id =  $_POST['dept_id'];
    	 $sql = mysqli_query($con, "SELECT * FROM admin WHERE nama_login='$Nama_Login' AND password='$Pass'") or die(mysqli_error());

    	 if(mysqli_num_rows($sql) == 0){
    	  echo "<script>alert('Nama atau Password salah')</script>";

    	 }else{
    	 	$row = mysqli_fetch_assoc($sql);
        $_SESSION['nama_log']=$row['nama_login'];
    	 	$_SESSION['pass']=$row['password'];
    	   echo '<script language="javascript">document.location="employee.php";</script>';
    	 }
    }
    }
    ?>
    <body>
    	<br>
    	<div class="row">
    		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
    			<div class="login-panel panel panel-default">
    				<img class="img-responsive" alt="GSPE" src="dist/img/logovio.png">
    				<div class="panel-heading"><b>Login</b></div>
    				<div class="panel-body">
    					<form role="form" name="LoginF" action="index.php" method="POST">
    						<fieldset>
    							<div class="form-group">
    								<input class="form-control" placeholder="Nama Pegawai" name="nama_login" type="text" autofocus="">
    							</div>
    							<div class="form-group">
    								<input class="form-control" id="Pass" placeholder="Password" name="password" type="password">
    								<input type="checkbox" onclick="myFunction()"> Show Password
    							</div>
    							<span><a href="forgetpwd.php">Forgot Password</a></span>
    							<br>
    							<br>
    							<input type="Submit" class="btn btn-primary" name="tSubmit" value=" Login ">
    						</fieldset>
    					</form>
    				</div>
    			</div>
    		</div><!-- /.col-->
    	</div><!-- /.row -->
    	<script>
    	function myFunction() {
    	    var x = document.getElementById("Pass");
    	    if (x.type === "password") {
    	        x.type = "text";
    	    } else {
    	        x.type = "password";
    	    }
    	}
    	</script>
    </section>
    <!-- /.content -->
  </div>
  <script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
  <!-- /.content-wrapper -->
  <?php
  include('footer.php');
   ?>

</div>

</body>
</html>
