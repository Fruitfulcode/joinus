<?php

	/**
	 * Back-end part of plugin
	 **/

	class ff_joinus_core_controller_backend extends ff_joinus {

		function __construct() {

			parent::__construct();
			$this->run();

		}

		/**
		 * Here we add actions / filters etc for a backend side
		 **/
		function run() {

			// add admin styles
			add_action( 'admin_enqueue_scripts', array( $this, 'load_assets') );

			// register plugin settings
			add_action( 'admin_init', array( $this, 'register_plugin_settings' ) );

			// add settings menu
			add_action( 'admin_menu', array( $this, 'add_menu') );

			// Add action save plugin settings to update ffc stat option
			add_action( 'fruitful_joinus_plugin_setting_save',  array( $this, 'save_plugin_settings' ) );

		}

		/**
		 * Add scripts and styles
		 **/
		function load_assets() {

			wp_enqueue_style( 'ff-joinus-backend', $this->plugin_url . 'assets/css/admin.css' );

		}

		/**
		 * Register plugin settings
		**/
		function register_plugin_settings() {

			register_setting( 'ff_joinus_settings', 'ff_joinus_facebook_app_api_key' );
			register_setting( 'ff_joinus_settings', 'ff_joinus_facebook_app_secret' );

			register_setting( 'ff_joinus_settings', 'ff_joinus_linkedin_api_key' );
			register_setting( 'ff_joinus_settings', 'ff_joinus_linkedin_api_secret' );
			
			register_setting( 'ff_joinus_settings', 'ff_joinus_instagram_client_id' );
			register_setting( 'ff_joinus_settings', 'ff_joinus_instagram_client_secret' );

			register_setting( 'ff_joinus_settings', 'ff_joinus_google_client_id' );
			register_setting( 'ff_joinus_settings', 'ff_joinus_google_client_secret' );

			do_action('fruitful_joinus_plugin_setting_save');
		}

		/**
		 * Add settings menu
		 **/
		function add_menu() {
			add_submenu_page( 'options-general.php', esc_html__( 'Join Us Plugin Settings', 'joinus' ), esc_html__( 'Join Us Plugin Settings', 'joinus' ), 'administrator', __FILE__, array( $this, 'display_settings_page' ) );
		}

		/**
		 * Display plugin's settings page
		**/
		function display_settings_page() {

			/** Default values statistics options */
			$data['ffc_statistic'] = 1;
			$data['ffc_subscribe'] = 0;
			$data['ffc_email'] = '';
			$data['ffc_name'] = '';

			/** General statistics option for all fruitfulcode products */
			$ffc_statistics_option = get_option('ffc_statistics_option');

			if( $ffc_statistics_option ) {

				if( isset($ffc_statistics_option['ffc_statistic']) ) {
					$data['ffc_statistic'] = (int) $ffc_statistics_option['ffc_statistic'];
				}
				if( isset($ffc_statistics_option['ffc_subscribe']) ) {
					$data['ffc_subscribe'] = (int) $ffc_statistics_option['ffc_subscribe'];
				}
				if( isset($ffc_statistics_option['ffc_subscribe_email']) ) {
					$data['ffc_email'] = $ffc_statistics_option['ffc_subscribe_email'];
				}
				if( isset($ffc_statistics_option['ffc_subscribe_name']) ) {
					$data['ffc_name'] = $ffc_statistics_option['ffc_subscribe_name'];
				}
			}

			$this->view->load( 'backend/settings', $data );

		}

		/**
		 * Save plugin settings action
		 */
		public function save_plugin_settings() {

			$post = $_POST;

			if( !empty($post) ){
				if( !empty($post['option_page']) )
				{
					if( $post['option_page'] === 'ff_joinus_settings' ) {
						$ffc_statistics_option = get_option('ffc_statistics_option');

						if ( isset($post['ffc_statistic']) ) {
							$ffc_statistics_option['ffc_statistic'] = (int)$post['ffc_statistic'];
						} else {
							$ffc_statistics_option['ffc_statistic'] = 0;
						}

						if ( isset($post['ffc_subscribe']) ) {
							$ffc_statistics_option['ffc_subscribe'] = (int)$post['ffc_subscribe'];
						} else {
							$ffc_statistics_option['ffc_subscribe'] = 0;
						}

						if ( isset($post['ffc_subscribe_email']) ) {
							$ffc_statistics_option['ffc_subscribe_email'] = $post['ffc_subscribe_email'];
						} else {
							$ffc_statistics_option['ffc_subscribe_email'] = '';
						}

						if ( isset($post['ffc_subscribe_name']) ) {
							$ffc_statistics_option['ffc_subscribe_name'] = $post['ffc_subscribe_name'];
						} else {
							$ffc_statistics_option['ffc_subscribe_name'] = '';
						}

						update_option('ffc_statistics_option', $ffc_statistics_option);
					}
				}
			}
		}

	}