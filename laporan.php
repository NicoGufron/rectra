<?php
session_start();
require "koneksi.php";

if (empty($_SESSION['username']) && empty($_SESSION['nama'])) {
    header("Location: login.php");
    exit();
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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $_SESSION['nama']; ?> </span>
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
                            <a class="nav-link" href="dashboard-admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="data-master.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Data Master
                            </a>
                            <a class="nav-link" href="data-interview.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Data Interview
                            </a>
                            <a class="nav-link" href="pekerjaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                Pekerjaan
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                                Laporan
                            </a>
                </div>
            </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['hak_akses']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Laporan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Laporan</li>
                        </ol>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- Button Tambah Laporan -->
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-archive fa-sm text-white-50"></i> Tambah Laporan</a>
                        <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="staticBackdropLabel">Tambah Laporan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Modal body -->
                        <div class="container mt-3"> 
                            <form method="POST" action="tambah-laporan.php">
                                <div class="modal-body">
                                    <div class="mb-3 mt-3">
                                                <label class="form-label"> Perusahaan</label>
                                                <input type="text" class="form-control" placeholder="Nama" id="perusahaan" name="perusahaan" required>
                                            </div>
                                    <div class="row">
                                            <div class="col">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" required>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Posisi</label>
                                                <input type="text" class="form-control" placeholder="Posisi" id="posisi" name="posisi" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" rows="5" id="alamat" name="alamat" required></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Pendidikan</label>
                                                <input type="text" class="form-control" placeholder="Pendidikan Terkahir" id="pendidikan" name="pendidikan" required>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Usia</label>
                                                <input type="text" class="form-control" placeholder="Usia" id="usia" name="usia" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="tlp" placeholder="Nomor Telepon (WA)" name="tlp" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label class="form-label">PIC</label>
                                        <input type="text" class="form-control" id="nama_interview" placeholder="PIC" name="nama_interview" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label class="form-label">Catatan Kandidat</label>
                                        <<textarea class="form-control" rows="5" id="catatan" name="catatan" required></textarea>
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label class="form-label">Status</label>
                                        <input type="text" class="form-control" id="status" placeholder="Status" name="status" required>
                                    </div>
                                </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>    
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i>  Export</a>
                    </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Laporan
                            </div>

                            <!-- PHP Untuk Table -->
                            <?php
                            $query = "SELECT * FROM laporan";
                            $result = mysqli_query($koneksi, $query);
                            if (!$result) {
                                echo "Query Gagal! ";
                            } else {
                                echo
                            "<div class='card-body'>
                            <table id='example' class='table table-striped' style='width:100%' class='table table-striped table-hover'>                               
                                        <tr>
                                            <th style='padding: .9rem .5rem' scope='col'>Perusahaan</th>
                                            <th style='padding: .9rem .5rem' scope='col'>Nama</th>
                                            <th style='padding: .9rem .5rem' scope='col'>Posisi</th>
                                            <th style='padding: .9rem .5rem' scope='col'>Alamat</th>
                                            <th style='padding: .9rem .5rem' scope='col'>Pendidikan</th>
                                            <th style='padding: .9rem .5rem' scope='col'>Usia</th>
                                            <th style='padding: .9rem .5rem' scope='col'>Nomor Telepon</th>
                                            <th style='padding: .9rem .5rem' scope='col'>PIC</th>
                                            <th style='padding: .9rem .5rem' scope='col'>Catatan Kandidat</th>
                                            <th style='padding: .9rem .5rem' scope='col'>Status</th>
                                        </tr>";    
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo    "<tr>
                                            <td>" . $row['perusahaan'] . "</td>;
                                            <td>" . $row['nama_pelamar'] . "</td>;
                                            <td>" . $row['posisi'] . "</td>;
                                            <td>" . $row['alamat'] . "</td>;
                                            <td>" . $row['pendidikan'] . "</td>;
                                            <td>" . $row['usia'] . "</td>;
                                            <td>" . $row['nomor_telepon'] . "</td>;
                                            <td>" . $row['nama_interview'] . "</td>;
                                            <td>" . $row['catatan'] . "</td>;
                                            <td>" . $row['hasil'] . "</td>;
                                        </tr>";
                            }
                                echo "</table>";
                            }
                            ?>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Rectra Talent Indonesia 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
