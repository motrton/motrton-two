<?php
/**
 * The template used for displaying dates
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>

  <?php
        $dt = get_the_date();
         $t = get_the_time();
         echo __('gepostet am','motrton_two')." <span id=\"date\">". $dt . "</span><span class=\"olios-extra-special-white-space\">&emsp;&emsp;</span>" . __('um','motrton_two') ." <span id=\"time\">" .$t . "</span><span class=\"olios-extra-special-white-space\">&emsp;&emsp;</span>";
?>