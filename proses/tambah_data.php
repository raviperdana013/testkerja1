<?php
include '../koneksi.php';
error_reporting(0);

if (isset($_POST["tambahkaryawan"])) {

    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $j_k = $_POST['j_k'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $tgl_masuk = $_POST['tgl_masuk'];

    $lahir = strtotime($tgl_lahir);
    $masuk = strtotime($tgl_masuk);
    $id_gaji = $_POST['id_gaji'];

    $ceknip = mysqli_query($koneksi, "SELECT * FROM karyawan where nip=$nip");
    $jumlahnip = mysqli_num_rows($ceknip);

    if ($nama == null || $nip == null || $j_k == null  || $tgl_lahir == null  || $tgl_masuk == null  || 
    $id_gaji == null) { ?>
        <script>
            alert('DATA BELUM LENGKAP');
            window.location = "../index.php";
        </script>
    <?php } else if ($jumlahnip != 0) { ?>
        <script>
            alert('NIP SUDAH DIGUNAKAN');
            window.location = "../index.php";
        </script>
    <?php } else if ($masuk < $lahir) { ?>
        <script>
            alert('PROSES INPUT SALAH');
            window.location = "../index.php";
        </script>
        <?php } else {
        $query = mysqli_query($koneksi, "INSERT INTO karyawan values('','$nip','$nama','$j_k','$tgl_lahir','$tgl_masuk','$id_gaji')");

        if ($query) { ?>
            <script>
                window.location = "../index.php";
            </script>
<?php } else {
            echo "gagal";
        }
    }
}
?>