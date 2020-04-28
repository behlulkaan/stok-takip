<?php 
include "../assets/baglanti.php";
include "../assets/css_js_connect.php";


$sorgu=$db->prepare("SELECT * FROM kategoriler WHERE 1 ORDER BY kategori_isim ASC");
$sorgu->execute();
$kategoriler=$sorgu->fetchAll();

$sorgu=$db->prepare("SELECT * FROM markalar WHERE 1 ORDER BY  marka_isim ASC");
$sorgu->execute();
$markalar=$sorgu->fetchAll();

$sorgu=$db->prepare("SELECT * FROM urunler WHERE 1");
$sorgu->execute();
$urunler=$sorgu->fetchAll();
?>
<html>
<head>
	<title>Ürün Yönetimi - Stok Takip Sistemi</title>
</head>
<body>
	<nav style="background: #2a2c30" class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item ">
					<a class="nav-link " href="../stok">Stok Bilgisi <span style="margin-top: 5px;float: right;display: block;margin-left: 5px"> <ion-icon name="cube-outline"></ion-icon></span></a></span></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link aktif" href="../urun">Ürün Bilgisi <span style="margin-top: 5px;float: right;display: block;margin-left: 5px"> <ion-icon name="pricetag-outline"></ion-icon></span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../musteri">Müşteri Bilgisi <span style="margin-top: 5px;float: right;display: block;margin-left: 5px"> <ion-icon name="cart-outline"></ion-icon> </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Cari Hesap <span style="margin-top: 5px;float: right;display: block;margin-left: 5px"> <ion-icon name="cash-outline"></ion-icon></span> </a>
					</li>

				</ul>
			</div>
		</nav>

		<div class="main">

			<div style="margin-left: 30px" class="btn-group" role="group" aria-label="Basic example">
				<button data-toggle="modal" data-target="#urun_urun-tanimla-modal" href="#" class="btn btn-outline-dark">Ürün Tanımla</button>
				<button data-toggle="modal" data-target="#urun_kategori-tanimla-modal"  href="#" class="btn btn-outline-dark">Kategori Tanımla</button>
				<button data-toggle="modal" data-target="#urun_marka-tanimla-modal"  href="#" class="btn btn-outline-dark">Marka Tanımla</button>
				<button data-toggle="modal" data-target="#urun_kategorileri-goster-modal"  href="#" class="btn btn-outline-dark">Kategorileri Göster</button>
				<button data-toggle="modal" data-target="#urun_markalari-goster-modal"  href="#" class="btn btn-outline-dark">Markaları Göster</button>

			</div>
		</div>
		<!-- Modal -->
		<div style="padding: 0px" class="modal fade" id="urun_urun-tanimla-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ürün Tanımla</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h4>Ürün Tanımla</h4>
						<form>

							<div class="form-group">
								<label for="exampleFormControlInput1">Ürün Kategorisi</label></a><br>
								<select style="width: 70%;display: inline-block;margin-right: 15px" class="form-control" id="urun_yeni-urun-kategori" required="">
									<?php 
									foreach ($kategoriler as $kategori ) { ?>
										<option value="<?= $kategori["kategori_id"] ?>"><?= $kategori["kategori_isim"] ?></option>

									<?php } ?>
								</select>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#urun_kategori-tanimla-modal">Kategori Ekle</button>
							</div>

							<div class="form-group">
								<label for="exampleFormControlInput1">Ürün Başlığı</label>
								<input type="text" class="form-control" id="urun_yeni-urun-baslik" placeholder="Ürün Başlığını Giriniz" required="">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Ürün Markası</label></a><br>
								<select  style="width: 70%;display: inline-block;margin-right: 15px" class="form-control" id="urun_yeni-urun-marka" required="">
									<?php 
									foreach ($markalar as $marka ) { ?>
										<option value="<?= $marka["marka_id"] ?>"><?= $marka["marka_isim"] ?></option>


									<?php } ?>
								</select>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#urun_marka-tanimla-modal">Marka Ekle</button>
								<div class="form-group">
									<label for="exampleFormControlInput1">Ürün Modeli</label>
									<input type="text" class="form-control" id="urun_yeni-urun-model" placeholder="Ürünün Modelini Giriniz" required="">
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Ürün Rengi</label>
									<input type="text" class="form-control" id="urun_yeni-urun-renk" placeholder="Ürünün Rengini Giriniz" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Ürün Açıklaması</label>
								<textarea class="form-control" id="urun_yeni-urun-aciklama" rows="3"></textarea>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Alış Fiyatı</label>
								<input type="number" class="form-control" id="urun_yeni-urun-alis-fiyati" placeholder="Ürünün Alış Fiyatını Giriniz" required="">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Satış Fiyatı</label>
								<input type="number" class="form-control" id="urun_yeni-urun-satis-fiyati" placeholder="Ürünün Satış Fiyatını Giriniz" required="">
							</div>
						</div>

						<button onclick="urun_tanimla()" type="button" class="btn btn-info">Ürün Tanımla</button>

					</form>
				</div>
			</div>
		</div>


		<div class="modal fade" id="urun_kategori-tanimla-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Kategori Tanımla</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Kategori İsmi</label>
								<input  type="text" class="form-control" id="urun_yeni-kategori-isim" aria-describedby="emailHelp" >
							</div>
							<button  onclick="kategori_tanimla()" type="button" class="btn btn-danger">Kategori Tanımla</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="urun_marka-tanimla-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Marka Tanımla</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Marka İsmi</label>
								<input style="" type="text" class="form-control" id="urun_yeni-marka-isim" aria-describedby="emailHelp" ><br>
							</div>
							<button onclick="marka_tanimla()" type="button" class="btn btn-danger" id="urun_marka-tanimla-modal-buton">Marka Tanımla</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade container" id="urun_kategorileri-goster-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Kategoriler</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div id="urun_kategoriler-liste" class="modal-body">
							<?php include "../assets/kategoriler_liste.php" ?>


					</div>
				</div>
			</div>
		</div>

		<div class="modal fade container" id="urun_markalari-goster-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Markalar</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div id="urun_markalar-liste" class="modal-body">
							<?php include "../assets/markalar_liste.php" ?>


					</div>
				</div>
			</div>
		</div>

		<div id="urun_urunler-liste">
			<?php include "../assets/urunler_liste.php" ?>
		</div>






	</body>
	</html>