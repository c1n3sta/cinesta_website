<?php
/**
* Plugin: jQuery AJAX-ZOOM, zoomInc.inc.php
* Copyright: Copyright (c) 2010-2016 Vadim Jacobi
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 4.3.18
* Date: 2016-09-25
* Review: 2016-09-25
* URL: http://www.ajax-zoom.com
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
*/
if(!session_id()){session_start();}

// Fixes for some servers
function axZmFixes(){
	$docRootSave = '';

	if (isset($_SERVER['DOCUMENT_ROOT'])){
		$docRootSave = $_SERVER['DOCUMENT_ROOT'];
	}

	unset($_SERVER['DOCUMENT_ROOT']);

	if(isset($_SERVER['SCRIPT_FILENAME'])){
		$_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0 - strlen(isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['PHP_SELF'])));
	}

	if(!isset($_SERVER['DOCUMENT_ROOT'])){ 
		if(isset($_SERVER['PATH_TRANSLATED'])){
			$_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr($_SERVER['PATH_TRANSLATED'], 0, 0 - strlen(isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['PHP_SELF'])));
		} 
	}

	if(!isset($_SERVER['DOCUMENT_ROOT']) && $docRootSave){
		$_SERVER['DOCUMENT_ROOT'] = $docRootSave; 
	}

	if (isset($_SERVER['DOCUMENT_ROOT'])){
		$_SERVER['DOCUMENT_ROOT'] = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
		if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/'){
			$_SERVER['DOCUMENT_ROOT'] = substr($_SERVER['DOCUMENT_ROOT'], 0, -1);
		}
	}
}

function getIonCubeVersion(){
	if (function_exists('ioncube_loader_iversion')){
		$liv = ioncube_loader_iversion();
		$lv = sprintf("%d.%d.%d", $liv / 10000, ($liv / 100) % 100, $liv % 100);
		return $lv;
	} else {
		return '';
	}
}

axZmFixes();

// Temporal fix, we will bring multibyte support for filenames in the future.
if (!function_exists('mb_strlen')){function mb_strlen($a){return strlen($a);}};

// Javascript Packer Class (needed)
require (dirname(__FILE__).'/classes/axZm.packer.class.php');

if (defined('PHALANGER') || file_exists(dirname(__FILE__).'/axZm.class.php')){
	// ASP.NET implementation with Phalanger
	// File axZm.class.php is not physically present!
	include ('axZm.class.php');
} else {
	$aZ_extensions = get_loaded_extensions();
	$aZ_sourceGuardian = false;
	$aZ_ionCube = false;

	foreach ($aZ_extensions as $k=>$v){
		if (stristr($v, 'ioncube')){$aZ_ionCube = true;}
		elseif (stristr($v, 'sourceguardian')){$aZ_sourceGuardian = true;}
	}

	if ($aZ_ionCube){
		$ioncube_version = getIonCubeVersion();
		if (version_compare(PHP_VERSION, '5.6.0') >= 0 && version_compare($ioncube_version, '5.0') >= 0){
			require ('axZm.class.ioncube.9.php');
		} elseif (version_compare($ioncube_version, '4.4') >= 0){
			require ('axZm.class.ioncube.8.php');
		} else {
			die('Ioncube loader version ('.$ioncube_version.') installed on this server is too old; you need at least 4.4 to run AJAX-ZOOM.');
		}
	} elseif ($aZ_sourceGuardian || function_exists('sg_load')){
		$matchesMAC = glob(dirname(__FILE__).'/axZm.class.ixed.*.php');
		if ($matchesMAC[0]){
			require ($matchesMAC[0]);
		}else{
			require ('axZm.class.ixed.php');
		}
	} else {
		require ('axZm.class.ioncube.8.php');
	}
}

// Init axZm class
$axZm = new axZm();

// Helper class axZmH
// This class is opensource, you can edit it if you know, what you are doing
// Watch inside for methods and comments
require ('axZmH.class.php');
$axZmH = new axZmH($axZm);
$axzmh = &$axZmH;

// Include configuration file
require_once ('zoomConfig.inc.php');

// Include the file wich defines pictures 
if (!isset($noObjectsInclude)){
	require_once ('zoomObjects.inc.php');
}
?>