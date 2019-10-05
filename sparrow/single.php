<?php get_header()?>
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Our Blog<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">

            <article class="post">
            <?php the_post()?>

               <div class="entry-header cf">

                  <h1><?php the_title()?></h1>

                  <p class="post-meta">

                  <time class="date" datetime="<?php the_time('F jS Y')?>"><?php the_time('F jS Y')?></time>
                     <span class="categories">
                        <?php the_category(null,' / ')?>
                     </span>
                  </p>

               </div>

               <div class="post-thumb">
                  <img src="<?php echo the_post_thumbnail_url();?>" alt="post-image" title="post-image">
               </div>

               <div class="post-content">
                    <?php the_content()?>
                  <p class="tags">
  				        <?php the_tags('Tagged in: ',' , ')?>
                  </p>
               </div>

            </article> <!-- post end -->

         </div>

         <div id="secondary" class="four columns end">

         <?php get_sidebar()?>

         </div> <!-- Comments End -->

      </div>

   </div> <!-- Content End-->

    <?php get_footer()?>