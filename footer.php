<?php wp_footer(); ?>
<!-- this is FOOTER.PHP -->
<footer>
                <?php
                $options = get_option('motrton-two_options');
                $impressumpage = '<a href="' . get_permalink( $options['impressumpage'] ) .'">Impressum</a> |';
                $contactpage = ' <a href="'. get_permalink( $options['contactpage'] ) . '">Kontakt</a> |';
                $newsletterpage = '<a href="' . get_permalink( $options['newsletterpage'] ) . '">Newsletter</a> &nbsp;&nbsp;&nbsp;';
                echo $impressumpage . $contactpage . $newsletterpage;

                $dashboardlink = admin_url();
                $loginlink = wp_login_url( get_permalink() );
                $logoutlink =  wp_logout_url( get_permalink() );
                $registerlink = get_page_link(220);

                if ( is_user_logged_in() ) {
                    echo ' <a href="' . $dashboardlink . '"> Dashboard <i class="icon-wrench"></i></a> | <a href="' . $logoutlink . '">Ausloggen <i class="icon-signout"></i></a>' ; 
                 }else{
                    echo ' | <a href="' . $loginlink . '"> Einloggen <i class="icon-signin"></i></a>';
                    if(get_option('users_can_register')) { 
                    echo '| <a href="' . $registerlink . '"> Registrieren <i class="icon-user"></i></a>'; 
                    }
                 }
                 ?>

</footer>
<div id="scrolltop"><a href="#top"><i class="icon-circle-arrow-up"></i></a></div>
</body>
<!-- END FOOTER.PHP -->
</html>