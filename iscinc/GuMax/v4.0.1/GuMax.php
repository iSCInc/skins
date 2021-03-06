<?php
/*
 * ----------------------------------------------------------------------------
 * 'GuMax' style sheet for CSS2-capable browsers.
 *       Loosely based on the monobook style
 *
 * @Version 4.0.1
 * @Author Paul Y. Gu, <gu.paul@gmail.com>
 * @Copyright paulgu.com 2007 - http://www.paulgu.com/
 * @License: GPL (http://www.gnu.org/copyleft/gpl.html)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 * http://www.gnu.org/copyleft/gpl.html
 * ----------------------------------------------------------------------------
 */

if( !defined( 'MEDIAWIKI' ) )
    die( -1 );

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @addtogroup Skins
 */
class SkinGuMax extends SkinTemplate {
	/** Using GuMax */
	function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$this->skinname  = 'gumax';
		$this->stylename = 'gumax';
		$this->template  = 'GuMaxTemplate';

	}

	function setupSkinUserCss( OutputPage $out ) {
		global $wgHandheldStyle;

		parent::setupSkinUserCss( $out );

		// Append to the default screen common & print styles...
		$out->addStyle( 'gumax/gumax_main.css', 'screen' );
		if( $wgHandheldStyle ) {
			// Currently in testing... try 'chick/main.css'
			$out->addStyle( $wgHandheldStyle, 'handheld' );
		}

		$out->addStyle( 'gumax/IE50Fixes.css', 'screen', 'lt IE 5.5000' );
		$out->addStyle( 'gumax/IE55Fixes.css', 'screen', 'IE 5.5000' );
		$out->addStyle( 'gumax/IE60Fixes.css', 'screen', 'IE 6' );
		$out->addStyle( 'gumax/IE70Fixes.css', 'screen', 'IE 7' );

		$out->addStyle( 'gumax/gumax_rtl.css', 'screen', '', 'rtl' );

		$out->addStyle( 'gumax/gumax_print.css', 'print' );
	}
}

/**
 * @todo document
 * @addtogroup Skins
 */
class GuMaxTemplate extends QuickTemplate {
	var $skin;
	/**
	 * Template filter callback for GuMax skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
    function execute() {
		global $wgRequest;
		$this->skin = $skin = $this->data['skin'];
		$action = $wgRequest->getText( 'action' );


		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="<?php $this->text('xhtmldefaultnamespace') ?>" <?php
	foreach($this->data['xhtmlnamespaces'] as $tag => $ns) {
		?>xmlns:<?php echo "{$tag}=\"{$ns}\" ";
	} ?>xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
	<head>
		<meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
		<?php $this->html('headlinks') ?>
		<title><?php $this->text('pagetitle') ?></title>
		<?php $this->html('csslinks') ?>

		<!--[if lt IE 7]><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"></script>
		<meta http-equiv="imagetoolbar" content="no" /><![endif]-->

		<?php print Skin::makeGlobalVariablesScript( $this->data ); ?>

		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/common/wikibits.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"><!-- wikibits js --></script>
		<!-- Head Scripts -->
<?php $this->html('headscripts') ?>
<?php	if($this->data['jsvarurl']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl') ?>"><!-- site js --></script>
<?php	} ?>
<?php	if($this->data['pagecss']) { ?>
		<style type="text/css"><?php $this->html('pagecss') ?></style>
<?php	}
		if($this->data['usercss']) { ?>
		<style type="text/css"><?php $this->html('usercss') ?></style>
<?php	}
		if($this->data['userjs']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs' ) ?>"></script>
<?php	}
		if($this->data['userjsprev']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>"><?php $this->html('userjsprev') ?></script>
<?php	}
		if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>


		<!-- gumax customized style -->

		<?php if( !$this->data['loggedin'] ) { ?>
			<style type="text/css">
				#gumax-content-actions li#ca-talk,
				#gumax-content-actions li#ca-history,
				#gumax-content-actions li#ca-edit,
				#gumax-personal-tools
				{ display: none; }
			</style>
		<?php } ?>

		<!--[if lt IE 7]>
			<script type="text/javascript" src="<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/js/ieunitpngfix-tag.js"></script>
		<![endif]-->

		<!-- end of gumax customized style -->
</head>


<body<?php if($this->data['body_ondblclick']) { ?> ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
<?php if($this->data['body_onload']) { ?> onload="<?php $this->text('body_onload') ?>"<?php } ?>
 class="mediawiki <?php $this->text('dir') ?> <?php $this->text('pageclass') ?> <?php $this->text('skinnameclass') ?>">

<!-- ##### gumax-wrapper ##### -->
<div id="gumax-wrapper">

<table border="0" id="gumax-page-table"><tr><td id="gumax-page-table-left"><img src="<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/blank.gif" alt="" /></td><td width="100%" valign="top" style="padding: 0; margin: 0" id="gumax-page-table-content">


<!-- ===== gumax-page ===== -->
<div class="gumax-page">

	<!-- ///// gumax-header ///// -->
	<div id="gumax-header">
		<a name="top" id="contentTop"></a>

	<?php $this->loginBox(); ?>
	<?php $this->logoBox(); ?>
	<?php $this->searchBox(); ?>

	</div>
	<!-- ///// end of gumax-header ///// -->
	<div class="visualClear"></div>


	<?php $this->topNavigationBox(); ?>
	<div class="gumax-p-navigation-spacer"></div>


	<?php $this->articlePictureBox(); ?>

	<?php $this->contentActionBox(); ?>

	<?php $this->siteContent(); ?>


	<!-- ///// gumax-footer ///// -->
	<div id="gumax-footer">

		<?php $this->toolBox(); ?>

		<div class="gumax-footer-spacer"></div>

		<?php $this->footerBox(); ?>

	</div>
	<!-- ///// end of gumax-footer ///// -->


</div>
<!-- ===== end of gumax-page ===== -->

	</td><td id="gumax-page-table-right"><img src="<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/blank.gif" alt="" /></td></tr></table>
	<!--[if lt IE 7]>
		<script type="text/javascript">pngfix('td');</script>
	<![endif]-->

</div>
<!-- ##### end of gumax-wrapper ##### -->


<?php $this->html('bottomscripts'); /* JS call to runBodyOnloadHook */ ?>
<?php $this->html('reporttime') ?>
<?php if ( $this->data['debug'] ): ?>
<!-- Debug output:
<?php $this->text( 'debug' ); ?>

-->
<?php endif; ?>
</body></html>





<?php
	wfRestoreWarnings();
	} // end of execute() method


	/*************************************************************************************************/
	// GuMax Functions
	/*************************************************************************************************/

	function loginBox() {
?>
	<!-- Login -->
	<div id="gumax-p-login">
		<ul>
<?php		$lastkey = end(array_keys($this->data['personal_urls'])) ?>
<?php		foreach($this->data['personal_urls'] as $key => $item) { ?>
				<li id="pt-<?php echo Sanitizer::escapeId($key) ?>"<?php
					if ($item['active']) { ?> class="active"<?php } ?>><a href="<?php
					echo htmlspecialchars($item['href']) ?>"<?php echo $this->skin->tooltipAndAccesskey('pt-'.$key) ?><?php
					if(!empty($item['class'])) { ?> class="<?php
					echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
					echo htmlspecialchars($item['text']) ?></a></li>
<?php				if($key != $lastkey) echo "<li>&#47;</li>" ?>
<?php		} ?>
		</ul>
	</div>
	<!-- end of Login -->
<?php
	}

	/*************************************************************************************************/
	function logoBox() {
?>
	<!-- gumax-p-logo -->
	<div id="gumax-p-logo">
		<div id="p-logo">
			<a style="background-image: url(<?php $this->text('logopath') ?>);" <?php
				?>href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>" <?php
				?>title="<?php $this->msg('mainpage') ?>"></a>
		</div>
	</div>
	<script type="<?php $this->text('jsmimetype') ?>"> if (window.isMSIE55) fixalpha(); </script>
	<!-- end of gumax-p-logo -->
<?php
	}

	/*************************************************************************************************/
	function searchBox() {
?>
	<!-- Search -->
	<div id="gumax-p-search" class="gumax-portlet">
		<h5><label for="searchInput"><?php $this->msg('search') ?></label></h5>
		<div id="gumax-searchBody" class="gumax-pBody">
			<form action="<?php $this->text('searchaction') ?>" id="searchform"><div>
				<input id="searchInput" name="search" type="text" <?php
					if($this->haveMsg('accesskey-search')) {
						?>accesskey="<?php $this->msg('accesskey-search') ?>"<?php }
					if( isset( $this->data['search'] ) ) {
						?> value="<?php $this->text('search') ?>"<?php } ?> />
				<input type='submit' name="go" class="searchButton" id="searchGoButton" value="<?php $this->msg('searcharticle') ?>"<?php echo $this->skin->tooltipAndAccesskey( 'search-go' ); ?> />
				<input type='submit' name="fulltext" class="searchButton" id="mw-searchButton" value="<?php $this->msg('searchbutton') ?>"<?php echo $this->skin->tooltipAndAccesskey( 'search-fulltext' ); ?> />
			</div></form>
		</div>
	</div>
	<!-- end of Search -->
<?php
	}

	/*************************************************************************************************/
	function topNavigationBox() {
?>
	<!-- Navigation Menu -->
	<div id="gumax-p-navigation">
<?php	$counter = 0; ?>
<?php	foreach ($this->data['sidebar'] as $bar => $cont) { ?>
<?php		$counter++; ?>
			<div class="gumax-portlet gumax-p-navigation">
				<h5><?php $out = wfMsg( $bar ); if (wfEmptyMsg($bar, $out)) echo $bar; else echo $out; ?></h5>
<?php			if ( is_array( $cont ) ) { ?>
<?php				if ( $counter == 1 ) { ?>
						<ul>
<?php						foreach($cont as $key => $val) { ?>
								<li id="<?php echo Sanitizer::escapeId($val['id']) ?>"<?php
									if ( $val['active'] ) { ?> class="active" <?php }
								?>><a href="<?php echo htmlspecialchars($val['href']) ?>"<?php echo $this->skin->tooltipAndAccesskey($val['id']) ?>><?php echo htmlspecialchars($val['text']) ?></a></li>
<?php						} ?>
						</ul>
<?php				} ?>
<?php			} else {
					# allow raw HTML block to be defined by extensions
					print $cont;
				} ?>
			</div>
<?php	} ?>
	</div>
	<!-- end of Navigation Menu -->
<?php
	}

	/*************************************************************************************************/
	function languageBox() {
		if( $this->data['language_urls'] ) {
?>
	<div id="p-lang" class="portlet">
		<h5><?php $this->msg('otherlanguages') ?></h5>
		<div class="pBody">
			<ul>
<?php		foreach($this->data['language_urls'] as $langlink) { ?>
				<li class="<?php echo htmlspecialchars($langlink['class'])?>"><?php
				?><a href="<?php echo htmlspecialchars($langlink['href']) ?>"><?php echo $langlink['text'] ?></a></li>
<?php		} ?>
			</ul>
		</div>
	</div>
<?php
		}
	}

	/*************************************************************************************************/
	function contentActionBox() {
		global $wgUser;
		$skin = $wgUser->getSkin();
?>
	<!-- gumax-content-actions -->
	<?php //if($this->data['loggedin']==1) { ?>
	<div id="gumax-content-actions">
		<ul>
<?php		foreach($this->data['content_actions'] as $key => $tab) {
				echo '
			 <li id="ca-' . Sanitizer::escapeId($key).'"';
				if( $tab['class'] ) {
					echo ' class="'.htmlspecialchars($tab['class']).'"';
				}
				echo'><a href="'.htmlspecialchars($tab['href']).'"';
				# We don't want to give the watch tab an accesskey if the
				# page is being edited, because that conflicts with the
				# accesskey on the watch checkbox.  We also don't want to
				# give the edit tab an accesskey, because that's fairly su-
				# perfluous and conflicts with an accesskey (Ctrl-E) often
				# used for editing in Safari.
				if( in_array( $action, array( 'edit', 'submit' ) )
				&& in_array( $key, array( 'edit', 'watch', 'unwatch' ))) {
					echo $skin->tooltip( "ca-$key" );
				} else {
					echo $skin->tooltipAndAccesskey( "ca-$key" );
				}
				echo '>'.htmlspecialchars($tab['text']).'</a></li>';
			} ?>
		</ul>
		<div class="gumax-message"><?php $s1 = $this->gumaxLastModified(); $s2 = $this->gumaxViewcount() == '' ? '' : " &#8226;&#8226;&#8226; " . $this->gumaxViewcount(); echo $s1 . $s2; ?></div>
	</div>
	<?php //} ?>
	<!-- end of gumax-content-actions -->
<?php
	}

	/*************************************************************************************************/
	function articlePictureBox() {
?>
<?php
		$pageClasses = preg_split("/[\s]+/", $this->data['pageclass']);
		$page_class = end( $pageClasses );  //echo end( $pageClasses );
		$file_ext_collection = array('.jpg', '.gif', '.png');
		$found = false;
		foreach ($file_ext_collection as $file_ext)
		{
			$gumax_article_picture_file = $this->data['stylepath'] . '/' . $this->data['stylename'] . '/images/pages/' . $page_class . $file_ext;
			if (file_exists( $_SERVER['DOCUMENT_ROOT'] . '/' .$gumax_article_picture_file)) {
				$found = true;
				break;
			}
		}
		// default article picture
		if(!$found) {
			$gumax_article_picture_file = $this->data['stylepath'] . '/' . $this->data['stylename'] . '/images/pages/' . 'page-Default.gif';
			if (file_exists( $_SERVER['DOCUMENT_ROOT'] . '/' .$gumax_article_picture_file)) {
				$found = true;
			}
		}
		if($found) { ?>
		<!-- gumax-article-picture -->
			<div id="gumax-article-picture">
				<a style="background-image: url(<?php echo $gumax_article_picture_file ?>);" <?php
					?>href="<?php echo htmlspecialchars( $GLOBALS['wgTitle']->getLocalURL() )?>" <?php
					?>title="<?php $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?>"></a>
			</div>
			<div class="gumax-article-picture-spacer"></div>
		<!-- end of gumax-article-picture -->
<?php
		}
	}

	/*************************************************************************************************/
	function siteContent() {
?>
	<!-- gumax-content-body -->
		<div id="gumax-column-content">
	<div id="content">
		<a name="top" id="top"></a>
		<?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
		<h1 id="firstHeading" class="firstHeading gumax-firstHeading" ><?php $this->html('title') ?></h1>
		<div id="bodyContent" class="gumax-bodyContent">
			<h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
			<div id="contentSub"><?php $this->html('subtitle') ?></div>
			<?php if($this->data['undelete']) { ?><div id="contentSub2"><?php     $this->html('undelete') ?></div><?php } ?>
			<?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
			<?php if($this->data['showjumplinks']) { ?><div id="jump-to-nav"><?php $this->msg('jumpto') ?> <a href="#column-one"><?php $this->msg('jumptonavigation') ?></a>, <a href="#searchInput"><?php $this->msg('jumptosearch') ?></a></div><?php } ?>
			<!-- start content -->
			<?php $this->html('bodytext') ?>
			<?php if($this->data['catlinks']) { $this->html('catlinks'); } ?>
			<!-- end content -->
			<?php if($this->data['dataAfterContent']) { $this->html ('dataAfterContent'); } ?>
			<div class="visualClear"></div>
		</div>
	</div>
		</div>
	<!-- end of gumax-content-body -->
<?php
	}

	/*************************************************************************************************/
	function toolbox() {
?>
	<!-- personal tools  -->
	<div id="gumax-personal-tools">
		<h5><?php $this->msg('toolbox') ?></h5>
		<ul>
<?php
		if($this->data['notspecialpage']) { ?>
				<li id="t-whatlinkshere"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['whatlinkshere']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-whatlinkshere') ?>><?php $this->msg('whatlinkshere') ?></a></li>
				<li>&#47;</li>
<?php
			if( $this->data['nav_urls']['recentchangeslinked'] ) { ?>
				<li id="t-recentchangeslinked"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['recentchangeslinked']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-recentchangeslinked') ?>><?php $this->msg('recentchangeslinked') ?></a></li>
				<li>&#47;</li>
<?php 		}
		}
		if(isset($this->data['nav_urls']['trackbacklink'])) { ?>
			<li id="t-trackbacklink"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['trackbacklink']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-trackbacklink') ?>><?php $this->msg('trackbacklink') ?></a></li>
				<li>&#47;</li>
<?php 	}
		if($this->data['feeds']) { ?>
			<li id="feedlinks"><?php foreach($this->data['feeds'] as $key => $feed) {
					?><span id="feed-<?php echo Sanitizer::escapeId($key) ?>"><a href="<?php
					echo htmlspecialchars($feed['href']) ?>"<?php echo $this->skin->tooltipAndAccesskey('feed-'.$key) ?>><?php echo htmlspecialchars($feed['text'])?></a>&nbsp;</span>
					<?php } ?></li>
					<li>&#47;</li><?php
		}

		foreach( array('contributions', 'log', 'blockip', 'emailuser', 'upload', 'specialpages') as $special ) {
			if($this->data['nav_urls'][$special]) {
				?><li id="t-<?php echo $special ?>"><a href="<?php echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-'.$special) ?>><?php $this->msg($special) ?></a></li>
<?php			if($special != 'specialpages') echo "<li>&#47;</li>"; ?>
<?php		}
		}

		if(!empty($this->data['nav_urls']['print']['href'])) { ?>
				<li>&#47;</li>
				<li id="t-print"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['print']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-print') ?>><?php $this->msg('printableversion') ?></a></li><?php
		}

		if(!empty($this->data['nav_urls']['permalink']['href'])) { ?>
				<li>&#47;</li>
				<li id="t-permalink"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['permalink']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-permalink') ?>><?php $this->msg('permalink') ?></a></li><?php
		} elseif ($this->data['nav_urls']['permalink']['href'] === '') { ?>
				<li>&#47;</li>
				<li id="t-ispermalink"<?php echo $this->skin->tooltip('t-ispermalink') ?>><?php $this->msg('permalink') ?></li><?php
		}

		wfRunHooks( 'GuMaxTemplateToolboxEnd', array( &$this ) );
		wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this ) );
?>
		</ul>
	</div>
	<!-- end of personal tools  -->
<?php
	}

	/*************************************************************************************************/

	function gumaxLastModified() {
		global $wgLang, $wgArticle;
		if ( !$wgArticle ) return '';

		if( $this->mRevisionId ) {
			$timestamp = Revision::getTimestampFromId( $this->mRevisionId, $wgArticle->getId() );
		} else {
			$timestamp = $wgArticle->getTimestamp();
		}
		if ( $timestamp ) {
			$d = $wgLang->date( $timestamp, true );
			$t = $wgLang->time( $timestamp, true );
			//$s = ' ' . wfMsg( 'lastmodifiedat', $d, $t );
			$s = 'modified on ' . $d . ' at ' . $t;
		} else {
			$s = '';
		}
		//if ( wfGetLB()->getLaggedSlaveMode() ) {
		//	$s .= ' <strong>' . wfMsg( 'laggedslavemode' ) . '</strong>';
		//}
		return $s;
	}

	/*************************************************************************************************/

	function gumaxViewcount() {
		global $wgDisableCounters;
		if ( $wgDisableCounters ) return '';

		global $wgLang, $wgArticle;
		if ( is_object( $wgArticle ) ) {
			$viewcount = $wgLang->formatNum( $wgArticle->getCount() );
			if ( $viewcount ) {
				//$viewcount = wfMsg( "viewcount", $viewcount );
				$viewcount = $viewcount . " views";
			} else {
				$viewcount = '';
			}
		} else {
			$viewcount = '';
		}
		return $viewcount;
	}

	/*************************************************************************************************/

	function gumaxMessage() {
?>
		<div id="gumax-f-message">
			<?php if($this->data['lastmod']) { ?><span id="f-lastmod"><?php $this->html('lastmod') ?></span>
			<?php } ?><?php if($this->data['viewcount']) { ?><span id="f-viewcount"><?php  $this->html('viewcount') ?> </span>
			<?php } ?>
		</div>
<?php
	}

	/*************************************************************************************************/
	function footerBox() {
?>
	<!-- gumax-f-list -->
	<div id="gumax-f-list">
		<ul>
			<?php
					$footerlinks = array(
						'numberofwatchingusers', 'credits',
						'privacy', 'about', 'disclaimer', 'tagline',
					);
					foreach( $footerlinks as $aLink ) {
						if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
			?>				<li id="<?php echo$aLink?>"><?php $this->html($aLink) ?></li>
							<?php		echo "<li>/</li>"	?>
			<?php 		}
					}
			?>
			<li id="f-poweredby"><a href="http://mediawiki.org" target="_blank">Powered by MediaWiki</a></li>
			<li>&#47;</li>
			<li id="f-designedby"><a href="http://paulgu.com" target="_blank">Designed by Paul Gu</a></li>
		</ul>
	</div>
	<!-- end of gumax-f-list -->
<?php
	}

	/*************************************************************************************************/


} // end of class

