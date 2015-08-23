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
           <a href="http://www.koronakrakowa.pl" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/korona.png" />
               </div>
           </a>
           <a href="http://www.e-michalowice.pl" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/gmina_michalowice.png" />
               </div>
           </a>
           <a href="http://www.agencjaspm.com" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/spm.png" />
               </div>
           </a>
           <a href="http://www.idealy.eu" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/idealy.png" />
               </div>
           </a>
           <a href="http://www.wieniawa.eu" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/wieniawa.png" />
               </div>
           </a>
           <a href="http://mik.krakow.pl" target="_blank">
               <div class="col-xs-2 item-static">
                  <img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/mik.png" />
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