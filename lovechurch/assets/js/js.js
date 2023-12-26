
$(function () {
	$('.menu-m').click(function () {
		$('#menu .menu-lateral').slideToggle();
		$(this).toggleClass('active');
		return false;
	});

	//$('.mobmenu').click (function(){
	//$('.menuprincipal').slideToggle();
	//$(this).toggleClass('active');
	//return false;
	//});	

	$('.senha').click(function () {
		$('.mostraCampo').slideToggle();
		$(this).toggleClass('active');
		return false;
	});

	$(function () {
		$("#tab").tabs();
	});

	$("#accordion").accordion({
		collapsible: true,
		autoHeight: false,
		active: false,
		heightStyle: "content"
	});

});

function clickMenu() {
	$("#base_geral").removeClass("width-animation-backwards");
	$("#base_geral").removeClass("width-animation");
	if (itens.style.display == "") {
		itens.style.display = 'block';
	}
	if (itens.style.display == 'block') {
		itens.style.display = 'none';
		$("#clickMenu").addClass('d-none');
		$("#disclickMenu").removeClass('d-none');
		$("#disclickMenu").addClass('btn-toggle-animation');
		$("#base_geral").addClass("width-animation");
	} else {
		$("#base_geral").addClass("width-animation-backwards");
		$("#clickMenu").removeClass('d-none');
		$("#clickMenu").addClass('btn-toggle-animation');
		$("#disclickMenu").addClass('d-none');
		itens.style.display = 'block';
	}
}

$(document).ready(function () {
	$("#disclickMenu").addClass('d-none')
})

function excluir(obj) {
	var entidade = $(obj).attr('data-entidade');
	var id = $(obj).attr('data-id');
	if (confirm('Deseja realmente excluir ?')) {
		window.location.href = base_url + entidade + "/excluir/" + id;
	}
}

function fecharMsg(obj) {
	$(".msg").hide();


}
google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Year', 'Sales', 'Expenses'],
		['2004', 1000, 400],
		['2005', 1170, 460],
		['2006', 660, 1120],
		['2007', 1030, 540]
	]);

	var options = {
		title: 'Company Performance',
		curveType: 'function',
		legend: { position: 'bottom' }
	};

	var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

	chart.draw(data, options);
}

function calculo() {
	var valor = $("#valor").val();
	var quantidade = $("#quantidade").val();

	var total = valor * quantidade;

	$("#total").val((total).toLocaleString('pt-BR'));
}

//selecting all required elements
const dropArea = document.querySelector(".drag-area"),
	dragText = dropArea.querySelector("#headerP"),
	button = dropArea.querySelector("#buttonWP"),
	input = document.querySelector("#picture");
let file; //this is a global variable and we'll use it inside multiple functions

button.onclick = () => {
	input.click(); //if user click on the button then the input also clicked
}

input.addEventListener("change", function () {
	//getting user select file and [0] this means if user select multiple files then we'll select only the first one
	file = this.files[0];
	dropArea.classList.add("active");
	showFile(); //calling function
});
//If user Drag File Over DropArea
dropArea.addEventListener("dragover", (event) => {
	event.preventDefault(); //preventing from default behaviour
	dropArea.classList.add("active");
	dragText.textContent = "Release to Upload File";
});
//If user leave dragged File from DropArea
dropArea.addEventListener("dragleave", () => {
	dropArea.classList.remove("active");
	dragText.textContent = "Drag & Drop to Upload File";
});
//If user drop File on DropArea
dropArea.addEventListener("drop", (event) => {
	event.preventDefault(); //preventing from default behaviour
	//getting user select file and [0] this means if user select multiple files then we'll select only the first one
	file = event.dataTransfer.files[0];
	let nameImg = file.name;
	// alert(nameImg);
	// $('#pictureSecond').text(nameImg);

	showFile(); //calling function
});

function showFile() {
	let fileType = file.type; //getting selected file type
	let validExtensions = ["image/jpeg", "image/jpg", "image/png"]; //adding some valid image extensions in array
	if (validExtensions.includes(fileType)) { //if user selected file is an image file
		let fileReader = new FileReader(); //creating new FileReader object
		fileReader.onload = () => {
			let fileURL = fileReader.result; //passing user file source in fileURL variable
			// UNCOMMENT THIS BELOW LINE. I GOT AN ERROR WHILE UPLOADING THIS POST SO I COMMENTED IT
			let imgTag = `<img src="${fileURL}" alt="image">`; //creating an img tag and passing user selected file source inside src attribute
			let input = `<input type="file" value="${name}">`
			dropArea.innerHTML = imgTag; //adding that created img tag inside dropArea container
		}
		fileReader.readAsDataURL(file);
	} else {
		alert("This is not an Image File!");
		dropArea.classList.remove("active");
		dragText.textContent = "Drag & Drop to Upload File";
	}
}




function excluir_produto(id) {
	var answer = confirm("Deseja realmente excluir o produto?");
	if (answer) {
		document.location = base_url + 'produtos/delete/' + id;
	}
}

function excluir_conta(id) {
	// var answer = confirm("Deseja realmente excluir o produto?");
	if (confirm("Deseja realmente excluir o produto?")) {
		location.href = `http://localhost/www/edsure/projeto-hotel/projeto-hotel/hotel/receber/delete/${id}`;
	}
}

