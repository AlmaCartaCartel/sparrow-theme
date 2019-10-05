    <?php get_header()?>
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php the_title()?><span>.</span></h1>

            <p><?php the_content()?></p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">


            <?php if(have_posts()) { while(have_posts()){ the_post();?>

            <article class="post">

               <div class="entry-header cf">

                  <h1><a href="<?php the_permalink();?>" title=""><?php the_title(); ?>.</a></h1>

                  <p class="post-meta">

                     <time class="date" datetime="<?php the_time('F jS Y')?>"><?php the_time('F jS Y')?></time>
                     <span class="categories">
                        <?php echo ' / '.the_tags(null,' / ')?>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
                  <a href="<?php the_permalink();?>" title=""><img src="<?php echo the_post_thumbnail_url();?>" alt="post-image" title="post-image"></a>
               </div>

               <div class="post-content">

                  <p><?php the_excerpt(); ?></p>
            
               </div>

            </article> 
               <?php }; //end while?>
               <?php the_posts_pagination()?>
            <?php }; // end if?>
  
         </div> <!-- Primary End-->

         <div id="secondary" class="four columns end">

        <?php get_sidebar() ?>

         </div> <!-- Secondary End-->

      </div>

   </div> <!-- Content End-->

   

<?php get_footer() ?>