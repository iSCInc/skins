<?php
/**
 * Panorama skin
 * A skin based on iSC Inc.'s first redesign, introduced in February 18, 2015.
 *
 * @file
 * @ingroup Skins
 * @version v1.0 (2015-02-18)
 * @author iSC Inc. team
 * @author Suriyaa Sundararuban <suriyaa@inc.isc>
 * @date 22 February 2015
 * @license MIT License
 *
 * To install place the panorama folder (the folder containing this file!) into
 * skins/ and add this line to your wiki's LocalSettings.php:
 * require_once("$IP/skins/panorama/panorama.php");
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This is not a valid entry point to MediaWiki.' );
}

// Skin credits that will show up on Special:Version
$wgExtensionCredits['skin'][] = array(
	'path' => __FILE__,
	'name' => 'panorama',
	'version' => '1.0',
	'author' => array( 'iSC Inc.', 'Suriyaa Kudo' ),
	// @todo To be moved into the i18n file eventually once i18n is stable enough.
	// No need to cause translators unnecessary extra work before I finalize
	// the description. (Suggestions for a better desc? Let me know!)
	'description' => 'A iSC Inc. redesigned skin.',
	'url' => 'https://inc.isc/skins/Panorama',
);

// The first instance must be strtolower()ed so that useskin=panorama works and
// so that it does *not* force an initial capital (i.e. we do NOT want
// useskin=Panorama) and the second instance is used to determine the name of
// *this* file.
$wgValidSkinNames['panorama'] = 'Panorama';

// Autoload the skin class, make it a valid skin, set up i18n, set up CSS & JS
// (via ResourceLoader)
$wgAutoloadClasses['SkinPanorama'] = __DIR__ . '/panorama.skin.php';
$wgExtensionMessagesFiles['SkinPanorama'] = __DIR__ . '/panorama.i18n.php';
$wgMessagesDirs['SkinPanorama'] = __DIR__ . '/i18n';

// Main CSS ResourceLoader module
$wgResourceModules['skins.panorama'] = array(
	'styles' => array(
		// MonoBook also loads these
		#'skins/common/commonElements.css' => array( 'media' => 'screen' ),
		#'skins/common/commonContent.css' => array( 'media' => 'screen' ),
		'skins/common/commonInterface.css' => array( 'media' => 'screen' ),
		// Styles custom to this skin
		'skins/panorama/resources/css/nonarticle.css' => array( 'media' => 'screen' ),
		'skins/panorama/resources/css/searchresults.css' => array( 'media' => 'screen' ),
		'skins/panorama/resources/css/special.css' => array( 'media' => 'screen' ),
		'skins/panorama/resources/css/printable.css' => array( 'media' => 'print' ),
		#'skins/panorama/resources/css/iphone.css' => array( 'media' => 'only screen and (max-device-width: 480px)' ),
	),
	'position' => 'top'
);

// zzz prefix is a hack to ensure that this module is loaded after the main
// skins.bluesky module
$wgResourceModules['zzzskins.panorama.mainpage'] = array(
	'styles' => array(
		'skins/panorama/resources/css/home.css' => array( 'media' => 'screen' ),
	),
	'position' => 'top'
);

$wgResourceModules['skins.panorama.externallinks.123'] = array(
	'styles' => array(
		'skins/panorama/resources/css/externallinks-123.css' => array( 'media' => 'screen' ),
	),
	'position' => 'top'
);

$wgResourceModules['skins.panorama.externallinks.124'] = array(
	'styles' => array(
		'skins/panorama/resources/css/externallinks-124.css' => array( 'media' => 'screen' ),
	),
	'position' => 'top'
);

// LESS versions of things that used to be PHP-side core hacks
$wgResourceModules['skins.panorama.hacks.general'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/general.less',
	'position' => 'top'
);

// Action-specific LESS hacks
$wgResourceModules['skins.panorama.hacks.action.delete'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.action.delete.less',
	'position' => 'top'
);

$wgResourceModules['skins.panorama.hacks.action.edit'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.action.edit.less',
	'position' => 'top'
);

$wgResourceModules['skins.panorama.hacks.action.history'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.action.history.less',
	'position' => 'top'
);

$wgResourceModules['skins.panorama.hacks.action.protect'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.action.protect.less',
	'position' => 'top'
);

// Namespace-specific LESS hacks
$wgResourceModules['skins.panorama.hacks.filepage'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.filepage.less',
	'position' => 'top'
);

// (Special) page-specific LESS hacks
$wgResourceModules['skins.panorama.hacks.special.log'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.special.log.less',
	'position' => 'top'
);

$wgResourceModules['skins.panorama.hacks.special.movepage'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.special.movepage.less',
	'position' => 'top'
);

$wgResourceModules['skins.panorama.hacks.special.recentchanges'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.special.recentchanges.less',
	'position' => 'top'
);

$wgResourceModules['skins.panorama.hacks.special.undelete'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.special.undelete.less',
	'position' => 'top'
);

$wgResourceModules['skins.panorama.hacks.special.watchlist'] = array(
	'styles' => 'skins/panorama/resources/css/hacks/mediawiki.special.watchlist.less',
	'position' => 'top'
);

// Themes
// The 'themeloader.' prefix is a hack around https://bugzilla.wikimedia.org/show_bug.cgi?id=66508
$wgResourceModules['themeloader.skins.panorama.blue'] = array(
	'styles' => array(
		'skins/panorama/resources/css/theme/blue.less' => array( 'media' => 'screen' )
	),
	'position' => 'top'
);

$wgResourceModules['themeloader.skins.panorama.green'] = array(
	'styles' => array(
		'skins/panorama/resources/css/theme/green.less' => array( 'media' => 'screen' )
	),
	'position' => 'top'
);

$wgResourceModules['themeloader.skins.panorama.grey'] = array(
	'styles' => array(
		'skins/panorama/resources/css/theme/grey.less' => array( 'media' => 'screen' )
	),
	'position' => 'top'
);

$wgResourceModules['themeloader.skins.panorama.red'] = array(
	'styles' => array(
		'skins/panorama/resources/css/theme/red.less' => array( 'media' => 'screen' )
	),
	'position' => 'top'
);

$wgResourceModules['themeloader.skins.panorama.white'] = array(
	'styles' => array(
		'skins/panorama/resources/css/theme/white.less' => array( 'media' => 'screen' )
	),
	'position' => 'top'
);

$wgResourceModules['skins.panorama.js.easing'] = array(
	'scripts' => 'skins/panorama/resources/js/jquery.easing.js',
	'position' => 'top'
);

// Main JS module for this skin
$wgResourceModules['skins.panorama.js'] = array(
	'scripts' => array(
		// not ready yet
		#'skins/panorama/resources/js/social.js',
		'skins/panorama/resources/js/panorama.js',
	),
	'messages' => array(
		'navlist_collapse', 'navlist_expand',
		'userlogin-yourname-ph', 'userlogin-yourpassword-ph',
		'panorama-js-no-thanks'
	),
	'dependencies' => array(
		'jquery.client',
		'skins.panorama.js.easing',
		// for the e-mail to a friend stuff (well, at least as long as it's
		// there...)
		'jquery.ui.dialog'
	)
);

/**
 * Additional junk for the page head element.
 */
$wgHooks['OutputPageParserOutput'][] = 'wfTOCCrap';

$wgHooks['BeforePageDisplay'][] = function( OutputPage &$out, &$skin ) {
	//global $wgRequest, $wgUser;

	// Hooks are global, but we want these things *only* for this skin.
	if ( get_class( $skin ) !== 'SkinPanorama' ) {
		return true;
	}

	/*
	$action = $wgRequest->getVal( 'action', 'view' );
	$isMainPage = $out->getTitle()->isMainPage();
	$isArticlePage = $out->getTitle() &&
			!$isMainPage &&
			$out->getTitle()->getNamespace() == NS_MAIN &&
			$action == 'view';
	*/

	$out->addMeta( 'http:content-type', 'text/html; charset=UTF-8' );

	/*
	if ( $isArticlePage || $isMainPage ) {
		global $wgLanguageCode;

		if ( $wgLanguageCode != 'en' ) {
			$mobileLang = $wgLanguageCode . '.';
		} else {
			$mobileLang = '';
		}

		$out->addLink( array(
			'rel' => 'alternate',
			'media' => 'only screen and (max-width: 640px)',
			'href' => 'http://' . $mobileLang . 'm.inc.isc/' . $out->getTitle()->getPartialURL()
		) );
	}

	$out->setCanonicalUrl( $out->getTitle()->getFullURL() );
	$out->addLink( array(
		'href' => 'https://inc.isc',
		'rel' => 'publisher'
	) );

	$out->addLink( array(
		'rel' => 'alternate',
		'type' => 'application/rss+xml',
		'title' => 'iSC Inc: Be Updated!',
		'href' => 'http://inc.isc/feed.rss'
	) );

	$out->addLink( array(
		'rel' => 'apple-touch-icon',
		'href' => $wgStylePath . '/BlueSky/images/safari-large-icon.png'
	) );

	echo $out->getHeadItems();
	*/

	return true;
};

/**
 * TOC processing
 * Shamelessly stolen from brickimedia's refreshed skin
 * Currently: https://github.com/Brickimedia/Refreshed/blob/master/Refreshed.skin.php#L72
 */
$panoramaTOC = '';

function wfTOCCrap( OutputPage &$out, ParserOutput $parseroutput ) {
	global $panoramaTOC;
	$panoramaTOC = $parseroutput->mSections;

	return true;
}
