<?php 
include "../assets/baglanti.php";

$sorgu=$db->prepare("INSERT INTO kategoriler (kategori_isim) VALUES(:isim )");
$sorgu->bindParam(':isim', $_POST["yeni_kategori_isim"]);
$sorgu->execute();
$sorgu->fetch();

$kategori_id = $db->lastInsertId();

$sorgu=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id = :kategori_id");
$sorgu->bindParam(':kategori_id',$kategori_id);
$sorgu->execute();
$tanimlanan_kategori = $sorgu->fetch();


echo $tanimlanan_kategori["kategori_id"]."-".$tanimlanan_kategori["kategori_isim"];


 ?>