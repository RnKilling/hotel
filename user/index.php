<?php
	require_once "view/header.php";
	if(isset($_SESSION['tipe'])) {
		$amb = $_SESSION['tipe'];
		$sqlx = $pdo->query("SELECT * FROM kamar WHERE tipe=$amb");
		$datax = $sqlx->fetch();
		$idkamar = $datax['idkamar'];
		$tipe = $datax['tipe'];
		$jumlah = $datax['jumlah'];
		$gambar = $datax['gambar'];
		$harga = $datax['harga'];
		$hargaf = number_format($harga, 0, ',', '.');
	}
?>

<script type="text/javascript">
	function pilih() {
		var type = document.opsi.tipe.value;
		var teks = document.getElementById('selek').options[document.getElementById('selek').selectedIndex].text;
		document.opsi.harga.value = type;
		document.opsi.tipex.value = teks;
	}

	document.addEventListener("DOMContentLoaded", function() {
		var images = [
			'../gambar/3.jpg',
			'../gambar/4.webp',
			'../gambar/5.jpg',
			'../gambar/6.jpeg',
			'../gambar/7.webp'
		];

		var index = 0;
		function changeBackground() {
			var backgroundLayer = document.getElementById('background-layer');
			backgroundLayer.style.backgroundImage = 'url(' + images[index] + ')';
			backgroundLayer.style.boxShadow = 'inset 0 0 100px rgba(0, 0, 0, 0.5)';
			index = (index + 1) % images.length;
		}

		// Change background every 5 seconds (5000 milliseconds)
		setInterval(changeBackground, 5000);

		// Initial call to set the first background
		changeBackground();
	});
</script>

<style>
	body {
		margin: 0;
		padding: 0;
	}

	#background-wrapper {
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		z-index: -1;
		overflow: hidden;
	}
	#background-layer {
		width: 100%;
		height: 100%;
		background-size: cover;
		background-attachment: fixed;
		transition: background-image 1s ease-in-out, box-shadow 1s ease-in-out;
	}

	#content-wrapper {
		position: relative;
		z-index: 1;
		padding: 20px;
	}
</style>

<div id="background-wrapper">
	<div id="background-layer"></div>
</div>

<div id="content-wrapper">
	<div id="imgindex">
		<div id="imglog">
			<p><br>Selamat Datang<br>
				*********<br>&nbsp;</p>
		</div>
	</div>

			<div id="reservasi">
				<li>Reservasi</li>
				<form method="post" action="pemesanan" name="opsi">
					<table>
						<tr>
							<td>Check-In</td>
							<td>Check-Out</td>
							<td>Type</td>
							<td>Harga/Malam</td>
							<td></td>
						</tr>
						<tr>
							<td>
								<input type="date" name="cekin">
							</td>
							<td>
								<input type="date" name="cekout">
							</td>
							<td>
								<select name="tipe" id="selek" required="required" onchange="pilih()" style="font-weight: bold;">
									<option selected="selected" disabled="disabled">-Pilih-</option>
									<option value="Rp 410.000">Superior</option>
									<option value="Rp 450.000">Deluxe</option>
									<option value="Rp 700.000">Junior Suite</option>
									<option value="Rp 1.200.000">Executive</option>
								</select>
							</td>
							<td>
								<input type="text" name="harga" style="width: 100px;" onchange="pilih()">
								<input type="hidden" name="tipex" style="width: 100px;" onchange="pilih()">
							</td>
							<td>
								<input type="submit" name="ok" value="Pesan" id="tombol">
							</td>
						</tr>
					</table>
				</form>
			</div>

			<div id="tentang">
				<h3>Tentang Kami</h3><br>
				<p>
		Hotel Bintang 5 Indonesia menawarkan pengalaman menginap yang mewah dan nyaman dengan fasilitas kelas dunia. Terletak di berbagai lokasi strategis di seluruh Indonesia, hotel-hotel kami memberikan akses mudah ke destinasi wisata terkenal dan pusat bisnis.
	</p><br>
	<p>
		Hotel ini memiliki berbagai tipe kamar yang dirancang untuk kenyamanan maksimal, termasuk kamar Superior, Deluxe, Junior Suite, dan Executive Suite. Dengan pelayanan terbaik dan fasilitas lengkap, Hotel Bintang 5 Indonesia adalah pilihan tepat untuk wisatawan bisnis dan liburan.
	</p>
			</div>

			<div id="cekinout">
				<h3>Check-In &amp; Check-Out</h3><br>
				<h4>Check-In</h4>
				<p>Jam Check-In Standar : 12.00 WITA</p>
				<p>*Waktu Check-In dari plan mempunyai prioritas lebih besar</p><br>
				<h4>Check-Out</h4>
				<p>Jam Check-Out Standar : 12.00 WITA</p>
				<p>*Waktu Check-Out dari plan mempunyai prioritas lebih besar</p><br>
			</div>

			<div id="petalokasi">
				<h3>Peta Lokasi</h3><br>
				<img src="../gambar/horison1.png" width="70%">
			</div>
			</center>
	

<?php
	require_once "view/footer.php"
?>