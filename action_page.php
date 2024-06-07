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

if (isset($_POST['submit-apply-job'])) {
    $uploadsDirectory = __DIR__ . "/berkas/";
    $nama = $_POST['nama'];
    $pendidikan = $_POST['pendidikan'];
    $usia = $_POST['usia'];
    $tlp = $_POST['tlp'];
    $posisi = $_POST['posisi'];
    $perusahaan = $_POST['perusahaan'];
    $email = $_POST['email'];
    $berkas = $_POST['berkas'];
    $alamat = $_POST['alamat'];
    $tglLahir = $_POST['tgl_lahir'];
    $idJob = $_POST['id_job'];
    $idAkun = $_POST['id_akun'];

    if (!is_dir($uploadsDirectory)) {
        mkdir($uploadsDirectory, 0777, true);
    }

    if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['berkas']['tmp_name'];
        $fileName = $_FILES['berkas']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $removeSpaces = preg_replace('/\s+/', "_", strtolower($nama));
        $newFileName = $removeSpaces . '.' . $fileExtension;
        $dest_path = $uploadsDirectory . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $berkas = $newFileName;
            $sql = "INSERT INTO `data-master` (id, id_akun, id_job, nama_pelamar, posisi, perusahaan, alamat, tgl_lahir, pendidikan, usia, nomor_telepon, email_pelamar, berkas, status) VALUES (0, '$idAkun', '$idJob', '$nama', '$posisi', '$perusahaan', '$alamat', '$tglLahir', '$pendidikan', '$usia', '$tlp', '$email', '$berkas', 'Not Yet')";
            $q = mysqli_query($koneksi, $sql);
            if ($q) {
                header("Location: pekerjaan-p.php");
            } else {
                $message = urlencode("Ada kesalahan! Mohon coba lagi!");
                header("Location: pekerjaan-p.php?message=".$message);
            }
        } else {
            $message= urlencode("Ada kesalahan! Mohon coba lagi!");
            header("Location: pekerjaan-p.php?message=".$message);
        }
    }

}

if (isset($_POST['submit-add-interview'])) {
    $nama = $_POST['nama'];
    $posisi = $_POST['posisi'];
    $pic = $_POST['pic'];
    $catatan = $_POST['catatan'];
    $tglInterview = $_POST['tgl-interview'];

    list($id_akun, $nama) = explode("|", $nama);
    list($posisi, $perusahaan) = explode("|", $posisi );

    $tglInterview = date("Y-m-d", strtotime($tglInterview));
    
    $sql = "INSERT INTO `data-interview` (Id, id_akun, nama_pelamar, nama_interview, posisi, perusahaan, tgl_interview, catatan) VALUES (NULL, '$id_akun', '$nama','$pic', '$posisi', '$perusahaan', '$tglInterview', '$catatan')";
    $q = mysqli_query($koneksi, $sql);
    header("Location: data-interview.php");
}

if (isset($_POST['submit-add-master'])) {
    $uploadsDirectory = __DIR__ . "/berkas/";
    $perusahaan = $_POST['perusahaan'];
    $posisi = $_POST['posisi'];
    $nama = $_POST['nama'];

    list($id_akun, $nama) = explode("|", $nama);
    list($id_job, $posisi) = explode("|", $posisi);

    $alamat = $_POST['alamat'];
    $tglLahir = $_POST['tgl_lahir'];
    $usia = $_POST['usia'];
    $pendidikan = $_POST['pendidikan'];
    $email = $_POST['email'];
    $usia = $_POST['usia'];
    $nomorTelepon = $_POST['tlp'];
    $status = 'Not Yet';
    $tglLahir = date("Y-m-d", strtotime($tglLahir));

    if (!is_dir($uploadsDirectory)) {
        mkdir($uploadsDirectory, 0777, true);
    }

    if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['berkas']['tmp_name'];
        $fileName = $_FILES['berkas']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $removeSpaces = preg_replace('/\s+/', "_", strtolower($nama));
        $newFileName = $removeSpaces . '-' . $posisi . '.' . $fileExtension;
        $dest_path = $uploadsDirectory . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $berkas = $newFileName;
            $sql = "INSERT INTO `data-master` (id, id_job, id_akun, nama_pelamar, posisi, perusahaan, alamat, tgl_lahir, pendidikan, usia, nomor_telepon, email_pelamar, berkas, status) VALUES (0, '$id_job', '$id_akun', '$nama', '$posisi', '$perusahaan', '$alamat', '$tglLahir', '$pendidikan', '$usia', '$nomorTelepon', '$email', '$berkas', 'Not Yet')";
            $q = mysqli_query($koneksi, $sql);
            header('location: data-master.php');
        }
    } else {
        
    }

    header('location: data-master.php');


    // $sql = "INSERT INTO `data-master` (id, nama_pelamar, posisi, perusahaan, alamat, tgl_lahir, pendidikan, usia, nomor_telepon, email_pelamar, berkas, status) VALUES (0, '$nama', '$posisi', '$perusahaan', '$alamat', '$tglLahir', '$pendidikan', '$usia', '$nomorTelepon', '$email', '$berkas', '$status')";
    // $q = mysqli_query($koneksi, $sql);

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

    list($id_interview, $pic) = explode("|", $pic);

    $status = $_POST['status'];

    $sql = "INSERT INTO laporan (id, id_interview, nama_pelamar, posisi, alamat, perusahaan, pendidikan, usia, nomor_telepon, pic, catatan, status) VALUES (0,'$id_interview','$nama', '$posisi', '$alamat', '$perusahaan', '$pendidikan', '$usia', '$nomorTelepon', '$pic', '$catatan', '$status')";
    var_dump($sql);

    $q = mysqli_query($koneksi, $sql);
    header("Location: laporan.php");
}


// submit edit semuanya disini
if (isset($_POST['submit-edit-master'])) {
    $id = $_POST['id'];
    $uploadsDirectory = __DIR__ . "/berkas/";
    $perusahaan = $_POST['perusahaan'];
    $posisi = $_POST['posisi'];
    $nama = $_POST['nama'];

    list($id_akun, $nama) = explode("|", $nama);
    list($id_job, $posisi) = explode("|", $posisi);

    $alamat = $_POST['alamat'];
    $tglLahir = $_POST['tgl_lahir'];
    $usia = $_POST['usia'];
    $pendidikan = $_POST['pendidikan'];
    $email = $_POST['email'];
    $usia = $_POST['usia'];
    $nomorTelepon = $_POST['tlp'];
    $status = 'Not Yet';
    $tglLahir = date("Y-m-d", strtotime($tglLahir));

    if (!is_dir($uploadsDirectory)) {
        mkdir($uploadsDirectory, 0777, true);
    }

    if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['berkas']['tmp_name'];
        $fileName = $_FILES['berkas']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $removeSpaces = preg_replace('/\s+/', "_", strtolower($nama));
        $newFileName = $removeSpaces . '-' . $posisi . '.' . $fileExtension;
        $dest_path = $uploadsDirectory . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $berkas = $newFileName;
            $sql = "UPDATE `data-master` SET id_job = '$id_job', id_akun = '$id_akun', nama_pelamar = '$nama', posisi = '$posisi', perusahaan = '$perusahaan', alamat = '$alamat', tgl_lahir = '$tglLahir', pendidikan = '$pendidikan', usia = '$usia', nomor_telepon='$nomorTelepon', email_pelamar = '$email', berkas = '$berkas', status='$status' WHERE id = '$id'";
            // var_dump($sql);
            $q = mysqli_query($koneksi, $sql);
            header('location: data-master.php');
        }
    } else {
        $sql = "UPDATE `data-master` SET id_job = '$id_job', id_akun = '$id_akun', nama_pelamar = '$nama', posisi = '$posisi', perusahaan = '$perusahaan', alamat = '$alamat', tgl_lahir = '$tglLahir', pendidikan = '$pendidikan', usia = '$usia', nomor_telepon='$nomorTelepon', email_pelamar = '$email', status='$status' WHERE id = '$id'";
        var_dump($sql);
        $q = mysqli_query($koneksi, $sql);
        header('location: data-master.php');
    }
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
    $idAkun = $_POST['idAkun']; // FOREIGN KEY
    $nama = $_POST['nama'];
    $posisi = $_POST['posisi'];
    $pic = $_POST['pic'];
    $catatan = $_POST['catatan'];
    $tglInterview = $_POST['tgl-interview'];

    $sql = "UPDATE `data-interview` SET nama_interview = '$pic', tgl_interview = '$tglInterview', catatan = '$catatan' WHERE id = $id";
    // var_dump($sql);
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

//ajax

if (isset($_POST['perusahaan'])) {
    $namaPerusahaan = $_POST['perusahaan'];
    $sql = "SELECT DISTINCT id, posisi FROM job WHERE perusahaan = '$namaPerusahaan'";
    $q = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows(($q)) > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            $posisi = $row['posisi'];
            $id = $row['id'];
            echo "<option value='$id|$posisi'>$posisi</option>";
        }
    }
}

if (isset($_POST['perusahaanLaporan'])) {
    $namaPerusahaan = $_POST['perusahaanLaporan'];
    $sql = "SELECT DISTINCT id, posisi FROM job WHERE perusahaan = '$namaPerusahaan'";
    $q = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows(($q)) > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            $posisi = $row['posisi'];
            $id = $row['id'];
            echo "<option value='$posisi'>$posisi</option>";
        }
    }
}
?>