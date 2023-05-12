<?php
//import koneksi ke database
require '../function.php';
require '../cek.php';

?>
<html>
<head>
  <title>Aplikasi SPP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Export Siswa</h2>
			<h4>Aplikasi SPP</h4>
				<div class="data-tables datatable-dark">
					
					<table class="table table-bordered" id="export_database" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $ambildatasiswa = mysqli_query($conn,"SELECT * FROM siswa LEFT JOIN kelas on siswa.id_kelas = kelas.id_kelas LEFT JOIN spp on siswa.id_spp = spp.id_spp");
                                        $i = 1;
                                        while($data=mysqli_fetch_array($ambildatasiswa)){
                                        $nisn = $data['nisn'];
                                        $nis = $data['nis'];
                                        $nama = $data['nama'];
                                        $nama_kelas = $data['nama_kelas'];
                                        $id_kelas = $data['id_kelas'];
                                        $alamat = $data['alamat'];
                                        $no_telp = $data['no_telp'];
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$nisn;?></td>
                                            <td><?=$nis;?></td>
                                            <td><?=$nama;?></td>
                                            <td><?=$nama_kelas;?></td>
                                            <td><?=$alamat;?></td>
                                            <td><?=$no_telp;?></td>
                                        </tr>

                                        <?php
                                    };
                                        ?>
                                    </tbody>
                                    </table>


				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#export_database').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>