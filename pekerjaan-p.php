<?php
include "koneksi.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rectra Talent Indonesia</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Rectra Talent Indonesia</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['username'] ?></span>
                        <i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main</div>
                        <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="pekerjaan-p.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                Pekerjaan
                            </a>
                            <a class="nav-link" href="info.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                Informasi
                            </a>
                            </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Pelamar
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pekerjaan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Cari pekerjaan, sesuai keinginanmu!</li>
                        </ol>
                        <?php 
                            if(isset($_GET['message'])) {
                                echo "<p><strong>".$_GET['message']."</strong></p>";
                            }
                        ?>

                        <!-- Main Dashboard -->

                        <div class="card-container">
                            <div class="row">
                                <?php
                                $sql = "SELECT * FROM job";
                                $q = mysqli_query($koneksi, $sql);

                                while ($row = mysqli_fetch_assoc($q)) {
                                    $id = $row['id'];
                                    $perusahaan = $row['perusahaan'];
                                    $posisi = $row['posisi'];
                                    $deskripsi = $row['deskripsi'];

                                    $deskripsi = nl2br($deskripsi);

                                    echo "<div class='col-4'>
                                    <br>
                                        <div class='card'>
                                            <img class='card-img-top' src='assets/img/jobs.jpg' alt='Card image' style='width:100%'>
                                            <div class='card-body'>
                                                <h4 class='card-title'>$perusahaan</h4>
                                                <strong><p class='card-text'>$posisi</p></strong><br>
                                                <p class='card-text'>$deskripsi</p>
                                                <a href='#' class='btn btn-primary' data-bs-target='#myModal' data-bs-position='$posisi' data-bs-perusahaan='$perusahaan' data-bs-id='$id' data-bs-toggle='modal'>Lamar Sekarang</a>
                                            </div>
                                        </div>
                                    </div>";
                                }

                                ?>
                            </div>
                        </div>
                        
                        <!-- Main Dashboard -->

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Rectra Talent Indonesia 2023</div>
                        </div>
                    </div>
                </footer>

                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title"></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                        <div class="container mt-3">
                            <p id='deskripsi-text'></p>
                            <form method='post' action="action_page.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="mb-3">
                                    <input type='hidden' name='id_akun' value=<?= $_SESSION['id'] ?>>
                                    <input type='hidden' name='id_job' id='id_job'>
                                    <input type='hidden' name='username' id='username' value=<?= $_SESSION['username'] ?>>
                                    <input type='hidden' name='posisi' id='posisiInput'>
                                    <input type='hidden' name='perusahaan' id = 'perusahaanInput'>
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type='text' class="form-control" placeholder="Email" id="email" name='email' required>
                                </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="pendidikan">Pendidikan</label>
                                            <input type="text" class="form-control" placeholder="Pendidikan Terakhir" id="pendidikan" name="pendidikan" required>
                                        </div>
                                        <div class="col">
                                            <label for="usia">Usia</label>
                                            <input type="text" class="form-control" placeholder="Usia" id="usia" name="usia" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                    <label for="tlp">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="tlp" placeholder="Nomor Telepon (WA)" name="tlp" required>
                                    <div class="mb-3 mt-3">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" placeholder="" name="tgl_lahir" required>
                                    <div class="mb-3 mt-3">
                                    <label for="berkas" accept=".pdf">Berkas</label>
                                    <input type="file" class="form-control" id="berkas" placeholder="Berkas" name="berkas" required>
                                    <div class="mb-3 mt-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea type="text" class="form-control" placeholder="Alamat Terakhir" cols="3" rows="4" id="alamat" name="alamat"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name='submit-apply-job'>Submit</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <script>
            const modal = document.getElementById('myModal');
            if (modal) {
                modal.addEventListener('show.bs.modal', event => {
                    const lamarPosisi = document.getElementById('modal-title');
                    const deskripsiText = document.getElementById('deskripsi-text');
                    const posisiInput = document.getElementById('posisiInput');
                    const perusahaanInput = document.getElementById('perusahaanInput');
                    const idJob = document.getElementById('id_job');

                    lamarPosisi.innerHTML = "Lamar sebagai " + event.relatedTarget.getAttribute('data-bs-position');
                    deskripsiText.innerHTML = "Kamu akan melamar di <strong>" + event.relatedTarget.getAttribute('data-bs-perusahaan') + "</strong>";
                    idJob.value = event.relatedTarget.getAttribute('data-bs-id');
                    posisiInput.value = event.relatedTarget.getAttribute('data-bs-position');
                    perusahaanInput.value = event.relatedTarget.getAttribute('data-bs-perusahaan');
                })
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
