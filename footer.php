</div> <!-- close wreppaer in header.php -->
<?php wp_footer(); ?>
<!-- this is FOOTER.PHP -->
    <footer>
                <?php
                $options = get_option('motrton-two_options');
                $impressumpage = '<a href="' . get_permalink( $options['impressumpage'] ) .'">Impressum</a> <span class="olios-extra-special-white-space">&emsp;&emsp;</span>';
                $contactpage = ' <a href="'. get_permalink( $options['contactpage'] ) . '">Kontakt</a> <span class="olios-extra-special-white-space">&emsp;&emsp;</span>';
                $newsletterpage = '<a href="' . get_permalink( $options['newsletterpage'] ) . '">Newsletter</a> &nbsp;&nbsp;&nbsp;';
                echo $impressumpage . $contactpage . $newsletterpage;

                $dashboardlink = admin_url();
                $loginlink = wp_login_url( get_permalink() );
                $logoutlink =  wp_logout_url( get_permalink() );
                $registerlink = get_page_link(220);

                if ( is_user_logged_in() ) {
                    echo ' <a href="' . $dashboardlink . '"> <span class="footer-workitems-text">Dashboard</span> <i class="icon-wrench"></i></a><span class="olios-extra-special-white-space">&emsp;&emsp;</span><a href="' . $logoutlink . '"><span class="footer-workitems-text">Ausloggen</span> <i class="icon-signout"></i></a>' ; 
                 }else{
                    echo '<span class="olios-extra-special-white-space">&emsp;&emsp;</span><a href="' . $loginlink . '"> <span class="footer-workitems-text">Einloggen</span> <i class="icon-signin"></i></a>';
                    if(get_option('users_can_register')) { 
                    echo '<span class="olios-extra-special-white-space">&emsp;&emsp;</span><a href="' . $registerlink . '"> <span class="footer-workitems-text">Registrieren</span> <i class="icon-user"></i></a>'; 
                    }
                 }
                 ?>

    </footer>

<div id="scrolltop-grid"><div id="scrolltop"><a href="#top"><i class="icon-circle-arrow-up"></i></a></div>
</div>
</body>
<!-- END FOOTER.PHP -->
</html>