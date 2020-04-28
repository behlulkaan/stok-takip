<?php 
include "../assets/baglanti.php";
$sorgu=$db->prepare("DELETE FROM urunler WHERE urun_id = :urun_id");
$sorgu->bindParam('urun_id',$_POST["urun_id"]);
$sorgu->execute();
$silinen_urun=$sorgu->fetch();

$sorgu=$db->prepare("SELECT * FROM urunler WHERE 1");
$sorgu->execute();
$urunler=$sorgu->fetchAll();


 include '../assets/urunler_liste.php';

?>



