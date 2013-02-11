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
<div class="ui-widget">
      <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
         <input type="text" name="s" id="s" class="input-medium search-query" data-provide="typeahead" placeholder="<?php esc_attr_e( 'Suche', 'motrton-one' ); ?>" />
       </form>
</div>
<!-- END SEARCHFORM.PHP -->