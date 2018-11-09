<?php if( apply_filters('ffc_is_advertising_enabled_joinus_pro', false) ) { ?>
	<div class="notice joinus-advertising-wrapper">
		<?php echo apply_filters('ffc_advertising_joinus_pro', null); ?>
	</div>
<?php }
elseif( apply_filters('ffc_is_advertising_enabled_joinus', false) ) { ?>
	<div class="notice joinus-advertising-wrapper">
		<?php echo apply_filters('ffc_advertising_joinus', null); ?>
	</div>
<?php } ?>
<div class="ff-joinus-settings-wrap wrap">

	<h2><?php esc_html_e( 'Join Us Plugin Settings', 'joinus' ); ?></h2>

	<form method="post" action="options.php">

		<?php settings_fields( 'ff_joinus_settings' ); ?>

		<div class="ff-joinus-settings-form">
			<h2><?php esc_html_e( 'Facebook API', 'joinus' ); ?></h2>

			<table class="form-table">

				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Facebook App API Key', 'joinus' ); ?></th>
					<td>

						<input type="text" class="widefat" name="ff_joinus_facebook_app_api_key" value="<?php echo esc_attr( get_option('ff_joinus_facebook_app_api_key') ); ?>" />

					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Facebook App Secret', 'joinus' ); ?></th>
					<td>

						<input type="text" class="widefat" name="ff_joinus_facebook_app_secret" value="<?php echo esc_attr( get_option('ff_joinus_facebook_app_secret') ); ?>" />

					</td>
				</tr>

			</table>
		</div>

		<?php do_action( 'ff_joinus_display_settings_page'); ?>

		<div class="ff-joinus-settings-form">

			<div class="ffst-modal__content">
				<h2><?php _e( 'Fruitful Code statistic', 'ff_shortcodes' ); ?></h2>
				<p class="description">
					<?php _e( 'We would be happy if you assist us in becoming better. Share your site anonymous technical data to help us
                        improve our products and services. Also, don’t forget to subscribe to the Fruitful Code
                        newsletters for the latest updates!', 'ff_shortcodes' ); ?>
				</p>
				<div class="form-group">
					<label>
						<input type="checkbox"
						       name="ffc_statistic"
						       value="1"
							<?php if($data['ffc_statistic'] === 1) { echo esc_attr( 'checked'); }?> >
						<?php _e( 'Send configuration information to Fruitful Code to help to improve this plugin', 'ff_shortcodes' ) ?>
					</label>
				</div>

				<div class="form-group">
					<label>
						<input type="checkbox"
						       name="ffc_subscribe"
						       value="1"
							<?php if($data['ffc_subscribe'] === 1) { echo esc_attr( 'checked'); }?> >
						<?php _e( 'Subscribe to the Fruitful Code newsletters', 'ff_shortcodes' ) ?>
					</label>


					<table class="form-table">

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Name', 'joinus' ); ?></th>
							<td>

								<input type="text" placeholder="Name" class="widefat" name="ffc_subscribe_name" value="<?php echo esc_attr( $data['ffc_name'] ); ?>">

							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'E-mail', 'joinus' ); ?></th>
							<td>

								<input type="email" placeholder="E-mail" class="widefat" name="ffc_subscribe_email" value="<?php echo esc_attr( $data['ffc_email'] ); ?>">

							</td>
						</tr>

					</table>
				</div>

			</div>

		</div>

		<?php submit_button(); ?>

	</form>



</div>