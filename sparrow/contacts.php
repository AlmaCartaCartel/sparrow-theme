<?php
/*
Template Name: Contact
Template Post Type: post, page
*/
?>
<?php get_header()?>
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php the_title()?><span>.</span></h1>

            <p><?php the_excerpt()?></p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row page">

         <div id="primary" class="eight columns">

            <section>

              <h1><?php the_title()?></h1>

              <p class="lead"><?php the_content()?></p>

              <div id="contact-form">
                    <!-- <?php echo do_shortcode('[contact-form-7 id="142" title="Контактная форма 1"]');?> -->
                  <!-- form -->
                  <form name="contactForm" id="contactForm" method="post" action="<?php echo admin_url('admin-ajax.php?action=send_mail')?>">
      					<fieldset>

                        <div class="half">
      						   <label for="contactName">Name <span class="required">*</span></label>
      						   <input name="contactName" type="text" id="contactName" size="35" value="" />
                        </div>

                        <div class="half pull-right">
      						   <label for="contactEmail">Email <span class="required">*</span></label>
      						   <input name="contactEmail" type="text" id="contactEmail" size="35" value="" />
                        </div>

                        <div>
      						   <label for="contactSubject">Subject</label>
      						   <input name="contactSubject" type="text" id="contactSubject" size="35" value="" />
                        </div>

                        <div>
                           <label  for="contactMessage">Message <span class="required">*</span></label>
                           <textarea name="contactMessage"  id="contactMessage" rows="15" cols="50" ></textarea>
                        </div>

                        <div>
                           <button class="submit">Submit</button>
                           <span id="image-loader">
                              <img src="images/loader.gif" alt="" />
                           </span>
                        </div>

      					</fieldset>
      				</form> 

                  <!-- contact-warning -->
                  <div id="message-warning"></div>
                  <!-- contact-success -->
      				<div id="message-success">
                     <i class="icon-ok"></i>Your message was sent, thank you!<br />
      				</div>

               </div>

            </section> <!-- section end -->

         </div>

         <div id="secondary" class="four columns end">

         <?php get_sidebar() ?>

         </div>

      </div>

   </div> <!-- Content End-->
   <!-- footer
   ================================================== -->
<?php get_footer()?>