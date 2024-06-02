<?php
require_once("koneksi.php");

// submit add semuanya disini

if (isset($_POST['submit-add-job'])) {
    $perusahaan = $_POST['perusahaan'];
    $posisi = $_POST['posisi'];
    $deskripsi = $_POST['desk'];

    $sql = "INSERT INTO job (id, perusahaan, posisi, deskripsi) VALUES (0, '$perusahaan', '$posisi', '$deskripsi')";
    $q = mysqli_query($koneksi, $sql);

    header("Location: pekerjaan.php");
}

if (isset($_POST['submit-add-interview'])) {
    $nama = $_POST['nama'];
    $posisi = $_POST['posisi'];
    $alamat = $_POST['alamat'];
    $pendidikan = $_POST['pendidikan'];
    $usia = $_POST['usia'];
    $nomorTelepon = $_POST['tlp'];
    $pic = $_POST['pic'];
    $catatan = $_POST['catatan'];
    $status = $_POST['status'];

    $sql = "INSERT INTO `data-interview` (id, nama_interview, nama_pelamar, posisi, tgl_interview,)";
}

if (isset($_POST['submit-add-master'])) {
    $nama = $_POST['nama'];
    $posisi = $_POST['posisi'];
    $perusahaan = $_POST['perusahaan'];
    $alamat = $_POST['alamat'];
    $tglLahir = $_POST['tgl_lahir'];
    $usia = $_POST['usia'];
    $pendidikan = $_POST['pendidikan'];
    $email = $_POST['email'];
    $usia = $_POST['usia'];
    $berkas = $_POST['berkas'];
    $nomorTelepon = $_POST['tlp'];
    $status = 'Not Yet';

    $tglLahir = date("Y-m-d", strtotime($tglLahir));

    $sql = "INSERT INTO `data-master` (id, nama_pelamar, posisi, perusahaan, alamat, tgl_lahir, pendidikan, usia, nomor_telepon, email_pelamar, berkas, status) VALUES (0, '$nama', '$posisi', '$perusahaan', '$alamat', '$tglLahir', '$pendidikan', '$usia', '$nomorTelepon', '$email', '$berkas', '$status')";
    $q = mysqli_query($koneksi, $sql);

    header("Location: data-master.php");
}

if (isset($_POST['submit-add-laporan'])) {
    $nama = $_POST['nama'];
    $posisi = $_POST['posisi'];
    $perusahaan = $_POST['perusahaan'];
    $alamat = $_POST['alamat'];
    $usia = $_POST['usia'];
    $pendidikan = $_POST['pendidikan'];
    $usia = $_POST['usia'];
    $nomorTelepon = $_POST['tlp'];
    $status = 'Not Yet';
    $catatan = $_POST['catatan'];
    $pic = $_POST['nama_interview'];
    $status = $_POST['status'];

    $sql = "INSERT INTO laporan (Id, perusahaan, nama_pelamar, posisi, alamat, pendidikan, usia, nomor_telepon, nama_interview, catatan, hasil) VALUES (0, '$perusahaan', '$nama', '$posisi', '$alamat', '$pendidikan', '$usia', '$nomorTelepon', '$pic', '$catatan', '$status')";

    $q = mysqli_query($koneksi, $sql);
    header("Location: laporan.php");
}


// submit edit semuanya disini
if (isset($_POST['submit-edit-master'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $posisi = $_POST['posisi'];
    $perusahaan = $_POST['perusahaan'];
    $alamat = $_POST['alamat'];
    $tglLahir = $_POST['tgl_lahir'];
    $usia = $_POST['usia'];
    $pendidikan = $_POST['pendidikan'];
    $email = $_POST['email'];
    $usia = $_POST['usia'];
    $berkas = $_POST['berkas'];
    $nomorTelepon = $_POST['tlp'];
    $status = $_POST['status'];

    $tglLahir = date("Y-m-d", strtotime($tglLahir));

    $sql = "UPDATE `data-master` SET nama_pelamar = '$nama', posisi = '$posisi', perusahaan = '$perusahaan', alamat = '$alamat', tgl_lahir = '$tglLahir', pendidikan = '$pendidikan', usia = '$usia', nomor_telepon='$nomorTelepon', email_pelamar = '$email', berkas = '$berkas', status='$status' WHERE Id = '$id'";
    $q = mysqli_query($koneksi, $sql);

    header("Location: data-master.php");
}

if (isset($_POST['submit-edit-job'])) {
    $id = $_POST['id'];
    $perusahaan = $_POST['perusahaan'];
    $posisi = $_POST['posisi'];
    $deskripsi = $_POST['desk'];

    $sql = "UPDATE job SET perusahaan = '$perusahaan', posisi = '$posisi', deskripsi = '$deskripsi' WHERE id = '$id'";
    $q = mysqli_query($koneksi, $sql);

    header("Location: pekerjaan.php");
}


if (isset($_POST['submit-edit-interview'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $pic = $_POST['pic'];
    $tgl = $_POST['tgl-interview'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan'];
    $posisi = $_POST['posisi'];

    $sql = "UPDATE `data-interview` SET nama_interview = '$nama', nama_pelamar = '$pic', posisi = '$posisi', tgl_interview = '$tgl', catatan = '$catatan', status='$status' WHERE Id = '$id'";
    var_dump($sql);
    $q = mysqli_query($koneksi, $sql);

    header("Location: data-interview.php");
}

// delete semua disini

if ($_GET['id'] != "" && $_GET['del'] === '1' && $_GET['from'] === "dm") {
    $sql = "DELETE FROM `data-master` WHERE id = $_GET[id]";

    $q = mysqli_query($koneksi, $sql);
    header("Location: data-master.php");
}

if ($_GET['id'] != "" && $_GET['del'] === '1' && $_GET['from'] === "di") {
    $sql = "DELETE FROM `data-interview` WHERE id = $_GET[id]";

    $q = mysqli_query($koneksi, $sql);
    header("Location: data-interview.php");
}

if ($_GET['id'] != "" && $_GET['del'] === '1' && $_GET['from'] === "pk") {
    $sql = "DELETE FROM `job` WHERE id = $_GET[id]";

    $q = mysqli_query($koneksi, $sql);
    header("Location: pekerjaan.php");
}

?>