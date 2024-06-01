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
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Rectra Talent Indonesia</a>
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
                        Administrator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Master</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Pelamar Yang Masuk</li>
                        </ol>

                        <!-- Button Edit Data -->

                        <a href="tambah-laporan.php" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i
                            class="far fa-file-alt fa-sm text-white-50"></i> Edit Data</a>
                            <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Data Master</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <div class="container mt-3">
                                    <form action="/action_page.php">
                                    <div class="row">
                                            <div class="col">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama">
                                            </div>
                                            <div class="col">
                                                <label for="posisi">Posisi</label>
                                                <input type="text" class="form-control" placeholder="Posisi" id="posisi" name="posisi">
                                            </div>
                                    </div>
                                        <div class="col mt-3">
                                                <label for="perusahaan">Perusahaan</label>
                                                <input type="text" class="form-control" placeholder="Perusahaan" id="perusahaan" name="perusahaan">
                                            </div>
                                        
                                            <div class="col mt-3">
                                                <label for="alamat">Alamat</label>
                                                <textarea type="text" class="form-control" placeholder="Alamat Terkahir" id="alamat" name="alamat"></textarea>
                                            </div>
                                    <div class="row mt-3">
                                            <div class="col">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="text" class="form-control" placeholder="Tanggal Lahir" id="tgl_lahir" name="tgl_lahir">
                                            </div>
                                            <div class="col">
                                                <label for="pendidikan">Pendidikan</label>
                                                <input type="text" class="form-control" id="pendidikan" placeholder="Pendidikan" name="pendidikan">
                                            </div>
                                    </div>
                                    <div class="row mt-3">                                         
                                        <div class="col">
                                            <label for="usia">Usia</label>
                                            <input type="text" class="form-control" id="usia" placeholder="Usia" name="usia">
                                        </div>                                       
                                        <div class="col">
                                            <label for="tlp">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="tlp" placeholder="Nomor Telepon" name="tlp">
                                        </div>
                                    </div>
                                        <div class="mb-3 mt-3">
                                        <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="berkas">Berkas</label>
                                            <input type="text" class="form-control" id="berkas" placeholder="pdf" name="berkas">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" placeholder="Not Yet" id="email" name="email" disabled>
                                        </div>
                                    </form>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                                </div>
                            </div>
                        </div> 

                        <!-- Button Edit Data -->

                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data ER Master
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                        <th style="padding: .9rem .5rem" scope="col">Nama</th>
                                        <th style="padding: .9rem .5rem" scope="col">Posisi</th>
                                        <th style="padding: .9rem .5rem" scope="col">Perusahaan</th>
                                        <th style="padding: .9rem .5rem" scope="col">Alamat</th>
                                        <th style="padding: .9rem .5rem" scope="col">Tanggal Lahir</th>
                                        <th style="padding: .9rem .5rem" scope="col">Pendidikan</th>
                                        <th style="padding: .9rem .5rem" scope="col">Usia</th>
                                        <th style="padding: .9rem .5rem" scope="col">Nomor Telepon</th>
                                        <th style="padding: .9rem .5rem" scope="col">Email</th>
                                        <th style="padding: .9rem .5rem" scope="col">Berkas</th>
                                        <th style="padding: .9rem .5rem" scope="col">Status</th>
                                        <th style="padding: .9rem .5rem" scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ahmad Subajri</td>
                                            <td>Data Analis</td>
                                            <td>PT.Nusa Mandiri</td>
                                            <td>Jakarta Barat</td>
                                            <td>12/05/1998</td>
                                            <td>S1</td>
                                            <td>26</td>
                                            <td>085143526754</td>
                                            <td>Ahmad@gmail.com</td>
                                            <td>
                                                <a class="text-primary">CV.Herman Santoso</a>
                                            </td>
                                            <td>Not Yet</td>
                                            <td>
                                                <button type="button" class="fas fa-edit" href="">Edit</button>
                                                <button type="button" class="fas fa-trash" href="">Edit</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Herman Santoso</td>
                                            <td>Web Developer</td>
                                            <td>PT.Nusa Mandiri</td>
                                            <td>Jakarta Barat</td>
                                            <td>12/05/1997</td>
                                            <td>S1</td>
                                            <td>27</td>
                                            <td>085143526754</td>
                                            <td>Herman@gmail.com</td>
                                            <td>
                                                <a class="text-primary">CV.Ahmad Subajri</a>
                                            </td>
                                            <td>Not Yet</td>
                                            <td>
                                                <button type="button" class="fas fa-edit" href="">Edit</button>
                                                <button type="button" class="fas fa-trash" href="">Edit</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Titi Kamal</td>
                                            <td>Personal Assitant</td>
                                            <td>PT.Nusa Mandiri</td>
                                            <td>Jakarta Timur</td>
                                            <td>12/05/2000</td>
                                            <td>S1</td>
                                            <td>23</td>
                                            <td>085143528754</td>
                                            <td>Titi@gmail.com</td>
                                            <td>
                                                <a class="text-primary">CV.Titi Kamal</a>
                                            </td>
                                            <td>Not Yet</td>
                                            <td>
                                                <button type="button" class="fas fa-edit" href="">Edit</button>
                                                <button type="button" class="fas fa-trash" href="">Edit</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ahmad Bagus</td>
                                            <td>IT Support</td>
                                            <td>PT.Nusa Mandiri</td>
                                            <td>Bekasi</td>
                                            <td>12/05/1997</td>
                                            <td>S1</td>
                                            <td>27</td>
                                            <td>085164763542</td>
                                            <td>Bagus@gmail.com</td>
                                            <td>
                                                <a class="text-primary">CV.Ahmad Bagus</a>
                                            </td>
                                            <td>Not Yet</td>
                                            <td>
                                                <button type="button" class="fas fa-edit" href="">Edit</button>
                                                <button type="button" class="fas fa-trash" href="">Edit</button>
                                            </td>
                                        </tr>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </body>
</html>
