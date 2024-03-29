<?php
/*
Template Name: Портфолио
*/
?>

<?php get_header()?>

  
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Our Amazing Works<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row portfolio">

         <section class="entry cf">

            <div id="secondary"  class="four columns entry-details">

               <h1>Our Portfolio.</h1>

               <p class="lead">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh.</p>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
               cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
               ornare odio.</p>

            </div> <!-- Secondary End-->

            <div id="primary" class="eight columns portfolio-list">

               <div id="portfolio-wrapper" class="bgrid-halves cf">

               <?php 
                    $args = [
                        'numberposts' => 9,
                        'post_type' => 'portfolio',
                        'suppress_filters' => true
                    ];

                    $posts = get_posts( $args );
                    $int = true;

                    foreach($posts as $post){
                        setup_postdata($post);
                        ?>

                        <div class="columns portfolio-item <?php if($int) echo ' first' ;?>">
                            <div class="item-wrap">
          				        <a href="<?php the_permalink();?>">
                                    <img alt="" src="<?php echo the_post_thumbnail_url();?>">
                                    <div class="overlay"></div>
                                    <div class="link-icon"><i class="fa fa-link"></i></div>
                                </a>
          					<div class="portfolio-item-meta">
          					   <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                <p><?php the_excerpt()?></p>
          					</div>
                            </div>
          			    </div>
                        <?php
                       $int = !$int;
                    };
                    wp_reset_postdata();
               ?>
               </div>

            </div> <!-- primary end-->

         </section> <!-- end section -->

      </div> <!-- #page-content end-->

   </div> <!-- content End-->

    <?php get_footer()?>