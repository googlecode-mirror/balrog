/**
 * @author terremoto
 */
$(document).ready( function() {
	$('.tooltip').click( function() {
		return false;
	}).hover(showTooltip, hideTooltip).mousemove(positionTooltip);
});