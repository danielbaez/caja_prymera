/**
 * Bootstrap Table Spanish (México) translation (Obtenido de traducción de Argentina)
 * Author: Felix Vera (felix.vera@gmail.com) 
 * Copiado: Mauricio Vera (mauricioa.vera@gmail.com)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['es-MX'] = {
        formatLoadingMessage: function () {
            return 'Cargando, espere por favor...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' registros por p&aacute;gina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrando ' + pageFrom + ' a ' + pageTo + ' de ' + totalRows + ' filas';
        },
        formatSearch: function () {
            return 'Buscar';
        },
        emptyStateMsj : function () {
			return 'No se encontraron resultados';
		},
        formatNoMatches: function (msj, img) {
        	/*return '<div class="img-search"><img src="'+location.origin+'/smiledu/public/general/img/smiledu_faces/not_data_found.png">'
      	  +'<p><strong>&#161;Ups!</strong></p><p>No se encontraron</p><p>resultados.</p></div>';*/
        	return '<div class="img-search"><img src="'+location.origin+'/smiledu/public/general/img/smiledu_faces/'+img()+'.png">'
      	              +'<p><strong>&#161;Ups!</strong></p><p>'+msj()+'</p></div>';
        },
        formatAllRows: function () {
            return 'Todo';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es-MX']);

})(jQuery);
