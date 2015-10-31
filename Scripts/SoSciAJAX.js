/**
 * Send a simple AJAX request
 * @param String url URL to send request to
 * @param String method POST|GET
 * @param Object data Data to send
 * @param Function callback  A function that gets in return a status(ok|err), response data (Object) or null on fail, and the reference (if set)
 */
function SoSciAJAX(url, data, callback, reference) {
	
	var request = new XMLHttpRequest();
		
	/**
	 * Equivalent to PHP's strip_tags().
	 * Source: https://raw.githubusercontent.com/kvz/phpjs/master/functions/strings/strip_tags.js 2015-09-11
	 * Added: !DOCTYPE in tags definition.
	 * @param String input
	 * @param string allowed Allowed tags written one after the other
	 * @return string
	 */
	var strip_tags = function(input, allowed) {
		allowed = (((allowed || '') + '')
			.toLowerCase()
			.match(/<[a-z][a-z0-9]*>/g) || [])
			.join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
		var tags = /<\/?([a-z][a-z0-9]*|!DOCTYPE)\b[^>]*>/gi,
			commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
		return input.replace(commentsAndPhpTags, '')
			.replace(tags, function($0, $1) {
				return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
			});
			}
	
	var onStateChange = function() {
		if (request.readyState != 4) {
			return;
		}
		if (request.status != 200) {
			alert("Warning: Received status code " + request.status + " for request to server.\nURL: "+url);
			callback("err", null, reference);
			return;
		}
		if (!request.responseXML) {
			alert("Warning: Received non-XML response.\n\n" + request.responseText.substr(0, 128) + "\n\n" + strip_tags(request.responseText).replace(/[\r\n]+/g, "\n").substr(0, 128));
			callback("err", null, reference);
		}
		
		// Root element must be <reply>
		var root = request.responseXML.getElementsByTagName("reply");
		if (root.length != 1) {
			alert("Warning: Received invalid XML response (root=" + root.length + ")");
			callback("err", null, reference);
			return;
		}
		
		var status = root[0].getElementsByTagName("status");
		if (status.length != 1) {
			alert("Warning: Received invalid XML response (status=" + status.length + ")");
			callback("err", null, reference);
			return;

			}
		
		var error = root[0].getElementsByTagName("error");
		for (var i=0; i<error.length; i++) {
			alert(error[i].firstChild.nodeValue);
		}
		var entries = root[0].getElementsByTagName("data");
		var content = {}
		for (var i=0; i<entries.length; i++) {
			var key = entries.getAttribute("key");
			if (key) {
				content[key] = entries[key].firstChild.nodeValue;
			}
		}
		
		callback(status[0].firstChild.nodeValue, content, reference);
	}

	request.open("POST", url, true);

	var str = [];
	for (var key in data) {
		str.push(encodeURIComponent(key) + "=" + encodeURIComponent(data[key]));
		}
	var cnt = str.join("&");

	
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send(cnt);
	request.onreadystatechange = onStateChange;
}