
<?php 
include 'baglanti.php';

$sorgu=$db->prepare("SELECT * FROM urunler WHERE 1");
$sorgu->execute();
$urunler=$sorgu->fetchAll();

$sorgu=$db->prepare("SELECT * FROM kategoriler WHERE 1");
$sorgu->execute();
$kategoriler=$sorgu->fetchAll();

$sorgu=$db->prepare("SELECT * FROM markalar WHERE 1");
$sorgu->execute();
$markalar=$sorgu->fetchAll();
 ?>
<table style="margin-top: 100px;" class="table table-light">
			<thead>
				<tr>
					<th scope="col">id</th>
					<th scope="col">Başlık</th>
					<th scope="col">Kategori</th>
					<th scope="col">Marka</th>
					<th scope="col">Model</th>
					<th scope="col">Renk</th>
					<th scope="col">Açıklama</th>
					<th scope="col">Alış Fiyatı</th>
					<th scope="col">Satış Fiyatı</th>



				</tr>
			</thead>
			<tbody><?php foreach ($urunler as $urun) {
				$sorgu=$db->prepare("SELECT * FROM markalar WHERE marka_id =:id ");
				$sorgu->bindParam(':id',$urun["urun_marka"]);
				$sorgu->execute();
				$urun_marka=$sorgu->fetch();

				$sorgu=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id =:id ");
				$sorgu->bindParam(':id',$urun["urun_kategori"]);
				$sorgu->execute();
				$urun_kategori=$sorgu->fetch();
				?>

				<tr bg>
					<th scope="row"><?= $urun["urun_id"] ?></th>
					<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?>"><b><?= $urun["urun_baslik"] ?></b></td>
					<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?>"><?= $urun_kategori["kategori_isim"] ?></td>
					<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?> "><?= $urun_marka["marka_isim"] ?></td>
					<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?> "><?= $urun["urun_model"] ?></td>
					<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?> "><?= $urun["urun_renk"] ?></td>
					<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?>"><?= $urun["urun_aciklama"] ?></td>
					<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?>"><?= $urun["urun_alis_fiyati"] ?> TRY</td>
					<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?>"><?= $urun["urun_satis_fiyati"] ?> TRY</td>

					<td><input class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>" id="urun_urun-duzenle-baslik-<?= $urun["urun_id"] ?>" type="text" value="<?= $urun["urun_baslik"]  ?>"></td>
					<td class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>"><select style="width: 70%;display: inline-block;margin-right: 15px" class="form-control" id="urun_urun-duzenle-kategori-<?= $urun["urun_id"] ?>" required="">
						<?php 
						foreach ($kategoriler as $kategori ) { ?>
							<option <?php if ($urun["urun_kategori"] == $kategori["kategori_id"]) {
								echo "selected";
							}
							?> value="<?= $kategori["kategori_id"] ?>"><?= $kategori["kategori_isim"] ?></option>

						<?php } ?>
					</select>
				</td>
				<td class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>"><select style="width: 70%;display: inline-block;margin-right: 15px" class="form-control" id="urun_urun-duzenle-marka-<?= $urun["urun_id"] ?>" required="">
					<?php 
					foreach ($markalar as $marka ) { ?>
						<option <?php if ($urun["urun_marka"] == $marka["marka_id"]) {
								echo "selected";
							}
							?> value="<?= $marka["marka_id"] ?>"><?= $marka["marka_isim"] ?></option>

					<?php } ?>
				</select>
			</td>
			<td class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>"><input  id="urun_urun-duzenle-model-<?= $urun["urun_id"] ?>" type="text" value="<?= $urun["urun_model"]  ?>"></td>
			<td class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>"><input  id="urun_urun-duzenle-renk-<?= $urun["urun_id"] ?>" type="text" value="<?= $urun["urun_renk"]  ?>"></td>
			<td class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>"><textarea style="height: 27px" id="urun_urun-duzenle-aciklama-<?= $urun["urun_id"] ?>" type="text" value=""><?= $urun["urun_aciklama"]  ?></textarea></td>
			<td class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>"><input id="urun_urun-duzenle-alis-fiyati-<?= $urun["urun_id"] ?>" type="text" value="<?= $urun["urun_alis_fiyati"]  ?>"></td>
			<td class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>"><input id="urun_urun-duzenle-satis-fiyati-<?= $urun["urun_id"] ?>" type="text" value="<?= $urun["urun_satis_fiyati"]  ?>"></td>


			<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?>"><a data-toggle="modal" data-target="#urun_urun-sil-modal_<?= $urun["urun_id"] ?>" href="#"><ion-icon name="trash-outline"></ion-icon></a></td>
			<td class="urun_urun-liste-td-<?= $urun["urun_id"] ?>"><a onclick="urun_duzenle_ac(<?= $urun["urun_id"] ?>);" href="#"><ion-icon name="create-outline"></ion-icon></a></td>
			<td class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>" ><button href="#" onclick="urun_duzenle_kapat(<?= $urun["urun_id"]?>)" class="btn btn-danger">İptal</button></td>
			<td class="urun_urun-duzenle-inputlar urun_urun-duzenle-inputlar-<?= $urun["urun_id"] ?>" ><button href="#" onclick="urun_duzenle(<?= $urun["urun_id"]?>)" class="btn btn-success">Kaydet</button></td>


			<div class="modal fade" id="urun_urun-sil-modal_<?= $urun["urun_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ürünü Sil</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<strong><?= $urun["urun_baslik"] ?></strong> ürününü silmek istediğinize emin misiniz ?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Hayır</button>
							<button onclick="urun_sil(<?= $urun["urun_id"] ?>)" type="button" class="btn btn-primary">Evet</button>
						</div>
					</div>
				</div>
			</div>




		<?php  } ?>

	</tr>
</tbody>
</table>
