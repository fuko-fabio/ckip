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
                <?php _e( 'Our partners', 'nps' ); ?>
            </div>
            <div class="row list">
                <div class="col-2 item">
                    <a href="http://www.michalowice.malopolska.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/gmina_michalowice.png" /></a>
                </div>
                <div class="col-2 item">
                    <a href="http://czasdzieci.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/czas_dzieci.png" /></a>
                </div>
                <div class="col-2 item">
                    <a href="http://mik.krakow.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/mik.png" /></a>
                </div>
                <div class="col-2 item">
                    <a href="www.koronakrakowa.pl" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/korona.png" /></a>
                </div>
                <div class="col-2 item">
                    <a href="http://www.agencjaspm.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/spm.png" /></a>
                </div>
                <div class="col-2 item">
                    <a href="http://www.wieniawa.eu" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/wieniawa.png" /></a>
                </div>
            </div>
        </div>

        <div class="newsletter newsletter-subscription">
            <form method="post" action="<?php echo get_site_url(); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
                <div class="header">
                    <?php _e( 'Newsletter', 'nps' ); ?>
                </div>
                <div class="info">
                    <span><?php _e( 'Submit', 'nps' ); ?> </span><?php _e( 'your email to get updates from us.', 'nps' ); ?>
                </div>
                <div class="actions">
                    <input class="newsletter-email" type="email" name="ne" placeholder="my.email@example.com" required>
                    <input class="newsletter-submit" type="submit" value="<?php _e( 'Subscribe!', 'nps' ); ?>"/>
                </div>
            </form>
        </div>
        <div class="site-footer-inner">
            <div class="row">
                <div class="col-3 logo">
                    <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/partners/wieniawa.png" /></a>
                </div>
                <div class="col-3 footer-sidebar1 fsidebar">
                <?php
                    if(is_active_sidebar('footer-sidebar-1')){
                        dynamic_sidebar('footer-sidebar-1');
                    }
                ?>
                </div>
                <div class="col-3 footer-sidebar2 fsidebar">
                <?php
                    if(is_active_sidebar('footer-sidebar-2')){
                    dynamic_sidebar('footer-sidebar-2');
                    }
                ?>
                </div>
                <div class="col-3 footer-sidebar3 fsidebar">
                <?php
                    if(is_active_sidebar('footer-sidebar-3')){
                        dynamic_sidebar('footer-sidebar-3');
                    }
                ?>
                </div>
            </div>
            <div class="row copyright">
                <div class="col-8">
                    Copyright &copy; 2015 <a href="<?php echo get_site_url(); ?>" title="<?php _e( 'Centrum kultury i promocji w Michałowicach', 'nps' ); ?>"><?php _e( 'Centrum kultury i promocji w Michałowicach', 'nps' ); ?></a>
                </div>
            
                <div class="col-4">
                    <a target="_blank" href="http://npsoftware.pl" title="nps software" class="author"><span class="cname">nps</span><span class="csoftware"> software</span></a>
                </div>
            </div>
        </div>
    </div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>