<?php
/**
 * The template for displaying search forms in motrton-one (stolen from Twenty Eleven)
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>
<!-- this is SEARCHFORM.PHP -->

      <form role="search" method="get" id="searchform" action="<?php echo  home_url( '/' ) ; ?>">
         <input type="text" name="s" id="s" data-provide="typeahead" placeholder="<?php esc_attr_e( 'Suche', 'motrton-one' ); ?>" />
       </form>
<!-- END SEARCHFORM.PHP -->