<?php 
include '../assets/baglanti.php';


$sorgu = $db->prepare("UPDATE markalar SET marka_isim = :isim WHERE marka_id = :id");
$sorgu->bindParam(":id", $_POST["id"]);
$sorgu->bindParam(":isim", $_POST["isim"]);
$sorgu->execute();
$duzenlenen_marka=$sorgu->fetch();


$sorgu=$db->prepare("SELECT * FROM markalar WHERE 1");
$sorgu->execute();
$markalar=$sorgu->fetchAll();


include "../assets/markalar_liste.php";


 ?>