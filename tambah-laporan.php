<?php

include "koneksi.php";


if (isset($_POST['simpan'])) {
    $perusahaan    = $_POST['perusahaan'];
    $nama_p          = $_POST['nama_pelamar'];
    $posisi            = $_POST['posisi'];
    $alamat         = $_POST['alamat'];
    $pendi         = $_POST['pendidikan'];
    $usia         = $_POST['usia'];
    $tlp         = $_POST['nomor_telepon'];
    $nama_i         = $_POST['nama_interview'];
    $catt         = $_POST['catatan'];
    $stat         = $_POST['hasil'];
    $sql = mysqli_query($koneksi, "INSERT INTO laporan (perusahaan, nama_pelamar, posisi, alamat, pendidikan, usia, nomor_telepon, nama_interview, catatan, hasil) VALUES ('$_POST[perusahaan]',
                                                            '$_POST[nama_pelamar]',
                                                            '$_POST[posisi]',
                                                            '$_POST[alamat]',
                                                            '$_POST[pendidikan]',
                                                            '$_POST[usia]',
                                                            '$_POST[nomor_telepon]',
                                                            '$_POST[nama_interview]',
                                                            '$_POST[catatan]',
                                                            '$_POST[hasil]') ");

    if ($sql){
        echo "<script>alert('Data Berhasil Disimpan');document.location='laporan.php'</script>";
    }
        else {
            echo "<script>alert('Data Gagal Disimpan');document.location='laporan.php'</script>";
        }

    mysqli_close($koneksi);
}
?>