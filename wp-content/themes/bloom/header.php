<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Bloom
 * @since Bloom 1.0
 */

ob_start();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title>Bloom</title>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>  
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="main-header">
		<div class="header_main">
			<div class="topsec  py-2 px-5">
				<div class="container-fluid px-4">
					<div class="row">
						<div class="col-md-12">
							<!--<ul class="d-flex justify-content-end">
								<li class="pr-2">EN </li>
								<li> ESPANOL </li>
							</ul>-->	
							<ul id="sortable" class="ui-sortable d-flex justify-content-end"><li id="English"><a href="#" title="English" class="nturl notranslate en flag united-states" style="color:#fff" data-lang="English">EN </a></li><li id="Spanish"><a href="#" title="Spanish" class="nturl notranslate es flag Spanish" style="color:#fff" data-lang="Spanish">ESPANOL</a></li></ul>			
						</div>
					</div>
				</div>
			</div>
			<div class="bottom_head">
				<?php
				  $menu_name = 'primary';
				  $locations = get_nav_menu_locations();
				  $menu = wp_get_nav_menu_object($locations[$menu_name]);
				  $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
				?>
				<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
					<div class="container-fluid px-md-5">
						<a class="navbar-brand" href="<?php echo get_site_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
						</a>
						<div class="d-flex">
    						<a class="nav-link main-btn1 menu-mbtn mr-3" href="<?php echo get_site_url() ?>/donate">Donate</a>
    						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    							<span class="navbar-toggler-icon"></span>
    						</button>
    					</div>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto">
								<?php
									$count = 0;
									$submenu = false;
									foreach( $menuitems as $item ):
										$link = $item->url;
										$title = $item->title;
										// item does not have a parent so menu_item_parent equals 0 (false)
										if ( !$item->menu_item_parent ):
										// save this id for later comparison with sub-menu items
										$parent_id = $item->ID;?>
										<li class="nav-item dropdown">
											 <a class="nav-link <?php if($title=='DONATE'){echo 'main-btn1';}?>" href="<?php echo $link; ?>" id="navbarDropdown" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
												<?php echo $title; ?>
											</a>
										<?php endif; ?>
											<?php if ( $parent_id == $item->menu_item_parent ): ?>
												<?php if ( !$submenu ): $submenu = true; ?>
												<div class="dropdown-menu" aria-labelledby="navbarDropdown">
												<?php endif; ?>												
														<a href="<?php echo $link; ?>" class="dropdown-item"><?php echo $title; ?></a>													
												<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
												</div>
												<?php $submenu = false; endif; ?>
											<?php endif; ?>
										<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
										</li>                           
										<?php $submenu = false; endif; ?>
									<?php $count++; endforeach; ?>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</header>