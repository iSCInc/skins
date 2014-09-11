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
	die();

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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
<head>
	<meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
    <meta name="keywords" content="Java,Javascript,J2SE,J2EE,C,C++,c,c++,OO,oo,.Net,.net,VB,vb,UML,uml,PHP,php,Perl,perl,XHTML,xhtml,HTML,html,Paul,Paul Gu,PaulGu,Paul,Gu,Gu Paul,GuPaul,paul,paulgu,paul gu,gupaul,gu paul,gu,Yanchun,Yan Chun,Yanchun Gu,Yan Chun Gu,Wiki,Mediawiki" />
	<?php $this->html('headlinks') ?>
	<title><?php $this->text('pagetitle') ?></title>
	<style type="text/css" media="screen,projection">/*<![CDATA[*/ @import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/main.css"; /*]]>*/</style>
	<link rel="stylesheet" type="text/css" media="print" href="<?php $this->text('stylepath') ?>/common/commonPrint.css" />

    <!--[if lt IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE50Fixes.css";</style><![endif]-->
    <!--[if IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE55Fixes.css";</style><![endif]-->
    <!--[if gte IE 6]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE60Fixes.css";</style><![endif]-->
    <!--[if IE]><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js"></script>
    <meta http-equiv="imagetoolbar" content="no" /><![endif]-->

	<?php if($this->data['jsvarurl'  ]) { ?><script type="text/javascript" src="<?php $this->text('jsvarurl'  ) ?>"></script><?php } ?>
	<script type="text/javascript" src="<?php                                   $this->text('stylepath' ) ?>/common/wikibits.js"></script>
	<?php if($this->data['usercss'   ]) { ?><style type="text/css"><?php              $this->html('usercss'   ) ?></style><?php    } ?>
	<?php if($this->data['userjs'    ]) { ?><script type="text/javascript" src="<?php $this->text('userjs'    ) ?>"></script><?php } ?>
	<?php if($this->data['userjsprev']) { ?><script type="text/javascript"><?php      $this->html('userjsprev') ?></script><?php   } ?>
</head>

<body <?php if($this->data['body_ondblclick']) { ?>ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
      <?php if($this->data['nsclass'        ]) { ?>class="<?php      $this->text('nsclass')         ?>"<?php } ?>>

<div id="internal"></div>
<div id="container">

    <!-- Online Documents Link -->
	<div id="paulgu-documents"><a href="http://www.paulgu.com/documents/">Paul Gu online documents</a></div>
    <!-- Google AdSense Search -->

	<?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
	<div id="header">
		<a name="top" id="contentTop"></a>
		<h1><a
	    href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"
	    title="<?php $this->msg('mainpage') ?>"><?php $this->text('title') ?></a></h1>

    	<!-- Navigation Menu -->
		<?php foreach ($this->data['sidebar'] as $bar => $cont) { ?>
			<li>
				<ul>
	            <?php foreach($cont as $key => $val) { ?>
					<li id="<?php echo htmlspecialchars($val['id']) ?>"<?php
						if ( $val['active'] ) { ?> class="active" <?php }
					?>><a href="<?php echo htmlspecialchars($val['href']) ?>"><?php echo htmlspecialchars($val['text']) ?></a></li>
	            <?php } ?>
				</ul>
			</li>
		<?php } ?>
        <!-- End of Navigation Menu -->

		<form name="searchform" action="<?php $this->text('searchaction') ?>" id="search">
			<div>
            <!-- disable the label "search" -->
			<label for="q"><?php // $this->msg('search') ?></label>
			<input id="q" name="search" type="text"
			<?php if($this->haveMsg('accesskey-search')) {
	          ?>accesskey="<?php $this->msg('accesskey-search') ?>"<?php }
	        if( isset( $this->data['search'] ) ) {
	          ?> value="<?php $this->text('search') ?>"<?php } ?> />
			<input type="image" name="go" class="searchButton" id="searchGoButton"
              src="<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/go.png" border="0" 
              alt="Go to page" title="Go to page"
	          value="<?php $this->msg('go') ?>"
	        />&nbsp;<input type="image" name="fulltext" class="searchButton" id="searchGoButton"
              src="<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/search.png" border="0" 
              alt="Search for pages" title="Search for pages"
	          value="<?php $this->msg('search') ?>" />
	       </div>
		</form>
	</div>  <!-- End of header DIV -->

	<div id="mBody">
	
		<div id="mainContent">
			
			<h1><?php $this->text('title') ?></h1>
			<h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
			<div id="contentSub"><?php $this->html('subtitle') ?></div>
			<?php if($this->data['undelete']) { ?><div id="contentSub"><?php     $this->html('undelete') ?></div><?php } ?>
			<?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
			
			<!-- start content -->
			<?php $this->html('bodytext') ?>
			<?php if($this->data['catlinks']) { ?><div id="catlinks"><?php       $this->html('catlinks') ?></div><?php } ?>
			<!-- end content -->

		</div><!-- end of MAIN CONTENT div -->	

	</div><!-- end of MBODY div -->


    <!------------------------------------------------------------------------------------------------------------------------->

    <div id="toolMenu">

        <!-- content action -->
        <div id="contentActions">
        <li>
            <ul>| 
                <?php foreach($this->data['content_actions'] as $key => $action) {
                   ?><li
                   <?php if($action['class']) { ?>class="<?php echo htmlspecialchars($action['class']) ?>"<?php } ?>
                   > <a href="<?php echo htmlspecialchars($action['href']) ?>"><?php
                   echo htmlspecialchars($action['text']) ?></a> | </li><?php
                 } ?>
            </ul>
        </li>
        </div>
        <!-- End of content action -->

        <div id="personalTools">
        
        <li>
            <ul>|&nbsp;

              <!-- Toolbox -->
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
              <!-- End of Toolbox -->

              <!-- Personal tools -->
              | <?php foreach($this->data['personal_urls'] as $key => $item) {
              ?><li id="pt-<?php echo htmlspecialchars($key) ?>"><a href="<?php
               echo htmlspecialchars($item['href']) ?>"<?php
              if(!empty($item['class'])) { ?> class="<?php
               echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
               echo htmlspecialchars($item['text']) ?></a> | </li>
             <?php } ?>
             <!-- End of Personal tools -->

            </ul>
        </li>
        
        </div> <!-- End of personalTools DIV -->

    </div> <!-- End of toolMenu DIV -->

    <!------------------------------------------------------------------------------------------------------------------------->

    <!-- Footer -->
	<div id="footer"><table width="100%"><tr><td align="left" width="1%" nowrap="nowrap">
		<?php if($this->data['copyrightico']) { ?><div id="f-copyrightico"><?php $this->html('copyrightico') ?></div><?php } ?></td><td align="center" nowrap="nowrap">
		<?php if($this->data['lastmod'   ]) { ?><span id="f-lastmod"><?php    $this->html('lastmod')    ?></span><?php } ?>
		<?php if($this->data['viewcount' ]) { ?><span id="f-viewcount"><?php  $this->html('viewcount')  ?> </span><?php } ?>
		<ul id="f-list">
			<?php if($this->data['credits'   ]) { ?><li id="f-credits"><?php    $this->html('credits')    ?></li><?php } ?>
			<?php if($this->data['copyright' ]) { ?><li id="f-copyright"><?php  $this->html('copyright')  ?></li><?php } ?>
			<?php if($this->data['about'     ]) { ?><li id="f-about"><?php      $this->html('about')      ?></li><?php } ?>
			<?php if($this->data['disclaimer']) { ?><li id="f-disclaimer"><?php $this->html('disclaimer') ?></li><?php } ?>
		</ul></td><td align="right" width="1%" nowrap="nowrap"> </td></tr></table>
	</div><!-- end of the FOOTER div -->

</div><!-- end of the CONTAINER div -->

<?php $this->html('reporttime') ?>

</body>
</html>
<?php
	}
}

?>
