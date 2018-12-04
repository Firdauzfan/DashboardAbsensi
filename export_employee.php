<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Export Data Karyawan Ke Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
  <?php
    include('config/db.php');

   ?>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=DataPegawai.xls");
	?>

	<left>
		<h1>Data Karyawan PT Graha Sumber Prima Elektronik</h1>
	</left>

	<table border="1">
		<tr>
      <th>No</th>
      <th>Nama Pegawai</th>
      <th>NIP</th>
      <th>Email</th>
      <th>No HP</th>
      <th>Divisi</th>
      <th>Jabatan</th>
      <th>Warning 1</th>
      <th>Warning 2</th>
      <th>Warning 3</th>
		</tr>

    <?php
    $sqlemp = "SELECT * FROM `employee` ";
    $sqlemp .= "WHERE 1 ";

    if (strlen($_SESSION['valuedivisi'])>=1) {
         if ($_SESSION['valuedivisi']=='All') {
           $sqlemp .= " ";
           $total_pages_sql .= " ";
         }else {
           $div=$_SESSION['valuedivisi'];
           $sqlemp .= "AND divisi='$div' ";
           $total_pages_sql .= "AND divisi='$div' ";
         }
     }

    $query = $con->query($sqlemp);
    $noe=1;
    while ($row = $query->fetch_assoc()) {
             echo '<tr>';
             echo '<td>'. $noe++ . '</td>';
             echo '<td>'. $row['nama_pegawai'] . '</td>';
             echo '<td>'. $row['id_pegawai'] . '</td>';
             echo '<td>'. $row['email'] . '</td>';
             echo '<td>'. $row['no_hp'] . '</td>';
             echo '<td>'. $row['divisi'] . '</td>';
             echo '<td>'. $row['jabatan'] . '</td>';
             echo '<td>'. $row['warning1'] . '</td>';
             echo '<td>'. $row['warning2'] . '</td>';
             echo '<td>'. $row['warning3'] . '</td>';
             echo '</tr>';
    }
    ?>
	</table>
</body>
</html>
