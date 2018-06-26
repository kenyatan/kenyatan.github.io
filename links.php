***Or hand-roll your own custom filter function*****

function shapeSpace_check_email($email) {
	return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', $email);
}

***Check bad strings******
function shapeSpace_check_string($string) {
	$bad_strings = array(
		'content-type:', 
		'mime-version:', 
		'multipart/mixed', 
		'Content-Transfer-Encoding:', 
		'bcc:', 
		'cc:', 
		'to:',
		'from:',
	);
	foreach($bad_strings as $bad_string) {
		if (eregi($bad_string, strtolower($string))) {
			return false;
		}
	}
	return true;
}

********Check for newlines******
function shapeSpace_check_newlines($string) {
	if (preg_match("/(%0A|%0D|\\n+|\\r+)/i", $string) != 0) {
		return false;
	}
	return true;
}
********Check POST request******
function shapeSpace_check_post_request() {
	if ($_SERVER['REQUEST_METHOD'] != 'POST'){
		return false;
	}
	return true;
}
*******Hidden/reverse captcha field*********
To do so, first add a hidden field to the form, something like this:

		<input type="text" name="gotcha" class="gotcha" value="">

Then make sure the field is hidden via CSS:

		.gotcha { display: none; }

Lastly, in your contact-form processing script, check the value of $_POST['gotcha'] to make sure it is empty. Here is a basic example:

	<?php if (!empty($_POST['gotcha'])) die(); ?>

	
**********Check for duplicate data********
<?php $i = 0;
foreach ($_POST as $key => $val){
	if (stristr($val, 'http:')) $i++;
	if (stristr($val, 'https:')) $i++;
	if (stristr($val, '[url=')) $i++;
	if (stristr($val, '[url]')) $i++;
}
if ($i > 1) die(); ?>

******Strip HTML entities:*****
// Strip HTML entities
function strip_html_entities($str) {
	return preg_replace("/&[a-z0-9]{2,6}+;/i", '', $str);
}
if (stristr($str, '&'))) $str = strip_html_entities($str);


*********Check zip codes:*******
// Check zip codes
if ($_POST['zipcode']) {
	$check = strlen(trim(preg_replace("/[^[:digit:]]/", '', $_POST['zipcode'])));
	if ($check < 5) die();
}

**********Protect against header-injection attacks:********

// Protect against header injection attacks
function check_header_injection($fields) {
	$injection = false;
	for ($n = 0; $n < count($fields); $n++) {
		if (eregi("%0A", $fields[$n]) || eregi("%0D", $fields[$n]) || eregi("\r", $fields[$n]) || eregi("\n", $fields[$n])) {
			$injection = true;
		}
	}
	return $injection;
}
	
$from    = $_POST['from'];
$email   = $_POST['email'];
$subject = $_POST['subject'];

$result = check_header_injection(array($from, $email, $subject));

if ($result == true) die();


***********Spamless email links with PHP***********

<?php function email_link ($text, $to, $subject='', $body='') {
	global $page;
	$page->link('jquery.nospam.js');
	$page->jquery('$("a.nospam").nospam();');
	$link = 'mailto:' . rawurlencode($to);
	$params = array();
	$remove = array('&', '=', '?', '"');
	if (!empty($subject)) $params[] = 'subject=' . rawurlencode(str_replace($remove, '', $subject));
	if (!empty($body)) {
		$body = str_replace(array("\r\n", "\n", '<br />'), array("\n", '', '%0A'), nl2br($body));
		$params[] = 'body=' . rawurlencode(str_replace($remove, '', $body));
	}
	if (!empty($params)) $link .= '?' . implode('&', $params);
	$link = base64_encode($link);
	return '<a class="nospam" href="#" title="' . $link . '">' . $text . '</a>';
} ?>


*********Spamless email links with jQuery*********

function decode64 (input) {
	var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
	var output = "";
	var chr1, chr2, chr3, enc1, enc2, enc3, enc4 = "";
	var i = 0;
	input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
	while (i < input.length) {
		enc1 = keyStr.indexOf(input.charAt(i++));
		enc2 = keyStr.indexOf(input.charAt(i++));
		enc3 = keyStr.indexOf(input.charAt(i++));
		enc4 = keyStr.indexOf(input.charAt(i++));
		chr1 = (enc1 << 2) | (enc2 >> 4);
		chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
		chr3 = ((enc3 & 3) << 6) | enc4;
		output = output + String.fromCharCode(chr1);
		if (enc3 != 64) output = output + String.fromCharCode(chr2);
		if (enc4 != 64) output = output + String.fromCharCode(chr3);
		chr1 = chr2 = chr3 = enc1 = enc2 = enc3 = enc4 = "";
	}
	return unescape(output);
}
(function($) {
	$.fn.nospam = function(){
		return this.each(function(){
			var href = $(this).attr("href");
			var title = $(this).attr("title");
			$(this).hover(
				function(){ $(this).attr({"href":decode64(title), "title":"Click to send email"}); },
				function(){ $(this).attr({"href":"#", "title":title}); }
			);
		});
	};
})(jQuery);


*********Stop form spam with a hidden field*******
*****Step 1: HTML******

<label for="humans" class="humans">Human check: Leave this field empty</label>
<input type="text" name="humans" id="humans" class="humans" />

*********Step 2: CSS********


