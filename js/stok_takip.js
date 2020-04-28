function kategori_tanimla(){
	var yeni_kategori_isim = $("#urun_yeni-kategori-isim").val();
	if (yeni_kategori_isim == "" || undefined) {
		alert("Lütfen Kategoriyi Giriniz");
	}
	else{
		$.post( "kategori_tanimla.php", { yeni_kategori_isim: yeni_kategori_isim,})
		.done(function( data ) {
			var data = data.split("-");
			var tanimlanan_kategori_id = data[0];
			var tanimlanan_kategori_isim = data[1];
			$("#urun_yeni-urun-kategori").prepend('<option value="'+tanimlanan_kategori_id+'" >'+tanimlanan_kategori_isim+'</option>');
			$("#urun_yeni-urun-kategori option:first").attr("selected", "selected");
			$("#urun_kategori-tanimla-modal").modal('hide');
			$("#urun_yeni-kategori-isim").val("");
			$.post("../assets/kategoriler_liste.php",{}).done(function(data){
				$("#urun_kategoriler-liste").html(data);
			});
			$.post("../assets/urunler_liste.php",{}).done(function(data){
				$("#urun_urunler-liste").html(data);
			});

		});
	}
}

function marka_tanimla(){
	var yeni_marka_isim = $("#urun_yeni-marka-isim").val();
	if (yeni_marka_isim == "" || undefined) {
		alert("Lütfen Markayı Giriniz");
		alert(yeni_kategori_isim);
	}
	else{
		$.post( "marka_tanimla.php", { yeni_marka_isim: yeni_marka_isim,})
		.done(function( data ) {
			var data = data.split("-");
			var tanimlanan_marka_id = data[0];
			var tanimlanan_marka_isim = data[1];
			$("#urun_yeni-urun-marka").prepend('<option value="'+tanimlanan_marka_id+'" >'+tanimlanan_marka_isim+'</option>');
			$("#urun_yeni-urun-marka option:first").attr("selected", "selected");
			$("#urun_marka-tanimla-modal").modal('hide');
			$("#urun_yeni-marka-isim").val("");

		});
	}
}
function urun_tanimla(){
	var	yeni_urun_kategori = $("#urun_yeni-urun-kategori").val();
	var	yeni_urun_baslik = $("#urun_yeni-urun-baslik").val();
	var	yeni_urun_marka = $("#urun_yeni-urun-marka").val();
	var	yeni_urun_model = $("#urun_yeni-urun-model").val();
	var	yeni_urun_renk = $("#urun_yeni-urun-renk").val();
	var	yeni_urun_aciklama = $("#urun_yeni-urun-aciklama").val();
	var	yeni_urun_alis_fiyati = $("#urun_yeni-urun-alis-fiyati").val();
	var	yeni_urun_satis_fiyati = $("#urun_yeni-urun-satis-fiyati").val();


	if (yeni_urun_kategori == "" || undefined || yeni_urun_baslik == "" || undefined || yeni_urun_marka == "" || undefined || yeni_urun_model == "" || undefined ||
		yeni_urun_alis_fiyati == "" || undefined || yeni_urun_satis_fiyati == "" || undefined ) {
		alert("Tüm alanları doldurun");
}
else{
	$.post( "urun_tanimla.php", { yeni_urun_kategori: yeni_urun_kategori, yeni_urun_baslik: yeni_urun_baslik,yeni_urun_marka: yeni_urun_marka, yeni_urun_model: yeni_urun_model,	  
		yeni_urun_renk:yeni_urun_renk, yeni_urun_aciklama: yeni_urun_aciklama, yeni_urun_alis_fiyati: yeni_urun_alis_fiyati, yeni_urun_satis_fiyati: yeni_urun_satis_fiyati	})
	.done(function( data ) {
		$("#urun_urunler-liste").html(data);
		$("#urun_urun-tanimla-modal").modal("hide");
		$("#urun_yeni-urun-kategori").val("");
		$("#urun_yeni-urun-baslik").val("");
		$("#urun_yeni-urun-marka").val("");
		$("#urun_yeni-urun-model").val("");
		$("#urun_yeni-urun-renk").val("");
		$("#urun_yeni-urun-aciklama").val("");
		$("#urun_yeni-urun-alis-fiyati").val("");
		$("#urun_yeni-urun-satis-fiyati").val("");
	});
}
}

function urun_sil(urun_id){
	$.post( "urun_sil.php", { urun_id: urun_id})
	.done(function(data){
		$("#urun_urunler-liste").html(data);
		$("#urun_urun-sil-modal_"+urun_id).modal("hide");

	});

}
function urun_duzenle_ac(urun_id) {
	$(".urun_urun-duzenle-inputlar-"+urun_id).removeClass("urun_urun-duzenle-inputlar");
	$(".urun_urun-liste-td-"+urun_id).css("display","none");

}
function urun_duzenle_kapat(urun_id) {
	$(".urun_urun-duzenle-inputlar-"+urun_id).addClass("urun_urun-duzenle-inputlar");
	$(".urun_urun-liste-td-"+urun_id).css("display","");

}
function urun_duzenle(urun_id) {
	var	duzenlenmis_urun_kategori = $("#urun_urun-duzenle-kategori-"+urun_id).val();
	var	duzenlenmis_urun_baslik = $("#urun_urun-duzenle-baslik-"+urun_id).val();
	var	duzenlenmis_urun_marka = $("#urun_urun-duzenle-marka-"+urun_id).val();
	var	duzenlenmis_urun_model = $("#urun_urun-duzenle-model-"+urun_id).val();
	var	duzenlenmis_urun_renk = $("#urun_urun-duzenle-renk-"+urun_id).val();
	var	duzenlenmis_urun_aciklama = $("#urun_urun-duzenle-aciklama-"+urun_id).val();
	var	duzenlenmis_urun_alis_fiyati = $("#urun_urun-duzenle-alis-fiyati-"+urun_id).val();
	var	duzenlenmis_urun_satis_fiyati = $("#urun_urun-duzenle-satis-fiyati-"+urun_id).val();

	$.post("urun_duzenle.php",{id: urun_id, kategori: duzenlenmis_urun_kategori, baslik: duzenlenmis_urun_baslik, marka: duzenlenmis_urun_marka, model: duzenlenmis_urun_model, 
		renk: duzenlenmis_urun_renk, aciklama: duzenlenmis_urun_aciklama, alis_fiyati: duzenlenmis_urun_alis_fiyati, satis_fiyati: duzenlenmis_urun_satis_fiyati })
	.done(function(data){
		$("#urun_urunler-liste").html(data);
	})
	
}
function kategori_sil(kategori_id){
	$.post("kategori_sil.php",{id:kategori_id}).done(function(data){
		if (data == 0) {
			$("#kategori-sil-alert-"+kategori_id).slideDown().delay(2000).slideUp();
		}
		else{
			$("#urun_kategoriler-liste").html(data);
		}
		
	});
}
function kategori_duzenle_ac(kategori_id){
	$(".kategori-duzenle-mevcut-"+kategori_id).css("display",'none');
	$(".kategori-duzenle-input-"+kategori_id).css("display",'inline-block');
}
function kategori_duzenle_kapat(kategori_id){
	$(".kategori-duzenle-mevcut-"+kategori_id).css("display",'');
	$(".kategori-duzenle-input-"+kategori_id).css("display",'none');
}
function kategori_duzenle(kategori_id){
	var duzenlenmis_kategori_isim = $("#kategori-duzenle-input-"+kategori_id).val();
	$.post("kategori_duzenle.php",{id:kategori_id, isim: duzenlenmis_kategori_isim}).done(function(data){
		$("#urun_kategoriler-liste").html(data);
		$.post("../assets/urunler_liste.php",{}).done(function(data){
			$("#urun_urunler-liste").html(data);
		});
	});
}
function marka_sil(marka_id){
	$.post("marka_sil.php",{id:marka_id}).done(function(data){
		if (data == 0) {
			$("#marka-sil-alert-"+marka_id).slideDown().delay(2000).slideUp();
		}
		else{
			$("#urun_markalar-liste").html(data);
		}

	});
}
function marka_duzenle_ac(marka_id){
	$(".marka-duzenle-mevcut-"+marka_id).css("display",'none');
	$(".marka-duzenle-input-"+marka_id).css("display",'inline-block');
}
function marka_duzenle_kapat(marka_id){
	$(".marka-duzenle-mevcut-"+marka_id).css("display",'');
	$(".marka-duzenle-input-"+marka_id).css("display",'none');
}
function marka_duzenle(marka_id){
	var duzenlenmis_marka_isim = $("#marka-duzenle-input-"+marka_id).val();
	$.post("marka_duzenle.php",{id:marka_id, isim: duzenlenmis_marka_isim}).done(function(data){
		$("#urun_markalar-liste").html(data);
		$.post("../assets/urunler_liste.php",{}).done(function(data){
			$("#urun_urunler-liste").html(data);
		});
	});
}