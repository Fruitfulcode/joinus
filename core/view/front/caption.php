<div class="ff-joinus-caption">
	<div class="ff-joinus-title">
		<<?php echo esc_attr( $data['join_text_tag'] ); ?>>

		<?php echo wp_kses_post( $data['join_text'] ); ?>

		</<?php echo esc_attr( $data['join_text_tag'] ); ?>>
	</div>
	<div class="ff-joinus-action">
		<div class="ff-joinus-join-social-links">

			<a href="<?php echo esc_attr( add_query_arg( array(
				'ff-joinus' => 'facebook',
				'ff-joinus-page-id' => $data['id'],
				'ff-joinus-return-url' => get_permalink( get_the_ID())
			), site_url('/') ) ); ?>" class="facebook"><i class="fa fa-facebook-official"></i></a> 

			<?php do_action( 'ff_joinus_join_social_links'); ?>

		</div>
		
		<a href="javascript:;" class="ff-joinus-button" data-text="<?php echo esc_attr( $data['join_button_text'] ); ?>" data-active-text="<?php echo esc_attr( $data['join_button_active_text'] ); ?>">
			<?php echo wp_kses_post( $data['join_button_text'] ); ?>
		</a>

	</div>
</div>