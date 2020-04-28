<?php 
include"baglanti.php";
$sorgu=$db->prepare("SELECT * FROM markalar ORDER BY marka_isim");
$sorgu->execute();
$markalar=$sorgu->fetchAll();



?>


<ul class="list-group list-group-flush">
	<?php 
	foreach ($markalar as $marka) { ?>
		<li class="list-group-item">
			<span class="marka-duzenle-mevcut-<?= $marka["marka_id"] ?>"><?= $marka["marka_isim"] ?></span>
			<input id="marka-duzenle-input-<?= $marka["marka_id"] ?>" class="marka-duzenle-input marka-duzenle-input-<?= $marka["marka_id"] ?>"  value="<?= $marka["marka_isim"] ?>" type="text" >
			<div style="float: right;">
				<a class="marka-duzenle-mevcut-<?= $marka["marka_id"] ?>" onclick="marka_sil(<?= $marka["marka_id"] ?>)" href="#"><ion-icon name="trash-outline"></a></ion-icon>&emsp;
				<a class="marka-duzenle-mevcut-<?= $marka["marka_id"] ?>" onclick="marka_duzenle_ac(<?= $marka["marka_id"]  ?>)" href="#"><ion-icon name="create-outline"></ion-icon></a>
				<a style="padding: 10px" href="#" onclick="marka_duzenle_kapat(<?= $marka["marka_id"] ?>)" class="marka-duzenle-input badge badge-danger marka-duzenle-input-<?= $marka["marka_id"] ?>">İptal</a>
				<a style="padding: 10px" href="#" onclick="marka_duzenle(<?= $marka["marka_id"] ?>)" class="marka-duzenle-input badge badge-success marka-duzenle-input-<?= $marka["marka_id"] ?>">Kaydet</a>
			</div>
			<div style="display: none;height:auto;padding:0px 7px 0px 7px;font-size: 15px;margin:0px;" id="marka-sil-alert-<?= $marka["marka_id"] ?>" class="alert alert-warning alert-dismissible fade show" role="alert">
				<b><?= $marka["marka_isim"] ?></b> markasına ait ürün bulunduğu için marka silinemedi.
			</div>
		</li>

	<?php } ?>
</ul>


