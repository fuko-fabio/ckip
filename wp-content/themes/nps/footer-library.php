<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package nps
 */
?>
            </div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
        </div><!-- close .row -->
    </div><!-- close .container -->
</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row partners">
           <div class="header">
              <?php _e( 'Partners', 'nps' ); ?>
           </div>
           
           <div class="col-xs-4 col-sm-2 static-item">
               <a href="http://www.mkidn.gov.pl" target="_blank">
                   <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/mkidn.png" />
               </a>
           </div>
           <div class="col-xs-4 col-sm-2 static-item">
               <a href="http://www.bn.org.pl" target="_blank">
                   <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/bn.png" />
               </a>
           </div>
           <div class="col-xs-4 col-sm-2 static-item">
               <a href="http://fundacja.orange.pl" target="_blank">
                   <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/orange.png" />
               </a>
           </div>
           <div class="col-xs-4 col-sm-2 static-item">
               <a href="#" target="_blank">
                   <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/narodowy_program_rozwoju_czyt.png" />
               </a>
           </div>
           <div class="col-xs-4 col-sm-2 static-item">
               <a href="https://wolnelektury.pl" target="_blank">
                   <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/wolnelektury.png" />
               </a>
           </div>
        </div>
        <?php get_newsletter_form() ?>
    </div><!-- close .container -->
    
    <?php get_bottom_footer('library_logo_white.png') ?>
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>