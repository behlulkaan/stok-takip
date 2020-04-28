<?php 
include"../assets/baglanti.php";


$id=$_POST["id"];


$sorgu=$db->prepare("SELECT * FROM kategoriler WHERE 1 ");
$sorgu->execute();
$kategoriler=$sorgu->fetchAll();

$sorgu=$db->prepare("SELECT * FROM urunler WHERE urun_kategori = :kategori_id ");
$sorgu->bindParam(":kategori_id",$id);
$sorgu->execute();
$urunler=$sorgu->fetchAll();


if ($urunler) {
	echo "0";
} else {
	$sorgu=$db->prepare("DELETE FROM kategoriler WHERE kategori_id = :id");
	$sorgu->bindParam(":id",$id);
	$sorgu->execute();
	include "../assets/kategoriler_liste.php";
	
}


?>