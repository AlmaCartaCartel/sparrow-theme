
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

                  <h1><?php the_title()?>.</h1>

                  <div class="entry-description">

                     <p><?php the_field('excerpt')?></p>

                  </div>

                  <ul class="portfolio-meta-list">
						   <li><span>Date: </span><?php the_field('date')?></li>
						   <li><span>Client </span><?php the_field('client')?></li>
						   <li><span>Skills: </span><?php the_terms( get_the_ID(), 'skills', '',' / ', '')?></li>
				      </ul>

                  <a class="button" href="http://behance.net">View project</a>

            </div> <!-- secondary End-->

            <div id="primary" class="eight columns">

               <div class="entry-media">

                  <img src="<?php the_field('image')?>" alt="" />

                  <!-- <img src="images/portfolio/entries/geometric-backgrounds-02.jpg" alt="" /> -->

               </div>

               <div class="entry-excerpt">

				      <p><?php the_field('content')?> </p>

					</div>

            </div> <!-- primary end-->

         </section> <!-- end section -->

         <!-- <ul class="post-nav cf">
			   <li class="prev"><a href="#" rel="prev"><strong>Previous Entry</strong> Duis Sed Odio Sit Amet Nibh Vulputate</a></li>
				<li class="next"><a href="#" rel="next"><strong>Next Entry</strong> Morbi Elit Consequat Ipsum</a></li>
			</ul> -->

      </div>

   </div> <!-- content End-->


   <?php get_footer()?>