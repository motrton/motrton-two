<?php
// based on this tutorial
// http://www.webdesignerdepot.com/2012/02/creating-a-custom-wordpress-theme-options-page/
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'motrton-two_options', 'motrton-two_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'motrton-two' ), __( 'Theme Options', 'motrton-two' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */


/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'motrton-two' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'motrton-two' ); ?></strong></p></div>
		<?php endif; ?>
		<h3>Achtung! Nur editieren wenn du weisst was du tust. ;)</h3>
		<form method="post" action="options.php">
			<?php settings_fields( 'motrton-two_options' ); ?>
			<?php $options = get_option( 'motrton-two_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * A sample checkbox option
				 */
				?>
			 	<tr valign="top"><th scope="row"><?php _e( 'Add Debug info to pages?', 'motrton-two' ); ?></th>
					<td>
						<input id="motrton-two_options[debugger]" name="motrton-two_options[debugger]" type="checkbox" value="1" <?php checked( '1', $options['debugger'] ); ?> />
						<label class="description" for="motrton-two_options[debugger]"><?php _e( '', 'motrton-two' ); ?></label>
					</td>
				</tr> 

				<?php
				/**
				 * A sample text input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Page IDs to exclude from menu', 'motrton-two' ); ?></th>
					<td>
						<input id="motrton-two_options[excludepages]" class="regular-text" type="text" name="motrton-two_options[excludepages]" value="<?php esc_attr_e( $options['excludepages'] ); ?>" />
						<label class="description" for="motrton-two_options[excludepages]"><?php _e( '', 'motrton-two' ); ?></label>
					</td>
				</tr>


				<tr valign="top"><th scope="row"><?php _e( 'Page ID for Impressum', 'motrton-two' ); ?></th>
					<td>
						<input id="motrton-two_options[impressumpage]" class="regular-text" type="text" name="motrton-two_options[impressumpage]" value="<?php esc_attr_e( $options['impressumpage'] ); ?>" />
						<label class="description" for="motrton-two_options[impressumpage]"><?php _e( '', 'motrton-two' ); ?></label>
					</td>
				</tr>



				<tr valign="top"><th scope="row"><?php _e( 'Page ID for Contact', 'motrton-two' ); ?></th>
					<td>
						<input id="motrton-two_options[contactpage]" class="regular-text" type="text" name="motrton-two_options[contactpage]" value="<?php esc_attr_e( $options['contactpage'] ); ?>" />
						<label class="description" for="motrton-two_options[contactpage]"><?php _e( '', 'motrton-two' ); ?></label>
					</td>
				</tr>



				<tr valign="top"><th scope="row"><?php _e( 'Page ID for Newsletter', 'motrton-two' ); ?></th>
					<td>
						<input id="motrton-two_options[newsletterpage]" class="regular-text" type="text" name="motrton-two_options[newsletterpage]" value="<?php esc_attr_e( $options['newsletterpage'] ); ?>" />
						<label class="description" for="motrton-two_options[newsletterpage]"><?php _e( '', 'motrton-two' ); ?></label>
					</td>
				</tr>



				<tr valign="top"><th scope="row"><?php _e( 'Page ID for Register', 'motrton-two' ); ?></th>
					<td>
						<input id="motrton-two_options[registerpage]" class="regular-text" type="text" name="motrton-two_options[registerpage]" value="<?php esc_attr_e( $options['registerpage'] ); ?>" />
						<label class="description" for="motrton-two_options[registerpage]"><?php _e( '', 'motrton-two' ); ?></label>
					</td>
				</tr>
<!-- carousel -->
				<tr valign="top"><th scope="row"><?php _e( 'Page IDs for carousel', 'motrton-two' ); ?></th>
					<td>
						<input id="motrton-two_options[carouselpages]" class="regular-text" type="text" name="motrton-two_options[carouselpages]" value="<?php esc_attr_e( $options['carouselpages'] ); ?>" />
						<label class="description" for="motrton-two_options[carouselpages]"><?php _e( '', 'motrton-two' ); ?></label>
					</td>
				</tr>

<!-- search terms -->
				<tr valign="top"><th scope="row"><?php _e( 'Own Search Terms', 'motrton-two' ); ?></th>
					<td>
						<input id="motrton-two_options[searchterms]" class="regular-text" type="text" name="motrton-two_options[searchterms]" value="<?php esc_attr_e( $options['searchterms'] ); ?>" />
						<label class="description" for="motrton-two_options[searchterms]"><?php _e( '', 'motrton-two' ); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'motrton-two' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/