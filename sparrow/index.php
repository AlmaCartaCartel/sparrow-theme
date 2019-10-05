 
 <?php get_header() ?>
 <!-- Intro Section================================================== -->
   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" class="flexslider">

		   <ul class="slides">
         <?php 
                    $args = [
                        'numberposts' => 5,
                        'post_type' => 'slider',
                        'suppress_filters' => true
                    ];

                    $posts = get_posts( $args );
                  
                    foreach($posts as $post){
                        setup_postdata($post);
                    ?>
			   <!-- Slide -->
            <li>
				   <div class="row">
					   <div class="twelve columns">
						   <div class="slider-text">
							   <h1><?php the_title()?><span>.</span></h1>
							   <p><?php the_excerpt()?></p>
						   </div>
                     <div class="slider-image">
                        <img src="<?php the_post_thumbnail_url();?>" alt="" />
                     </div>
					   </div>
				   </div>
			   </li>
            <?php }?>
		   </ul>

	   </div> <!-- Flexslider End-->

   </section> <!-- Intro Section End-->

   <!-- Info Section
   ================================================== -->
   <section id="info">

      <?php get_sidebar('top');?>

   </section> <!-- Info Section End-->
   <!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">

         <div class="twelve columns align-center">
            <h1>Some of our recent works.</h1>
         </div>

         <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-halves">

         <?php 
                    $args = [
                        'numberposts' => 4,
                        'post_type' => 'portfolio',
                        'suppress_filters' => true
                    ];

                    $posts = get_posts( $args );
                  

                    foreach($posts as $post){
                        setup_postdata($post);
                    ?>
                    
                    <div class="columns portfolio-item">
                        <div class="item-wrap">
                           <a href="<?php the_permalink(); ?>">
                              <img alt="" src="<?php the_post_thumbnail_url();?>">
                              <div class="link-icon"><i class="fa fa-link"></i></div>
                           </a>
                           <div class="portfolio-item-meta">
                              <h5><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
                              <p><?php the_excerpt()?></p>
                           </div>
                        </div>
                     </div>
                    
                    <?php };?>
         </div>

      </div>

   </section> <!-- Works Section End-->

   <!-- Journal Section
   ================================================== -->
   <section id="journal">

      <div class="row">
         <div class="twelve columns align-center">
            <h1>Our latest posts and rants.</h1>
         </div>
      </div>

      <div class="blog-entries">
         <?php
         
            // параметры по умолчанию
               $posts = get_posts( array(
                  'numberposts' => 3,
                  'post_type'   => 'post',
                  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
               ) );

               foreach( $posts as $post ){
                  setup_postdata($post);
                  // формат вывода the_title() ...?>
                  
                  <article class="row entry">

                     <div class="entry-header">

                        <div class="permalink">
                           <a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>
                        </div>

                        <div class="ten columns entry-title pull-right">
                           <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                        </div>

                        <div class="two columns post-meta end">
                           <p>
                           <time datetime="<?php the_time('F jS Y')?>" class="post-date" pubdate=""><?php the_time('F jS Y')?></time>
                           <span class="dauthor"><?php the_author();?></span>
                           </p>
                        </div>

                     </div>

                     <div class="ten columns offset-2 post-content">
                        <?php the_excerpt(); ?>
                     </div>

                  </article> <!-- Entry End -->
                                    
                  
                  
                  <?php
               }

               wp_reset_postdata(); // сброс
         ?>
      </div> <!-- Entries End -->

   </section> <!-- Journal Section End-->

<?php get_footer() ?>

