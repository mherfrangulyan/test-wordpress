<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Custom_theme
 */

get_header();
?>

	<main id="primary" class="site-main col-12 col-xs-12 container-fluid p-0">
      <?php
         $flexible_content = get_field('content');
        if ($flexible_content) {
            foreach ($flexible_content as $layout) {
                $layout_type = $layout['acf_fc_layout'];
                if($layout_type  === 'Content'){
                   $header = $layout['section_header'];
                   if($header){
       ?>
             <h2 class="head col-12 px-3"><?php echo $header; ?></h2>
              <?php    
                   } 
                   $posts = $layout['section_posts'];
                   if(count($posts)>0){
              ?>  
                  <div class="row">
               <?php   
                      foreach($posts as $post){
                          $post_object = get_post($post->ID);
                          $post_title = get_the_title($post_object->ID);
                          $post_content = get_the_content(null, false, $post_object->ID);
                          $post_thumbnail_id = get_post_thumbnail_id($post_object->ID);
                          $post_thumbnail_url = $post_thumbnail_id ? wp_get_attachment_image_url($post_thumbnail_id, 'full') : '';
                          $terms = get_the_terms($post->ID, 'portfolio_category');
                          $term_name = !empty($terms) ? $terms[0]->name : 'No Category';
                    ?>
                        <div class="col-12 container mt-5" style="max-width: 90%;">
                            <div class="row post-content mb-3">
                                <div class="col-md-4 col-xs-12 p-0">
                                    <?php
                                       if($post_thumbnail_url){
                                           echo '<img src='. $post_thumbnail_url .' alt="post">';
                                       }
                                    ?>
                                </div>
                                <div class="col-md-8 col-xs-12 p-4">
                                     <h4><?php echo $post_title; ?></h4>
                                     <p><strong><?php echo $term_name; ?></strong></p>  
                                     <p class="my-3"><?php echo $post_content; ?></p>    
                                </div>
                            </div>
                        </div>
                        
                        
                     <?php    
                      }
                 ?>
                     </div>
                  <?php   
                       
                   } 
                   
                }
            }
        }
      ?>
          
          
               
                
              
          
      <?php
          $slider_content = get_field('slider_content');
          if($slider_content){
        ?>
            
            <div id="main_slider" class="carousel slide">
              <div class="carousel-indicators">
                 <span></span>
                 <?php
            
                    foreach($slider_content as $key=>$slide){
                         if($key === 0){
                           $class= "active";
                         }else{
                            $class= "";
                         }
                ?> 
                <button type="button" data-bs-target="#main_slider" data-bs-slide-to="<?php echo $key; ?>" class="<?php echo $class; ?>" aria-current="true" aria-label="Slide <?php echo $key; ?>"></button>
                <?php } ?>    
                <span>0<?php echo count($slider_content); ?></span>
              </div>
              <div class="carousel-inner">
            
          <?php    
             foreach($slider_content as $key=>$slide){
                 $slide_image = $slide['slide_image'];
                 $slide_title = $slide['slide_title'];
                 $slide_sub_title = $slide['slide_sub_title'];
                 $slide_button = $slide['slide_button'];
                 $slide_button_url = $slide['slide_button_url'];
                 if($key === 0){
                   $class= "active";
                 }else{
                    $class= "";
                 }
                 if($slide_image){
                 
           ?>      
                 
                <div class="carousel-item <?php echo $class; ?>">
                  <img src="<?php echo $slide_image; ?>" class="d-block w-100" alt="...">
                  <div class="slide-content">
                      <h2 class="title"><?php echo $slide_title; ?></h2>
                      <p class="text"><?php echo $slide_sub_title; ?></p>    
                      <?php if($slide_button && $slide_button_url){ ?>
                           <a class="btn" href="<?php echo $slide_button_url; ?>"><?php echo $slide_button; ?></a>
                      <?php } ?>    
                  </div>
                </div>
               
            <?php     
                }
             }
              
           ?>
               
            </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#main_slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#main_slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>   
               
           <?php     
          }
      ?>     
	 
	</main>

<?php
get_footer();