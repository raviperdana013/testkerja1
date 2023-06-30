<?php
include 'koneksi.php';
$page = 'Website Karyawan';
$subpage = 'Data Karyawan';
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title><?php echo $page ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css" />
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="dist/css/style.min.css" rel="stylesheet" />

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">

                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon ps-2">

                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" width="25" />
                        </b>
                        <span class="logo-text ms-2">
                            <!-- dark Logo text -->
                            <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"><?php echo $subpage ?></span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?php echo $subpage ?></h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <?php echo $subpage ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <button style="color:white" type="button" class="btn btn-success btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#tambahkaryawan"><i class="icofont-plus-circle me-2 fs-6"></i>Tambah Data
                    Karyawan</button>
                <br><br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <form method="post" action="">
                                        <div class="row">
                                            <div align="right" class="col-1">
                                                <label for="">Dari :</label>
                                            </div>
                                            <div align="left" class="col-2">
                                                <input type="date" name="dari" class="form-control" style="width: 200px;">
                                            </div>
                                            <div align="right" class="col-1">
                                                <label for="">Sampai :</label>
                                            </div>
                                            <div align="left" class="col-2">
                                                <input type="date" name="sampai" class="form-control" style="width: 200px;">
                                            </div>
                                            <div align="left" class="col-3">
                                                <button name="btn_filter" class="btn btn-primary">Filter Tanggal Masuk</button>
                                                <button style="color:white" name="btn_refresh" class="btn btn-success">Refresh</button>
                                            </div>
                                        </div>
                                    </form>

                                </center>
                                <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr style="background-color: gray;">
                                                <th style="color: white; text-align:center;">No</th>
                                                <th style="color: white; text-align:center;">NIP</th>
                                                <th style="color: white; text-align:center;">NAMA</th>
                                                <th style="color: white; text-align:center;">GENDER</th>
                                                <th style="color: white; text-align:center;">TGL LAHIR</th>
                                                <th style="color: white; text-align:center;">TGL MASUK</th>
                                                <th style="color: white; text-align:center;">GRADE</th>
                                                <th style="color: white; text-align:center;">GAJI</th>
                                                <th style="color: white; text-align:center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['btn_filter'])) {

                                                $datedari = $_POST['dari'];
                                                $datesampai = $_POST['sampai'];

                                                if ($datedari != null && $datesampai != null) {
                                                    $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan a, gaji b where a.id_grade=b.id_gaji and
                                                    (a.tgl_masuk BETWEEN '$datedari' and '$datesampai') order by id_karyawan desc");
                                                }else if($datedari != null && $datesampai == null){
                                                    $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan a, gaji b where a.id_grade=b.id_gaji and
                                                    (a.tgl_masuk >= '$datedari') order by id_karyawan desc");
                                                }else if($datedari == null && $datesampai != null){
                                                    $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan a, gaji b where a.id_grade=b.id_gaji and
                                                    (a.tgl_masuk <= '$datesampai') order by id_karyawan desc");
                                                }
                                            } else if (isset($_POST['btn_refresh'])) {
                                                $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan a, gaji b where a.id_grade=b.id_gaji order by id_karyawan desc");
                                            } else {
                                                $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan a, gaji b where a.id_grade=b.id_gaji order by id_karyawan desc");
                                            }

                                            $no = 1;
                                            while ($row = mysqli_fetch_assoc($karyawan)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row['nip'] ?></td>
                                                    <td><?php echo $row['nama_karyawan'] ?></td>
                                                    <td><?php echo $row['gender'] ?></td>
                                                    <td><?php echo tgl_indo($row['tgl_lahir']) ?></td>
                                                    <td><?php echo tgl_indo($row['tgl_masuk']) ?></td>
                                                    <td><?php echo $row['grade'] ?></td>
                                                    <td><?php echo rupiah($row['gaji']) ?></td>
                                                    <td>
                                                        <div class="comment-footer">
                                                            <a class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editkaryawan<?php echo $row['nip'] ?>">
                                                                Edit
                                                            </a>
                                                            <a class="btn btn-danger btn-sm text-white" onclick="return confirm('Anda yakin akan menghapus data ini?')" href="proses/hapus_data.php?nip=<?php echo $row['nip'] ?>">
                                                                Delete
                                                            </a>
                                                        </div>

                                                    </td>
                                                    <div class="modal fade" id="editkaryawan<?php echo $row['nip'] ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title  fw-bold" id="leaveaddLabel">Edit Data Karyawan</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="deadline-form">
                                                                        <form action="proses/edit_data.php" method="post" enctype="multipart/form-data" role="form">
                                                                            <div class="mb-3">
                                                                                <label for="sub" class="form-label">NIP</label>
                                                                                <input required type="number" class="form-control" id="nip2" name="nip2" placeholder="NIP" value="<?php echo $row['nip'] ?>">
                                                                                <input type="number" class="form-control" hidden id="id_karyawan" name="id_karyawan" placeholder="NIP" value="<?php echo $row['id_karyawan'] ?>">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="depone" class="form-label">Nama Lengkap</label>
                                                                                <input type="text" class="form-control" id="nama2" name="nama2" placeholder="Nama Lengkap" value="<?php echo $row['nama_karyawan'] ?>">
                                                                            </div>
                                                                            <div class="row g-3 mb-3">
                                                                                <div class="col-4">
                                                                                    <label for="sub" class="form-label">Jenis Kelamin</label>
                                                                                    <select id="j_k2" name="j_k2" class="form-control" style="width: 100%;">
                                                                                        <option value="<?php echo $row['gender'] ?>" selected="selected"><?php echo $row['gender'] ?></option>
                                                                                        <option value="MALE">MALE</option>
                                                                                        <option value="FEMALE">FEMALE</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <label for="deptwo" class="form-label">Tanggal Lahir</label>
                                                                                    <input type="date" class="form-control" id="tgl_lahir2" name="tgl_lahir2" value="<?php echo $row['tgl_lahir'] ?>">
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <label for="deptwo" class="form-label">Tanggal Masuk</label>
                                                                                    <input type="date" class="form-control" id="tgl_masuk2" name="tgl_masuk2" value="<?php echo $row['tgl_masuk'] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row g-3 mb-3">

                                                                                <div class="col-4">
                                                                                    <label for="sub" class="form-label">Grade Gaji</label>
                                                                                    <select id="id_gaji2" name="id_gaji2" class="form-control" onchange="changeValue2<?php echo $row['nip'] ?>(this.value)" style="width: 100%;">
                                                                                        <option value="<?php echo $row['id_grade'] ?>" selected><?php echo $row['grade'] ?></option>
                                                                                        <?php
                                                                                        $datagaji2 = mysqli_query($koneksi, "SELECT * FROM gaji");
                                                                                        $jsArray11 = "var gaji2 = new Array();";
                                                                                        if (mysqli_num_rows($datagaji2)) { ?>
                                                                                            <?php while ($row_gaji2 = mysqli_fetch_array($datagaji2)) { ?>
                                                                                                <option value="<?php echo $row_gaji2["id_gaji"] ?>"> <?php echo $row_gaji2["grade"] ?>
                                                                                                <?php
                                                                                                $jsArray11 .= "gaji2['" . $row_gaji2['id_gaji'] . "'] = {gaji2:'" . addslashes($row_gaji2['gaji']) . "'};";
                                                                                            } ?>
                                                                                            <?php } ?>
                                                                                    </select>

                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <label for="sub" class="form-label">Nominal Gaji</label>
                                                                                    <input readonly type="number" class="form-control" id="gaji2<?php echo $row['nip'] ?>" name="gaji2" placeholder="nominal" value="<?php echo $row['gaji'] ?>">
                                                                                </div>
                                                                                <script>
                                                                                    <?php echo $jsArray11; ?>

                                                                                    function changeValue2<?php echo $row['nip'] ?>(id) {
                                                                                        document.getElementById("gaji2<?php echo $row['nip'] ?>").value = gaji2[id].gaji2;
                                                                                    };
                                                                                </script>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                <button type="submit" name="editkaryawan" class="btn btn-primary">Edit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            <?php
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal fade" id="tambahkaryawan" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title  fw-bold" id="leaveaddLabel"> Tambah Data Karyawan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="deadline-form">
                                <form action="proses/tambah_data.php" method="post" enctype="multipart/form-data" role="form">
                                    <div class="mb-3">
                                        <label for="sub" class="form-label">NIP</label>
                                        <input required type="number" class="form-control" id="nip" name="nip" placeholder="NIP">
                                    </div>
                                    <div class="mb-3">
                                        <label for="depone" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-4">
                                            <label for="sub" class="form-label">Jenis Kelamin</label>
                                            <select id="j_k" name="j_k" class="form-control" style="width: 100%;">
                                                <option value="" disabled selected="selected">-- Pilih Jenis
                                                    Kelamin
                                                    --
                                                </option>
                                                <option value="MALE">MALE</option>
                                                <option value="FEMALE">FEMALE</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="deptwo" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                        </div>
                                        <div class="col-4">
                                            <label for="deptwo" class="form-label">Tanggal Masuk</label>
                                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">

                                        <div class="col-4">
                                            <label for="sub" class="form-label">Grade Gaji</label>
                                            <select id="id_gaji" name="id_gaji" class="form-control" onchange="changeValue(this.value)" style="width: 100%;">
                                                <option value="" disabled selected>Pilih Bahan</option>
                                                <?php
                                                $datagaji = mysqli_query($koneksi, "SELECT * FROM gaji");
                                                $jsArray1 = "var gaji = new Array();";
                                                if (mysqli_num_rows($datagaji)) { ?>
                                                    <?php while ($row_gaji = mysqli_fetch_array($datagaji)) { ?>
                                                        <option value="<?php echo $row_gaji["id_gaji"] ?>"> <?php echo $row_gaji["grade"] ?>
                                                        <?php
                                                        $jsArray1 .= "gaji['" . $row_gaji['id_gaji'] . "'] = {gaji:'" . addslashes($row_gaji['gaji']) . "'};";
                                                    } ?>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-8">
                                            <label for="sub" class="form-label">Nominal Gaji</label>
                                            <input readonly type="number" class="form-control" id="gaji" name="gaji" placeholder="nominal">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="tambahkaryawan" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <footer class="footer text-center">
                PT Tribintang Emas Mulia
            </footer>

        </div>

    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
    </script>

    <script src="../assets/sweetalert2.min.js"></script>

    <script>
        <?php echo $jsArray1; ?>

        function changeValue(id) {
            document.getElementById("gaji").value = gaji[id].gaji;
        };
    </script>

    <script>
        <?php echo $jsArray11; ?>

        function changeValue2(id) {
            document.getElementById("gaji2").value = gaji2[id].gaji2;
        };
    </script>

</body>

</html>