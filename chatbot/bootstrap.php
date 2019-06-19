<?php	// MVC APP - http://template.avoidaudio/
//	site:	avoid.audio avoidaudio.net (and com)
//	by:		Aarnoud Meijer (info@avoidaudio.net)
//	dependency:	> php 5.4, PDO, phpmailer
//	framework:	see doc

namespace chatbot;

define('APPLICATION_PATH', realpath('../'));
define('DS', DIRECTORY_SEPARATOR);

// security check!
// if not devined WEBROOT_PATH
if(!defined('WEBROOT_PATH')) die();

error_reporting(E_ALL);

require '../vendor/autoload.php';
require 'model/FlexSampleRestaurant.php';

$chatbot = new model\FlexSampleRestaurant(); // ?

require 'model/database.php';
require 'config.php';
require 'controller/app.php';


/*
// config
// include('config.php');
$setting = require(dirname(__FILE__).DS.'config'.DS.'setting.php');

if($_SERVER['SERVER_NAME'] != $setting['debug_url']){					// --- LIVE MODE --- //
	error_reporting(0);													// Turn off all error reporting
}elseif($setting['devmode']!==false){									// --- DEBUG MODE --- //
	error_reporting(E_ALL); ini_set('display_errors','On');				// Report all PHP errors
//	ini_set('error_reporting', (version_compare(PHP_VERSION, '5.3.0', '<') ? E_ALL|E_STRICT : E_ALL));
}

*/

echo "test";
?>
