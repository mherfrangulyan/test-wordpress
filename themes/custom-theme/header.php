<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Custom_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css?<?php echo time(); ?>">    
</head>

<body>
        
<div class="container-fluid">
     <div class="row">
	

	   <header class="site-header col-xs-12">
		
        
           <nav class="navbar navbar-expand-lg">
              <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand" href="/">
                   <?php
                      $site_logo = get_field('logo_image', 'option');
                      if($site_logo){
                   ?>
                  <img src="<?php echo $site_logo; ?>" alt="logo" style="max-width: 150px;">
                   <?php }else{ ?>    
                    Site Logo
                  <?php } ?>        
                </a>
                          
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header_menu',
                            'menu_id'        => 'header-menu',
                            'container'      => 'div', 
                            'container_class' => 'navbar-nav', 
                            'menu_class'     => 'navbar-nav', 
                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>', 
                        )
                    );
                  ?>
                </div>
                <?php if(get_field('header_button_text', 'option')){ ?>
                    <a href="" class="btn"><?php echo get_field('header_button_text', 'option'); ?></a>
                <?php } ?>    
              </div>
            </nav>
                      

	
	</header>