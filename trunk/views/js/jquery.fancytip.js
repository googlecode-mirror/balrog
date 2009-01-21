// jQuery plugin - FancyTip
// v1.1
// Jeremy Morton
// 
// Easy-to-use plugin allowing for nice-looking tooltips to be associated with any
// CSS-selectable element on a page.
// Uses only CSS markup, not tables, for layout.  Designed to have good performance and
// be compatible across the major modern browsers (IE 6+, Firefox 2+, Opera 9+, Safari 3+).
// - Recommended for use with jQuery 1.2.x

// For a nice jQuery plugin development pattern, see:
// http://www.learningjquery.com/2007/10/a-plugin-development-pattern

// Create closure - enclose jQuery-taking anonymous function that is executed immediately
(function($) {
	// 
	// Plugin definition:
	// Function that can be used with jQuery accessors like jQuery('.myClass').fancytip()
	// 
	jQuery.fn.fancytip = function(aOptions) {
		// Build main options before element iteration... in this context, jQuery.extend()
		// merges parameters 2+ with parameter 1, and returns the modified parameter 1.
		// As we give an anonymous empty object as parameter 1, we just get the merged
		// object returned, and nothing we've already declared is actually modified.
		var options = jQuery.extend({}, jQuery.fn.fancytip.defaults, aOptions);
		
		// Iterate and assign a tooltip to each matched 'hook' element
		return this.each(function() {
			// Store the DOM element matched for this iteration in a var
			var matchedElement = jQuery(this);
			
			// Ensure that our tooltip DIV exists
			if (!ensureTtDiv(jQuery, options.imagesdir)) {
				return false;
			}
			
			// Ensure options we have are valid
			if (!ensureOptsValid(options)) {
				return false;
			}
			
			// Record tooltip info (specified options) for this 'hook' element, for its hover code to use
			var elemId;
			if (!(elemId = matchedElement.attr('id'))) {
				// We RELY on each 'hook' element being able to be uniquely identified by its ID!
				showError('Matched element has no id!  Every element to have a tooltip hooked to it MUST have an id.');
				return false;
			}
			jQuery.fn.fancytip.static.hooks[elemId] = options;
			
			// Finally, attach hover event functions to this 'hook' element
			matchedElement.hover(function() { // Hover in...
				// Record the element we're currently popping up a tooltip for (the 'hook')...
				hookElement = this;
				// ... and grab its tooltip config settings, identified by a key of its element ID
				var ttConfig = jQuery.fn.fancytip.static.hooks[jQuery(hookElement).attr('id')];
				
				// In case we're currently animating, stop the animation and hide the popup divs
				// before we change one for the new popup
				jQuery('#jqId_ttLtContainer').stop(true, true);
				jQuery('#jqId_ttLtContainer').css({
					display: 'none'
				});
				jQuery('#jqId_ttRtContainer').stop(true, true);
				jQuery('#jqId_ttRtContainer').css({
					display: 'none'
				});
				
				// Statically record the hook element whose tooltip's currently animating, for other code...
				jQuery.fn.fancytip.static.hookelement = hookElement;
				
				var popupOnLeft;
				var popupElementSelector;
				var popupElementContentBorderSelector;
				var popupElementContentSelector;
				var popupElementContentTxtSelector;
				var popupElementBorderCoverSelector;
				var popupElementBorderCoverTransPropImgSelector;
				var popupElementBorderCoverImgSelector;
				var popupElementNotchImgTransPropSelector;
				var popupElementNotchImgSelector;
				if (ttConfig.popupside == 'left') {
					popupOnLeft = true;
					popupElementSelector = '#jqId_ttLtContainer';
					popupElementContentBorderSelector = '#jqId_ttLtContentBorder';
					popupElementContentSelector = '#jqId_ttLtContent';
					popupElementContentTxtSelector = '#jqId_ttLtContentTxt';
					popupElementBorderCoverSelector = '#jqId_ttLtContentNotchBorder'
					popupElementBorderCoverTransPropImgSelector = '#jqId_ttLtBorderCoverImgTransPropImg';
					popupElementBorderCoverImgSelector = '#jqId_ttLtBorderCoverImg';
					popupElementNotchImgTransPropSelector = '#jqId_ttLtNotchImgTransProp';
					popupElementNotchImgSelector = '#jqId_ttLtNotchImg';
				} else if (ttConfig.popupside == 'right') {
					popupOnLeft = false;
					popupElementSelector = '#jqId_ttRtContainer';
					popupElementContentBorderSelector = '#jqId_ttRtContentBorder';
					popupElementContentSelector = '#jqId_ttRtContent';
					popupElementContentTxtSelector = '#jqId_ttRtContentTxt';
					popupElementBorderCoverSelector = '#jqId_ttRtContentNotchBorder'
					popupElementBorderCoverTransPropImgSelector = '#jqId_ttRtBorderCoverImgTransPropImg';
					popupElementBorderCoverImgSelector = '#jqId_ttRtBorderCoverImg';
					popupElementNotchImgTransPropSelector = '#jqId_ttRtNotchImgTransProp';
					popupElementNotchImgSelector = '#jqId_ttRtNotchImg';
				}
				
				// Setup the tooltip (and other settings) appropriately for this 'hook' element
				jQuery(popupElementContentSelector).css({
					width: ttConfig.width
				});
				jQuery(popupElementContentTxtSelector).text('');
				if (ttConfig.contentelementselector) {
					// Assign this hook's content element an 'ID class' if not already assigned
					if (!jQuery(ttConfig.contentelementselector).hasClass('jqIdClass_ContentFor_' + jQuery(hookElement).attr('id'))) {
						jQuery(ttConfig.contentelementselector).addClass('jqIdClass_ContentFor_' + jQuery(hookElement).attr('id'));
					}
				}
				// For each non-text element, apply its hiding class (stored in its hook's static storage)
				jQuery(popupElementContentSelector + ' > *').each(function() {
					if (this.id && !(this.id == jQuery(popupElementContentTxtSelector).attr('id'))) {
						for (var hookId in jQuery.fn.fancytip.static.hooks) {
							if (jQuery(this).hasClass('jqIdClass_ContentFor_' + hookId)) {
								// This is content for one of our hook elements; hide it using the appropriate hiding class
								var thisHidingClass = jQuery.fn.fancytip.static.hooks[hookId].contentelementhidingclass;
								if (!jQuery(this).hasClass(thisHidingClass)) {
									jQuery(this).addClass(thisHidingClass);
								}
							}
						}
					}
				});
				
				if (!ttConfig.contentelementselector) {
					jQuery(popupElementContentTxtSelector).text(ttConfig.text);
				} else {
					// Append specified content element to our content container...
					jQuery(popupElementContentSelector)[0].appendChild(jQuery(ttConfig.contentelementselector)[0]);
					
					// ... and unhide it
					jQuery(ttConfig.contentelementselector).removeClass(ttConfig.contentelementhidingclass);
				}
				jQuery(popupElementContentTxtSelector).removeClass();
				if (ttConfig.contentclasses) {
					jQuery(popupElementContentTxtSelector).addClass(ttConfig.contentclasses);
				}
				if (ttConfig.height) {
					jQuery(popupElementContentSelector).css({
						height: ttConfig.height,
						'min-height': ttConfig.height,
						'max-height': ttConfig.height
					});
				}
				
				var leftPx;
				var topPx;
				if (ttConfig.mode == 'movingtip') {
					topPx = getTopPxFor(jQuery, hookElement, popupElementSelector);
				} else if (ttConfig.mode == 'fixedtip') {
					topPx = getTopPxFor(jQuery, ttConfig.baseelementselector, popupElementSelector, true, ttConfig.voffsetpx);
				}
				
				// Theme-specific settings
				var imgNotchWidth;
				var imgNotchHeight;
				var imgNotchRightName;
				var imgNotchLeftName;
				var imgBgName;
				var propHeight;
				var minContentHeightPx;
				if (ttConfig.theme == 1) {
					// Notch image sizes in pixels
					imgNotchWidth = 6;
					imgNotchHeight = 13;
					imgNotchRightName = 'tt1NotchRight.gif';
					imgNotchLeftName = 'tt1NotchLeft.gif';
					imgBgName = 'tt1Bg.gif';
				} else if (ttConfig.theme == 2) {
					// Notch image sizes in pixels
					imgNotchWidth = 12;
					imgNotchHeight = 25;
					imgNotchRightName = 'tt2NotchRight.gif';
					imgNotchLeftName = 'tt2NotchLeft.gif';
					imgBgName = 'tt2Bg.gif';
				}
				
				// Setup notch image
				jQuery(popupElementNotchImgSelector)[0].src = options.imagesdir + (popupOnLeft ? imgNotchRightName : imgNotchLeftName);
				jQuery(popupElementNotchImgSelector).css({
					width: imgNotchWidth + 'px',
					height: imgNotchHeight + 'px'
				});
				
				// Other heights in pixels
				if (ttConfig.mode == 'movingtip') {
					propHeight = 13;
				} else {
					propHeight = calcFixedTipPropHeight(jQuery(hookElement), parsePx(topPx), jQuery(popupElementSelector).height(), imgNotchHeight, (ttConfig.height ? jQuery(popupElementSelector).height() : false));
				}
				minContentHeightPx = propHeight + imgNotchHeight + 2;
				
				// Setup content box - if we have a fixed height, we set NO min-height on the content element...
				jQuery(popupElementContentSelector).css({
					'background-image': 'url(\'' + options.imagesdir + imgBgName + '\')',
					'background-repeat': 'repeat'
				});
				// ... if we have no fixed height, we set a min-height.
				if (!ttConfig.height) {
					jQuery(popupElementContentSelector).css({
						'min-height': minContentHeightPx + 'px'
					});
				}
				
				// Setup content notch border box
				jQuery(popupElementBorderCoverTransPropImgSelector).css({
					width: '1px',
					height: propHeight + 'px'
				});
				jQuery(popupElementBorderCoverImgSelector)[0].src = options.imagesdir + imgBgName;
				jQuery(popupElementBorderCoverImgSelector).css({
					width: '1px',
					height: (imgNotchHeight - 2) + 'px'
				});
				
				// Setup rest of notch box
				jQuery(popupElementNotchImgTransPropSelector).css({
					width: '1px',
					height: propHeight + 'px'
				});
				
				if (ttConfig.mode == 'movingtip') {
					leftPx = getLeftPxFor(jQuery, popupOnLeft, hookElement, popupElementSelector);
				} else if (ttConfig.mode == 'fixedtip') {
					leftPx = getLeftPxFor(jQuery, null, ttConfig.baseelementselector, popupElementSelector, true, ttConfig.hoffsetpx);
				}
				jQuery(popupElementSelector).css({
					left: leftPx,
					top: topPx
				});
				
				// Set the tooltip container's width explicitly to ensure that, if it goes off the edge of the screen,
				// floated elements don't get pushed down onto the next line and ruin the tooltip's look.
				// NOTE: Importantly, we mustn't trust jQuery's .innerWidth() function.  This uses the browser's reported
				// CSS width value for the given element, which in some browsers (like Firefox) gives an exact fractional
				// value if the width was not originally specified in px (ie. the element's width in px given that you
				// said, say, 2.4em, may be 5.3242 or something).  We need the number of px the browser *actually used*
				// when displaying the element in pixels.  Luckily, we can get just that; a DOM element has a widely-
				// supported property, .clientWidth - it includes the width of the element and its padding, and gives
				// an exact pixel measurement which seems to be exactly correct in all major browsers (IE6 included!)
				jQuery(popupElementSelector).css({
					display: 'block',
					visibility: 'hidden'
				});
				
				var mandContainerWidth = parseInt(jQuery(popupElementContentBorderSelector)[0].clientWidth +
				jQuery(popupElementNotchImgSelector)[0].clientWidth +
				1 // Bizarrely, sometimes Firefox still pushes the contents onto a new line unless the container
				// DIV is slightly wider than the content.  This means we need the extra pixel.
				) +
				'px';
				
				jQuery(popupElementSelector).css({
					display: 'none',
					visibility: 'visible'
				});
				
				jQuery(popupElementSelector).css({
					width: mandContainerWidth,
					'min-width': mandContainerWidth,
					'max-width': mandContainerWidth
				});
				
				jQuery(popupElementSelector).fadeIn(ttConfig.fadeinperiod);
			}, function() { // Hover out...
				// Record the element we're currently popping up a tooltip for (the 'hook')...
				hookElement = this;
				// ... and grab its tooltip config settings, identified by a key of its element ID
				var ttConfig = jQuery.fn.fancytip.static.hooks[jQuery(hookElement).attr('id')];
				
				var popupOnLeft;
				var popupElementSelector;
				if (ttConfig.popupside == 'left') {
					popupOnLeft = true;
					popupElementSelector = '#jqId_ttLtContainer';
				} else if (ttConfig.popupside == 'right') {
					popupOnLeft = false;
					popupElementSelector = '#jqId_ttRtContainer';
				}
				
				jQuery(popupElementSelector).fadeOut(ttConfig.fadeoutperiod, function() {
					jQuery(popupElementSelector).css({
						display: 'none'
					});
					jQuery.fn.fancytip.static.hookelement = null;
				});
			});
		});
	};
	
	// 
	// Plugin static storage (supposed to be private, please don't touch)
	// 
	jQuery.fn.fancytip.static = new Object();
	jQuery.fn.fancytip.static.hooks = new Object(); // Record 'hook' element tooltip info here
	jQuery.fn.fancytip.static.hookelement = null; // Record the hook element a tooltip is currently being displayed for here
	// 
	// Private functions
	// 
	function showError(errorTxt) {
		alert('FancyTip error: ' + errorTxt);
	}
	
	function ensureOptsValid(options) {
		// Must have theme
		if (!options.theme || (options.theme != 1 && options.theme != 2)) {
			// Currently 2 themes
			showError("Tooltip theme ('theme' property) MUST be supplied and must be between 1-2!");
			return false;
		}
		
		// Must have mode
		if (!options.mode || (options.mode != 'movingtip' && options.mode != 'fixedtip')) {
			showError("Tooltip mode ('mode' property) MUST be supplied and must be 'movingtip' or 'fixedtip'!");
			return false;
		}
		
		if (options.mode == 'fixedtip') {
			// We must have certain params specified that are specific to this mode
			if (!options.baseelementselector || !options.hoffsetpx || !options.voffsetpx) {
				showError("Base element selector, horizontal offset, and vertical offset MUST be supplied when mode is 'fixedtip'!");
				return false;
			}
		} else if (options.mode == 'movingtip') {
			// Don't need any params specified that are specific to this mode
		}
		
		// Must have tooltip text OR a content selector element
		if (!(options.text && !options.contentelementselector ||
		!options.text && options.contentelementselector)) {
			showError("EITHER tooltip text ('text' property) OR content selector property ('contentelementselector' property) MUST be supplied (not both!)!");
			return false;
		}
		
		if (options.contentelementselector && !options.contentelementhidingclass) {
			showError("When displaying content using the 'contentelementselector' property, a corresponding hiding class ('contentelementhidingclass' property) MUST be supplied!");
			return false;
		}
		
		// Popupside must exist and be 'left' or 'right'
		if (!options.popupside || (options.popupside != 'left' && options.popupside != 'right')) {
			showError("Popup side ('popupside' property) MUST be supplied and must be 'left' or 'right'!");
			return false;
		}
		
		return true;
	}
	
	function ensureTtDiv(jqObj, imagesdir, width) {
	
		// Make sure the left container tooltip DIV exists
		if (!(jqObj("#jqId_ttLtContainer").length > 0)) {
			// Create default-styled left container tooltip DIV
			jqObj('body').prepend('<div id="jqId_ttLtContainer" style="position:absolute; display:none; z-index:99999;">' +
			'	<div id="jqId_ttLtContentBorder" style="float:left; background-color:#000000; padding:1px 0px 1px 1px;">' +
			'		<div id="jqId_ttLtContent" style="float:left; margin:0px; font-size:0.7em; font-weight:bold; padding:0.6em 0.6em 0.6em 0.8em; background-color:#ffffff; overflow:hidden;">' +
			'			<div id="jqId_ttLtContentTxt" style="margin:0px; padding:0px;" />' +
			'		</div>' +
			'		<div id="jqId_ttLtContentNotchBorder" style="float:left;"><img id="jqId_ttLtBorderCoverImgTransPropImg" src="' +
			imagesdir +
			'ttTransDot.gif" /><br/><img id="jqId_ttLtBorderCoverImg" src="' +
			imagesdir +
			'ttTransDot.gif" /></div>' +
			'	</div>' +
			'	<div id="jqId_ttLtNotch" style="float:left; padding:0px; margin:0px;"><img id="jqId_ttLtNotchImgTransProp" src="' +
			imagesdir +
			'ttTransDot.gif" /><br /><img id="jqId_ttLtNotchImg" src="' +
			imagesdir +
			'ttTransDot.gif" /></div>' +
			'</div>');
		}
		
		// Make sure the right container tooltip DIV exists
		if (!(jqObj("#jqId_ttRtContainer").length > 0)) {
			// Create default-styled right container tooltip DIV
			jqObj('body').prepend('<div id="jqId_ttRtContainer" style="position:absolute; display:none; z-index:99999;">' +
			'	<div id="jqId_ttRtNotch" style="float:left; padding:0px; margin:0px;"><img id="jqId_ttRtNotchImgTransProp" src="' +
			imagesdir +
			'ttTransDot.gif" /><br/><img id="jqId_ttRtNotchImg" src="' +
			imagesdir +
			'ttTransDot.gif" /></div>' +
			'	<div id="jqId_ttRtContentBorder" style="float:left; background-color:#000000; padding:1px 1px 1px 0px;">' +
			'		<div id="jqId_ttRtContentNotchBorder" style="float:left;"><img id="jqId_ttRtBorderCoverImgTransPropImg" src="' +
			imagesdir +
			'ttTransDot.gif" /><br/><img id="jqId_ttRtBorderCoverImg" src="' +
			imagesdir +
			'ttTransDot.gif" /></div>' +
			'		<div id="jqId_ttRtContent" style="float:left; margin:0px; font-size:0.7em; font-weight:bold; padding:0.6em 0.6em 0.6em 0.8em; background-color:#ffffff; overflow:hidden;">' +
			'			<div id="jqId_ttRtContentTxt" style="margin:0px; padding:0px;" />' +
			'		</div>' +
			'	</div>' +
			'</div>');
		}
		
		return true;
	}
	
	function parsePx(pxStr) {
		if (pxStr.length < 3) {
			return parseFloat('0');
		}
		if (pxStr.substring(pxStr.length - 2) == 'px') {
			return parseFloat(pxStr.substring(0, pxStr.length - 2));
		} else {
			return parseFloat('0');
		}
	}
	
	function getLeftPxFor(jqObj, popupOnLeft, targetElementSelector, popupElementSelector, fixedTip, hoffsetPx) {
		// The extra distance to the left of the target element where the popup box should appear, in px...
		// NOTE: In IE6 and IE7 quirks mode, offset() is off by 2px.  This is *unavoidable*, unfortunately.  Therefore, it is
		// recommended that this be at least 2px so that the popup box doesn't overlap the target element at all.  It will mean
		// that in other browsers, the popup box is 2px further to the left and top, but that's OK - we probably want the popup
		// box to be offset a modest amount in these directions anyway, so it shouldn't be too noticeable.
		var extraWidthLeft = -2 -
		2; // Minus 2 to make up for IE's being 2px too far to the right
		var extraWidthRight = 4 -
		2; // Minus 2 to make up for IE's being 2px too far to the right
		if (!fixedTip) {
			if (popupOnLeft) {
				return ((jqObj(targetElementSelector).offset().left -
				(jqObj(popupElementSelector).width() +
				parsePx(jqObj(popupElementSelector).css('margin-left')) + // Purposely omit padding; we're considering it part of the content
				parsePx(jqObj(popupElementSelector).css('margin-right')) +
				parsePx(jqObj(popupElementSelector).css('border-left-width')) +
				parsePx(jqObj(popupElementSelector).css('border-right-width'))) +
				extraWidthLeft) +
				'px');
			} else {
				return ((jqObj(targetElementSelector).offset().left + jqObj(targetElementSelector).width() -
				(parsePx(jqObj(popupElementSelector).css('margin-left')) + // Purposely omit padding; we're considering it part of the content
				parsePx(jqObj(popupElementSelector).css('border-left-width'))) +
				extraWidthRight) +
				'px');
			}
		} else {
			return ((jqObj(targetElementSelector).offset().left + parseInt(hoffsetPx)) +
			'px');
		}
	}
	
	function getTopPxFor(jqObj, targetElementSelector, popupElementSelector, fixedTip, voffsetPx) {
		// The extra distance above the target element where the popup box should appear, in px...
		// NOTE: In IE6 and IE7 quirks mode, offset() is off by 2px.  This is *unavoidable*, unfortunately.  Therefore, it is
		// recommended that this be at least 2px so that the popup box doesn't overlap the target element at all.  It will mean
		// that in other browsers, the popup box is 2px further to the left and top, but that's OK - we probably want the popup
		// box to be offset a modest amount in these directions anyway, so it shouldn't be too noticeable.
		var extraAbove = 14 +
		2; // Plus 2 to make up for IE's being 2px too far down
		if (!fixedTip) {
			return ((jqObj(targetElementSelector).offset().top -
			extraAbove) +
			'px');
		} else {
			return ((jqObj(targetElementSelector).offset().top + parseInt(voffsetPx)) +
			'px');
		}
	}
	
	function calcFixedTipPropHeight(hookElement, popupOffsetTopPx, popupHeightPx, notchHeightPx, fixedContainerHeightPx) {
		// Used to calculate how tall the transparent 'prop' above the notch should be for a fixed-location tooltip, in order
		// for the centre of the notch to point to the centre of the target ('hook') element.
		
		if (fixedContainerHeightPx) {
			fixedContainerHeightPx -= 2; // Deal with 1px padding at top and bottom of black content border DIV
		}
		
		var propHeight = parseInt(((hookElement.offset().top +
		(hookElement.height() / 2)) -
		(notchHeightPx / 2)) -
		popupOffsetTopPx);
		
		// If value is under 2, set to 2; we want 2 pixels before the top of the notch, at least (ie. floor height).
		if (propHeight < 2) {
			propHeight = 2;
		}
		
		// If value would result in there being fewer than 2 pixels between the bottom of the popup and the notch, limit it to
		// a length that would result in that (ie. ceiling height).  This only applies where a fixed height has been set; otherwise,
		// the tooltip will simply expand so be able to hold the prop.
		if (fixedContainerHeightPx) {
			var maxAllowedHeight = parseInt(fixedContainerHeightPx // We would -2 here for the guaranteed 2px gap at the bottom, but weirdly browsers seem to give us a 2px gap anyway.  *shrug*
 -
			notchHeightPx);
			if (propHeight > maxAllowedHeight) {
				propHeight = maxAllowedHeight;
			}
		}
		
		return propHeight;
	}
	
	// 
	// Public functions
	// 
	//	jQuery.fn.fancytip.format = function(txt) {
	//		// Dummy example public function...
	//		return '<strong>' + txt + '</strong>';
	//	};
	
	// 
	// Plugin defaults (all specifiable parameters without defaults are also documented)
	// 
	jQuery.fn.fancytip.defaults = {
		// text (the text to display in the tooltip when no custom contentelementselector is provided)
		// mode (whether to move the tooltip body, or keep it fixed and move the notch to point to the 'hook' element; 'movingtip' or 'fixedtip')
		mode: 'movingtip',
		// contentclasses (class(es) to apply to TEXT content (ie. when 'text' is supplied rather than 'contentelementselector'))
		// baseelementselector ('base' element from which to offset the tooltip co-ords from in 'fixedtip' mode - only in 'fixedtip' mode)
		// hoffsetpx (horizontal offset, in px, of tooltip from base element - only in 'fixedtip' mode)
		// voffsetpx (vertical offset, in px, of tooltip from base element - only in 'fixedtip' mode)
		// imagesdir (relative images dir path... images assumed to exist: ttTransDot.gif, tt1Bg.gif, tt1NotchLeft.gif, tt1NotchRight.gif, tt2Bg.gif, tt2NotchLeft.gif, tt2NotchRight.gif)
		imagesdir: '',
		// fadeinperiod (time taken to fade in in millisecs)
		fadeinperiod: 250,
		// fadeoutperiod (time taken to fade out in millisecs)
		fadeoutperiod: 250,
		// popupside (side of target 'hook' element to popup on; 'left' or 'right')
		popupside: 'left',
		// width (width of tooltip)
		width: '12em',
		// height (height of tooltip)
		// contentelementselector (if specified, the content of the tooltip will be the content of this element, instead of the text in the default tooltip)
		// contentelementhidingclass (if contentelementselector is specified, this class is removed/added from/to the content element in order
		//                            to show/hide it, and it MUST be supplied)
		// theme (number of tooltip look-and-feel theme)
		theme: 1,
		
		
		
		// *** IGNORE THE BELOW*** - it's just there so we can always suffix our final REAL default above with a comma
		ignoremeplease: 'thankyouverymuch'
	};
	
	// 
	// Other code to run immediately
	// 
	// - Move popped-up tooltip on window resize
	jQuery(window).resize(function() {
		var hookElement = jQuery.fn.fancytip.static.hookelement;
		if (hookElement) { // If we're currently displaying a tooltip...
			// Get the current 'hook' element's tooltip config settings
			var ttConfig = jQuery.fn.fancytip.static.hooks[jQuery(hookElement).attr('id')];
			
			// Accessing a Javascript object's members like an associative array has the same
			// effect as accessing them using dot notation.
			// eg. myVar['member'] == myVar.member
			for (var popupside in {
				left: '',
				right: ''
			}) {
				if (popupside == ttConfig.popupside) {
					var tooltipSelector;
					var popupOnLeft;
					if (popupside == 'left') {
						tooltipSelector = '#jqId_ttLtContainer';
						popupOnLeft = true;
					}
					if (popupside == 'right') {
						tooltipSelector = '#jqId_ttRtContainer';
						popupOnLeft = false;
					}
					
					var leftPx;
					var topPx;
					if (ttConfig.mode == 'movingtip') {
						topPx = getTopPxFor(jQuery, hookElement, popupElementSelector);
					} else if (ttConfig.mode == 'fixedtip') {
						topPx = getTopPxFor(jQuery, ttConfig.baseelementselector, popupElementSelector, true, ttConfig.voffsetpx);
					}
					
					if (ttConfig.mode == 'movingtip') {
						leftPx = getLeftPxFor(jQuery, popupOnLeft, hookElement, popupElementSelector);
					} else if (ttConfig.mode == 'fixedtip') {
						leftPx = getLeftPxFor(jQuery, null, ttConfig.baseelementselector, popupElementSelector, true, ttConfig.hoffsetpx);
					}
					
					jQuery(tooltipSelector).css({
						left: leftPx,
						top: topPx
					});
					
					break;
				}
			}
		}
	});
})(jQuery); // End closure and execute immediately!
