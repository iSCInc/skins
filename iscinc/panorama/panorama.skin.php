<?php
/**
 * Skin file for skin "Panorama".
 *
 * @file
 * @ingroup Skins
 */
/**
 * SkinTemplate class for panorama skin
 * @ingroup Skins
 */
class Skinpanorama extends SkinTemplate {
	var $skinname = 'panorama', $stylename = 'panorama',
		$template = 'panoramaTemplate', $useHeadElement = true;
 
	/**
	 * Add JavaScript via ResourceLoader
	 *
	 * Uncomment this function if your skin has a JS file or files.
	 * Otherwise you won't need this function and you can safely delete it.
	 *
	 * @param OutputPage $out
	 */
	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$out->addModules( 'skins.panorama.js' );
	}
 
	/**
	 * Add CSS via ResourceLoader
	 *
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( array(
			'mediawiki.skinning.interface', 'skins.panorama'
		) );
	}
}
/**
 * BaseTemplate class for Foo Bar skin
 *
 * @ingroup Skins
 */
class panoramaTemplate extends BaseTemplate {
	/**
	 * Outputs the entire contents of the page
	 */
	public function execute() {
		$this->html( 'headelement' ); ?>
<!--your fun stuff-->

<!--page title-->
<?php if ( !empty( $this->data['title'] ) ) { ?>
<h1 id="firstHeading" class="firstHeading"><?php $this->html( 'title' ) ?></h1>
<?php } ?>
<!--end of page title-->

<!--brought to you by panorama.org-->
<h1 class="coffeetin center">brought to you by panorama.org</h1>

<!--user message new talk-->
<?php if ( $this->data['newtalk'] ) { ?>
<h3 class="newtalk">
<?php $this->html( 'newtalk' );?>
</h3>
<?php } ?>
<!--end of user message new talk-->

<!--body text-->
<?php $this->html( 'bodytext' ) ?>
<!--end of body text-->

<!--categories-->
<?php $this->html( 'catlinks' ); ?>
<!--end of categories-->

<!--data after content-->
<?php $this->html( 'dataAfterContent' ); ?>
<!--end of data after content-->

<!--language links-->
<?php
	// Language links are often not present, so this if-statement allows you to add a conditional <ul> around the language list
	if ( $this->data['language_urls'] ) {
		echo "<ul>";
		foreach ( $this->data['language_urls'] as $key => $langLink ) {
			echo $this->makeListItem( $key, $langLink );
		}
		echo "</ul>";
	} 
?>
<!--end of language links-->

<!--subtitles-->
<?php $this->html( 'subtitle' ); ?>
<?php $this->html( 'undelete' ); ?>
<?php if ( $this->data['subtitle'] ) { ?>
<div id="contentSub"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
<?php $this->html( 'subtitle' ); ?>
</div>
<?php } ?>
<?php if ( $this->data['undelete'] ) { ?>
<div id="contentSub2"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
<?php $this->html( 'undelete' ); ?>
</div>
<?php } ?>
<!--end of subtitles-->

<!--start of nav-->
<!--start of logo/minify menu button-->
<div class="nav">
<nav class="navbar navbar-default">
  <div class="container-fluid">
<!--properly terminated tags to end of logo/min-->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<i class="fa fa-smile-o fa-2"></i>
      </button>
<a class="navbar-brand"	href="<?php echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] );	?>"	<?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) ) ?>>
<img src="<?php echo $this->getSkin()->getSkinStylePath( 'resources/images/panorama.png'); 
?>" alt="logo" class="logo"></img></a>
</div>
<!--end of logo/minify menu button-->

 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<ul class="nav">
<!--start of sidebar-->
<li class="horiz">
<ul class="nav nav-pills navbar-nav">
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
     <i class="fa fa-wrench"></i><span class="caret"></span>
    </a>
<ul class="dropdown-menu" role="nav menu">
<?php
foreach ( $this->getSidebar() as $boxName => $box ) { ?>

<?php
	if ( is_array( $box['content'] ) ) { ?>
<?php
		foreach ( $box['content'] as $key => $item ) {
			echo $this->makeListItem( $key, $item );
		}
?>
<?php
	} else {
		echo $box['content'];
	}
} ?>
</ul>
</li>
</ul>
</li>
<!--end of sidebar-->

<!--start ofcontent actions-->
<li class="horiz">
<ul class="nav nav-pills navbar-nav">
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
     <i class="fa fa-newspaper-o"></i><span class="caret"></span>
    </a>
<ul class="dropdown-menu" role="menu">
<?php
	foreach ( $this->data['content_actions'] as $key => $tab ) {
		echo $this->makeListItem( $key, $tab );
	}
?>
</ul>
</li>
</ul>
</li>
<!--end of content actions-->

<!--start of user tools-->
<li class="horiz">
<ul class="nav nav-pills navbar-nav">
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
     <i class="fa fa-user"></i><span class="caret"></span>
    </a>
<ul class="dropdown-menu" role="nav menu">
<?php
	foreach ( $this->getPersonalTools() as $key => $item ) {
		echo $this->makeListItem( $key, $item );
	}
?>
</ul>
</li>
</ul>
</li>
<!--end of user tools-->

<form class="navbar-form navbar-right" role="search" action="<?php $this->text( 'wgScript' ); ?>">
  <div class="form-group">
    <input type="hidden" name="title" class="form-control" placeholder="Search" value="<?php $this->text( 'searchtitle' ) ?>" />
<?php echo $this->makeSearchInput( array( 'id' => 'searchInput' ) ); ?>
  </div>
  <button type="submit" class="btn btn-default"><i class="fa fa-binoculars"></i></button>
</form>

<!--start of search, its almost good, however ready for a redo....-->
<form class="navbar-form navbar-right" role="search" action="<?php $this->text( 'wgScript' ); ?>">
	<input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />
<?php echo $this->makeSearchInput( array( 'id' => 'searchInput' ) ); ?>
<button type="submit" class="btn btn-default">
                <i class="fa fa-binoculars"></i>
            </button>
</form>
<!--end of search-->

</div>
</div>
</nav>
</div>


<!--footer icons-->
<?php
	foreach ( $this->getFooterIcons( 'icononly' ) as $blockName => $footerIcons ) { ?>
	<div class="center">
<?php
		foreach ( $footerIcons as $icon ) {
			echo $this->getSkin()->makeFooterIcon( $icon );
		}
?>
	</div>
<?php
	} ?>

<!--footer links flat array-->
<div class="center">
<?php foreach ( $this->getFooterLinks( 'flat' ) as $key ) { ?>
	<div class="btn button"><?php $this->html( $key ) ?></div>
 
<?php } ?>
</div>

<!--end of your fun stuff-->

<?php $this->printTrail(); ?>
</body>
</html><?php
	}
}
