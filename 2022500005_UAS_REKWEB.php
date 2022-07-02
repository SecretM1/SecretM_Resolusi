<?php
	/*
		Plugin Name: Plugin UAS Rekayasa Web
		Plugin URI: https://www.facebook.com/kelasberat88
		Description: SOAL UAS 2022500005 Kelompok SI4K
		Version: 0.1
		Author: Muhamad Ramadhan
		Author URI: https://worldscenery.net
		License: GPL2
	*/
?>




<?php function moduluas() { ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<?php
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	?>

	<?php
		function agama($kode) {
			if ($kode=="$nilai_akhir>=80") return "A";
			if ($kode=="2") return "Kristen Katolik";
			if ($kode=="3") return "Kristen Protestan";
			if ($kode=="4") return "Buddha";
			if ($kode=="5") return "Hindu";
			if ($kode=="6") return "Konghucu";
		}

		function pecah($nomor) {
			$panjang = strlen($nomor);
			if ($panjang >= 13):
				return substr($nomor, 0, 4) . " - " . substr($nomor, 4, 4) . " - " . substr($nomor, 8, 6);
			elseif ( ($panjang >= 11) && ($panjang < 13) ):
				return substr($nomor, 0, 4) . " - " . substr($nomor, 4, 4) . " - " . substr($nomor, 8, 6);
			elseif ( ($panjang >= 5) && ($panjang < 11) ):
				return substr($nomor, 0, 4) . " - " . substr($nomor, 4, 4);
			elseif ( ($panjang >= 0) && ($panjang < 5) ):
				return substr($nomor, 0, 4);
			endif;
		}
	?>

	<?php
		$tombol = "Simpan"; $warna = "primary";

		if (isset($_POST["btnSimpan"])):
			$nim = $_POST["txtnim"];
			$nama = $_POST["txtnama"];
			$kehadiran = $_POST["txtkehadiran"];
			$tugas = $_POST["txtnilaitugas"];
			$uts = $_POST["txtnilaiuts"];
			$uas = $_POST["txtnilaiuas"];
			$agama = $_POST["slagama"];
			$wa = $_POST["txtwa"];
			$alamat = $_POST["txtalamat"];
				$nilai_kehadiran = $kehadiran * 0.1;
				$nilai_tugas = $tugas * 0.2;
				$nilai_uts = $uts * 0.3;
				$nilai_uas = $uas * 0.4;
				$nilaiakhir = $nilai_kehadiran + $nilai_tugas + $nilai_uts + $nilai_uas;
						if ($nilaiakhir>=81)
						{
						$grade = 'A';
						}
						elseif ($nilaiakhir>=71)
						{
						$grade = 'B';
						}
						elseif ($nilaiakhir>=61)
						{
						$grade = 'C';
						}
						elseif ($nilaiakhir>=51)
						{
						$grade = 'D';
						}
						elseif ($nilaiakhir>=1)
						{
						$grade = 'D';
						}
						else
						{
						$grade = 'E';
						}
			echo $alamat;


			$conn->query("INSERT INTO tbl_dosen VALUES ('$nim', '$nama', '$kehadiran', '$agama', '$tugas', '$uts', '$uas', '$nilaiakhir', '$grade') ");
			echo "<meta http-equiv='refresh' content='0;url=admin.php?page=linknya'>";
		endif; #akhir tombol simpan ditekan

		if (isset($_POST["btnUpdate"])):
			$nim = $_POST["txtnim"];
			$nama = $_POST["txtnama"];
			$kehadiran = $_POST["txtkehadiran"];
			$tugas = $_POST["txtnilaitugas"];
			$uts = $_POST["txtnilaiuts"];
			$uas = $_POST["txtnilaiuas"];
			$alamat = $_POST["txtalamat"];
				$nilai_kehadiran = $kehadiran * 0.1;
				$nilai_tugas = $tugas * 0.2;
				$nilai_uts = $uts * 0.3;
				$nilai_uas = $uas * 0.4;
				$nilaiakhir = $nilai_kehadiran + $nilai_tugas + $nilai_uts + $nilai_uas;
						if ($nilaiakhir>=81)
						{
						$grade = 'A';
						}
						elseif ($nilaiakhir>=71)
						{
						$grade = 'B';
						}
						elseif ($nilaiakhir>=61)
						{
						$grade = 'C';
						}
						elseif ($nilaiakhir>=51)
						{
						$grade = 'D';
						}
						elseif ($nilaiakhir>=1)
						{
						$grade = 'D';
						}
						else
						{
						$grade = 'E';
						}
			echo $uas;

			$conn->query("UPDATE tbl_dosen SET nama='$nama', kehadiran='$kehadiran', tugas='$tugas', uts='$uts', uas='$uas', nilaiakhir='$nilaiakhir', grade='$grade' WHERE nim='$nim' ");
			echo "<meta http-equiv='refresh' content='0;url=admin.php?page=linknya'>";
		endif; #akhir tombol update ditekan
	?>





	<?php
		if ( isset($_GET["aksi"]) && isset($_GET["kode"]) ):
			$aksi = $_GET["aksi"];
			$kode = $_GET["kode"];
			echo $aksi . $kode;
			
			if ($aksi=="ubah"):
				$qu = $conn->query("SELECT * FROM tbl_dosen WHERE nim='$kode' ");
	  		$dtu = $qu->fetch_object();
	  		$nim = $kode;
			$nama = $dtu->nama;
			$kehadiran = $dtu->kehadiran;
			$tugas = $dtu->tugas;
			$uts = $dtu->uts;
			$uts = $dtu->uts;
			$uas = $dtu->uas;
			$nilaiakhir = $dtu->nilaiakhir;
			$grade = $dtu->grade;
			$alamat = $dtu->alamat;
				$tombol = "Update"; $warna = "warning";
			elseif ($aksi=="hapus"):
				$conn->query("DELETE FROM tbl_dosen WHERE nim='$kode' ");
				echo "<meta http-equiv='refresh' content='0;url=admin.php?page=linknya'>";
			endif; #akhir ubah atau hapus
		endif; #akhir aksi dan kode
	?>
<br>
<?php
$nilaigrade = $nilaiakhir
?>
<?php echo $nilai_akhir ?>


	<form class="form-horizontal" method="POST">
	  
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="txtnim">NIM:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="txtnim" name="txtnim" placeholder="Isikan NIM" maxlength="10" onkeypress='validate(event)' value="<?php echo $nim ?>">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="txtnama">Nama Mahasiswa:</label>
	    <div class="col-sm-10">
	      <input value="<?php echo $nama ?>" type="text" class="form-control" id="txtnama" name="txtnama" placeholder="Isikan Nama Mahasiswa" maxlength="80">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="txtkehadiran">Nilai Kehadiran:</label>
	    <div class="col-sm-10">
	      <input value="<?php echo $kehadiran ?>" type="text" class="form-control" id="txtkehadiran" name="txtkehadiran" onkeypress='validate(event)' placeholder="Isikan Kehadiran Mahasiswa" maxlength="3">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="txtnilaitugas">Nilai Tugas:</label>
	    <div class="col-sm-10">
	      <input value="<?php echo $tugas ?>" type="text" class="form-control" id="txtnilaitugas" name="txtnilaitugas" onkeypress='validate(event)' placeholder="Isikan Nilai Tugas Mahasiswa" maxlength="80">
	    </div>
	  </div>	

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="txtnilaiuts">Nilai UTS:</label>
	    <div class="col-sm-10">
	      <input value="<?php echo $uts ?>" type="text" class="form-control" id="txtnilaiuts" name="txtnilaiuts" onkeypress='validate(event)' placeholder="Isikan Nilai UTS Mahasiswa" maxlength="80">
	    </div>
	  </div>	

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="txtnilaiuas">Nilai UAS:</label>
	    <div class="col-sm-10">
	      <input value="<?php echo $uas ?>" type="text" class="form-control" id="txtnilaiuas" name="txtnilaiuas" onkeypress='validate(event)' placeholder="Isikan Nilai UAS Mahasiswa" maxlength="80">
	    </div>
	  </div>	

	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-<?php echo $warna ?>" name="btn<?php echo $tombol ?>"><span class="glyphicon glyphicon-floppy-disk"></span> <?php echo $tombol ?></button>
	    </div>
	  </div>

	</form>


	<table class="table table-hover table-bordered table-striped">
	  <thead>
	    <tr>
	      <th>No</th>
	      <th>NIM</th>
	      <th>Nama Mahasiswa</th>
	      <th>Kehadiran</th>
	      <th>Tugas</th>
	      <th>UTS</th>
	      <th>UAS</th>
	      <th>Nilai Akhir</th>
	      <th>Grade</th>
	      <th>Aksi</th>
	    </tr>
	  </thead>
	  <tbody>

	  	<?php
	  		$q = $conn->query("SELECT * FROM tbl_dosen ");
	  		$i = 1;
				while ($dt = $q->fetch_object()):
					?>
					<tr>
			      <td><?php echo $i++ ?></td>
			      <td><?php echo $dt->nim ?></td>
			      <td><?php echo $dt->nama ?></td>
			      <td><?php echo $dt->kehadiran ?></td>
			      <td><?php echo $dt->tugas ?></td>
			      <td><?php echo $dt->uts ?></td>
			      <td><?php echo $dt->uas ?></td>
			      <td><?php echo $dt->nilaiakhir ?></td>
			      <td><?php echo $dt->grade ?></td>
			      <td>
			      	<a href="admin.php?page=linknya&aksi=ubah&kode=<?php echo $dt->nim ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
			      	<a onclick="return confirm('Yakin dihapus?')" href="admin.php?page=linknya&aksi=hapus&kode=<?php echo $dt->nim ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
			      </td>
			    </tr>
					<?php
				endwhile;
	  	?>
	  </tbody>
	</table>

	<?php
			$kehadiran = $_POST["kehadiran"];
			$tugas = $_POST["tugas"];
			$uts = $_POST["uts"];
			$uas = $_POST["uas"];

			$nilai_kehadiran = $kehadiran * 10;
	?>
	<?php echo $nilai_kehadiran ?>

	<script>
		function validate(evt) {
		  var theEvent = evt || window.event;

		  // Handle paste
		  if (theEvent.type === 'paste') {
		      key = event.clipboardData.getData('text/plain');
		  } else {
		  // Handle key press
		      var key = theEvent.keyCode || theEvent.which;
		      key = String.fromCharCode(key);
		  }
		  var regex = /[0-9]|\./;
		  if( !regex.test(key) ) {
		    theEvent.returnValue = false;
		    if(theEvent.preventDefault) theEvent.preventDefault();
		  }
		}
	</script>

<?php	} #akhir function modulkucing ?>




<?php
	function menukiuas() {
		add_menu_page(
			'2022500005 SI4K Muhamad Ramadhan - UAS', #title dokumen
			'Menu Plugin UAS', #tampilan di menu dashboard
			'read', #capabilities
			'linknya', #utk link atau value utk page
			'moduluas', #nama modul yang dikerjakan
			'dashicons-buddicons-activity'
		);
	}

	add_action('admin_menu', 'menukiuas');
?>