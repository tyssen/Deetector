<html>
<head>
	<title>Detector Plugin Test</title>
	<script src="/themes/third_party/deetector/libraries/util/js-include/features.js.php?dynamic=true"></script>
	<script src="/themes/third_party/deetector/libraries/util/js-include/tests.js"></script>
</head>
<body>

	<h1>These values are output via the plugin</h1>

	{exp:deetector}
	<h2>Browser/OS</h2>
	user_agent = {user_agent} <br>
	hash = {hash} <br>
	family = {family} <br>
	major = {major} <br>
	minor = {minor} <br>
	browser_os = {browser_os} <br>
	browser = {browser} <br>
	browser_full = {browser_full} <br>
	os = {os} <br>
	os_major = {os_major} <br>
	os_minor = {os_minor} <br>
	os_full = {os_full} <br>
	os_version = {os_version} <br>
	core_version = {core_version} <br>
	window_height = {window_height} <br>
	window_width = {window_width} <br>
	colour_depth = {colour_depth} <br>

	<h2>Device</h2>
	device = {device} <br>
	device_major = {device_major} <br>
	device_minor = {device_minor} <br>
	device_full = {device_full} <br>
	device_version = {device_version} <br>
	hi_res_capable = {hi_res_capable} <br>

	<h2>Conditional variables</h2>
	is_mobile = {is_mobile} <br>
	is_computer = {is_computer} <br>
	is_ui_web_view = {is_ui_web_view} <br>
	is_mobile_device = {is_mobile_device} <br>
	is_tablet = {is_tablet} <br>
	is_spider = {is_spider} <br>

	<h2>Browser features</h2>
	<h3>CSS3</h3>
	fontface = {fontface} <br>
	backgroundsize = {backgroundsize} <br>
	borderimage = {borderimage} <br>
	borderradius = {borderradius} <br>
	boxshadow = {boxshadow} <br>
	flexbox = {flexbox} <br>
	hsla = {hsla} <br>
	multiplebgs = {multiplebgs} <br>
	opacity = {opacity} <br>
	rgba = {rgba} <br>
	textshadow = {textshadow} <br>
	cssanimations = {cssanimations} <br>
	csscolumns = {csscolumns} <br>
	generatedcontent = {generatedcontent} <br>
	cssgradients = {cssgradients} <br>
	cssreflections = {cssreflections} <br>
	csstransforms = {csstransforms} <br>
	csstransforms3d = {csstransforms3d} <br>
	csstransitions = {csstransitions} <br>
	overflowscrolling = {overflowscrolling} <br>
	bgrepeatround = {bgrepeatround} <br>
	bgrepeatspace = {bgrepeatspace} <br>
	bgsizecover = {bgsizecover} <br>
	boxsizing = {boxsizing} <br>
	cubicbezierrange = {cubicbezierrange} <br>
	cssremunit = {cssremunit} <br>
	cssresize = {cssresize} <br>
	cssscrollbar = {cssscrollbar}

	<h3>HTML5</h3>
	adownload = {adownload} <br>
	applicationcache = {applicationcache} <br>
	canvas = {canvas} <br>
	canvastext = {canvastext} <br>
	draganddrop = {draganddrop} <br>
	hashchange = {hashchange} <br>
	history = {history} <br>
	{!-- {audio} Commented out because causing errors <br> --}
	{!-- {video} Commented out because causing errors  <br> --}
	{indexeddb}
	{!-- {input}      Commented out because causing errors  <br> --}
	{!-- {inputtypes} Commented out because causing errors  <br> --}
	localstorage = {localstorage} <br>
	postmessage = {postmessage} <br>
	sessionstorage = {sessionstorage} <br>
	websockets = {websockets} <br>
	websqldatabase = {websqldatabase} <br>
	webworkers = {webworkers} <br>
	contenteditable = {contenteditable} <br>
	webaudio = {webaudio} <br>
	audiodata = {audiodata} <br>
	userselect = {userselect} <br>
	dataview = {dataview} <br>
	microdata = {microdata} <br>
	progressbar = {progressbar} <br>
	meter = {meter} <br>
	createelement = {createelement-attrs} <br>
	time = {time} <br>
	geolocation = {geolocation} <br>
	devicemotion = {devicemotion} <br>
	deviceorientation = {deviceorientation} <br>
	speechinput = {speechinput} <br>
	filereader = {filereader} <br>
	filesystem = {filesystem} <br>
	fullscreen = {fullscreen} <br>
	formvalidation = {formvalidation} <br>
	notification = {notification} <br>
	performance = {performance} <br>
	quotamanagement = {quotamanagement} <br>
	scriptasync = {scriptasync} <br>
	scriptdefer = {scriptdefer} <br>
	webintents = {webintents} <br>
	websocketsbinary = {websocketsbinary} <br>
	blobworkers = {blobworkers} <br>
	dataworkers = {dataworkers} <br>
	sharedworkers = {sharedworkers}

	<h3>Miscellaneous</h3>
	touch = {touch} <br>
	webgl = {webgl} <br>
	json = {json} <br>
	lowbattery = {lowbattery} <br>
	cookies = {cookies} <br>
	battery = {battery} <br>
	gamepad = {gamepad} <br>
	lowbandwidth = {lowbandwidth} <br>
	eventsource = {eventsource} <br>
	ie8compat = {ie8compat} <br>
	unicode = {unicode}
	{/exp:deetector}
</body>
</html>