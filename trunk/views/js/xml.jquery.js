/**
 * @author terremoto
 */
var miXML;
$(document).ready(function() {
	$.ajax({
		type: 'post',
		url: 'inc/data.xml',
		dataType: 'xml',
		async: false, // No debe ser asincrónico, puesto que tiene que estar listo cuando se carga el documento.
		success: function(data) {
			miXML = $(data); //Document element						
		}
	});
	$('element', miXML).each(function(i) {
		$('<p />').insertBefore('#back').eq(0).append($(this).children('title').eq(0).text());
	});
});
