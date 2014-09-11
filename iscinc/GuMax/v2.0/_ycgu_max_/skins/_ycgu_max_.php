<?php
/**
 * _ycgu_max_ theme
 *
 * -----------------------------------------------------
 *
 * Redesigned by Paul Yanchun Gu
 * Seneca College @ York
 * 10/24/2006
 *
 * Copyright paulgu.com - http://www.paulgu.com/
 * License: GPL (http://www.gnu.org/copyleft/gpl.html)
 *
 * Loosely based on the monobook style by:
 * Gabriel Wicke, Dave Shea, Fantasai
 * Daniel Burka, Steven Garrity
 * -----------------------------------------------------
 */


if( !defined( 'MEDIAWIKI' ) )
	die(-1);

/** */
require_once('includes/SkinTemplate.php');

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class Skin_ycgu_max_ extends SkinTemplate {
	/** Using _ycgu_max_. */
	function initPage( &$out ) {
		SkinTemplate::initPage( $out );
		$this->skinname  = '_ycgu_max_';
		$this->stylename = '_ycgu_max_';
		$this->template  = '_ycgu_max_Template';
	}
}
	
class _ycgu_max_Template extends QuickTemplate {
	/**
	 * Template filter callback for _ycgu_max_ skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
<head>
	<meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
    <meta name="keywords" content="Java,Javascript,J2SE,J2EE,C,C++,OO,.Net,Paul Gu,Paul Yanchun Gu,Mediawiki" />
    <meta name="robots" content="index,follow" />
    <?php $this->html('headlinks') ?>
    <title><?php $this->text('pagetitle') ?></title>
    <style type="text/css" media="screen,projection">/*<![CDATA[*/ @import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/_ycgu_main.css?9"; /*]]>*/</style>
    <link rel="stylesheet" type="text/css" <?php if(empty($this->data['printable']) ) { ?>media="print"<?php } ?> href="<?php $this->text('stylepath') ?>/common/commonPrint.css" />
    <!--[if lt IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE50Fixes.css";</style><![endif]-->
    <!--[if IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE55Fixes.css";</style><![endif]-->
    <!--[if gte IE 6]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE60Fixes.css";</style><![endif]-->
    <!--[if IE]><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js"></script>
    <meta http-equiv="imagetoolbar" content="no" /><![endif]-->

		<?php print Skin::makeGlobalVariablesScript( $this->data ); ?>
                
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/common/wikibits.js?1"><!-- wikibits js --></script>
        <?php	if($this->data['jsvarurl'  ]) { ?>
		    <script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl'  ) ?>"><!-- site js --></script>
        <?php	} ?>
        <?php	if($this->data['pagecss'   ]) { ?>
		    <style type="text/css"><?php $this->html('pagecss'   ) ?></style>
        <?php	}
		if($this->data['usercss'   ]) { ?>
		    <style type="text/css"><?php $this->html('usercss'   ) ?></style>
        <?php	}
		if($this->data['userjs'    ]) { ?>
		    <script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs' ) ?>"></script>
        <?php	}
		if($this->data['userjsprev']) { ?>
		    <script type="<?php $this->text('jsmimetype') ?>"><?php $this->html('userjsprev') ?></script>
        <?php	}
		if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>
		<!-- Head Scripts -->
		<?php $this->html('headscripts') ?>

</head>

<body <?php if($this->data['body_ondblclick']) { ?>ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
      <?php if($this->data['body_onload'    ]) { ?>onload="<?php     $this->text('body_onload')     ?>"<?php } ?>
      class="bodySection <?php $this->text('nsclass') ?> <?php $this->text('dir') ?>">

    <div id="container-top"></div>
    <div id="internal"></div>
    <div id="container">
    <div id="body-shadow"><div class="innerbox">
    
    <?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
    <!-- Header -->
    <div id="header">
		<a name="top" id="contentTop"></a>
        <!-- Site Logo -->
        <div id="p-logo">
            <a style="background-image: url(<?php $this->text('logopath') ?>);" <?php
                ?>href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>" <?php
                ?>title="<?php $this->msg('mainpage') ?>"></a>
        </div>

    	<!-- Navigation Menu -->
		<?php foreach ($this->data['sidebar'] as $bar => $cont) { ?>
			<ul>
            <?php foreach($cont as $key => $val) { ?>
				<li id="<?php echo htmlspecialchars($val['id']) ?>" <?php if ( $val['active'] ) { ?> class="active" <?php } ?>>
                    <a href="<?php echo htmlspecialchars($val['href']) ?>"><?php echo htmlspecialchars($val['text']) ?></a>
                </li>
            <?php } ?>
			</ul>
		<?php } ?>
        
        <!-- End of Navigation Menu -->

        <!-- Search -->
        <div id="p-search" class="portlet">
            <h5><label for="searchInput"><?php //$this->msg('search') ?></label></h5>
            <div id="searchBody" class="pBody">
                <form action="<?php $this->text('searchaction') ?>" id="searchform"><div>
                    <input id="searchInput" name="search" type="text" <?php
                        if($this->haveMsg('accesskey-search')) {
                            ?>accesskey="<?php $this->msg('accesskey-search') ?>"<?php }
                        if( isset( $this->data['search'] ) ) {
                            ?> value="<?php $this->text('search') ?>"<?php } ?> />
                    <input type='image' src="<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/go.gif" name="go" class="searchButton" id="searchGoButton"	value="<?php $this->msg('searcharticle') ?>" title="Go to the article" />
                    <input type='image' src="<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/search.gif" name="fulltext" class="searchButton" id="searchGoButton"	value="<?php $this->msg('searchbutton') ?>"  title="Search all pages" />
                </div></form>
            </div>
        </div>
        <!-- End of search -->

	</div>  <!-- End of header DIV -->

    <!-- Main Content -->
	<div id="mBody">
    <div id="mainContent">	
	<div id="content">
		<a name="top" id="top"></a>
		<?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
		<h1 class="firstHeading"><?php $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?></h1>
		<div id="bodyContent">
			<h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
			<div id="contentSub"><?php $this->html('subtitle') ?></div>
			<?php if($this->data['undelete']) { ?><div id="contentSub2"><?php     $this->html('undelete') ?></div><?php } ?>
			<?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
			<?php if($this->data['showjumplinks']) { ?><div id="jump-to-nav"><?php $this->msg('jumpto') ?> <a href="#column-one"><?php $this->msg('jumptonavigation') ?></a>, <a href="#searchInput"><?php $this->msg('jumptosearch') ?></a></div><?php } ?>
			<!-- start content -->
			<?php $this->html('bodytext') ?>
			<?php if($this->data['catlinks']) { ?><div id="catlinks"><?php       $this->html('catlinks') ?></div><?php } ?>
			<!-- end content -->
			<div class="visualClear"></div>
		</div>
	</div><!-- end of CONTENT div -->	
    </div><!-- end of MAIN CONTENT div -->	
	</div><!-- end of MBODY div -->


    <!------------------------------------------------------------------------------------------------------------------------->

    <div id="contentBottom">

        <!-- content action -->
        <div id="contentActions">
            <ul><li>|</li>
                <?php foreach($this->data['content_actions'] as $key => $action) {
                   ?><li
                   <?php if($action['class']) { ?>class="<?php echo htmlspecialchars($action['class']) ?>"<?php } ?>
                   ><a href="<?php echo htmlspecialchars($action['href']) ?>"><?php
                   echo htmlspecialchars($action['text']) ?></a> | </li><?php
                 } ?>
            </ul>
        </div>
        <!-- End of content action -->

        <div id="personalTools">
 
            <ul><li>|</li>
              <!-- Navigation tools -->
              <?php if($this->data['notspecialpage']) { foreach( array( 'whatlinkshere', 'recentchangeslinked' ) as $special ) { ?>
              <li id="t-<?php echo $special?>"><a href="<?php
                echo htmlspecialchars($this->data['nav_urls'][$special]['href']) 
                ?>"><?php echo $this->msg($special) ?></a> | </li>
              <?php } } ?>
              <?php if($this->data['feeds']) { ?><li id="feedlinks"><?php foreach($this->data['feeds'] as $key => $feed) {
                ?><span id="feed-<?php echo htmlspecialchars($key) ?>"><a href="<?php
                echo htmlspecialchars($feed['href']) ?>"><?php echo htmlspecialchars($feed['text'])?></a>&nbsp;</span>
                <?php } ?> | </li><?php } ?>
              <?php foreach( array('contributions', 'emailuser', 'upload', 'specialpages') as $special ) { ?>
              <?php if($this->data['nav_urls'][$special]) {?><li id="t-<?php echo $special ?>"><a href="<?php
                echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
                ?>"><?php $this->msg($special) ?></a> | </li><?php } ?>
              <?php } ?>
              <!-- End of Navigation tools -->

              <!-- Tools -->
              <?php foreach($this->data['personal_urls'] as $key => $item) {
              ?><li id="pt-<?php echo htmlspecialchars($key) ?>"><a href="<?php
               echo htmlspecialchars($item['href']) ?>"<?php
              if(!empty($item['class'])) { ?> class="<?php
               echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
               echo htmlspecialchars($item['text']) ?></a> | </li>
             <?php } ?>
             <!-- End of Tools -->
            </ul>
       
        </div> <!-- End of personalTools DIV -->

        <!-- Footer -->
        <div id="footer"><table width="100%">
          <tr><td align="right" width="1%" nowrap="nowrap"><li> </li></td>
          <td align="center" nowrap="nowrap">
            <div id="f-message">
                <?php if($this->data['lastmod'   ]) { ?><span id="f-lastmod"><?php    $this->html('lastmod')    ?></span><?php } ?>
                <?php if($this->data['viewcount' ]) { ?><span id="f-viewcount"><?php  $this->html('viewcount')  ?> </span><?php } ?>
            </div>
            <ul id="f-list">
                <?php if($this->data['about'     ]) { ?><li id="f-about"><?php      $this->html('about')      ?> | </li><?php } ?>
                <?php if($this->data['disclaimer']) { ?><li id="f-disclaimer"><?php $this->html('disclaimer') ?> | </li><?php } ?>
                <li><a href="http://www.mediawiki.org">Powered by MediaWiki</a> | </li>
                <li><a href="http://www.paulgu.com">Design by Paul Gu</a></li>
            </ul></td>
            <td align="left" width="1%" nowrap="nowrap"><li> </li></td></tr></table>
        </div> <!-- end of the FOOTER div -->

    </div> <!-- End of contentBottom DIV -->
    <!------------------------------------------------------------------------------------------------------------------------->
    </div> <!-- End of innerbox DIV --><div class="bottom-shadow"></div>
    </div> <!-- End of body-shadow DIV -->
    </div> <!-- end of the CONTAINER div -->
    <div id="container-bottom"></div>

    <?php $this->html('reporttime') ?>

</body>
</html>
<?php
	}
}

?>
