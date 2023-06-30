<?php
include '../koneksi.php';

if (isset($_POST["editkaryawan"])) {

    $id_karyawan = $_POST['id_karyawan'];
    $nama = $_POST['nama2'];
    $nip = $_POST['nip2'];
    $j_k = $_POST['j_k2'];
    $tgl_lahir = $_POST['tgl_lahir2'];
    $tgl_masuk = $_POST['tgl_masuk2'];

    $lahir = strtotime($tgl_lahir);
    $masuk = strtotime($tgl_masuk);
    $id_gaji = $_POST['id_gaji2'];

    $ceknip = mysqli_query($koneksi, "SELECT * FROM karyawan where nip=$nip");
    $rownip = mysqli_fetch_assoc($ceknip);
    $nipp = $rownip['nip'];

    $jumlahnip = mysqli_num_rows($ceknip);

    if ($nama == null || $nip == null || $j_k == null  || $tgl_lahir == null  || $tgl_masuk == null  || 
    $id_gaji == null) { ?>
        <script>
            alert('DATA BELUM LENGKAP');
            window.location = "../index.php";
        </script>
    <?php } else if ($masuk < $lahir) { ?>
        <script>
            alert('PROSES INPUT SALAH');
            window.location = "../index.php";
        </script>
        <?php } else {
        $query = mysqli_query($koneksi, "UPDATE karyawan set nama_karyawan='$nama', nip='$nip', gender='$j_k', 
        tgl_lahir='$tgl_lahir', tgl_masuk='$tgl_masuk', id_grade=$id_gaji where id_karyawan='$id_karyawan'");

        if ($query) { ?>
            <script>
                window.location = "../index.php";
            </script>
        <?php } else {
            echo "gagal";
        }
    }
} ?>