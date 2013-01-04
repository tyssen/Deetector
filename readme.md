# Deetector - ExpressionEngine device- and feature-detection add-on

An ExpressionEngine plugin of the [Detector library](http://detector.dmolsen.com/) - a simple, PHP- and javascript-based browser- and feature-detection library that can adapt to new devices & browsers on its own without the need to pull from a central database of browser information.

**Note:** Some of the variables listed below (indicated with comments) require a script to be added to the &lt;head> of your page which accesses the Detector library. Because of this, the Detector library is included in the third_party themes folder, rather than the third_party add-ons folder.

##Usage

Make sure the Detector directories user-agents/core/, user-agents/extended/, and config are writable by your web server. This is where profiles and configuration information are stored.

Add the {exp:deetector} tag pair anywhere in your template to gain access to its variables.

Some of the variables (indicated with comments below) require the following to be added to the &lt;head> of your page.

&lt;script src="/themes/third_party/deetector/libraries/util/js-include/features.js.php?dynamic=true">&lt;/script>
&lt;script src="/themes/third_party/deetector/libraries/util/js-include/tests.js">&lt;/script>

##Example

{exp:deetector}

{!--  Browser/OS  --}

* {user_agent}
* {hash}
* {family}
* {major}
* {minor}
* {browser_os}
* {browser}
* {browser_full}
* {os}
* {os_major}
* {os_minor}
* {os_full}
* {os_version}
* {core_version}
* {window_height} {!-- Requires per-request tests --}
* {window_width}  {!-- Requires per-request tests --}
* {colour_depth}  {!-- Requires per-request tests --}

{!--  Device  --}

* {device}
* {device_major}
* {device_minor}
* {device_full}
* {device_version}
* {hi_res_capable} {!-- Requires per-session tests --}

{!-- Conditional variables --}

* {is_mobile}
* {is_computer}
* {is_ui_web_view}
* {is_mobile_device}
* {is_tablet}
* {is_spider}

{!--  Browser features  --}

{!-- CSS3 --}

* {fontface}
* {backgroundsize}
* {borderimage}
* {borderradius}
* {boxshadow}
* {flexbox}
* {hsla}
* {multiplebgs}
* {opacity}
* {rgba}
* {textshadow}
* {cssanimations}
* {csscolumns}
* {generatedcontent}
* {cssgradients}
* {cssreflections}
* {csstransforms}
* {csstransforms3d}
* {csstransitions}
* {overflowscrolling}
* {bgrepeatround}
* {bgrepeatspace}
* {bgsizecover}
* {boxsizing}
* {cubicbezierrange}
* {cssremunit}
* {cssresize}
* {cssscrollbar}

{!-- HTML5 --}

* {adownload}
* {applicationcache}
* {canvas}
* {canvastext}
* {draganddrop}
* {hashchange}
* {history}
* {audio}
* {video}
* {indexeddb}
* {input}
* {inputtypes}
* {localstorage}
* {postmessage}
* {sessionstorage}
* {websockets}
* {websqldatabase}
* {webworkers}
* {contenteditable}
* {webaudio}
* {audiodata}
* {userselect}
* {dataview}
* {microdata}
* {progressbar}
* {meter}
* {createelement-attrs}
* {time}
* {geolocation}
* {devicemotion}
* {deviceorientation}
* {speechinput}
* {filereader}
* {filesystem}
* {fullscreen}
* {formvalidation}
* {notification}
* {performance}
* {quotamanagement}
* {scriptasync}
* {scriptdefer}
* {webintents}
* {websocketsbinary}
* {blobworkers}
* {dataworkers}
* {sharedworkers}

{!-- Miscellaneous --}

* {touch}
* {webgl}
* {json}
* {lowbattery}
* {cookies}
* {battery}
* {gamepad}
* {lowbandwidth}
* {eventsource}
* {ie8compat}
* {unicode}

{/exp:deetector}

A sample template is included so that you can quickly test the add-on.