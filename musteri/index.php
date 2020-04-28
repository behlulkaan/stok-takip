<?php 
include"../assets/baglanti.php";
include "../assets/css_js_connect.php";

 ?>
 <html>
<head>
	<title>Müşteri Yönetimi - Stok Takip Sistemi</title>
</head>
<body>
	<nav style="background: #2a2c30" class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item ">
					<a class="nav-link" href="../stok">Stok Bilgisi <span style="margin-top: 5px;float: right;display: block;margin-left: 5px"> <ion-icon name="cube-outline"></ion-icon></span></a></span></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="../urun">Ürün Bilgisi <span style="margin-top: 5px;float: right;display: block;margin-left: 5px"> <ion-icon name="pricetag-outline"></ion-icon></span></a>
				</li>
				<li class="nav-item aktif">
					<a class="nav-link" href="../musteri">Müşteri Bilgisi <span style="margin-top: 5px;float: right;display: block;margin-left: 5px"> <ion-icon name="cart-outline"></ion-icon> </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Cari Hesap <span style="margin-top: 5px;float: right;display: block;margin-left: 5px"> <ion-icon name="cash-outline"></ion-icon></span> </a>
				</li>
				
			</ul>
		</div>
	</nav>
	<div class="main"></div>

</body>
</html>