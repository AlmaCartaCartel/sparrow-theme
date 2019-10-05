<?php
/*
Template Name: Блог
*/
?>
<?php get_header()?>
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php the_title()?><span>.</span></h1>

            <p><?php the_content();?> </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">

         <?php 
            $posts = get_posts( array(
               'category'    => 0,
               'orderby'     => 'date',
               'order'       => 'DESC',
               'include'     => array(),
               'exclude'     => array(),
               'meta_key'    => '',
               'meta_value'  =>'',
               'post_type'   => 'post',
               'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
            
            foreach( $posts as $post ){
               setup_postdata($post);
                ?>
                 <article class="post">

                  <div class="entry-header cf">

                        <h1><a href="<?php the_permalink();?>" title=""><?php the_title();?></a></h1>

                        <p class="post-meta">

                           <time class="date" datetime="2014-01-14T11:24"><?php the_time('F jS Y')?></time>
                           /
                           <span class="categories">
                              <?php the_category(' / ')?>
                           </span>

                        </p>

                  </div>

                  <div class="post-thumb">
                        <a href="<?php the_permalink();?>" title=""><img src="<?php echo the_post_thumbnail_url();?>" alt="post-image" title="post-image"></a>
                  </div>

                  <div class="post-content">

                        <p><?php the_excerpt()?></p>

                  </div>

                  </article> <!-- post end -->
                <?php
            };
         ?>

         </div> <!-- Primary End-->

         <div id="secondary" class="four columns end">

        <?php get_sidebar() ?>

         </div> <!-- Secondary End-->

      </div>

   </div> <!-- Content End-->

   <!-- Tweets Section
   ================================================== -->

<?php get_footer() ?>