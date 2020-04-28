<?php 
include"../assets/baglanti.php";


$id=$_POST["id"];


$sorgu=$db->prepare("SELECT * FROM markalar WHERE 1 ");
$sorgu->execute();
$markalar=$sorgu->fetchAll();

$sorgu=$db->prepare("SELECT * FROM urunler WHERE urun_marka = :marka_id ");
$sorgu->bindParam(":marka_id",$id);
$sorgu->execute();
$urunler=$sorgu->fetchAll();


if ($urunler) {
	echo "0";
} else {
	$sorgu=$db->prepare("DELETE FROM markalar WHERE marka_id = :id");
	$sorgu->bindParam(":id",$id);
	$sorgu->execute();
	include "../assets/markalar_liste.php";
	
}


?>