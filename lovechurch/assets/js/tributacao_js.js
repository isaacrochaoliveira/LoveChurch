$(function(){
	
})
function selecionar_cst_ipi(){
	var cst_ipi = $("#cst_ipi").val();
	
	$.ajax({
		url: base_url + "carregar/ipi/" + cst_ipi,
		type: "GET",
		success: function (html){
			$("#mostrar_ipi").html(html);
		},
		error: function (){
			notify("Erro", "houve erro na comunicação");
		}
	});
}

function selecionar_cst_pis(){    
	   var pis = $("#cst_pis").val();
	 
	     $.ajax({
	        url: base_url + 'carregar/pis/' + pis ,
	        type: 'GET',
	        //beforeSend: load_in(),
	        success: function (html) {
	          $('#mostrar_pis').html(html)
	         
	        },
	        error: function () {
	            notify('Erro', 'Houve uma falha de comunicação.');
	        }
	    });
	}

	function selecionar_cst_cofins(){    
	   var cofins = $("#cst_cofins").val();
	 
	     $.ajax({
	        url: base_url + 'carregar/cofins/' + cofins ,
	        type: 'GET',
	        //beforeSend: load_in(),
	        success: function (html) {
	          $('#mostrar_cofins').html(html)
	         
	        },
	        error: function () {
	            notify('Erro', 'Houve uma falha de comunicação.');
	        }
	    });
	}

function selecionar_cst_icms(){    
   var icms = $("#cst_icms").val();      
     $.ajax({
        url: base_url + 'carregar/icms/' + icms ,
        type: 'GET',
        //beforeSend: load_in(),
        success: function (html) {
          $('#mostrar_icms').html(html)
          $('#icms_orig').html(lista_origem_icms);
          $('#modbc').html(lista_modal_bc);

          if(icms=="00" || icms=="10" || icms=="20" || icms=="51" || icms=="70" || icms=="90" || icms=="10Part" || 
				icms=="90Part" || icms=="201" || icms=="202" || icms=="203" || icms=="900" ){
             $('#modbc').html(lista_modal_bc); 
          }

			if(icms=="30" || icms=="70" || icms=="90" ||  icms=="10Part" || icms=="90Part" || icms=="900" ){
	         $('#modbcst').html(lista_modal_st); 
	      	}

			if(icms=="20" || icms=="30" || icms=="40" ||  icms=="41" || icms=="60" || icms=="50" || icms=="70" || icms=="90" ){
	         $('#motdesicms').html(lista_motivo); 
	      	}
        },
        error: function () {
            notify('Erro', 'Houve uma falha de comunicação.');
        }
    });
}
function seleciona_tipo_calculo(){
 var escolha = $("#tipo_calc_ipi").val();
     $("#pipi").val("");
     $("#vunid").val("");
 if(escolha=="1"){
     $("#ipi_por_perc").show();
     $("#ipi_por_valor").hide();
 }else{
     $("#ipi_por_perc").hide();
     $("#ipi_por_valor").show(); 
 }
}

function seleciona_tipo_calculo_pisst(){
    var escolha = $("#tipo_calc_pisst").val();
        $("#ppisst").val("");
        $("#valiqprod_pisst").val("");
    if(escolha=="1"){
        $("#pis_por_percst").show();
        $("#pis_por_valorst").hide();
    }else{
        $("#pis_por_percst").hide();
        $("#pis_por_valorst").show(); 
    }
}

function seleciona_tipo_calculo_cofinsst(){
    var escolha = $("#tipo_calc_cofinsst").val();
        $("#pcofinsst").val("");
        $("#valiqprod_cofinsst").val("");
    if(escolha=="1"){
        $("#cofins_por_percst").show();
        $("#cofins_por_valorst").hide();
    }else{
        $("#cofins_por_percst").hide();
        $("#cofins_por_valorst").show(); 
    }
}