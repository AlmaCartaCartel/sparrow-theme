
<footer>


      <div class="row">

         <div class="twelve columns">
            <?php wp_nav_menu( [
                           'theme_location'  => 'footer_menu',
                           'container'       => null, 
                           'menu_class'      => 'footer-nav', 
                           'echo'            => true,
                        ] );?>
                        
            <?php wp_nav_menu([
                           'theme_location'  => 'social',
                           'container'       => null, 
                           'menu_class'      => 'footer-social', 
                           'echo'            => true,
            ])?>
            <!-- Что бы получить иконку , вставить это в текст сыллки
               <i class="fa fa-facebook"></i>
               <i class="fa fa-twitter"></i>
               <i class="fa fa-google-plus"></i>
               <i class="fa fa-linkedin"></i>
               <i class="fa fa-skype"></i>
             -->

            <ul class="copyright">
               <li>Design by <a href="https://github.com/AlmaCartaCartel/">AlmaCartaCartel</a></li>               
            </ul>

         </div>

         <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

      </div>

   </footer> <!-- Footer End-->
    <?php wp_footer() ?>
</body>

</html>