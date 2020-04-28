<?php 
include "../assets/baglanti.php";

$kategori = $_POST["yeni_urun_kategori"];
$baslik = $_POST["yeni_urun_baslik"];
$model = $_POST["yeni_urun_model"];
$renk = $_POST["yeni_urun_renk"];
$marka = $_POST["yeni_urun_marka"];
$aciklama = $_POST["yeni_urun_aciklama"];
$alis_fiyati = $_POST["yeni_urun_alis_fiyati"];
$satis_fiyati = $_POST["yeni_urun_satis_fiyati"];

$sorgu=$db->prepare("INSERT INTO urunler (urun_baslik, urun_aciklama, urun_marka, urun_model, urun_kategori, urun_renk, urun_alis_fiyati, urun_satis_fiyati) VALUES(:baslik, :aciklama, :marka, :model, 
:kategori, :renk, :alis_fiyati, :satis_fiyati )");
$sorgu->bindParam(':baslik', $baslik);
$sorgu->bindParam(':aciklama', $aciklama);
$sorgu->bindParam(':marka', $marka);
$sorgu->bindParam(':model', $model);
$sorgu->bindParam(':kategori', $kategori);
$sorgu->bindParam(':renk', $renk);
$sorgu->bindParam(':alis_fiyati', $alis_fiyati);
$sorgu->bindParam(':satis_fiyati', $satis_fiyati);
$sorgu->execute();
$marka=$sorgu->fetch();

include"../assets/urunler_liste.php";


 ?>