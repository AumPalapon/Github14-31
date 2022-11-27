<?php 
    include "./connect/connect.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<!-- -------------------- head start -------------------- -->

    <head>
        <title>Github</title>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <link href="./css/styles2.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=serif&family=serif:wght@300&display=swap" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            .content {
                    margin-top: 100px;
                }
                body {
                font-family: 'serif;', sans-serif;
                }
                h1 {
                font-family: 'serif', sans-serif;
                }
                table {
                font-family: 'serif', sans-serif;
                font-size:small;
                }
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {height: 1500px}

            /* Set gray background color and 100% height */
            .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
            background-color: #555;
            color: white;
            padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;} 
            }
        </style>
    </head>
<!-- -------------------- head ended -------------------- -->

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Github</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <font color="#FFFFFF">ระบบจัดการฐานข้อมูล</font>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <?php  include("./headmenu.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
<!-- -------------------- Content edited start -------------------- -->

<?php
    if($_POST['chk'] == "insert"){

        $unit_id = $_POST['unit_id'];
        $unit_name = $_POST['unit_name'];

        $sql = "INSERT INTO unit(unit_id, unit_name) ";
        $sql.= "VALUES ('$unit_id', '$unit_name')";

        if ($conn->query($sql) === TRUE) {
            echo "<center><br><br><h5>บันทึกข้อมูลสำเร็จแล้ว</h5><br></center>";
            echo "<center><h4>กรุณารอสักครู่...</h4></center>";
            echo "<meta http-equiv='refresh' content='1; url=unit_show.php'>";
        }else{
            echo "<center><a href='unit_show.php'><h5>ไม่สามารถบันทึกข้อมูลได้</h5></a></center>";
        } 
        $conn->close();
    }
?>
<?php
    if($_GET['chk'] == "delete"){

      $unit_id = $_GET['unit_id'];

      $sql = "DELETE FROM unit WHERE unit_id = '$unit_id'";

      if ($conn->query($sql) === TRUE) {
          echo "<center><br><br><h5>ลบข้อมูลสำเร็จแล้ว</h5><br></center>";
          echo "<center><h4>กรุณารอสักครู่...</h4></center>";
          echo "<meta http-equiv='refresh' content='1; url=unit_show.php'>";
      }else{
        echo "<center><a href='unit_show.php'><h5>ไม่สามารถลบข้อมูลได้</h5></a></center>";
      } 
      $conn->close();
    }
?>
<?php
  if($_POST['chk'] == "update"){
    $unit_id = $_POST['unit_id'];
    $unit_name = $_POST['unit_name'];

    $sql = "UPDATE unit SET unit_name = '$unit_name'";
    $sql.= " WHERE unit_id = '$unit_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<center><br><br><h5>แก้ไขข้อมูลสำเร็จแล้ว</h5><br></center>";
        echo "<center><h4>กรุณารอสักครู่...</h4></center>";
        echo "<meta http-equiv='refresh' content='1; url=unit_show.php'>";
    }else{
        echo "<center><a href='unit_show.php'><h5>ไม่สามารถแก้ไขข้อมูลได้</h5></a></center>";
    } 
    $conn->close();
 }
?>
<!-- -------------------- Content edited ended -------------------- -->
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Github 14 - 31</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
<!-- -------------------- script tag start -------------------- -->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
<!-- -------------------- script tag ended -------------------- -->

    </body>
</html>
