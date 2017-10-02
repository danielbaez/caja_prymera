function log(msj) {
	console.log(msj);
}

function tocar(event){
	$(event).css("cursor", "move");
	
	$(event).mouseup(function() {
		$(event).css("cursor", "pointer");
	});
}

var CONFIG = (function() {
	var private = {
		'ANP' : 'Acci&oacute;n No permitida',
		'MSJ_ERR' : 'Comun&iacute;quese con alguna persona a cargo :(',
		'EST_INACTIVO' : 0,
		'CABE_ERR'   : 'Error',
		'EST_LLAMAR' : 'SU_TURNO',
		'EST_PERDID' : 'PERDIO_TURNO',
		'EST_ENTREV' : 'EN_ENTREVISTA',
		'TIPOS'      : 'image/*,video/*'
	};
	return {
		get : function(name) {
			return private[name];
		}
	};
})();

function modal(idModal) {
	$('#'+idModal).modal('toggle');
}

function abrirCerrarModal(idModal) {
	$('#'+idModal).modal('toggle');
}

function msj(tipo, msj, cabecera) {
	if (tipo == 'error') {
		toastr.error(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else if (tipo == 'warning') {
		toastr.warning(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else {
		toastr.success(msj, cabecera, {timeOut: 4000});
	}
}

function mostrarNotificacion(tipo, msj, cabecera) {
	if (tipo == 'error') {
		toastr.error(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else if (tipo == 'warning') {
		toastr.warning(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else {
		toastr.success(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	}
}

function cerrarSesion() {
	$('#formLogout').submit();
	localStorage.clear();
}
/*
function existCampo(campo, valor, tbl) {
	var result = $.ajax({
		type : "POST",
		'url' : 'exiCampo',
		data : {
			'p_campo' : campo,
			'p_valor' : valor,
			'p_tbl' : tbl
		},
		'async' : false
	}).responseText;
	return result;
}*/

function checkClaveActual(clave) {
	var result = 1;
	$.ajax({
		data : { clave : clave },
		url : "checkClaveNow",
		async : false,
		type : 'POST'
	}).done(function(data) {
		data = JSON.parse(data);
		result = data.resultado;
	});
	return result;
}

function existCampoById(campo, valor, tbl) {
	$.ajax({
		type : "POST",
		'url' : 'exiCampoById',
		data : {
			'p_campo' : campo,
			'p_valor' : valor,
			'p_tbl' : tbl
		}
	}).done(function(data) {
		return data;
	});
}

// PARA ARREGLAR EL INPUTTEXT
function postTrans(formName) {
	$("#" + formName + " :input").each(function() {
		$(this).removeClass("dirty");
	});
}

// INIT RECORTE
// idImg = ID DE LA IMAGEN A RECORTAR
function initCropper(idImg) {
	'use strict';
	var console = window.console || {
		log : function() {
		}
	};
	var $body = $('body');
	$body.tooltip();
	var $image = $('#' + idImg);
	var $dataX = $('#dataX');
	var $dataY = $('#dataY');
	var $dataHeight = $('#dataHeight');
	var $dataWidth = $('#dataWidth');
	var $dataRotate = $('#dataRotate');
	var $dataScaleX = $('#dataScaleX');
	var $dataScaleY = $('#dataScaleY');
	var options = {
		aspectRatio : 9 / 9,
		preview : '.img-preview',
		crop : function(e) {
			$dataX.val(Math.round(e.x));
			$dataY.val(Math.round(e.y));
			$dataHeight.val(Math.round(e.height));
			$dataWidth.val(Math.round(e.width));
			$dataRotate.val(e.rotate);
			$dataScaleX.val(e.scaleX);
			$dataScaleY.val(e.scaleY);
		}
	};
	$image.on({
		'build.cropper' : function(e) {
		},
		'built.cropper' : function(e) {
		},
		'cropstart.cropper' : function(e) {
		},
		'cropmove.cropper' : function(e) {
		},
		'cropend.cropper' : function(e) {
		},
		'crop.cropper' : function(e) {
		},
		'zoom.cropper' : function(e) {
		}
	}).cropper(options);

	return $image;
}

function recortarImagen($image, fotoOriginal) {
    var $this = $('<button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-method="getCroppedCanvas" id="botonRecortarPerfil" onclick="recortarImagen(this.id, \'fotoRecortar\')">recortar</button>');
    var data = $this.data();
    var $target;
    var result;
    
    //VERIFICAR SI EL BOTON ESTA DISABLED
    if ($this.prop('disabled') || $this.hasClass('disabled')) {
      return;
    }
    
    //VERIFICANDO QUE EXISTE
    if (data.method) {
      data = $.extend({}, data);
      if (typeof data.target !== 'undefined') {
        $target = $(data.target);
        if (typeof data.option === 'undefined') {
          try {
            data.option = JSON.parse($target.val());
          } catch (e) {
          }
        }
      }
      //alert('$(image).height(): '+$imageOrig.height()+'  $(image).width(): '+$imageOrig.width());
      if ( (/iP(hone|od|ad)/).test(window.navigator.platform) && (fotoOriginal.height() > 1000 || fotoOriginal.width() > 1000)) {
    	  alert('achicar!!');
      }
      //RECORTAR IMAGEN
      result = $image.cropper('getCroppedCanvas', null, null);
      return result.toDataURL("image/png"); 
    }
}

function convertCanvasToImage(canvas, size) {
	var image = new Image();
	return canvas.toDataURL("image/png");
}

function goToSystem(rol, ruta) {
	$.ajax({
		url : "irASistemaSess",
		data : {
			rol : rol,
			ruta : ruta
		},
		async : false,
		type : 'POST'
	}).done(function(data) {
		data = JSON.parse(data);
		if (data.error == 0) {
			window.open(data.ruta, '_blank');
		} else {
			console.log('errorrr');
		}
	});
	return false;
}

function getCheckedFromTabla(idTabla, indiceColumnaCB) {
	arryDiv = [];
	var jason = JSON.stringify($('#' + idTabla).bootstrapTable('getOptions'));
	var obj = jQuery.parseJSON(jason);
	$.each(obj.data, function(key, value) {
		$.each(value, function(key, value) {
			if (key == indiceColumnaCB) {
				if (value.indexOf('checked') >= 0) {
					arryDiv.push(value);
				}
			}

		});
	});
	return arryDiv;
}

function getCheckedFromTablaByAttr(idTabla, indiceColumnaCB) {
	arryDiv = [];
	var jason = JSON.stringify($('#' + idTabla).bootstrapTable('getOptions'));
	var obj = jQuery.parseJSON(jason);
	$.each(obj.data, function(key, value) {
		$.each(value, function(key, value) {
			if (key == indiceColumnaCB) {// console.log('val:
											// '+$(value).find(':checkbox').attr('attr-cambio'));
				if ($(value).find(':checkbox').attr('attr-cambio') == 'true') {
					arryDiv.push(value);
				}
			}

		});
	});
	return arryDiv;
}

function getCheckedFromTablaByAttrFOCO(idTabla, indiceColumnaCB) {
	arryDiv = [];
	var jason = JSON.stringify($('#' + idTabla).bootstrapTable('getOptions'));
	var obj = jQuery.parseJSON(jason);
	$.each(obj.data, function(key, value) {
		$.each(value, function(key, value) {
			if (key == indiceColumnaCB) {// console.log('val:
											// '+$(value).find(':checkbox').attr('attr-cambio'));
				if ($(value).find(':checkbox').attr('attr-foco') == 'true') {
					arryDiv.push(value);
				}
			}

		});
	});
	return arryDiv;
}

function getInputTextFromTablaByAttr(idTabla, indiceColumnaCB) {
	arryDiv = [];
	var jason = JSON.stringify($('#' + idTabla).bootstrapTable('getOptions'));
	var obj = jQuery.parseJSON(jason);
	$.each(obj.data, function(key, value) {
		$.each(value, function(key, value) {
			if (key == indiceColumnaCB) {
				if ($(value).attr('attr-cambio') == 'true') {
					arryDiv.push(value);
				}
			}

		});
	});
	return arryDiv;
}

function initSearchTable() {
	// MOSTRAR U OCULTAR INPUTTEXT EN TABLE
	$('#btnViewSearch').clickToggle(
			function() {
				/*$('.search').css('display', 'block');*/
				$('.search').css('visibility', 'visible');
				var search = $('.search').find('input[type=text]').filter(':visible:first');
				setTimeout(function() {
					search.focus();
					search.focus(function() {
						$(this).select();
					});
				}, 420);

				/*$('#custom-toolbar').css('display', 'none'); // NOMBRE DE LA*/
				
				/*var marginLeft = (-$('#iconViewSearch').offset().left + $('#titleTb').offset().left + 20) +"px";
				search.parent().parent().css("marginLeft", marginLeft);*/
				/*$('#titleTb').css('display', 'none');*/
				$('#titleTb').css('visibility', 'hidden');
				// CABECERA
				$('#iconViewSearch').removeClass('mdi-search');
				$('#iconViewSearch').addClass('mdi-clear');
			}, function() {
				/*$('.search').css('display', 'none');
				$('#titleTb').css('display', 'block');*/
				$('.search').css('visibility', 'hidden');
				$('#titleTb').css('visibility', 'visible');
				/*$('#custom-toolbar').css('display', 'block'); // NOMBRE DE LA
				// CABECERA*/
				$('#iconViewSearch').removeClass('mdi-clear');
				$('#iconViewSearch').addClass('mdi-search');
			});
}

function initSearchTableNew() {
	// MOSTRAR U OCULTAR INPUTTEXT EN TABLE
	$('#btnViewSearch').clickToggle(
		function() {
			/*$('.search').css('display', 'block');*/
			$('.search').css('visibility', 'visible');
			var search = $('.search').find('input[type=text]').filter(':visible:first');
			setTimeout(function() {
				search.focus();
				search.focus(function() {
					$(this).select();
				});
			}, 420);

			/*$('#custom-toolbar').css('display', 'none'); // NOMBRE DE LA*/
			
			/*var marginLeft = (-$('#iconViewSearch').offset().left + $('#titleTb').offset().left + 20) +"px";
			search.parent().parent().css("marginLeft", marginLeft);*/
			/*$('#titleTb').css('display', 'none');*/
			$('#titleTb').css('visibility', 'hidden');
			// CABECERA
			$('#iconViewSearch').removeClass('mdi-search');
			$('#iconViewSearch').addClass('mdi-clear');
		}, function() {
			/*$('.search').css('display', 'none');
			$('#titleTb').css('display', 'block');*/
			$('.search').css('visibility', 'hidden');
			$('#titleTb').css('visibility', 'visible');
			/*$('#custom-toolbar').css('display', 'block'); // NOMBRE DE LA
			// CABECERA*/
			$('#iconViewSearch').removeClass('mdi-clear');
			$('#iconViewSearch').addClass('mdi-search');
		});
}

function initSearchTableById(idTabla) {
	toolBarCont = $("#"+idTabla).parent().parent().parent().find(".fixed-table-toolbar");
	var titulo = $('#'+idTabla).closest('.mdl-card').find('.mdl-card__title h2.mdl-card__title-text');
	$('#contTbAllPreguntas').find('.fixed-table-toolbar').addClass('searchIcon');
	$(toolBarCont).find('#btnViewSearch').toggle(
	   function() {
		   fixed_toolbar = $(this).parent().parent();
		   $(fixed_toolbar).find(".search").css('display', 'block');
			var search = $(fixed_toolbar).find(".search").find('input[type=text]').filter(':visible:first');
			setTimeout(function() {
				search.focus();
				search.focus(function() {
					$(this).select();
				});
			}, 420);
			$(fixed_toolbar).find(".search").css("width","90%");
			$(fixed_toolbar).find(".search").css('visibility', 'visible');
			$(fixed_toolbar).find(".search").find("input").css("width","100%");
			$(fixed_toolbar).find('#iconViewSearch').removeClass('mdi mdi-search');
			$(fixed_toolbar).find('#iconViewSearch').addClass('mdi mdi-clear');
			$(fixed_toolbar).find(".search").find("input").change(function() {
			    if($(fixed_toolbar).find(".search").find("input").val().length > 0){
			    	$(fixed_toolbar).find(".search").find("input").addClass("dirty");
			    }else{
			    	$(fixed_toolbar).find(".search").find("input").removeClass("dirty");
			    }
			});
			$('#contTbAllPreguntas').parent().css('margin-top','21px');
			$('#contTbAllPreguntas').find('.pull-left.search').addClass('inputSearch');
//			$('#contTbAllPreguntas').find('.mdl-card__title-text').addClass('inputSearch');
			titulo.css('display', 'none');
		},function() {
			fixed_toolbar = $(this).parent().parent();
			var search = $(fixed_toolbar).find(".search").find('input[type=text]').filter(':visible:first');
			$('.search').css('visibility', 'visible');
			search.val('');
			search.keyup();
			
			$(fixed_toolbar).find(".search").css('display', 'none');
//			$(fixed_toolbar).find(".search").find('input[type=text]').val('');
			$('#contTbAllPreguntas').parent().css('margin-top','0px');
			$(fixed_toolbar).find('#iconViewSearch').removeClass('mdi mdi-clear');
			$(fixed_toolbar).find('#iconViewSearch').addClass('mdi mdi-search');
			titulo.css('display', 'block');
		});
}

function setCombo(idNameCombo, valores, _default, selected, value_0 = 1) {
	if(value_0 != 1) {
		value_0 = 0;
	} else {
		value_0 = "";
	}
	$('#' + idNameCombo).find('option').remove().end().append(
	    '<option value="'+value_0+'">Selec. ' + _default + '</option>' + valores);

	if(selected != true) {
		$('select[name=' + idNameCombo + ']').val(value_0);
	} 
	$('#' + idNameCombo).selectpicker('refresh');

}

function setCombo2(idNameCombo, valores) {
	$('#' + idNameCombo).find('option').remove().end().append(valores);
	$('select[name=' + idNameCombo + ']').val("");
	$('#' + idNameCombo).selectpicker('refresh');
}

function setValueCombo(idNameCombo, valorSeteado) {
	$('select[name=' + idNameCombo + ']').val(valorSeteado);
	$('#' + idNameCombo).selectpicker('refresh');
}

function setComboFull(idNameCombo, valores, _default) {
	$('#'+idNameCombo).find('option').remove().end().append('<option value="">Selec. '+_default+'</option>'+valores);
	$('#'+idNameCombo).mobileSelect('refresh');
}

function setComboValorFull(idNameCombo, valor) {
	$('#'+idNameCombo).val(valor);
	$('#'+idNameCombo).mobileSelect('refresh');
}

function getComboVal(idCombo) {
	return $('#'+idCombo+' option:selected').val();
}

function isDate(txtDate) {
	var currVal = txtDate;
	if (currVal == '') {
		return false;
	}
	var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
	var dtArray = currVal.match(rxDatePattern); // is format OK?

	if (dtArray == null) {
		return false;
	}
	dtDay = dtArray[1];
	dtMonth = dtArray[3];
	dtYear = dtArray[5];

	if (dtMonth < 1 || dtMonth > 12)
		return false;
	else if (dtDay < 1 || dtDay > 31)
		return false;
	else if ((dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11)
			&& dtDay == 31)
		return false;
	else if (dtMonth == 2) {
		var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
		if (dtDay > 29 || (dtDay == 29 && !isleap))
			return false;
	}
	return true;
}

(function($) {
	$.fn.clickToggle = function(func1, func2) {
		var funcs = [ func1, func2 ];
		this.data('toggleclicked', 0);
		this.click(function() {
			var data = $(this).data();
			var tc = data.toggleclicked;
			$.proxy(funcs[tc], this)();
			data.toggleclicked = (tc + 1) % 2;
		});
		return this;
	};
}(jQuery));

/*
 * function marcarNodo(nodo){ $.ajax({ url: "setNodoSession", data: { nodo :
 * nodo}, async : false, type: 'POST' }) .done(function(data){ }); }
 */

function toggleFullScreen() {
	if ((document.fullScreenElement && document.fullScreenElement !== null)
			|| (!document.mozFullScreen && !document.webkitIsFullScreen)) {
		if (document.documentElement.requestFullScreen) {
			document.documentElement.requestFullScreen();
		} else if (document.documentElement.mozRequestFullScreen) {
			document.documentElement.mozRequestFullScreen();
		} else if (document.documentElement.webkitRequestFullScreen) {
			document.documentElement
					.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
		}
		$('#icon_fullScreen').removeClass('md-fullscreen');
		$('#icon_fullScreen').addClass('md-fullscreen-exit');
	} else {
		if (document.cancelFullScreen) {
			document.cancelFullScreen();
		} else if (document.mozCancelFullScreen) {
			document.mozCancelFullScreen();
		} else if (document.webkitCancelFullScreen) {
			document.webkitCancelFullScreen();
		}
		$('#icon_fullScreen').removeClass('md-fullscreen-exit');
		$('#icon_fullScreen').addClass('md-fullscreen');
	}
}

var menuC = 0;
function changeIconMenu() {
	if (menuC == 0) {
		$('#iconMenu').removeClass('giro1');
		$('#iconMenu').removeClass('md md-menu');
		$('#iconMenu').addClass('md md-clear');
		$('#iconMenu').addClass('giro');

		menuC = 1;
	} else {
		$('#iconMenu').removeClass('giro');
		$('#iconMenu').removeClass('md md-clear');
		$('#iconMenu').addClass('md md-menu');
		$('#iconMenu').addClass('giro1');
		menuC = 0;
	}
}

function cerrarMenu() {
	$('body').removeClass('menubar-visible');
}

function abrirMenu() {
	$('body').addClass('menubar-visible');
}

function successValidConfig(idTabla, indexRow, indexCampo, pk, nuevoValor, msj, clase, idGrupo, idNota) {
	$('#' + idTabla).bootstrapTable(
			'updateCell',
			{
				rowIndex : indexRow,
				fieldName : indexCampo,
				fieldValue : '<span class="' + clase
						+ ' editable editable-click" data-pk="' + pk + '" data-grupo="'+idGrupo+'" data-id_nota="'+idNota+'">'
						+ nuevoValor + '</span>'
			});
}

function successValid(idTabla, indexRow, indexCampo, pk, nuevoValor, msj, clase) {
	$('#' + idTabla).bootstrapTable(
			'updateCell',
			{
				rowIndex : indexRow,
				fieldName : indexCampo,
				fieldValue : '<span class="' + clase
						+ ' editable editable-click" data-pk="' + pk + '">'
						+ nuevoValor + '</span>'
			});
}

function marcarNodo(id) {
	$("#" + id).addClass("active");
	$("#" + id).find("a").addClass("active");
}

function openModalFeedBack(){
	$('#navBar').removeClass('is-visible');
	$('.mdl-layout__obfuscator').removeClass('is-visible');
	modal('modalFeedBack');
}


function enviarFeedback(ruta, tipo, rutaOrigen) {
	var txtArea = (tipo == 'COL' ? 'feedbackMsjColegio' : 'feedbackMsjSmiledu');
	if(tipo == 'COL') {
		addLoadingButton('btnColegioFeedback');	
	} else if(tipo == 'SMILEDU') {
		addLoadingButton('btnSmileduFeedback');
	}
	var msj = $("#"+txtArea).val();
	if (msj.trim() != "") {
		modal('modalFeedBackTY');
		var valorSede = $("#sedeFeed").val();
		var hijos = ''; //$("#sedeFeed").text();//console.log(hijos);
		$("#sedeFeed option:selected").each(function () {
			var $this = $(this);
		    if ($this.length) {
			    hijos += $this.text()+'|';
		    }
		});
		$.ajax({
			data : { feedbackMsj : msj,
					 url         : rutaOrigen,
					 valorSede   : valorSede,
					 hijos       : hijos,
					 tipo        : tipo,
					 client_info : datosClient },
			url : ruta,
			type : 'POST'
		}).done(function(data) {
			data = JSON.parse(data);
			$("#feedbackMsjSmiledu,#feedbackMsjColegio").val("");
			mostrarNotificacion('success',data.msj);
			//abrirCerrarModal('modalFeedBack');
			stopLoadingButton('btnSmileduFeedback');
			stopLoadingButton('btnColegioFeedback');
		});
	}
}

function openModalMisionVision() {
	abrirCerrarModal("modalMisionVision");
}

function goToPerfilUsuario(data) {
	window.location.href = window.location.origin
			+ '/smiledu/c_perfil?usuario=' + data;
}

function setearInput(idInput, val, previo, disabled, clase) {
	if(!val) {
		val = null;
	}
	if(!previo) {
		previo = null;
	}
	if(!disabled) {
		disabled = null;
	}
	if(!clase) {
		clase = 'divInput';
	}
	$("#"+idInput).val(val);
	$("#"+idInput).parent().removeClass("is-invalid");
	if(val != null && val != "") {
		$("#"+idInput).parent().addClass("is-dirty");
	} else {
		$("#"+idInput).parent().removeClass("is-dirty");
	}

	var span  = $('#'+idInput).parent().find('span');
	if(span.data('limit')){
		var limit = '0/'+span.data('limit');
		span.html(limit);
	}
	if(previo != null) {
		$("#"+idInput).attr("val-previo", previo);
	}
	if(disabled != null) {
		$('#'+idInput).attr("disabled", true);
		$("#"+idInput).css('cursor', 'not-allowed');
	} else {
		$('#'+idInput).attr("disabled", false);
		$("#"+idInput).css('cursor', '');
		$('.'+clase).removeClass('is-disabled');
	}
}

function setearCombo(idCombo, val, previo, disabled){
	if(!previo){
		previo = null;
	}
	if(!disabled){
		disabled = null;
	}
	if(previo != null){
		$("#"+idCombo).attr("val-previo", previo);
	}
	if(disabled != null){
		disableEnableCombo(idCombo, true);
	} else if (disabled == null){
		disableEnableCombo(idCombo, false);
	}
	$("#"+idCombo).parent().parent().parent().removeClass("is-invalid");
	$("#"+idCombo).val(val);
	$("#"+idCombo).selectpicker('render');
}

function setValor(idNameCombo,valores) {
	$('select[name='+idNameCombo+']').val(valores);
	$('#'+idNameCombo).selectpicker('refresh');
}

function disableEnableCombo(idCombo, disaEna){
	$('#'+idCombo).prop('disabled', disaEna);
	$('#'+idCombo).selectpicker('refresh');
}

function isInt(value) {
	return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value));
}

function isFloat(value) {
	return value != "" && !isNaN(value) && Math.round(value) != value;
}

function isNumerico(value) {
	if(isInt(value) || isFloat(value)) {
        return true;
   }
   return false;
}

function setChecked(idCheck, boolCheck){
	if(boolCheck == 'true'){
		$("#"+idCheck).parent().addClass("is-checked");
		$("#"+idCheck).attr("checked", true);
	}else{
		$("#"+idCheck).parent().removeClass("is-checked");
		$("#"+idCheck).attr("checked", false);
	}
}

function isChecked(element){
	var tof = false;
	if($(element).parent().hasClass("is-checked")){
		tof = true;
	}
	
	return tof;
}

function disableEnableInput(idInput, tof){
	$('#'+idInput).attr("disabled", tof);
	if(tof == false){
		$('.divInput').removeClass('is-disabled');
		$("#"+idInput).css('cursor', '');
	}else{
		$("#"+idInput).css('cursor', 'not-allowed');
	}
}

function reintentarBusqueda(){
	$("#searchMagic").focus();
	$("#searchMagic").select();
}

function tableEventsUpgradeMdlComponentsMDL(idTable){
	$(function () {
	    $('#'+idTable).on('all.bs.table', function (e, name, args) {
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip(); 
		    });
			componentHandler.upgradeAllRegistered();
	    })
	    .on('click-row.bs.table', function (e, row, $element) {
	    })
	    .on('dbl-click-row.bs.table', function (e, row, $element) {
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip(); 
		    });
			componentHandler.upgradeAllRegistered();
	    })
	    .on('sort.bs.table', function (e, name, order) {
	    	$(document).ready(function(){
	    	    $('[data-toggle="tooltip"]').tooltip(); 
	        });
	    	componentHandler.upgradeAllRegistered();
	    })
	    .on('check.bs.table', function (e, row) {
	    	$(document).ready(function(){
	    	    $('[data-toggle="tooltip"]').tooltip(); 
	        });
	    	componentHandler.upgradeAllRegistered();

	    })
	    .on('uncheck.bs.table', function (e, row) {
	    	$(document).ready(function(){
	    	    $('[data-toggle="tooltip"]').tooltip(); 
	        });
	    	componentHandler.upgradeAllRegistered();
	    })
	    .on('check-all.bs.table', function (e) {
	    	$(document).ready(function(){
	    	    $('[data-toggle="tooltip"]').tooltip(); 
	        });
	    	componentHandler.upgradeAllRegistered();
	    })
	    .on('uncheck-all.bs.table', function (e) {
	    	$(document).ready(function(){
	    	    $('[data-toggle="tooltip"]').tooltip(); 
	        });
	    	componentHandler.upgradeAllRegistered();

	    })
	    .on('load-success.bs.table', function (e, data) {

	    })
	    .on('load-error.bs.table', function (e, status) {

	    })
	    .on('column-switch.bs.table', function (e, field, checked) {
	    	$(document).ready(function(){
	    	    $('[data-toggle="tooltip"]').tooltip(); 
	        });
	    	componentHandler.upgradeAllRegistered();
	    })
	    .on('page-change.bs.table', function (e, size, number) {
	    	$(document).ready(function(){
	    	    $('[data-toggle="tooltip"]').tooltip(); 
	        });
	    	componentHandler.upgradeAllRegistered();
	    })
	    .on('search.bs.table', function (e, text) {
	    	$(document).ready(function(){
	    	    $('[data-toggle="tooltip"]').tooltip(); 
	        });
	    	componentHandler.upgradeAllRegistered();
	    });
	});
}

String.prototype.initCap = function () {
    return this.toLowerCase().replace(/(?:^|\s)[a-z]/g, function (m) {
        return m.toUpperCase();
    });
};

Number.prototype.round = function(places) {
	return +(Math.round(this + "e+" + places)  + "e-" + places);
}

function getFechaHoy_dd_mm_yyyy() {
	var d = new Date();
	var mes = (d.getMonth()+1+'').length === 1 ? '0'+(d.getMonth()+1) : (d.getMonth()+1);
	var dia = (d.getDate()+'').length === 1 ? '0'+d.getDate() : (d.getDate());
	var hoyDia = dia+'/'+mes+'/'+d.getFullYear();
	return hoyDia;
}

function setMultiCombo(idNameCombo, valores,selected) {
	$('#' + idNameCombo).find('option').remove().end().append(valores);
	if(selected == undefined){
		$('select[name=' + idNameCombo + ']').val("");
	}
	$('#' + idNameCombo).selectpicker('refresh');
}

function readable(bytes, precision) {
	var kilobyte = 1024, megabyte = kilobyte * 1024, gigabyte = megabyte * 1024, terabyte = gigabyte * 1024;
	precision = precision || 2;
	if ((bytes >= 0) && (bytes < kilobyte)) {
		return bytes + ' B';
	} else if ((bytes >= kilobyte) && (bytes < megabyte)) {
		return (bytes / kilobyte).toFixed(precision) + ' KB';
	} else if ((bytes >= megabyte) && (bytes < gigabyte)) {
		return (bytes / megabyte).toFixed(precision) + ' MB';
	} else if ((bytes >= gigabyte) && (bytes < terabyte)) {
		return (bytes / gigabyte).toFixed(precision) + ' GB';
	} else if (bytes >= terabyte) {
		return (bytes / terabyte).toFixed(precision) + ' TB';
	} else {
		return bytes + ' B';
	}
}

function getBase64Image(img) {
	var canvas = document.createElement("canvas");
	canvas.width  = img.width;
	canvas.height = img.height;
	var ctx = canvas.getContext("2d");
	ctx.drawImage(img, 0, 0);
	var dataURL = canvas.toDataURL("image/jpeg");
	return dataURL;
} 

function getBase64ImagePNG(img) {
	var canvas = document.createElement("canvas");
	canvas.width  = img.width;
	canvas.height = img.height;
	var ctx = canvas.getContext("2d");
	ctx.drawImage(img, 0, 0);
	var dataURL = canvas.toDataURL("image/png");
	return dataURL;
}

var addEvent = (function () {
  if (document.addEventListener) {
    return function (el, type, fn) {
      if (el && el.nodeName || el === window) {
        el.addEventListener(type, fn, false);
      } else if (el && el.length) {
        for (var i = 0; i < el.length; i++) {
          addEvent(el[i], type, fn);
        }
      }
    };
  } else {
    return function (el, type, fn) {
      if (el && el.nodeName || el === window) {
        el.attachEvent('on' + type, function () { return fn.call(el, window.event); });
      } else if (el && el.length) {
        for (var i = 0; i < el.length; i++) {
          addEvent(el[i], type, fn);
        }
      }
    };
  }
})();

var salir = document.getElementById('logoutBtn');
localStorage.removeItem('storage-event-logout');

addEvent(window, 'storage', function (event) {
    if (event.key == 'storage-event-logout') {
      if(event.newValue == 'logout') {
      	localStorage.removeItem('storage-event-logout');
      	$('#formLogout').submit();
      }
    }
});

addEvent(salir, 'click', function () {
    localStorage.setItem('storage-event-logout', 'logout');
});

function readCookie(name) {
    var nameEQ = escape(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return unescape(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function updateMdl(){
	componentHandler.upgradeAllRegistered();
}

function removeSessionStorage() {
	for(var i = 0; i < arguments.length; i++) {
		sessionStorage.removeItem(arguments[i]);
	}
}

function disEnabledInputComboGroup(group,tof){
	for(var i = 0; i < group.length; i++) {
		$("#"+group[i]).parent().addClass("is-dirty");
		$('#'+group[i]).prop('disabled', tof);
		$('#'+group[i]).selectpicker('refresh');

		$('#'+group[i]).attr("disabled", tof);
		if(tof == true){
			$("#"+group[i]).css('cursor', 'not-allowed');
		} else {
			$("#"+group[i]).css('cursor', '');
		}
		$('.divInput').removeClass('is-disabled');
	}
}

function setearSinOpciones(id,valor){
	$("#"+id).val(valor).prop('selected', true);
	$("#"+id).selectpicker('render');
}

function setearNullGroup(){
	for(var i = 0; i < arguments.length; i++) {
		$("#"+arguments[i]).val(null);
		$("#"+arguments[i]).selectpicker('render');
		$("#"+arguments[i]).parent().removeClass("is-invalid");
		$("#"+arguments[i]).parent().parent().removeClass("is-invalid");
	}
}

function setearInputAdm(idInput, val){
	if(!val){
		val = null;
	}
	$("#"+idInput).val(val);
	if(val != null && val != ""){
		$("#"+idInput).parent().addClass("is-dirty");
		$("#"+idInput).parent().parent().removeClass("is-invalid");
	} else {
		$("#"+idInput).parent().removeClass("is-dirty");
		$("#"+idInput).parent().parent().addClass("is-invalid");
	}
}

function setearComboAdm(idCombo, val){
	$("#"+idCombo).val(val);
	$("#"+idCombo).selectpicker('refresh');
	if(val != null && val != ""){
		$("#"+idCombo).parent().addClass("is-dirty");
		$("#"+idCombo).parent().parent().parent().removeClass("is-invalid");
	} else {
		$("#"+idCombo).parent().removeClass("is-dirty");
		$("#"+idCombo).parent().parent().parent().addClass("is-invalid");
	}
}

function cambioCampoAdm(element){
	val = $(element).val();
	if(val != null && val.length != 0 && val != 0){
		$(element).closest(".mdl-input-group").removeClass("is-invalid");
	} else {
		$(element).closest(".mdl-input-group").addClass("is-invalid");
	}
}

function getFechaTexto(fecha) {
	var texto = null;
	try {
		var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
		                  "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];
		if(fecha == null) {
			fecha = new Date();
		} else {
			fecha = new Date(fecha);
		}
		texto = fecha.getDate()+' de '+monthNames[fecha.getMonth()]+' del '+fecha.getFullYear();
	} catch(err) {
		msj('error', err.message);
		texto = null;
	}
	return texto;
}

function cambiarRol(aElement) {
	var urlSmiledu  = window.location.protocol+'//'+window.location.hostname+'/';
	var arrayUrl    = (window.location.pathname).split('/');
	$('#idRolChange').val(aElement.attr('attr-rol'));
	$('#urlRedirect').val(urlSmiledu+arrayUrl[1]+'/'+arrayUrl[2]+'/c_main');
	$('#sistemaActi').val(arrayUrl[2]);
	$('#formCambioRol').submit();
}

function getComboYearActual(id) {
	var fecha = new Date();
	var year = fecha.getFullYear();

	$("#"+id+" option").filter(function() {
	    return this.text == year; 
	}).attr('selected', true);
	$("#"+id).selectpicker('render');
}

/*Realiza una resta y devuelve la rpta en minutos 
 *@Jhonatan Meza
 */
function restarHoras(horaInicio,horaFin){
	var inicio = convertirFormatoHora(horaInicio);
	var fin    = convertirFormatoHora(horaFin);
    inicio = inicio.split(':');
    fin    = fin.split(':');
	var nInicio = parseInt(inicio[0])*60;
	var nFin    = parseInt(fin[0])*60;
	nInicio = nInicio+parseInt(inicio[1]);
	nFin    = nFin+parseInt(fin[1]);
	return nFin-nInicio;
}

/*valida con un boolean si la fecha es menor = 1 sino = 0*/
/*@Jhonatan Meza*/
function validarFechaMenorActual(date){
    var x=new Date();
    var fecha = date.split("/");
    x.setFullYear(fecha[2],fecha[1]-1,fecha[0]);
    var today = new Date();

    if (x > today)
      return false;
    else
      return true;
}

/*d  = dias a sumar, fecha = fecha que desea sumarle los dias*/
/*@Jhonatan Meza*/
function sumaFecha(d, fecha)
{
	var Fecha = new Date();
	var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
	var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
	var aFecha = sFecha.split(sep);
	var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
	fecha= new Date(fecha);
	fecha.setDate(fecha.getDate()+parseInt(d));
	var anno=fecha.getFullYear();
	var mes= fecha.getMonth()+1;
	var dia= fecha.getDate();
	mes = (mes < 10) ? ("0" + mes) : mes;
	dia = (dia < 10) ? ("0" + dia) : dia;
  	var fechaFinal = dia+sep+mes+sep+anno;
  	return (fechaFinal);
 }

//Funcion que devuelve un true si la fecha a validar esta en rango de 2 fechas, sino false
/*@Jhonatan Meza*/
function valueFechaRangoFechas(valuefecha,fecha1,fecha2){
	 var sep = valuefecha.indexOf('/') != -1 ? '/' : '-'; 
	 var aFecha = valuefecha.split(sep);
	 var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
	 valueFecha= new Date(fecha); 
	 var sep1 = fecha1.indexOf('/') != -1 ? '/' : '-'; 
	 var aFecha1 = fecha1.split(sep1);
	 var fecha1 = aFecha1[2]+'/'+aFecha1[1]+'/'+aFecha1[0];
	 Fecha1= new Date(fecha1);
	 var sep2 = fecha2.indexOf('/') != -1 ? '/' : '-'; 
	 var aFecha2 = fecha2.split(sep2);
	 var fecha2 = aFecha2[2]+'/'+aFecha2[1]+'/'+aFecha2[0];
	 Fecha2= new Date(fecha2);	 
	 if(valueFecha>=Fecha1 && valueFecha<=Fecha2){
		 return true;		 
	 }else{
		 return false;
	 }
}

function isHour(valueHour){
	var hour   = parseInt(valueHour.substr(0,3));
	var minute = parseInt(valueHour.substr(3,4));
	var valor = null;
	if(hour<24 && minute<60){
		return true;		
	}else{
		return false;
	}
}

var date_regex = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

function validate_fechaMayorQue(fechaInicial,fechaFinal){
    valuesStart=fechaInicial.split("/");
    valuesEnd=fechaFinal.split("/");

    // Verificamos que la fecha no sea posterior a la actual
    var dateStart=new Date(valuesStart[2],(valuesStart[1]-1),valuesStart[0]);
    var dateEnd=new Date(valuesEnd[2],(valuesEnd[1]-1),valuesEnd[0]);
    if(dateStart > dateEnd) {
        return 0;
    }
    return 1;
}

function justNumbers(e) {
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function get_elapsed_time_string(total_seconds) {
	  function pretty_time_string(num) {
	    return ( num < 10 ? "0" : "" ) + num;
	  }

	  var hours = Math.floor(total_seconds / 3600);
	  total_seconds = total_seconds % 3600;

	  var minutes = Math.floor(total_seconds / 60);
	  total_seconds = total_seconds % 60;

	  var seconds = Math.floor(total_seconds);

	  hours = pretty_time_string(hours);
	  minutes = pretty_time_string(minutes);
	  seconds = pretty_time_string(seconds);

	  var currentTimeString = hours + ":" + minutes + ":" + seconds;

	  return currentTimeString;
	}

function convertirFormatoFecha(txtDate, flg) {
	/*Esta por mejorar solo admite formato dd/mm/yyy y retorna yyyy-mm-dd*/
	/*@Jhonatan Meza*/
	if(flg != undefined) {
		var fecha = txtDate.split("-");
		return (fecha[2]+"/"+fecha[1]+"/"+fecha[0]);
	} else {
		var fecha = txtDate.split("/");
	    return (fecha[2]+"-"+fecha[1]+"-"+fecha[0]);
	}
    
}

function convertirFormatoHora(txtHora){
	/*Convierte formato hh:mm:ss*/
	/*@Jhonatan Meza*/
	var hora = txtHora.length == 7 ? ("0"+txtHora) : txtHora;
	hora = hora.replace(' ', ':');
	hora = hora.split(':');
	var h = parseInt(hora[0]);
	h = hora[2] == 'pm' ?h+12 : h;
	if(hora[2] == 'pm' && hora[0]=='12'){
		h = h-12;
	}else if(hora[2] == 'am' && hora[0]=='12'){
		h = h+12;
	}
	return h+":"+hora[1]+":00"; 
}

function restarHoras1(horaInicio, horaFin) {
	var inicio = horaInicio.length == 7 ? ("0"+horaInicio) : horaInicio;
	var fin = horaFin.length == 7 ? ("0"+horaFin) : horaFin;	
	inicio = inicio.replace(' ', ':');
	inicio = inicio.split(':');
	fin = horaFin.replace(' ', ':');
	fin = horaFin.split(':');
	
	  inicioMinutos = parseInt(inicio[1]);
	  inicioHoras = parseInt(inicio[0]);

	  finMinutos = parseInt(fin[1]);
	  finHoras = parseInt(fin[0]);
	  
	  transcurridoMinutos = finMinutos - inicioMinutos;
	  transcurridoHoras = finHoras - inicioHoras;
	  if (transcurridoMinutos < 0) {
	    transcurridoHoras--;
	    transcurridoMinutos = 60 + transcurridoMinutos;
	  }
	  horas = transcurridoHoras.toString();
	  minutos = transcurridoMinutos.toString(); 
	  if (horas.length < 2) {
	    horas = "0"+horas;
	  }
	  if(parseInt(minutos)<10){
		  minutos = "0"+minutos;
	  }
	  return horas+" : "+minutos;

	}

$(".letras").keypress(function (key) {
	if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
	    && (key.charCode < 65 || key.charCode > 90) //letras minusculas
	    && (key.charCode != 45) //retroceso
	    && (key.charCode != 241) 
	     && (key.charCode != 209) 
	     && (key.charCode != 32) //espacio
	     && (key.charCode != 225) 
	     && (key.charCode != 233) 
	     && (key.charCode != 237) 
	     && (key.charCode != 243) 
	     && (key.charCode != 250) 
	     && (key.charCode != 193) 
	     && (key.charCode != 201) 
	     && (key.charCode != 205) 
	     && (key.charCode != 211) 
	     && (key.charCode != 218) 
	     && (key.charCode != 48 ) 
	     && (key.charCode != 49 ) 
	     && (key.charCode != 50 ) 
	     && (key.charCode != 51 ) 
	     && (key.charCode != 52 ) 
	     && (key.charCode != 53 ) 
	     && (key.charCode != 53 ) 
	     && (key.charCode != 55) 
	     && (key.charCode != 56) 
	     && (key.charCode != 57)

	    )
	    return false;
});

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}

$(".numeros").keypress(function (key) {
	if (key.charCode < 48 || key.charCode > 57)
	    return false;
});

function removeObjectFromArray(arrayData,objRemove){
	for(var i = 0; i < arrayData.length; i++){
		if(arrayData[i] == objRemove){
			arrayData.splice(i, 1);
			break;
		}
	}
	return arrayData;
}

/*d  = dias a restar, fecha = fecha que desea restarle los dias*/
/*@Sebastian Peredo*/
function restarFecha(d, fecha)
{
	var Fecha = new Date();
	var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
	var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
	var aFecha = sFecha.split(sep);
	var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
	fecha= new Date(fecha);
	fecha.setDate(fecha.getDate()-parseInt(d));
	var anno=fecha.getFullYear();
	var mes= fecha.getMonth()+1;
	var dia= fecha.getDate();
	mes = (mes < 10) ? ("0" + mes) : mes;
	dia = (dia < 10) ? ("0" + dia) : dia;
  	var fechaFinal = dia+sep+mes+sep+anno;
  	return (fechaFinal);
 }

function justNumbers(e) {
	   var keynum = window.event ? window.event.keyCode : e.which;
	   if ((keynum == 8) || (keynum == 46))
	        return true;
	    return /\d/.test(String.fromCharCode(keynum));
}

function fijarFechaInicioInFechaFinal(element, idFechaFinal, tipo){
	var idFecha = $(element).attr("id");
	var fechaValor = $('#'+idFecha).val();
	var d = new Date(fechaValor.split("/").reverse().join("-")+' 00:00:00');
	var hoy = new Date();
	$('#'+idFechaFinal+'ForCalendar').siblings('button').removeAttr('disabled');
	$('#'+idFechaFinal).removeAttr('disabled');
	$('#'+idFechaFinal).parent().removeClass('is-disabled');
	if(tipo == undefined){
		initButtonCalendarDaysRangeDate2(idFechaFinal, d, hoy);
	}else if(tipo == 1){
		initButtonCalendarDaysMinToday(idFechaFinal, d);
	}
	componentHandler.upgradeAllRegistered();
}

function fijarFechaMaxToday(element, idFechaFinal, divFecha) {
	var idFecha = $(element).attr("id");
	var fechaValor = $('#'+idFecha).val();
	var d = new Date(fechaValor.split("/").reverse().join("-")+' 00:00:00');
	$('#'+divFecha).html('<div class="mdl-icon mdl-icon__button">'+
												'<button class="mdl-button mdl-js-button mdl-button--icon">'+
													'<i class="mdi mdi-today"></i>'+
												'</button>'+
											'</div>'+
											'<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
												'<input class="mdl-textfield__input" placeholder="dd/mm/aaaa" type="text" id="'+idFechaFinal+'" name="'+idFechaFinal+'" maxlength="10">'+
												'<label class="mdl-textfield__label" for="'+idFechaFinal+'">Fecha de descuento</label>'+
											'</div>');
	componentHandler.upgradeAllRegistered();
	initButtonCalendarDaysMaxToday(idFechaFinal,undefined, d);
}

/**
 * Devuelve los valores de una sola columna del array de entrada
 * @author : jmeza
 * @param  : arry, column, indice
 */
function array_column(arry, column, indice) {
    var result;
    if(typeof indice != "undefined") {
        result = {};
        for(key in arry)
            result[arry[key][indice]] = arry[key][column];
    }else {
        result = [];
        for(key in arry) {
        	result.push( arry[key][column] );
        }
    }
    return result;
}

/**
 * Refresca los tabs
 * @author : jmeza
 * @param  : contTabBar   Id del contenedor de los tabs bar con   "#" 
 * @param  : contTabPanel Id del contenedor de los tabs panel con "#"
 * @param  : seleted      Href del tab a seleccionar sin el       "#"
 */
function refreshTabActive(contTabBar, contTabPanel, selected){
	var bars   = $(contTabBar).find('a');
	var panels = $(contTabPanel).find('.mdl-tabs__panel');
	$.each(bars, function(index,val){
		if($(val).attr('href') == ('#'+selected)){
			$(val).addClass('is-active');
		} else{
			$(val).removeClass('is-active');
		}
	});
	$.each(panels, function(index,val){
		if($(val).attr('id') == selected){
			$(val).addClass('is-active');
		} else{
			$(val).removeClass('is-active');
		}
	});
}