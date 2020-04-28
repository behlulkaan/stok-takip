<?php 

include "../assets/baglanti.php";

$id = $_POST["id"];
$baslik = $_POST["baslik"];
$kategori = $_POST["kategori"];
$marka = $_POST["marka"];
$model = $_POST["model"];
$renk = $_POST["renk"];
$aciklama = $_POST["aciklama"];
$alis_fiyati = $_POST["alis_fiyati"];
$satis_fiyati = $_POST["satis_fiyati"];


$sorgu = $db->prepare("UPDATE urunler SET urun_baslik = :baslik, urun_kategori = :kategori, urun_marka = :marka, urun_model = :model, urun_renk = :renk, urun_aciklama = :aciklama, urun_alis_fiyati = :alis_fiyati, urun_satis_fiyati = :satis_fiyati WHERE urun_id = :id");
$sorgu->bindParam(":id", $id);
$sorgu->bindParam(":baslik", $baslik);
$sorgu->bindParam(":kategori", $kategori);
$sorgu->bindParam(":marka", $marka);
$sorgu->bindParam(":model", $model);
$sorgu->bindParam(":renk", $renk);
$sorgu->bindParam(":aciklama", $aciklama);
$sorgu->bindParam(":alis_fiyati", $alis_fiyati);
$sorgu->bindParam(":satis_fiyati", $satis_fiyati);
$sorgu->execute();
$duzenlenen_urun=$sorgu->fetch();


$sorgu=$db->prepare("SELECT * FROM kategoriler WHERE 1");
$sorgu->execute();
$kategoriler=$sorgu->fetchAll();

$sorgu=$db->prepare("SELECT * FROM markalar WHERE 1");
$sorgu->execute();
$markalar=$sorgu->fetchAll();

$sorgu=$db->prepare("SELECT * FROM urunler WHERE 1");
$sorgu->execute();
$urunler=$sorgu->fetchAll();


include "../assets/urunler_liste.php" 

?>
