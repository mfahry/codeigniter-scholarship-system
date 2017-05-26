//Ini Javascript yang digunakan untuk membuat inputan wajib diisi. jika tidak diisi,akan keluar warning.

function formCheck(formobj){
	// Enter name of mandatory fields
	var fieldRequired = Array("FirstName", "LastName", "nama_lokasi", "akronim", "nama_perusahaan", "nama_modul", "nama_saran", "nama_rekomendasi", "username", "pass", "nama_pegawai", "nama", "id", "nama_level", "deskripsi", "kode", "saran");
	// Enter field description to appear in the dialog box
	var fieldDescription = Array("First Name", "Last Name", "Nama Lokasi", "Kode", "Jenis Perusahaan", "Nama Modul", "Isi Saran", "Isi Rekomendasi", "Username", "Password", "Nama", "Nama", "ID", "Nama Level", "Deskripsi", "Kode", "Saran");
	// dialog message
	var alertMsg = "Tolong lengkapi :\n";
	
	var l_Msg = alertMsg.length;
	
	for (var i = 0; i < fieldRequired.length; i++){
		var obj = formobj.elements[fieldRequired[i]];
		if (obj){
			switch(obj.type){
			case "select-one":
				if (obj.selectedIndex == -1 || obj.options[obj.selectedIndex].text == ""){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "select-multiple":
				if (obj.selectedIndex == -1){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "password":
				if (obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;

			case "text":
			case "textarea":
				if (obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			default:
			}
			if (obj.type == undefined){
				var blnchecked = false;
				for (var j = 0; j < obj.length; j++){
					if (obj[j].checked){
						blnchecked = true;
					}
				}
				if (!blnchecked){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
			}
		}
	}

	if (alertMsg.length == l_Msg){
		return true;
	}else{
		alert(alertMsg);
		return false;
	}
}