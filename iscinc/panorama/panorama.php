<?php
/**
 * Panorama skin
 * A skin based on iSC Inc.'s first redesign, introduced in February 18, 2015.
 *
 * @file
 * @ingroup Skins
 * @version v1.0 (2015-02-18)
 * @author iSC Inc. team
 * @author Suriyaa Sundararuban <suriyaa@inc.isc>  (http://www.mediawiki.org/wiki/User:Suriyaa_Kudo)
 * @date 22 February 2015
 * @license WOCPL-01+ License (https://gist.github.com/SuriyaaKudoIsc/d93e8f709e911805da92)
 *
 * To install place the panorama folder (the folder containing this file!) into
 * skins/ and add this line to your wiki's LocalSettings.php:
 * require_once("$IP/skins/panorama/panorama.php");
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This is an extension to the MediaWiki package and cannot be run standalone.' );
}
 
// Skin credits that will show up on Special:Version
$wgExtensionCredits['skin'][] = array(
	'path' => __FILE__,
	'name' => 'panorama', // name as shown under [[Special:Version]]
	'namemsg' => 'skinname-panorama', // used since MW 1.24, see the section on "Localisation messages" below
	'version' => '1.0',
	'url' => 'https://skins.inc.isc/panorama',
	'author' => array( '[https://inc.isc iSC Inc.]', '[https://mediawiki.org/wiki/User:Suriyaa_Kudo Suriyaa Sundararuban]' ),
	'descriptionmsg' => 'panorama-desc', // see the section on "Localisation messages" below
	'license' => 'WOCPL-01+',
);
$wgValidSkinNames['panorama'] = 'panorama'; 
$wgAutoloadClasses['Skinpanorama'] = __DIR__.'/panorama.skin.php';
$wgMessagesDirs['panorama'] = __DIR__.'/i18n';
$wgResourceModules['skins.panorama'] = array(
	'styles' => array(
		'panorama/resources/normalize/normalize.css',
		'panorama/resources/bootstrap/dist/css/bootstrap.min.css',
		'panorama/resources/font-awesome/css/font-awesome.min.css',
		'panorama/resources/panorama.css' => array( 'media' => 'screen' ),
		'panorama/resources/print.css' => array( 'media' => 'print' ),
	),
    'remoteBasePath' => &$GLOBALS['wgStylePath'],
    'localBasePath'  => &$GLOBALS['wgStyleDirectory']
);
$wgResourceModules['skins.panorama.js'] = array(
	'scripts' => array(
		'panorama/resources/bootstrap/dist/js/bootstrap.min.js',
		'panorama/resources/panorama.js',
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);
