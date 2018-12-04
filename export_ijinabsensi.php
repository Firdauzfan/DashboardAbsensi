<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ijin Absensi Ke Excel</title>
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
	header("Content-Disposition: attachment; filename=DataIjinAbsensi.xls");
	?>

	<left>
		<h1>Data Ijin Absensi PT Graha Sumber Prima Elektronik</h1>
	</left>

	<table border="1">
		<tr>
      <th>No</th>
      <th>Nama Pegawai</th>
      <th>Ijin</th>
      <th>Alasan Ijin</th>
      <th>Tanggal Ijin</th>
      <th>Waktu Membuat Ijin</th>
      <th>Divisi</th>
      <th>Atasan</th>
      <th>Approve/Disapprove Dari Atasan</th>
      <th>Alasan Approve/Disapprove</th>
		</tr>

    <?php
    $sqlemp = "SELECT *, employee.divisi FROM `ijin_absensi` JOIN employee ON ijin_absensi.nama_pegawai=employee.nama_pegawai ";
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

    if (strlen($_SESSION['from'])>5) {
      $date = new DateTime($_SESSION['from']);
      $dt1=$date->format('Y-m-d'); // To match MySQL date format
      $sqlemp .= "AND DATE(face_keamanan.waktu)>= '$dt1' " ;
      $total_pages_sql .= "AND DATE(face_keamanan.waktu)>= '$dt1' ";
    }

    if (strlen($_SESSION['to'])>5) {
      $date = new DateTime($_SESSION['to']);
      $dt2=$date->format('Y-m-d'); // To match MySQL date format
      $sqlemp .= "AND DATE(face_keamanan.waktu)<= '$dt2' " ;
      $total_pages_sql .= "AND DATE(face_keamanan.waktu)<= '$dt2' ";
    }

    $sqlemp .= "ORDER BY ijin_absensi.waktu_buat_ijin ";

    $query = $con->query($sqlemp);
    $noe=1;
    while ($row = $query->fetch_assoc()) {
      echo '<tr>';
      echo '<td>'. $noe++ . '</td>';
      echo '<td>'. $row['nama_pegawai'] . '</td>';
      echo '<td>'. $row['ijin'] . '</td>';
      echo '<td>'. $row['alasan_ijin'] . '</td>';
      echo '<td>'. $row['tanggal_ijin'] . '</td>';
      echo '<td>'. $row['waktu_buat_ijin'] . '</td>';
      echo '<td>'. $row['divisi'] . '</td>';
      echo '<td>'. $row['atasan'] . '</td>';
      echo '<td>'. $row['app'] . '</td>';
      echo '<td>'. $row['alasan_app_dpp'] . '</td>';
      echo '</tr>';
    }
    ?>
	</table>
</body>
</html>
