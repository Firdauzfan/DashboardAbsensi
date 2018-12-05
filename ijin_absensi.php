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
  include('scriptcss.php')
  ?>
  <style>
  .iframe-container {
    padding-bottom: 60%;
    padding-top: 30px; height: 0; overflow: hidden;
    }

    .iframe-container iframe,
    .iframe-container object,
    .iframe-container embed{
    position: absolute;
    top: 0;
    left: 0;
    width: 200%;
    height: 200%;
    }

    .modal.in .modal-dialog {
    transform: none; /*translate(0px, 0px);*/
    }
  </style>
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
        <small>Ijin Absensi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ijin Absensi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="content-absolute">

      <div class="content-absolute">
            <form action="ijin_absensi.php" method="post">
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
                    <p>From: <input type="text" id="datepicker" name="from"></p>
                    <p>To: <input type="text" id="datepicker2" name="to"></p>
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
                      <th>Ijin</th>
                      <th>Alasan Ijin</th>
                      <th>Tanggal Ijin</th>
                      <th>Waktu Membuat Ijin</th>
                      <th>Divisi</th>
                      <th>Atasan</th>
                      <th>Approve/Disapprove Dari Atasan</th>
                      <th>Alasan Approve/Disapprove</th>
                      <th>Lampiran</th>
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
                   $total_pages_sql = "SELECT COUNT(*) FROM `ijin_absensi` JOIN employee ON ijin_absensi.nama_pegawai=employee.nama_pegawai";
                   $result = $con->query($total_pages_sql);
                   $total_rows = mysqli_fetch_array($result)[0];
                   $total_pages = ceil($total_rows / $no_of_records_per_page);

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
                   $sqlemp .= "LIMIT $offset, $no_of_records_per_page";

                   $query = $con->query($sqlemp);

                   // $time=date("Y-m-d");
                   // echo $time;

                   $no=1;
                   $noe=$offset+1;
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
                            if ($row['tipe_lampiran']=='Photo') {
                              echo '<td width=250>';
                              echo '<img style="width:20%;height:10%" id="'.$no++.'" data-toggle="modal" data-target="#myModal" src="Lampiran/'. $row['lampiran'] .'" alt="'. $row['nama_pegawai'] . '" />';
                              echo '</td>';
                            }
                            if ($row['tipe_lampiran']=='Document') {
                              echo '<td width=250>';
                              echo '<a class="btn btn-primary view-pdf" href="Lampiran/'. $row['lampiran'] .'" alt="'. $row['nama_pegawai'] . '">View PDF</a> ';
                              echo '</td>';
                            }
                            echo '</tr>';
                   }

                  ?>

                  </tbody>
            </table>
            <center>
              <a target="_blank" href="export_ijinabsensi.php">EXPORT KE EXCEL</a>
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
      /*
      * This is the plugin
      */
      (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

      /*
      * Here is how you use it
      */
      $(function(){
          $('.view-pdf').on('click',function(){
              var pdf_link = $(this).attr('href');
              //var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
              //var iframe = '<object data="'+pdf_link+'" type="application/pdf"><embed src="'+pdf_link+'" type="application/pdf" /></object>'
              var iframe = '<object type="application/pdf" data="'+pdf_link+'" width="100%" height="700">No Support</object>'
              $.createModal({
                  title:'My Title',
                  message: iframe,
                  closeButton:true,
                  scrollable:false
              });
              return false;
          });
      })
    </script>
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
