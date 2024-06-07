<?php
require 'koneksi.php';

session_start() ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form login
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Persiapkan pernyataan SQL dengan prepared statement
    $query = "SELECT Id, username, nama, nik, hak_akses, email FROM akun WHERE username=? AND password=?";
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter ke pernyataan SQL
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Jalankan pernyataan SQL
    mysqli_stmt_execute($stmt);

    // Ambil hasil query
    $result = mysqli_stmt_get_result($stmt);

    // Periksa apakah ada baris yang cocok
    if (mysqli_num_rows($result) == 1) {
        // Ambil data pengguna
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['Id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['nik'] = $row['nik'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['hak_akses'] = $row['hak_akses'];

        // Periksa hak akses pengguna
        if ($row['hak_akses'] == "Admin") {
            // Jika hak akses adalah 1, arahkan ke index.php
            header("Location: dashboard-admin.php");
        } elseif ($row['hak_akses'] == "Pelamar") {
            // Jika hak akses adalah 2, arahkan ke index_karyawan.php
            header("Location: index.php");
        }
        exit(); // Pastikan untuk menghentikan eksekusi kode setelah melakukan redirect
    } else {
        // Jika data tidak ditemukan, atur pesan kesalahan
        $error = "Username atau password salah.";
    }

    // Tutup pernyataan dan koneksi
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.php">Lupa password?</a>
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">Belum mempunyai akun? <a href='register.php'>Daftar disini!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
