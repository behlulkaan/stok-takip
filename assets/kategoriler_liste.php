<?php 
include"baglanti.php";
$sorgu=$db->prepare("SELECT * FROM kategoriler");
$sorgu->execute();
$kategoriler=$sorgu->fetchAll();



?>


<ul class="list-group list-group-flush">
	
	<?php 
	foreach ($kategoriler as $kategori) { ?>
		<li class="list-group-item">
			<span class="kategori-duzenle-mevcut-<?= $kategori["kategori_id"] ?>"><?= $kategori["kategori_isim"] ?></span>
			<input id="kategori-duzenle-input-<?= $kategori["kategori_id"] ?>" class="kategori-duzenle-input kategori-duzenle-input-<?= $kategori["kategori_id"] ?>"  value="<?= $kategori["kategori_isim"] ?>" type="text" >
			<div style="float: right;">
				<a class="kategori-duzenle-mevcut-<?= $kategori["kategori_id"] ?>" onclick="kategori_sil(<?= $kategori["kategori_id"] ?>)" href="#"><ion-icon name="trash-outline"></a></ion-icon>&emsp;
				<a class="kategori-duzenle-mevcut-<?= $kategori["kategori_id"] ?>" onclick="kategori_duzenle_ac(<?= $kategori["kategori_id"]  ?>)" href="#"><ion-icon name="create-outline"></ion-icon></a>
				<a style="padding: 10px" href="#" onclick="kategori_duzenle_kapat(<?= $kategori["kategori_id"] ?>)" class="kategori-duzenle-input badge badge-danger kategori-duzenle-input-<?= $kategori["kategori_id"] ?>">İptal</a>
				<a style="padding: 10px" href="#" onclick="kategori_duzenle(<?= $kategori["kategori_id"] ?>)" class="kategori-duzenle-input badge badge-success kategori-duzenle-input-<?= $kategori["kategori_id"] ?>">Kaydet</a>
			</div>
			<div style="display: none;height:auto;padding:0px 7px 0px 7px;font-size: 15px;margin:0px;" id="kategori-sil-alert-<?= $kategori["kategori_id"] ?>" class="alert alert-warning alert-dismissible fade show" role="alert">
				<b><?= $kategori["kategori_isim"] ?></b> kategorisıne ait ürün bulunduğu için kategori silinemedi.
			</div>
		</li>


	<?php } ?>
</ul>


