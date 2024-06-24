<?php
include "koneksi.php";

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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Leonardus</span>
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
                                Data Pelamar
                            </a>
                            <a class="nav-link" href="data-interview.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Data Interview
                            </a>
                            <a class="nav-link" href="pekerjaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Pekerjaan
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                                Hasil Interview
                            </a>
                            </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Administrator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pekerjaan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Menambah, mengubah atau menghapus pekerjaan.</li>
                        </ol>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- Button Tambah Laporan -->
                        <a href="tambah-laporan.php" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i
                            class="fas fa-archive fa-sm text-white-50"></i> Tambah Pekerjaan Baru</a>
                            <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Pekerjaan Baru</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <div class="container mt-3">
                                    <form method="post" action='action_page.php'>
                                    <div class="row">
                                            <div class="col">
                                                <label for="perusahaan">Perusahaan</label>
                                                <input type="text" class="form-control" placeholder="Perusahaan" id="perusahaan" name="perusahaan">
                                            </div>
                                            <div class="col">
                                                <label for="posisi">Posisi</label>
                                                <input type="text" class="form-control" placeholder="Posisi" id="posisi" name="posisi">
                                            </div>
                                        </div>
                                            <div class="mb-3 mt-3">
                                                <label for="desk">Deskripsi</label>
                                                <textarea class="form-control" rows="5" id="desk" name="desk"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name='submit-add-job'>Tambah</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>

                                </div>
                            </div>
                        </div>    
                    </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Laporan
                            </div>
                            <div class="card-body">
                            <table id="example" class="table table-striped" style="width:100%" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                        <th style="padding: .9rem .5rem" scope="col">Perusahaan</th>
                                        <th style="padding: .9rem .5rem" scope="col">Posisi</th>
                                        <th style="padding: .9rem .5rem" scope="col">Deskripsi</th>
                                        <th style="padding: .9rem .5rem" scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM job";
                                            $q = mysqli_query($koneksi, $sql);
                                            while ($row = mysqli_fetch_assoc($q)) {
                                                $id = $row['id'];
                                                $perusahaan = $row['perusahaan'];
                                                $posisi = $row['posisi'];
                                                $deskripsi = $row['deskripsi'];
                                                echo "<tr>
                                                    <td>$perusahaan</td>
                                                    <td>$posisi</td>
                                                    <td>$deskripsi</td>
                                                    <td>
                                                        <a href='#'><button type='button' class='fas fa-edit' data-bs-toggle='modal' data-bs-target='#editModal' data-bs-perusahaan='$perusahaan' data-bs-posisi='$posisi' data-bs-deskripsi='$deskripsi' data-bs-id='$id'>Edit</button></a>
                                                        <a href='action_page.php?id=$id&del=1&from=pk'><button type='button' class='fas fa-trash'>Edit</button></a>     
                                                    </td>
                                                </tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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

        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id='modalEdit'></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                <div class="container mt-3">
                    <form method="post" action='action_page.php'>
                        <input type='hidden' id='idData' name='id'>
                        <div class="row">
                            <div class="col">
                                <label for="perusahaan">Perusahaan</label>
                                <input type="text" class="form-control" placeholder="Perusahaan" id="perusahaanEdit" name="perusahaan">
                            </div>
                            <div class="col">
                                <label for="posisi">Posisi</label>
                                <input type="text" class="form-control" placeholder="Posisi" id="posisiEdit" name="posisi">
                            </div>
                        </div>
                            <div class="mb-3 mt-3">
                                <label for="desk">Deskripsi</label>
                                <textarea class="form-control" rows="5" id="deskEdit" name="desk"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name='submit-edit-job'>Tambah</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
        <script>
            const editModal = document.getElementById('editModal');
            if (editModal) {
                editModal.addEventListener('show.bs.modal', event => {
                    var modalEdit = document.getElementById('modalEdit');
                    var idData = document.getElementById('idData');
                    var perusahaan = document.getElementById('perusahaanEdit');
                    var posisi = document.getElementById('posisiEdit');
                    var deskripsi = document.getElementById('deskEdit');

                    const idValue = event.relatedTarget.getAttribute('data-bs-id');
                    const perusahaanValue = event.relatedTarget.getAttribute('data-bs-perusahaan');
                    const posisiValue = event.relatedTarget.getAttribute('data-bs-posisi');
                    const deskripsiValue = event.relatedTarget.getAttribute('data-bs-deskripsi');

                    idData.value = idValue;
                    modalEdit.innerHTML = "Mengedit " + posisiValue;
                    perusahaan.value = perusahaanValue;
                    posisi.value = posisiValue;
                    deskripsi.value = deskripsiValue;
                });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
