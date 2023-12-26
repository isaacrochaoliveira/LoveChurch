function BringPhoto() {
	var target = document.getElementById('target');
	var file = document.querySelector("#banner").files[0];

	var arquivo = file['name'];
	resultado = arquivo.split(".", 2);


	if (resultado[1] === 'pdf') {
		$('#target').attr('src', "../../assets/img/pdf.png");
		return;
	}

	if (resultado[1] === 'rar' || resultado[1] === 'zip') {
		$('#target').attr('src', "../../assets/img/rar.png");
		return;
	}

	if (resultado[1] === 'doc' || resultado[1] === 'docx') {
		$('#target').attr('src', "../../assets/img/word.png");
		return;
	}

	if (resultado[1] === 'xlsx' || resultado[1] === 'xlsm' || resultado[1] === 'xls') {
		$('#target').attr('src', "../../assets/img/excel.png");
		return;
	}


	if (resultado[1] === 'xml') {
		$('#target').attr('src', "../../assets/img/xml.png");
		return;
	}

	var reader = new FileReader();

	reader.onloadend = function () {
		target.src = reader.result;
	};

	if (file) {
		reader.readAsDataURL(file);

	} else {
		target.src = "";
	}
}