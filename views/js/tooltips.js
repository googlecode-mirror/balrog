/**
 * @author terremoto
 */
$(document).ready(function() {
	$('.tooltip').click(function() {
		return false; // Impedimos la ejecuci�n del click para evitar que posicione la pantalla en el anchor oculto.
	}).hover(showTooltip, hideTooltip).mousemove(positionTooltip);
});
