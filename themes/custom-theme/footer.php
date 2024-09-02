<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Custom_theme
 */

?>

	<footer class="col-xs-12 pt-5 pb-4">
       <div class="footer-container">
       <div class="col-xs-12 p-0 top-footer row">
          <div class="col-xs-12 col-md-6">
                <?php
                      $footer_logo = get_field('footer_logo', 'option');
                      if($footer_logo){
                   ?>
                  <img src="<?php echo $footer_logo; ?>" alt="logo" style="max-width: 150px;">
                   <?php }else{ ?>    
                    Site Logo
              <?php } ?>
          </div>
          <div class="col-xs-12 col-md-6">
               <div class="row">
                    <div class="col-xs-6 col-md-6 footer-menu">
                          <p class="menu-title"><?php echo wp_get_nav_menu_name('footer-1'); ?></p> 
                          <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-1',
                                    'menu_id'        => 'footer-menu-1',
                                    'container'      => 'div', 
                                    'container_class' => 'navbar-nav', 
                                    'menu_class'     => 'navbar-nav', 
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>', 
                                )
                            );
                          ?>
                    </div>
                    <div class="col-xs-6 col-md-6 footer-menu">
 					   <p class="menu-title"><?php echo wp_get_nav_menu_name('footer-2'); ?></p>                              
                    <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-2',
                                    'menu_id'        => 'footer-menu-2',
                                    'container'      => 'div', 
                                    'container_class' => 'navbar-nav', 
                                    'menu_class'     => 'navbar-nav', 
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>', 
                                )
                            );
                       ?>
                       <?php if(get_field('footer_button_text', 'option')){ ?>
                             <a class="btn" href=""><?php echo get_field('footer_button_text', 'option'); ?></a>
                       <?php } ?>    
                    </div>
               </div>
          </div>
        
       </div>
       <div class="col-xs-12 p-0 bottom-footer row pt-4">
           <div class="col-xs-6 col-md-6 p-0">
                <?php if(get_field('copyright', 'option')){ ?>
                    <span><?php echo get_field('copyright', 'option'); ?></span>
                <?php } ?>    
                <?php
                   if(get_field('page_urls', 'option')){
                       $urls = get_field('page_urls', 'option');
                       foreach($urls as $url){
                           $post_id = url_to_postid($url);
                           $title = get_the_title($post_id);
                           
                    ?>
                        <a href="<?php echo $url; ?>"><?php echo $title; ?></a>
                        
                    <?php    
                       }
                   }
                ?>             
           </div>
           <div class="col-xs-6 col-md-6 socials-block p-0">
                 <?php
                    $social_icons = get_field('social_icons', 'option');
                    if($social_icons){
                   ?>     
                       <ul class="socials">
                       <?php
                       foreach($social_icons as $social_icon){
                           
                           $social_image = $social_icon['social_image'];
                           $social_url = $social_icon['social_url'];
                           if($social_image && $social_url){
                     ?>          
                           <li class="social">
                         		<a class="social-item" href="<?php echo $social_url; ?>">
                                   <img src="<?php echo $social_image; ?>">
                           		</a>
                           </li>    
                       <?php        
                           } 
                           
                       }
                      ?>
                       </ul>   
                    <?php      
                    }
                 ?>  
            </div>                   
       </div>
		</div>
	</footer>
    </div>
</div>

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</body>
</html>