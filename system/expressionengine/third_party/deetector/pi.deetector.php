<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Deetector Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		John Faulds ~ <enquiries@tyssendesign.com.au>
 * @link		http://www.tyssendesign.com.au
 * @license		http://creativecommons.org/licenses/by-sa/3.0/
 */

$plugin_info = array(
	'pi_name'        => 'Deetector',
	'pi_version'     => '1.0.0',
	'pi_author'      => 'John Faulds',
	'pi_author_url'  => 'https://github.com/tyssen/Deetector',
	'pi_description' => '<p>An ExpressionEngine plugin of the <a href="http://detector.dmolsen.com/">Detector library</a> - a simple, PHP- and JavaScript-based browser- and feature-detection library that can adapt to new devices & browsers on its own without the need to pull from a central database of browser information.</p><p><strong>Note:</strong> Some of the variables listed below (indicated with comments) require a script to be added to the &lt;head> of your page which accesses the Detector library. Because of this, the Detector library is included in the third_party themes folder, rather than the third_party add-ons folder.</p>',
	'pi_usage'       => Deetector::usage()
);


class Deetector {

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();

		include(PATH_THIRD_THEMES.'deetector/libraries/detector.php');

		// Save the local $ua variable so we can use it in other functions further down

		$this->ua = $ua;

		$tagdata = $this->EE->TMPL->tagdata;

		// Conditional device variables

		$is_mobile       = ($this->ua->isMobile        == 1) ? 'TRUE' : 'FALSE';
		$is_computer     = ($this->ua->isComputer      == 1) ? 'TRUE' : 'FALSE';
		$is_uIWebview    = ($this->ua->isUIWebview     == 1) ? 'TRUE' : 'FALSE';
		$is_mobileDevice = ($this->ua->isMobileDevice  == 1) ? 'TRUE' : 'FALSE';
		$is_tablet       = ($this->ua->isTablet        == 1) ? 'TRUE' : 'FALSE';
		$is_spider       = ($this->ua->isSpider        == 1) ? 'TRUE' : 'FALSE';

		// Browser features

		$css3_features = array('fontface','backgroundsize','borderimage','borderradius','boxshadow','flexbox','hsla','multiplebgs','opacity','rgba','textshadow','cssanimations','csscolumns','generatedcontent','cssgradients','cssreflections','csstransforms','csstransforms3d','csstransitions','overflowscrolling','bgrepeatround','bgrepeatspace','bgsizecover','boxsizing','cubicbezierrange','cssremunit','cssresize','cssscrollbar');
		$html5_features = array('adownload','applicationcache','canvas','canvastext','draganddrop','hashchange','history','indexeddb','localstorage','postmessage','sessionstorage','websockets','websqldatabase','webworkers','contenteditable','webaudio','audiodata','userselect','dataview','microdata','progressbar','meter','createelement-attrs','time','geolocation','devicemotion','deviceorientation','speechinput','filereader','filesystem','fullscreen','formvalidation','notification','performance','quotamanagement','scriptasync','scriptdefer','webintents','websocketsbinary','blobworkers','dataworkers','sharedworkers','audio','video','input','inputtypes');
		// $features_causing_errors = array('audio','video','input','inputtypes'); // Object of class stdClass could not be converted to int
		$misc_features = array('touch','webgl','json','lowbattery','cookies','battery','gamepad','lowbandwidth','eventsource','ie8compat','unicode');
		$features = array_merge($css3_features, $html5_features, $misc_features);

		foreach($features as $feature)
		{
			$$feature = ($this->ua->$feature == 1) ? 'TRUE' : 'FALSE';
		}

		foreach($features as $feature)
		{
			$feature_variables[$feature] = $$feature;
		}

		// Variables that might not exist so need to check first

		$check_array = array('device','devicemajor','deviceminor','devicefull','deviceversion','hirescapable');

		foreach($check_array as $check)
		{
			$$check = '';
			if(isset($this->ua->$check))
			{
				$$check = $this->ua->$check;
			}
		}

		$windowHeight = $windowWidth = $colorDepth = '';
		if(isset($this->ua->screenattributes))
		{
			$windowHeight = $this->ua->screenattributes->windowHeight;
			$windowWidth  = $this->ua->screenattributes->windowWidth;
			$colorDepth   = $this->ua->screenattributes->colorDepth;
		}

		// Browser, device and OS variables

		$parser_variables = array(
			'user_agent'        => $this->ua->ua,
			'hash'              => $this->ua->uaHash,
			'family'            => $this->ua->family,
			'major'             => $this->ua->major,
			'minor'             => $this->ua->minor,
			'browser_os'        => $this->ua->full,
			'browser_full'      => $this->ua->browserFull,
			'browser'           => $this->ua->browser,
			'os'                => $this->ua->os,
			'os_major'          => $this->ua->osMajor,
			'os_minor'          => $this->ua->osMinor,
			'os_full'           => $this->ua->osFull,
			'os_version'        => $this->ua->osVersion,
			'core_version'      => $this->ua->coreVersion,
			'device'            => $device,
			'device_major'      => $devicemajor,
			'device_minor'      => $deviceminor,
			'device_full'       => $devicefull,
			'device_version'    => $deviceversion,
			'hi_res_capable'    => $hirescapable,  // Requires per-session tests
			'window_height'     => $windowHeight,  // Requires per-request tests
			'window_width'      => $windowWidth,   // Requires per-request tests
			'colour_depth'      => $colorDepth,    // Requires per-request tests
			'is_mobile'         => $is_mobile,
			'is_computer'       => $is_computer,
			'is_ui_web_view'    => $is_uIWebview,
			'is_mobile_device'  => $is_mobileDevice,
			'is_tablet'         => $is_tablet,
			'is_spider'         => $is_spider
		);

		// Variable arrays merged

		$variables = array_merge($parser_variables, $feature_variables);

		$this->return_data = $this->EE->TMPL->parse_variables_row($tagdata, $variables);
	}

	// ----------------------------------------------------------------

	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>

Make sure the Detector directories user-agents/core/, user-agents/extended/, and config are writable by your web server. This is where profiles &amp; configuration information are stored.

Add the {exp:deetector} tag pair anywhere in your template to gain access to its variables.

Some of the variables (indicated with comments below) require the following to be added to the &lt;head> of your page.

&lt;script src="/themes/third_party/deetector/libraries/util/js-include/features.js.php?dynamic=true">&lt;/script>
&lt;script src="/themes/third_party/deetector/libraries/util/js-include/tests.js">&lt;/script>

Because of this, the Detector library is included in the third_party themes folder, rather than the third_party add-ons folder.

Example:

{exp:deetector}

{!--  Browser/OS  --}

{user_agent}
{hash}
{family}
{major}
{minor}
{browser_os}
{browser}
{browser_full}
{os}
{os_major}
{os_minor}
{os_full}
{os_version}
{core_version}
{window_height} {!-- Requires per-request tests --}
{window_width}  {!-- Requires per-request tests --}
{colour_depth}  {!-- Requires per-request tests --}

{!--  Device  --}

{device}
{device_major}
{device_minor}
{device_full}
{device_version}
{hi_res_capable} {!-- Requires per-session tests --}

{!-- Conditional variables --}

{is_mobile}
{is_computer}
{is_ui_web_view}
{is_mobile_device}
{is_tablet}
{is_spider}

{!--  Browser features  --}

{!-- CSS3 --}

{fontface}
{backgroundsize}
{borderimage}
{borderradius}
{boxshadow}
{flexbox}
{hsla}
{multiplebgs}
{opacity}
{rgba}
{textshadow}
{cssanimations}
{csscolumns}
{generatedcontent}
{cssgradients}
{cssreflections}
{csstransforms}
{csstransforms3d}
{csstransitions}
{overflowscrolling}
{bgrepeatround}
{bgrepeatspace}
{bgsizecover}
{boxsizing}
{cubicbezierrange}
{cssremunit}
{cssresize}
{cssscrollbar}

{!-- HTML5 --}

{adownload}
{applicationcache}
{canvas}
{canvastext}
{draganddrop}
{hashchange}
{history}
{audio}
{video}
{indexeddb}
{input}
{inputtypes}
{localstorage}
{postmessage}
{sessionstorage}
{websockets}
{websqldatabase}
{webworkers}
{contenteditable}
{webaudio}
{audiodata}
{userselect}
{dataview}
{microdata}
{progressbar}
{meter}
{createelement-attrs}
{time}
{geolocation}
{devicemotion}
{deviceorientation}
{speechinput}
{filereader}
{filesystem}
{fullscreen}
{formvalidation}
{notification}
{performance}
{quotamanagement}
{scriptasync}
{scriptdefer}
{webintents}
{websocketsbinary}
{blobworkers}
{dataworkers}
{sharedworkers}

{!-- Miscellaneous --}

{touch}
{webgl}
{json}
{lowbattery}
{cookies}
{battery}
{gamepad}
{lowbandwidth}
{eventsource}
{ie8compat}
{unicode}

{/exp:deetector}
<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.deetector.php */
/* Location: /system/expressionengine/third_party/deetector/pi.deetector.php */