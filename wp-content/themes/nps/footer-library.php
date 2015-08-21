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
              <?php _e( 'Partnesr', 'nps' ); ?>
           </div>
           <a href="http://czasdzieci.pl" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/czas_dzieci.png" />
               </div>
           </a>
           <a href="http://www.bn.org.pl" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/bn.png" />
               </div>
           </a>
           <a href="http://fundacja.orange.pl" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/orange.png" />
               </div>
           </a>
           <a href="#" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/narodowy_program_rozwoju_czyt.png" />
               </div>
           </a>
           <a href="https://wolnelektury.pl" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/wolnelektury.png" />
               </div>
           </a>
           <a href="http://bookto.pl" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/bookto.png" />
               </div>
           </a>
        </div>

        <?php get_newsletter_form() ?>
    </div><!-- close .container -->
    
    <?php get_bottom_footer() ?>
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>