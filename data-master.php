<?php
require_once("koneksi.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rectra Talent Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username'] ?></span>
                    <i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
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
                    <?= $_SESSION['hak_akses'] ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Pelamar</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Data Pelamar Yang Masuk</li>
                    </ol>

                    <!-- Button Edit Data -->

                    <a class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="far fa-file-alt fa-sm text-white-50"></i> Tambah Data</a>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Pelamar</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="container mt-3">
                                        <form method='post' action="action_page.php" enctype="multipart/form-data">
                                            <div class="col mt-3">
                                                <label for="perusahaan">Perusahaan</label>
                                                <!-- <input type="text" class="form-control" placeholder="Perusahaan" id="perusahaan" name="perusahaan"> -->
                                                <select class="form-control" name="perusahaan" id="perusahaan">

                                                    <?php
                                                    $sql = "SELECT DISTINCT perusahaan FROM job";
                                                    $q = mysqli_query($koneksi, $sql);

                                                    echo "<option value='' selected readonly hidden>Pilih Perusahaan</option>";
                                                    while ($row = mysqli_fetch_assoc($q)) {
                                                        $namaPerusahaan = $row['perusahaan'];
                                                        echo "<option value='$namaPerusahaan'>$namaPerusahaan</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div><br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nama">Nama</label>
                                                    <select class='form-control' name='nama'>
                                                        <!-- <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama"> -->
                                                        <?php
                                                        $sql = "SELECT Id, username from akun WHERE hak_akses = 'Pelamar';";
                                                        $q = mysqli_query($koneksi, $sql);

                                                        while ($row = mysqli_fetch_assoc($q)) {
                                                            $id = $row['Id'];
                                                            $username = $row['username'];
                                                            echo "<option value='$id|$username'>$username</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="posisi">Posisi</label>
                                                    <select class="form-control" name="posisi" id="posisi">

                                                    </select>
                                                    <!-- <input type="text" class="form-control" placeholder="Posisi" id="posisi" name="posisi"> -->
                                                </div>
                                            </div>


                                            <div class="col mt-3">
                                                <label for="alamat">Alamat</label>
                                                <textarea type="text" class="form-control" placeholder="Alamat Terakhir" id="alamat" name="alamat"></textarea>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" placeholder="Tanggal Lahir" id="tgl_lahir" name="tgl_lahir" required>
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
                                                <input type="file" class="form-control" id="berkas" accept='.pdf' name="berkas" required>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="status">Status</label>
                                                <input type="text" class="form-control" placeholder="Not Yet" id="email" name="email" disabled>
                                            </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name='submit-add-master'>Done</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mt-3">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data ER Master
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Nama</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Posisi</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Perusahaan</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Alamat</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Tanggal Lahir</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Pendidikan</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Usia</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Nomor Telepon</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Email</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Berkas</th>
                                        <th style="text-align:center; font-size: 14px;padding: .9rem .5rem" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM pelamar";

                                    $q = mysqli_query($koneksi, $sql);

                                    while ($row = mysqli_fetch_assoc($q)) {
                                        $idPelamar = $row['id_pelamar'];
                                        $namaPelamar = $row['nama_pelamar'];
                                        $posisi = $row['posisi'];
                                        $perusahaan = $row['perusahaan'];
                                        $alamat = $row['alamat'];
                                        $tglLahir = $row['tgl_lahir'];
                                        $pendidikan = $row['pendidikan'];
                                        $usia = $row['usia'];
                                        $nomorTelpon = $row['nomor_telepon'];
                                        $emailPelamar = $row['email_pelamar'];
                                        $berkas = $row['berkas'];
                                        // $status = $row['status'];

                                        $tglLahir = date("d M Y", strtotime($tglLahir));

                                        echo "<tr>
                                                <td style='text-align:center; font-size: 14px;'>$namaPelamar</td>
                                                <td style='text-align:center; font-size: 14px;'>$posisi</td>
                                                <td style='text-align:center; font-size: 14px;'>$perusahaan</td>
                                                <td style='text-align:center; font-size: 14px;'>$alamat</td>
                                                <td style='text-align:center; font-size: 14px;'>$tglLahir</td>
                                                <td style='text-align:center; font-size: 14px;'>$pendidikan</td>
                                                <td style='text-align:center; font-size: 14px;'>$usia</td>
                                                <td style='text-align:center; font-size: 14px;'>$nomorTelpon</td>
                                                <td style='text-align:center; font-size: 14px;'>$emailPelamar</td>
                                                <td style='text-align:center; font-size: 14px;'>
                                                    <a class='text-primary'>$berkas</a>
                                                </td>
                                                <td>
                                                    <a href='#'><button type='button' class='fas fa-edit' data-bs-toggle='modal' data-bs-target='#editModal' data-bs-id='$idPelamar' data-bs-nama='$namaPelamar' data-bs-posisi='$posisi' data-bs-perusahaan='$perusahaan' data-bs-pendidikan='$pendidikan' data-bs-email='$emailPelamar' data-bs-usia='$usia' data-bs-nomortelpon='$nomorTelpon' data-bs-alamat='$alamat'>Edit</button></a>
                                                    <a href='action_page.php?id=$idPelamar&del=1&from=dm'><button type='button' class='fas fa-trash'>Delete</button></a>
                                                </td>
                                            </tr>";
                                    };
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
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container mt-3">
                        <form method='post' action="action_page.php" enctype="multipart/form-data">
                            <input type='hidden' name='id' id='idData'>
                            <div class="col mt-3">
                                <label for="perusahaan">Perusahaan</label>
                                <!-- <input type="text" class="form-control" placeholder="Perusahaan" id="perusahaanEdit" name="perusahaan"> -->
                                <select class='form-control' name='perusahaan' id='perusahaanEdit'>

                                    <?php
                                    $sql = "SELECT DISTINCT perusahaan FROM job";
                                    $q = mysqli_query($koneksi, $sql);

                                    echo "<option value='' selected readonly hidden></option>";
                                    while ($row = mysqli_fetch_assoc($q)) {
                                        $namaPerusahaan = $row['perusahaan'];
                                        echo "<option value='$namaPerusahaan'>$namaPerusahaan</option>";
                                    }
                                    ?>
                                </select>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for="nama">Nama</label>
                                    <select class='form-control' name='nama' id='namaEdit'>
                                        <!-- <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama"> -->
                                        <?php
                                        $sql = "SELECT Id, username from akun WHERE hak_akses = 'Pelamar';";
                                        $q = mysqli_query($koneksi, $sql);

                                        echo "<option value='' selected readonly hidden></option>";
                                        while ($row = mysqli_fetch_assoc($q)) {
                                            $id = $row['Id'];
                                            $username = $row['username'];
                                            echo "<option value='$id|$username'>$username</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="posisi">Posisi</label>
                                    <select class="form-control" name="posisi" id="posisiEdit">

                                    </select>
                                    <!-- <input type="text" class="form-control" placeholder="Posisi" id="posisiEdit" name="posisi"> -->
                                </div>
                            </div>

                            <div class="col mt-3">
                                <label for="alamat">Alamat</label>
                                <textarea type="text" class="form-control" placeholder="Alamat Terakhir" id="alamatEdit" name="alamat"></textarea>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Lahir" id="tgl_lahir" name="tgl_lahir" required>
                                </div>
                                <div class="col">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikanEdit" placeholder="Pendidikan" name="pendidikan">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="usia">Usia</label>
                                    <input type="text" class="form-control" id="usiaEdit" placeholder="Usia" name="usia">
                                </div>
                                <div class="col">
                                    <label for="tlp">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="tlpEdit" placeholder="Nomor Telepon" name="tlp">
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="emailEdit" placeholder="Email" name="email">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="berkas">Berkas</label>
                                <input type="file" class="form-control" id="berkas" placeholder="pdf" name="berkas">
                            </div>
                            <!-- <div class="mb-3 mt-3">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" placeholder="Status" id="emailEdit" name="status">
                            </div> -->
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name='submit-edit-master'>Done</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#perusahaan").change(function() {
                var namaPerusahaan = $(this).val();
                $.ajax({
                    url: "action_page.php",
                    type: "post",
                    data: {
                        perusahaan: namaPerusahaan
                    },
                    success: function(response) {
                        $('#posisi').html(response);
                        if (posisi)  {
                            $('posisi').val((posisi));
                        }
                    },
                    failed: function(response) {
                        console.log("failed");
                    }
                })
            });
        });
        const editModal = document.getElementById('editModal');
        if (editModal) {
            editModal.addEventListener('show.bs.modal', event => {
                var idData = document.getElementById('idData');
                var namaEdit = document.getElementById('namaEdit');
                var posisiEdit = document.getElementById('posisiEdit');
                var perusahaanEdit = document.getElementById('perusahaanEdit');
                var pendidikanEdit = document.getElementById('pendidikanEdit');
                var emailEdit = document.getElementById('emailEdit');
                var usiaEdit = document.getElementById('usiaEdit');
                var nomorTelponEdit = document.getElementById('tlpEdit');
                var alamatEdit = document.getElementById('alamatEdit');
                var statusEdit = document.getElementById('statusEdit');

                const id = event.relatedTarget.getAttribute('data-bs-id');
                const namaPelamar = event.relatedTarget.getAttribute('data-bs-nama');
                const posisi = event.relatedTarget.getAttribute('data-bs-posisi');
                const alamat = event.relatedTarget.getAttribute('data-bs-alamat');
                const perusahaan = event.relatedTarget.getAttribute('data-bs-perusahaan');
                const pendidikan = event.relatedTarget.getAttribute('data-bs-pendidikan');
                const emailPelamar = event.relatedTarget.getAttribute('data-bs-email');
                const usia = event.relatedTarget.getAttribute('data-bs-usia');
                const nomorTelpon = event.relatedTarget.getAttribute('data-bs-nomortelpon');
                const status = event.relatedTarget.getAttribute('data-bs-status');

                idData.value = id;
                namaEdit.value = namaPelamar;
                posisiEdit.value = posisi;
                perusahaanEdit.value = perusahaan;
                pendidikanEdit.value = pendidikan;
                emailEdit.value = emailPelamar;
                usiaEdit.value = usia;
                nomorTelponEdit.value = nomorTelpon;
                alamatEdit.value = alamat;
                // statusEdit.value = status;

                loadPosisi(perusahaan, posisi);
            });

            $("#perusahaanEdit").change(function() {
                var namaPerusahaan = $(this).val();
                loadPosisi(namaPerusahaan)
            });

            function loadPosisi(perusahaan, posisi = '') {
                $.ajax({
                url: "action_page.php",
                type: "post",
                data: {
                    perusahaan: perusahaan
                },
                success: function(response) {
                    $('#posisiEdit').html(response);
                    if (posisi) {
                        $('#posisiEdit').val(posisi);
                    }
                },
                failed: function(response) {
                    console.log("failed");
                }
            });
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</body>

</html>