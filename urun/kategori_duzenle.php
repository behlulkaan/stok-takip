<?php 
include '../assets/baglanti.php';


$sorgu = $db->prepare("UPDATE kategoriler SET kategori_isim = :isim WHERE kategori_id = :id");
$sorgu->bindParam(":id", $_POST["id"]);
$sorgu->bindParam(":isim", $_POST["isim"]);
$sorgu->execute();
$duzenlenen_kategori=$sorgu->fetch();


$sorgu=$db->prepare("SELECT * FROM kategoriler WHERE 1");
$sorgu->execute();
$kategoriler=$sorgu->fetchAll();


include "../assets/kategoriler_liste.php";


 ?>