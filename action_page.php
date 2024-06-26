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
    $username = $_POST['username'];

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
            $sql = "INSERT INTO pelamar (id_pelamar, username, id_akun, nama_pelamar, email_pelamar, tgl_lahir, alamat, pendidikan, nomor_telepon, usia, id_job, posisi, perusahaan, berkas) VALUES (0, '$username', '$idAkun', '$nama', '$email', '$tglLahir', '$alamat', '$pendidikan', '$tlp', '$usia', '$idJob', '$posisi', '$perusahaan', '$berkas')";
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
    $pic = $_POST['pic'];
    $emailPic = $_POST['emailpic'];
    $catatan = $_POST['catatan'];
    $posisi = $_POST['posisi'];
    $tglInterview = $_POST['tgl-interview'];
    $status = $_POST['status'];

    list($id_pelamar, $nama) = explode("|", $nama);
    list($posisi, $perusahaan) = explode("|", $posisi);

    $tglInterview = date("Y-m-d", strtotime($tglInterview));
    
    $sql = "INSERT INTO interview (id_interview, id_pelamar, nama_interviewer, email_interviewer, nama_pelamar, posisi, perusahaan, tgl_interview, catatan, status) VALUES (NULL, '$id_pelamar', '$pic','$emailPic', '$nama', '$posisi', '$perusahaan', '$tglInterview', '$catatan', '$status')";
    // $q = mysqli_query($koneksi, $sql);
    // header("Location: data-interview.php");
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
            $sql = "INSERT INTO pelamar (id_pelamar, username, id_akun, nama_pelamar, email_pelamar, tgl_lahir, alamat, pendidikan, nomor_telepon, usia, id_job, posisi, perusahaan, berkas) VALUES (NULL, '$nama', '$id_akun', '$nama', '$email', '$tglLahir', '$alamat', '$pendidikan', '$nomorTelepon', '$usia', '$id_job', '$posisi', '$perusahaan', '$berkas')";
            var_dump($sql);
            $q = mysqli_query($koneksi, $sql);
            header('location: data-master.php');
        }
    } else {
        
    }

    header('location: data-master.php');
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

if (isset($_POST["create-account-admin"])) {
    // $firstName = $_POST['firstname'];
    // $lastName = $_POST['lastname'];
    // $name = $firstName .' '. $lastName;
    $username = $_POST['username'];
    // $email = $_POST["email"];
    // $nik = $_POST["nik"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmpassword"];

    if ($password === $confirmPassword) {
        // $sql = "INSERT INTO akun (id, username, password, nama, nik, email, hak_akses) VALUES (0, '$username', '$password', '$name', '$nik', '$email', 'Pelamar')";
        $sql = "INSERT INTO akun (id, username, password, hak_akses) VALUES (0, '$username', '$password', 'Admin')";
        mysqli_query($koneksi, $sql);
        $result = "<div class='alert alert-success' role='alert'><strong>Anda berhasil mendaftar! Mengarahkan kembali ke halaman masuk...</strong></div>";
        header("location: login-admin.php");
    } else {
        $result = "<div class='alert alert-danger' role='alert'><strong>Maaf, password tidak sama! Mohon coba lagi!</strong></div>";
    }

}

if (isset($_POST["create-account"])) {
    // $firstName = $_POST['firstname'];
    // $lastName = $_POST['lastname'];
    // $name = $firstName .' '. $lastName;
    $username = $_POST['username'];
    // $email = $_POST["email"];
    // $nik = $_POST["nik"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmpassword"];

    if ($password === $confirmPassword) {
        // $sql = "INSERT INTO akun (id, username, password, nama, nik, email, hak_akses) VALUES (0, '$username', '$password', '$name', '$nik', '$email', 'Pelamar')";
        $sql = "INSERT INTO akun (id, username, password, hak_akses) VALUES (0, '$username', '$password', 'Pelamar')";
        mysqli_query($koneksi, $sql);
        $result = "<div class='alert alert-success' role='alert'><strong>Anda berhasil mendaftar! Mengarahkan kembali ke halaman masuk...</strong></div>";
        header("location: login.php");
    } else {
        $result = "<div class='alert alert-danger' role='alert'><strong>Maaf, password tidak sama! Mohon coba lagi!</strong></div>";
    }

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
            $sql = "UPDATE pelamar SET id_job = '$id_job', id_akun = '$id_akun', nama_pelamar = '$nama', posisi = '$posisi', perusahaan = '$perusahaan', alamat = '$alamat', tgl_lahir = '$tglLahir', pendidikan = '$pendidikan', usia = '$usia', nomor_telepon='$nomorTelepon', email_pelamar = '$email', berkas = '$berkas' WHERE id_pelamar = '$id'";
            var_dump($sql);
            $q = mysqli_query($koneksi, $sql);
            header('location: data-master.php');
        }
    } else {
        $sql = "UPDATE pelamar SET id_job = '$id_job', id_akun = '$id_akun', nama_pelamar = '$nama', posisi = '$posisi', perusahaan = '$perusahaan', alamat = '$alamat', tgl_lahir = '$tglLahir', pendidikan = '$pendidikan', usia = '$usia', nomor_telepon='$nomorTelepon', email_pelamar = '$email' WHERE id_pelamar = '$id'";
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
    $idAkun = $_POST['id_pelamar'];
    $nama = $_POST['nama'];
    $posisi = $_POST['posisi'];
    $pic = $_POST['pic'];
    $emailInterviewer = $_POST['emailpic'];
    $catatan = $_POST['catatan'];
    $status = $_POST['status'];
    $tglInterview = $_POST['tgl-interview'];

    $sql = "UPDATE interview SET nama_interviewer = '$pic', email_interviewer = '$emailInterviewer', tgl_interview = '$tglInterview', catatan = '$catatan', status = '$status' WHERE id_interview = $id";
    // var_dump($sql);
    $q = mysqli_query($koneksi, $sql);

    header("Location: data-interview.php");
}

// delete semua disini

if ($_GET['id'] != "" && $_GET['del'] === '1' && $_GET['from'] === "dm") {
    $sql = "DELETE FROM pelamar WHERE id_pelamar = $_GET[id]";

    $q = mysqli_query($koneksi, $sql);
    header("Location: data-master.php");
}

if ($_GET['id'] != "" && $_GET['del'] === '1' && $_GET['from'] === "di") {
    $sql = "DELETE FROM interview WHERE id_interview = $_GET[id]";

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