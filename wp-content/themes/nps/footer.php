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
        <div class="partners">
            <div class="header">
                <?php _e( 'Partners', 'nps' ); ?>
            </div>
            <div class="slick-list">
                <div class="item">
                    <a href="http://www.michalowice.malopolska.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/gmina_michalowice.png" /></a>
                </div>
                <div class="item">
                    <a href="http://czasdzieci.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/czas_dzieci.png" /></a>
                </div>
                <div class="item">
                    <a href="http://www.wieniawa.eu" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/wieniawa.png" /></a>
                </div>
                <div class="item">
                    <a href="http://mik.krakow.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/mik.png" /></a>
                </div>
                <div class="item">
                    <a href="www.koronakrakowa.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/korona.png" /></a>
                </div>
                <div class="item">
                    <a href="http://www.agencjaspm.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/spm.png" /></a>
                </div>
                <div class="item">
                    <a href="http://www.bn.org.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/bn.png" /></a>
                </div>
                <div class="item">
                    <a href="http://bookto.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/bookto.png" /></a>
                </div>
                <div class="item">
                    <a href="https://wolnelektury.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/wolnelektury.png" /></a>
                </div>
                <div class="item">
                    <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/narodowy_program_rozwoju_czyt.png" /></a>
                </div>
                <div class="item">
                    <a href="http://fundacja.orange.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/orange.png" /></a>
                </div>
                <div class="item">
                    <a href="http://strumillo.org.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/strumilla.png" /></a>
                </div>
            </div>
        </div>

        <?php get_newsletter_form() ?>
    </div><!-- close .container -->
    
    <?php get_bottom_footer() ?>
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>