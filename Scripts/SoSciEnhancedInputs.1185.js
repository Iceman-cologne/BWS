/**
 * Allow to unselect a radio button by clicking a selected button
 * @author Dominik Leiner
 * @copyright 2010 oFb-Team www.soscisurvey.de
 */

function SoSciEnhancedInputs() {
	function UnselectableRadio(button, container) {
		
		var self = this;
		var status;
		
		this.radioClick = function(evt) {
			if (SoSciTools.inputsDisabled) {
				return;
			}
			/*
			if (button.readOnly) {
				// Catch the event
				container.resetStatus(button);
				return SoSciTools.stopEvent(evt);
			}
			*/
			
			if (status && button.checked) {
				button.checked = false;
			}
			// Update status of all buttons
			container.updateGroup(button);
		}
		
		this.readStatus = function() {
			status = button.checked;
		}
		
		/*
		this.resetStatus = function() {
			button.checked = status;
		}
		*/
		
		SoSciTools.attachEvent(button, "click", this.radioClick);
		this.readStatus();
	}
	
	function ContainerUnselectables() {
		var buttons = new Array();
		var groups = new Array();
		var names = new Array();
		
		this.registerButton = function(button) {
			var index = buttons.length;
			var name = button.getAttribute("name");
			buttons[index] = new UnselectableRadio(button, this);
			names[index] = name;
			if (!groups[name]) {
				groups[name] = new Array();
			}
			groups[name].push(buttons[index]);
		}


		this.updateGroup = function(button) {
			var name = button.getAttribute("name");
			var others = groups[name];
			if (others) {
				for (var i=0; i<others.length; i++) {
					others[i].readStatus();
				}
			}
		}
		
		/**
		 * Reset status of all inputs in the group
		 */
		/*
		this.resetStatus = function(button) {
			var name = button.getAttribute("name");
			var others = groups[name];
			if (others) {
				for (var i=0; i<others.length; i++) {
					others[i].resetStatus();
				}
			}
		}
		*/
	}
	
	function reRouteEvent(evt, target) {
		// No loop
		var sender = SoSciTools.getSender(evt);
		if (sender == target) {
			return;
		}
		// Mozilla style
		if (document.createEvent) {
			var rev = document.createEvent('MouseEvents');
			rev.initMouseEvent(evt.type, evt.bubbles, evt.cancelable, window, evt.detail,
				evt.screenX, evt.screenY, evt.clientX, evt.clientY,
				evt.ctrlKey, evt.altKey, evt.shiftKey,
				evt.metaKey, evt.button, evt.relatedTarget
			);
			target.dispatchEvent(rev);
		 } else
		// IE style
		if (document.createEventObject) {
			target.fireEvent('onclick'); 
		}
		target.focus();
		return SoSciTools.stopEvent(evt);
	}
	
	function getInputPos(el) {
		// May have been replaced by a CustomInput
		if (el.parentNode && (el.parentNode.className == "inputCST")) {
			el = el.parentNode;
		}
		// Find middle pos
		pos = SoSciTools.getNodePos(el);
		pos.x+= el.offsetWidth / 2;
		pos.y+= el.offsetHeight / 2;
		return pos;
	}
	


	/**
	 * Click the radio button/checkbox closest to the click (if applicable)
	 */
	function clickNextButton(evt) {
		// Do not handle clicks on inputs and textareas
		var sender = SoSciTools.getSender(evt);
		if ((sender.nodeType == 1) && ((sender.nodeName == "INPUT") || (sender.nodeName == "TEXTAREA") || (sender.nodeName == "LABEL"))) {
			return;
		}
		// Go through the form elements and find closest button
		var maxDist = 32;
		var minDist = maxDist;
		var minNode = null;
		var clc = SoSciTools.getMousePos(evt);
		
		// May be a custom event without position
		if (typeof clc == "undefined")  {
			return;
		}
		
		var qForm = document.getElementById("questionnaireForm");
		var element, pos, d;
		for (i=0; i<qForm.elements.length; i++) {
			element = qForm.elements[i];
			// Clicked any form element, though filtered above?
			if (sender == element) {
				return;
			}
			// Element may be hidden
			if (element.offsetParent == null) {
				continue;
			}
			// Only automatically click on radio buttons and checkboxes (never submit buttons!)
			if (!(
				(element.nodeName == "INPUT") && ((element.type == "radio") || (element.type == "checkbox"))
			)) {
				continue;
			}
			
			pos = getInputPos(element);
			// SoSciTools.debugMessage(element.id+" x="+pos.x+" y="+pos.y+" op="+element.offsetParent);
			// Quick check
			if (
				(pos.x - clc.x > maxDist) || (clc.x - pos.x > maxDist) ||
				(pos.y - clc.y > maxDist) || (clc.y - pos.y > maxDist)
			) {
				// Too far, anyway
			} else {

			d = Math.sqrt(Math.pow(pos.x - clc.x, 2) + Math.pow(pos.y - clc.y, 2));
				// SoSciTools.debugMessage(element.id+" d="+d);
				if ((d < maxDist) && (d < minDist)) {
					minDist = d;
					minNode = element;
				}
			}
		}
		if (minNode != null) {
			reRouteEvent(evt, minNode);
		}
		// SoSciTools.debugMessage("Forward click at "+minDist);
	}
	
	/**
	 * Forward clicks from linked to element
	 */
	function ClickForward(element, linked) {
		
		function onClick(evt) {
			var sender = SoSciTools.getSender(evt);
			// Do not forward clicks to label, text input, or dropdown/option
			if ((sender.nodeType == 1) && ((sender.nodeName == "LABEL") || (sender.nodeName == "INPUT") || (sender.nodeName == "TEXTAREA") || (sender.nodeName == "SELECT") || (sender.nodeName == "OPTION"))) {
				return;
			}
			return reRouteEvent(evt, element);
		}
		
		for (var j=0; j<linked.length; j++) {
			SoSciTools.attachEvent(linked[j], "click", onClick);
			// linked[j].style.border = "1px dotted green";
		}
	}
	
	/**
	 * Find parent nodes with css class "sensitive"
	 * and nodes that have the HTML ID "sense_" + the element ID
	 * @param HTMLElement/input element
	 * @return Array
	 */
	function findLinkedNodes(element) {
		var linked = new Array();
		// There may be an element specified with the ID="sense_[elementID]"
		if (element.id) {
			// Find linked element
			var linkID = "sense_" + element.id;
			if (el = document.getElementById(linkID)) {
				linked.push(document.getElementById(linkID));
			}
		}

		// Use "sensitive" class table-cells around
		var node = element;
		var limit = 5;
		while (node.parentNode && (limit > 0)) {
			node = node.parentNode;
			limit--;
			if (node.nodeType == 1) {
				if (node.className.match(/(^| )sensitive( |$)/)) {
					linked.push(node);
					break;
				}
			}
		}
		return linked;
	}
	
	/**
	 * Make all radio buttons on the page unselectable.
	 * @return void
	 */
	this.initUnselectable = function() {
		var qForm = document.getElementById("questionnaireForm");
		var unselectables = new ContainerUnselectables();
		
		for (i=0; i<qForm.elements.length; i++) {
			var element = qForm.elements[i];
			var type = element.getAttribute("type");
			if (type == "radio") {
				unselectables.registerButton(element);
			}
		}
	}
	
	/**
	 * Link sensitive areas/elements (if available) to input buttons (radio/checkbox)
	 */
	this.initSensitive = function() {
		var qForm = document.getElementById("questionnaireForm");
		for (i=0; i<qForm.elements.length; i++) {
			var element = qForm.elements[i];
			var type = element.getAttribute("type");
			if ((type == "radio") || (type == "checkbox")) {
				var linked = findLinkedNodes(element);
				if (linked.length > 0) {

				var operator = new ClickForward(element, linked);
				}
			}
		}
		// Also catch clicks otherwhere on the form
		SoSciTools.attachEvent(qForm, "click", clickNextButton);
	}

}

SoSciEnhancedInputs.instance = new SoSciEnhancedInputs();