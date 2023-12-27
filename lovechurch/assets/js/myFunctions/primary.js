function BringPhoto(boolean) {
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

	if (boolean) {
		$("#submit_upphoto").click();
	}
}

function tab_join(col1, col2, col3) {
	$("#" + col1).removeClass("d-block");
	$("#" + col2).removeClass("d-block");
	$("#" + col3).removeClass("d-none");

	$("#btn-join").removeClass('btn-light');
	$("#btn-informations").removeClass('btn-dark');
	$("#btn-rules").removeClass('btn-dark');

	$("#" + col1).addClass("d-none");
	$("#" + col2).addClass("d-none");
	$("#" + col1).addClass("d-block");

	$("#btn-join").addClass('btn-dark');
	$("#btn-rules").addClass("btn-light");
	$("#btn-informations").addClass('btn-light');
}

function tab_information(col1, col2, col3) {
	$("#" + col1).removeClass("d-none");
	$("#" + col2).removeClass("d-block");
	$("#" + col3).removeClass("d-block");

	$("#btn-join").removeClass('btn-dark');
	$("#btn-informations").removeClass('btn-light');
	$("#btn-rules").removeClass('btn-dark');

	$("#" + col2).addClass("d-none");
	$("#" + col3).addClass("d-none");

	$("#btn-join").addClass('btn-light');
	$("#btn-rules").addClass("btn-light");
	$("#btn-informations").addClass('btn-dark');
}

function tab_rules(col1, col2, col3) {
	$("#" + col1).removeClass("d-block");
	$("#" + col2).removeClass("d-none");
	$("#" + col3).removeClass("d-block");

	$("#btn-join").removeClass('btn-dark');
	$("#btn-informations").removeClass('btn-dark');
	$("#btn-rules").removeClass('btn-light');

	$("#" + col1).addClass("d-none");
	$("#" + col2).addClass('d-block');
	$("#" + col3).addClass("d-none");

	$("#btn-join").addClass('btn-light');
	$("#btn-rules").addClass("btn-dark");
	$("#btn-informations").addClass('btn-light');
}
