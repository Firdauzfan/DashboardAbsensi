<?php
// Start the session
session_start();

// Cek Login Apakah Sudah Login atau Belum
if (!isset($_SESSION['nama_log'])){
// Jika Tidak Arahkan Kembali ke Halaman Login
  header("location: index.php");
}

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
  include('scriptcss.php');
  ?>
  <?php
  include('config/db.php');
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

 <?php
 if(isset($_POST['btn-submit'])){
   $_SESSION['valuedivisi'] = $_POST['valuedivisi'];
   $_SESSION['from'] = $_POST['from'];
   $_SESSION['to'] = $_POST['to'];
 }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Karyawan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Karyawan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="content-absolute">
      <form action="employee.php" method="post">
          <table border="0">
              <tr>
                  <th>Filter Search</th>
              </tr>
              <tr>
                  <td>Pilih Filter Divisi</td>
                  <td></td>
                  <td>
                      <select name="valuedivisi">
                          <option name="divisi" value="All">All</option>
                          <?php
                            $divisisql="SELECT DISTINCT divisi FROM employee WHERE 1 ORDER BY divisi";
                            $query2 = $con->query($divisisql);
                            while ($row = $query2->fetch_assoc()) {
                              $div=$row['divisi'];
                              echo "<option name='divisi' value='". $div."'>" . $div. "</option>\n";
                            }

                           ?>
                      </select>
                  </td>
              </tr>
              <td>
                  <input type="submit" name="btn-submit" value="Search"/>
              </td>
          </table>
          </form>

            <table class="table table-striped table-bordered">
                  <thead>
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
                  </thead>
                  <tbody>
                  <div id="pageone" data-role="main" class="ui-content">
                  <?php

                   if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                   $no_of_records_per_page = 25;
                   $offset = ($pageno-1) * $no_of_records_per_page;
                   $total_pages_sql = "SELECT COUNT(*) FROM `employee`";
                   $result = $con->query($total_pages_sql);
                   $total_rows = mysqli_fetch_array($result)[0];
                   $total_pages = ceil($total_rows / $no_of_records_per_page);

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

                    $sqlemp .= "ORDER BY divisi,nama_pegawai LIMIT $offset, $no_of_records_per_page";

                   $query = $con->query($sqlemp);

                   // $time=date("Y-m-d");
                   // echo $time;

                   $no=1;
                   $noe=$offset+1;
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

                  </tbody>
            </table>
            <center>
          		<a target="_blank" href="export_employee.php">EXPORT KE EXCEL</a>
          	</center>
                  <ul class="pagination">
                      <li><a href="?pageno=1">First</a></li>
                      <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                          <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                      </li>
                      <?php
                      for($i = 1; $i<=$total_pages; $i++)
                      {
                          $pageLink = "?pageno=$i";
                          print("<li><a href=$pageLink>$i</a></li>");
                      }

                      ?>
                      <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                          <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                      </li>
                      <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                  </ul>
      </div>
      <!-- <img height="100" width="80" id="1" data-toggle="modal" data-target="#myModal" src='http://tympanus.net/Tutorials/CaptionHoverEffects/images/1.png' alt='Text dollar code part one.' />
      <img height="100" width="80" id="2" data-toggle="modal" data-target="#myModal" src='http://tympanus.net/Tutorials/CaptionHoverEffects/images/2.png' alt='Text dollar code part one.' /> -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-responsive" src="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
      </div>

      <script>
      // Get the modal
      jQuery(document).ready(function () {
        jQuery('#myModal').on('show.bs.modal', function (e) {
            var image = jQuery(e.relatedTarget).attr('src');
            jQuery(".img-responsive").attr("src", image);
        });
      });
      </script>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('footer.php');
   ?>

</div>

</body>
</html>
