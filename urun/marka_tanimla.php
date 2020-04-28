<?php 
include "../assets/baglanti.php";

$sorgu=$db->prepare("INSERT INTO markalar (marka_isim) VALUES(:isim )");
$sorgu->bindParam(':isim', $_POST["yeni_marka_isim"]);
$sorgu->execute();
$sorgu->fetch();

$marka_id = $db->lastInsertId();

$sorgu=$db->prepare("SELECT * FROM markalar WHERE marka_id = :marka_id");
$sorgu->bindParam(':marka_id',$marka_id);
$sorgu->execute();
$tanimlanan_marka = $sorgu->fetch();


echo $tanimlanan_marka["marka_id"]."-".$tanimlanan_marka["marka_isim"];

 ?>