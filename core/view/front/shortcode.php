<?php
	/**
	 * @param $data shortcode attributes
	**/

	if( ! class_exists( 'Aq_Resize' )) {
		require_once $this->plugin_path . 'core/vendor/aq_resizer/aq_resizer.php';
	}

	$users = new WP_User_Query( array(
		'order' => $data['order'],
		'orderby' => $data['orderby'],
		'number' => $data['number'],
		'meta_query' => array(
			array(
				'key' => 'ff_joinus',
				'value' => 'yes',
				'compare' => '='
			)
		)
	));

?>

<div class="ff-joinus">

	<?php if( $data['join_text_position'] === 'top' ): ?>

		<?php
			// Title and button
			include 'caption.php';
		?>

	<?php endif; ?>

	<?php if( ! empty( $users->results ) ): ?>
	<div class="ff-joinus-grid ff-hover-effect-<?php echo esc_attr( $data['hover_effect'] ); ?>" data-margins="<?php echo esc_attr( $data['grid_margins'] ); ?>" data-col-width="<?php echo esc_attr( $data['col_width'] ); ?>" data-col-width-medium="<?php echo esc_attr( $data['col_width_medium_screen'] ); ?>" data-col-width-small="<?php echo esc_attr( $data['col_width_small_screen'] ); ?>">
		<?php foreach ( $users->results as $user ): ?>

			<div class="ff-joinus-grid-item">

				<div class="ff-joinus-grid-item-inside">

					<div class="ff-joinus-grid-item-overlay"></div>

					<div class="ff-joinus-grid-item-image">
						<a target="_blank" rel="nofollow" href="<?php echo esc_attr( get_user_meta( $user->ID, 'ff_joinus_social_profile_url', true ) ); ?>">
							<?php
								$social_avatar = get_user_meta( $user->ID, 'ff_joinus_photo_id', true );
								if( is_numeric( $social_avatar ) ) {

									$attachment_url = wp_get_attachment_url( $social_avatar );
									$resized = aq_resize( $attachment_url, $data['photo_width'], $data['photo_height'], true );
									$src = !$resized ? $attachment_url : $resized;
									echo '<img src="' . esc_attr( $src ) . '" alt="" />';

								} else {
									// fallback to default avatar
									echo get_avatar( $user->ID, $data['photo_width'] );
								}
							?>
						</a>
					</div>

					<?php if( filter_var( $data['display_name'], FILTER_VALIDATE_BOOLEAN ) ): ?>
					<div class="ff-joinus-grid-item-text">
						<?php
							$user_info = get_userdata( $user->ID );
							echo wp_kses_post( $user_info->display_name );
						?>
					</div>
					<?php endif; ?>

				</div>

			</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>

	<?php if( $data['join_text_position'] === 'bottom' ): ?>

		<?php
			// Title and button
			include 'caption.php';
		?>

	<?php endif; ?>

</div>