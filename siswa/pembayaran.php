<?php
require '../function.php';
require '../cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">APLIKASI SPP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


             <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="pembayaran.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pembayaran</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><?=$_SESSION['log1'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Bulan Dibayar</th>
                                            <th>Tahun Dibayar</th>
                                            <th>Jumlah Dibayar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Bulan Dibayar</th>
                                            <th>Tahun Dibayar</th>
                                            <th>Jumlah Dibayar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $nisn = $_SESSION['log2'];
                                        $ambildatapembayaran = mysqli_query($conn,"SELECT * FROM pembayaran LEFT JOIN siswa on siswa.nisn = pembayaran.nisn where pembayaran.nisn='$nisn'");
                                        $i = 1;
                                        while($data=mysqli_fetch_array($ambildatapembayaran)){
                                        $nisn = $data['nisn'];
                                        $nama= $data['nama'];
                                        $tgl_bayar = $data['tgl_bayar'];
                                        $bulan_dibayar = $data['bulan_dibayar'];
                                        $tahun_dibayar = $data['tahun_dibayar'];
                                        $jumlah_bayar = $data['jumlah_bayar'];
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$nama;?></td>
                                            <td><?=$tgl_bayar;?></td>
                                            <td><?=$bulan_dibayar;?></td>
                                            <td><?=$tahun_dibayar;?></td>
                                            <td><?=$jumlah_bayar;?></td>
                                        </tr>
                                        <?php
                                    };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<!-- Modal Tambah -->
<div class="modal fade" id="inputbayar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Input Pembayaran</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post">
            NISN
        <input type="number" name="nisn" placeholder="NISN ANDA" class="form-control" required>
        <br>
        Petugas
       <select class="form-control" name="id_petugas">
           <option selected=""> 
            Pilih Petugas   
           </option>
           <?php
           $datapetugas = mysqli_query($conn,"SELECT * FROM petugas order by id_petugas");
           while($petugas = mysqli_fetch_assoc($datapetugas)) :
            echo"<option value=".$petugas['id_petugas'].">".$petugas['nama_petugas']."
            </option>";
        endwhile;
           ?>
       </select>
       <br>
       SPP
       <select class="form-control" name="id_spp">
           <option selected=""> 
            Pilih SPP   
           </option>
           <?php
           $dataspp = mysqli_query($conn,"SELECT * FROM spp order by id_spp");
           while($tahunspp = mysqli_fetch_assoc($dataspp)) :
            echo"<option value=".$tahunspp['id_spp'].">".$tahunspp['tahun']."
            </option>";
        endwhile;
           ?>
       </select>
        <br>
            Tanggal
        <input type="date" name="tgl_bayar" class="form-control">
        <br>
         Tahun
        <select class="form-control" name="tahun_dibayar">
           <option selected=""> 
            Pilih Tahun Pembayaran   
           </option>
           <?php
           $datatahun = mysqli_query($conn,"SELECT * FROM spp order by id_spp");
           while($spptahun = mysqli_fetch_assoc($datatahun)) :
            echo"<option value=".$spptahun['tahun'].">".$spptahun['tahun']."
            </option>";
        endwhile;
           ?>
       </select>
       <br>
        Bulan Dibayar
        <select class="form-control" name="bulan_dibayar">
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Julii</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
        </select>
        <br>
            Jumlah Bayar
        <input type="number" name="jumlah_bayar" placeholder="Masukan Nominal" class="form-control">
        <br>
        <button type="submit" class="btn btn-primary" name="inputbayar">Submit</button>
        </form>
      </div>

    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>