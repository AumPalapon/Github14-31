<?php
   include "./connect/connect.php"; 
   $product_id = $_GET['abc'];
   $sql = "SELECT * FROM product WHERE md5(product_id) = '".$product_id."'";
   $query_result = $conn->query($sql);
   while ($result_array = $query_result->fetch_assoc()) {
        $product_id = $result_array['product_id'];
        $product_name_th = $result_array['product_name_th'];
        $product_name_en = $result_array['product_name_en'];
        $product_detail = $result_array['product_detail'];
        $product_number = $result_array['product_number'];
        $product_unit_id = $result_array['product_unit_id'];
        $product_type_id = $result_array['product_type_id'];
        $product_start_date = $result_array['product_start_date'];
        $product_exp_date = $result_array['product_exp_date'];
        $product_price = $result_array['product_price'];
   }
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
<br><br>
<form id="form1" name="form1" method="POST" action="product_exec.php" >

<table width="70%" border="0" align="center">
    <tr>
        <td colspan="2" bgcolor="#D3D3D3">
            <center>ข้อมูลสินค้า</center>
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            รหัสสินค้า
        </td>
        <td><?php echo $product_id; ?>
            <input type="hidden" name="product_id" id="product_id" placeholder="รหัสสินค้า" autocomplete="off" class="form-control input-lg" value="<?php echo $product_id; ?>">
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            ชื่อสินค้าภาษาไทย
        </td>
        <td>
            <input type="text" name="product_name_th" id="product_name_th" placeholder="ชื่อสินค้าภาษาไทย" autocomplete="off" class="form-control input-lg" value="<?php echo $product_name_th; ?>">
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            ชื่อสินค้าภาษาอังกฤษ
        </td>
        <td>
            <input type="text" name="product_name_en" id="product_name_en" placeholder="ชื่อสินค้าภาษาอังกฤษ" autocomplete="off" class="form-control input-lg" value="<?php echo $product_name_en; ?>">
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            รายละเอียดสินค้า
        </td>
        <td>
            <textarea name="product_detail" id="product_detail" placeholder="รายละเอียดสินค้า" autocomplete="off" class="form-control input-lg" rows="3"><?php echo $product_name_th; ?></textarea>
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            จำนวนสินค้า
        </td>
        <td>
            <input type="number" name="product_number" id="product_number" placeholder="จำนวนสินค้า" autocomplete="off" class="form-control input-lg" value="<?php echo $product_number; ?>">
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            หน่วยนับสินค้า
        </td>
        <td>
            <select class="form-control input-lg" id="product_unit_id" name="product_unit_id" >
<?php
    $sql_unit_seleted = "SELECT * FROM unit WHERE unit_id = '".$product_unit_id."'";
    $query_result_unit_seleted = $conn->query($sql_unit_seleted);
    while ($result_array_unit_seleted = $query_result_unit_seleted->fetch_assoc()) {
        echo "<option value=".$result_array_unit_seleted['unit_id'].">".$result_array_unit_seleted['unit_name']."</option>";
    }

    $sql_unit = "SELECT * FROM unit ORDER BY unit_id";
    $query_result_unit = $conn->query($sql_unit);
    while ($result_array_unit = $query_result_unit->fetch_assoc()) {
        echo "<option value=".$result_array_unit['unit_id'].">".$result_array_unit['unit_name']."</option>";
    }
?>
            </select>
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            ประเภทสินค้า
        </td>
        <td>
            <select class="form-control input-lg" id="product_type_id" name="product_type_id" >
<?php
    $sql_product_type_selected = "SELECT * FROM product_type WHERE product_type_id = '".$product_type_id."'";
    $query_result_product_type_selected = $conn->query($sql_product_type_selected);
    while ($result_array_product_type_selected = $query_result_product_type_selected->fetch_assoc()) {
        echo "<option value=".$result_array_product_type_selected['product_type_id'].">".$result_array_product_type_selected['product_type_name']."</option>";
    }
    $sql_product_type = "SELECT * FROM product_type ORDER BY product_type_id";
    $query_result_product_type = $conn->query($sql_product_type);
    while ($result_array_product_type = $query_result_product_type->fetch_assoc()) {
        echo "<option value=".$result_array_product_type['product_type_id'].">".$result_array_product_type['product_type_name']."</option>";
    }
?>
            </select>
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            วันที่ผลิตสินค้า
        </td>
        <td>
            <input type="date" name="product_start_date" id="product_start_date" placeholder="วันที่ผลิตสินค้า" autocomplete="off" class="form-control input-lg" value="<?php echo $product_start_date; ?>">
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            วันที่สินค้าหมดอายุ
        </td>
        <td>
            <input type="date" name="product_exp_date" id="product_exp_date" placeholder="วันที่สินค้าหมดอายุ" autocomplete="off" class="form-control input-lg" value="<?php echo $product_exp_date; ?>">
        </td>
    </tr>
    <tr>
        <td bgcolor="#D3D3D3">
            ราคาสินค้า
        </td>
        <td>
            <input type="text" name="product_price" id="product_price" placeholder="ราคาสินค้า" autocomplete="off" class="form-control input-lg" value="<?php echo $product_price; ?>">
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="hidden" name="chk" id="chk" value="update">
            <button type="submit" class="btn btn-success btn-block">บันทึก</button>
        </td>
    </tr>
</table>

</form>


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
