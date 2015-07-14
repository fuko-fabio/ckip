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
    </div><!-- close .container -->
    
    <div class="site-footer-bottom">
        <div class="container">
            <div class="site-footer-inner">
                <div class="row">
                    <div class="col-md-3 logo">
                        <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/logo.png" /></a>
                    </div>
                    <div class="col-md-3 footer-sidebar1 fsidebar">
                    <?php
                        if(is_active_sidebar('footer-sidebar-1')){
                            dynamic_sidebar('footer-sidebar-1');
                        }
                    ?>
                    </div>
                    <div class="col-md-3 footer-sidebar2 fsidebar">
                    <?php
                        if(is_active_sidebar('footer-sidebar-2')){
                        dynamic_sidebar('footer-sidebar-2');
                        }
                    ?>
                    </div>
                    <div class="col-md-3 footer-sidebar3 fsidebar">
                    <?php
                        if(is_active_sidebar('footer-sidebar-3')){
                            dynamic_sidebar('footer-sidebar-3');
                        }
                    ?>
                    </div>
                </div>
                <div class="row copyright">
                    <div class="col-sm-8">
                        Copyright &copy; 2015 <a href="<?php echo get_site_url(); ?>" title="<?php _e( 'CKiP', 'nps' ); ?>"><?php _e( 'CKiP', 'nps' ); ?></a>
                    </div>
                
                    <div class="col-sm-4">
                        <a target="_blank" href="http://npsoftware.pl" title="nps software" class="author"><span class="cname">nps</span><span class="csoftware"> software</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>