/**
 * Este script requiere jQuery.
 *
 * @author terremoto
 */
var t; 
/**
 * Muestra el tooltip asociado.
 */
var showTooltip = function(e) {
	positionTooltip(e, this);
	t = setTimeout("$('"+this.hash+"').fadeIn('fast')", 200);
};
/**
 * Oculta el tooltip asociado.
 */
var hideTooltip = function(e) {
	clearTimeout(t);
	$(this.hash).fadeOut('fast');
};
var positionTooltip = function(event, element) {
	element = element ? element : this;
	var offset = $(element).offset(); // Obtengo un objeto con las coordenadas thes objeto actual.	
	var tooltip = $(element.hash);
	var pos = {};
	if (event.pageX + (tooltip.outerWidth(true) / 2) > $(document).width()) {
		pos.left = event.pageX - (tooltip.outerWidth(true) / 2) - ((event.pageX + (tooltip.outerWidth(true) / 2)) - $(document).width());
	} else if (event.pageX - (tooltip.outerWidth(true) / 2) < 0) {
		pos.left = 0;
	} else {
		pos.left = event.pageX - (tooltip.outerWidth(true) / 2);
	}
	if ((offset.top + tooltip.outerHeight(true) + $(element).height()) > $(document).height()) { // Excede margen inferior		
		pos.top = offset.top - tooltip.outerHeight(true);
	} else {
		pos.top = offset.top + $(element).outerHeight(true);
	}
	tooltip.css({
		'position': 'absolute',
		'left': pos.left,
		'top': pos.top
	});
}
