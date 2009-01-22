/**
 * @author terremoto
 */
var miXML;
$(document).ready(function() {
	$.ajax({
		type: "post",
		url: $("link#xml").attr("href"), // Utilizo un elemento link para obtener la url.
		dataType: "xml",
		async: false, // No debe ser asincr�nico, puesto que tiene que estar listo cuando se carga el documento.
		success: function(data) {
			miXML = $(data); //Document element
		}
	});
	$("element", miXML).each(function(i) {
		$("<p />").insertBefore("#back").eq(0).append($(this).children("title").eq(0).text());
	});
});