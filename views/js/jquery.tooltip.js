/**
 * Este plugin para javascript muestra tooltips agregados al HTML con un formato adecuado.
 *
 * @author terremoto
 * @todo Agregar opciones para que el plugin pueda utilizar diferentes métodos para cargar
 * el contenido de los tooltips.
 */
/**
 * Metodos estaticos y variables del plugin.
 */
jQuery.tooltip = {
	/**
	 * Obtiene el tooltip.
	 *
	 * @param {Object} elem
	 */
	'get': function(elem) {
		return $(elem.hash);
	},
	/**
	 * Muestra el tooltip.
	 *
	 * @param {Object} e
	 */
	'show': function(e) {
		$.tooltip.get(this).fadeIn('fast');
	},
	/**
	 * Oculta el tooltip.
	 *
	 * @param {Object} e
	 */
	'hide': function(e) {
		$.tooltip.get(this).fadeOut('fast');
	},
	'alocate': function(e) {
		var tooltip, offset, pos;
		tooltip = $.tooltip.get(this);
		offset = $(this).offset(); // Obtengo un objeto con las coordenadas thes objeto actual.
		pos = {};
		if (e.pageX + (tooltip.outerWidth(true) / 2) > $(document).width()) {
			pos.left = e.pageX - (tooltip.outerWidth(true) / 2) - ((e.pageX + (tooltip.outerWidth(true) / 2)) - $(document).width());
		} else if (e.pageX - (tooltip.outerWidth(true) / 2) < 0) {
			pos.left = 0;
		} else {
			pos.left = e.pageX - (tooltip.outerWidth(true) / 2);
		}
		if ((offset.top + tooltip.outerHeight(true) + $(this).height()) > $(document).height()) { // Excede margen inferior		
			pos.top = offset.top - tooltip.outerHeight(true);
		} else {
			pos.top = offset.top + $(this).outerHeight(true);
		}
		tooltip.css({
			'position': 'absolute',
			'left': pos.left,
			'top': pos.top
		});
	}
};
/**
 * Nuevos métodos para el objeto jQuery.
 *
 * Se ejecutan inmediatamente para evitar el acceso a la variable newMethods desde otros plugins.
 */
(function() {
	var newMethods = {
		'tooltip': function() {
			return this.each(function(i, elem) {
				$(elem).click(function() {
					return false; // Impedimos la ejecución del click para evitar que posicione la pantalla en el anchor oculto.
				}).mousemove($.tooltip.alocate).hover($.tooltip.show, $.tooltip.hide);
			});
		}
	};
	jQuery.each(newMethods, function(i) {
		jQuery.fn[i] = this;
	});
})();
