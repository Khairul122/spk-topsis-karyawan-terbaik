<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-device=1.0" />
    <title>SPK Pemilihan Pegawai Terbaik</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/datatables.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/datatables.min.js"></script>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                SPK Pemilihan Karyawan Terbaik
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="alternatif.php">Alternatif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kriteria.php">Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nilai_keputusan.php">Nilai Keputusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="matriks.php">Matriks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hasil.php">Hasil</a>
                    </li>
                </ul>
                <?php
                if (empty($_SESSION['status'])) {
                ?>
                    <!-- Modal Button -->
                    <ul class="navbar-nav">
                        <li>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-box-arrow-in-left"></i> LOGIN
                            </button>
                        </li>
                    </ul>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="post" action="login.php">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control" name="username" type="text" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control" name="password" type="password" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <a class="btn btn-danger" href="logout.php"><i class="bi bi-box-arrow-left"></i> LOGOUT</a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>

    <?php
    if (empty($_SESSION['status'])) {
    ?>
        <main class="container py-5">
            <span>Anda belum login, silahkan login terlebih dahulu</span>
        </main>
    <?php
    } else if ($_SESSION['status'] == "pimpinan") {
    ?>
        <main class="container py-5">
            <span>Hanya Admin yang dapat mengakses halaman ini</span>
        </main>
    <?php
    } else if ($_SESSION['status'] == 'admin') {
    ?>
        <main class="container py-5">
            <form class="card mb-3" method="post" action="tambah_alternatif.php">
                <h2 class="card-header py-5 text-center">TAMBAH ALTERNATIF</h2>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">NRK</label>
                        <input class="form-control" name="nrk" type="text" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input class="form-control" name="nama" type="text" />
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label class="form-label">Jabatan</label>
                            <input class="form-control" name="jabatan" type="text" />
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label class="form-label">Mulai Aktif Bekerja</label>
                            <input class="form-control" name="masa_aktif" type="date" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="bi bi-save-fill"></i>
                        Simpan</button>
                </div>
            </form>

            <div class="card">
                <h2 class="card-header text-center py-5">TABEL ALTERNATIF</h2>
                <div class="card-body">
                    <table class="table nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NRK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Mulai Aktif Bekerja</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('koneksi.php');
                            $sql = 'SELECT * FROM alternatif';
                            $result = mysqli_query($conn, $sql);
                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td><?php echo $row['nrk'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['jabatan'] ?></td>
                                    <td><?php echo date("d", strtotime($row['masa_aktif'])) . " " . strtr(date("F Y", strtotime($row['masa_aktif'])), [
                                            'January' => 'Januari',
                                            'February' => 'Februari',
                                            'March' => 'Maret',
                                            'April' => 'April',
                                            'May' => 'Mei',
                                            'June' => 'Juni',
                                            'July' => 'Juli',
                                            'August' => 'Agustus',
                                            'September' => 'September',
                                            'October' => 'Oktober',
                                            'November' => 'November',
                                            'December' => 'Desember'
                                        ]); ?></td>
                                    <td>
                                        <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit<?php echo $row['id']; ?>"><i
                                                class="bi bi-pencil-square"></i> Edit</a>
                                        <a class="btn btn-danger" href="hapus_alternatif.php?id=<?php echo $row['id']; ?>"
                                            onclick="return confirm('Apakah anda ingin menghapus alternatif <?php echo $row['nama'] ?>')">
                                            <i class="bi bi-trash-fill"></i> Hapus</a>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1"
                                    aria-labelledby="modelEditLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Alternatif</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="edit_alternatif.php">
                                                <div class="modal-body">
                                                    <?php
                                                    $id = $row['id'];
                                                    $sql1 = "SELECT * FROM alternatif WHERE id = '$id'";
                                                    $result1 = mysqli_query($conn, $sql1);
                                                    while ($row1 = mysqli_fetch_array($result1)) {
                                                    ?>
                                                        <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
                                                        <div class="mb-3">
                                                            <label class="form-label">nrk</label>
                                                            <input class="form-control" name="nrk" type="text"
                                                                value="<?php echo $row1['nrk']; ?>" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama</label>
                                                            <input class="form-control" name="nama" type="text"
                                                                value="<?php echo $row1['nama'] ?>" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Jabatan</label>
                                                            <input class="form-control" name="jabatan" type="text"
                                                                value="<?php echo $row1['jabatan'] ?>" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Mulai Bekerja Aktif</label>
                                                            <input class="form-control" name="masa_aktif" type="date"
                                                                value="<?php echo $row1['masa_aktif'] ?>" />
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    <?php
    }
    ?>

    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        $('document').ready(function() {
            $('.table').DataTable({
                responsive: true,
                columnDefs: [{
                    responsivePriority: 1,
                    targets: 1
                }, ]
            })
        })
    </script>
</body>

</html>