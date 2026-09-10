<?php
/**
 * Career Custom Post Type, Meta Boxes, Admin Columns & Dynamic Shortcode
 *
 * @package Porto Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*
|--------------------------------------------------------------------------
| 1. Register Career Custom Post Type
|--------------------------------------------------------------------------
*/
function ngd_register_career_cpt() {
	$labels = array(
		'name'                  => _x( 'Careers', 'Post type general name', 'porto-child' ),
		'singular_name'         => _x( 'Career', 'Post type singular name', 'porto-child' ),
		'menu_name'             => _x( 'Careers', 'Admin Menu text', 'porto-child' ),
		'name_admin_bar'        => _x( 'Career Opening', 'Add New on Toolbar', 'porto-child' ),
		'add_new'               => __( 'Add New Career', 'porto-child' ),
		'add_new_item'          => __( 'Add New Career Opening', 'porto-child' ),
		'new_item'              => __( 'New Career Opening', 'porto-child' ),
		'edit_item'             => __( 'Edit Career Opening', 'porto-child' ),
		'view_item'             => __( 'View Career', 'porto-child' ),
		'all_items'             => __( 'All Careers', 'porto-child' ),
		'search_items'          => __( 'Search Careers', 'porto-child' ),
		'parent_item_colon'     => __( 'Parent Careers:', 'porto-child' ),
		'not_found'             => __( 'No careers found.', 'porto-child' ),
		'not_found_in_trash'    => __( 'No careers found in Trash.', 'porto-child' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'career-opening', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'menu_icon'          => 'dashicons-id-alt',
		'supports'           => array( 'title', 'editor', 'page-attributes' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'career', $args );
}
add_action( 'init', 'ngd_register_career_cpt' );


/*
|--------------------------------------------------------------------------
| 2. Custom Meta Box for Job Details (Work, Positions, Experience, Apply Link)
|--------------------------------------------------------------------------
*/
function ngd_add_career_meta_boxes() {
	add_meta_box(
		'ngd_career_details_box',
		__( 'Job Opening Details', 'porto-child' ),
		'ngd_render_career_meta_box',
		'career',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'ngd_add_career_meta_boxes' );

function ngd_render_career_meta_box( $post ) {
	wp_nonce_field( 'ngd_save_career_meta_action', 'ngd_career_meta_nonce' );

	$work        = get_post_meta( $post->ID, '_career_work', true );
	$positions   = get_post_meta( $post->ID, '_career_positions', true );
	$experience  = get_post_meta( $post->ID, '_career_experience', true );
	$apply_type  = get_post_meta( $post->ID, '_career_apply_type', true );
	$popup_id    = get_post_meta( $post->ID, '_career_popup_id', true );
	$custom_link = get_post_meta( $post->ID, '_career_custom_link', true );
	$button_text = get_post_meta( $post->ID, '_career_button_text', true );

	// Default fallback values
	if ( '' === $work && 'auto-draft' === $post->post_status ) {
		$work = 'Full Time / On-site';
	}
	if ( '' === $positions && 'auto-draft' === $post->post_status ) {
		$positions = '1';
	}
	if ( '' === $experience && 'auto-draft' === $post->post_status ) {
		$experience = '2+ years';
	}
	if ( empty( $apply_type ) ) {
		$apply_type = 'popup';
	}
	if ( empty( $popup_id ) ) {
		$popup_id = '11487';
	}
	if ( empty( $button_text ) ) {
		$button_text = 'Apply Now';
	}
	?>
	<style>
		.ngd-meta-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 18px; margin-top: 10px; }
		.ngd-meta-field { display: flex; flex-direction: column; }
		.ngd-meta-field label { font-weight: 600; margin-bottom: 6px; color: #1e293b; }
		.ngd-meta-field input, .ngd-meta-field select { padding: 8px 12px; font-size: 14px; border: 1px solid #cbd5e1; border-radius: 6px; }
		.ngd-meta-field .description { font-size: 12px; color: #64748b; margin-top: 4px; font-style: italic; }
		.ngd-meta-section-title { margin-top: 20px; font-size: 15px; font-weight: 700; color: #0f172a; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px; }
	</style>

	<div class="ngd-meta-container">
		<div class="ngd-meta-grid">
			<div class="ngd-meta-field">
				<label for="career_work"><?php esc_html_e( 'Work Type (e.g. Full Time / On-site):', 'porto-child' ); ?></label>
				<input type="text" id="career_work" name="career_work" value="<?php echo esc_attr( $work ); ?>" placeholder="Full Time / On-site" />
				<span class="description"><?php esc_html_e( 'Displayed as "Work : Full Time / On-site"', 'porto-child' ); ?></span>
			</div>

			<div class="ngd-meta-field">
				<label for="career_positions"><?php esc_html_e( 'Number of Positions:', 'porto-child' ); ?></label>
				<input type="text" id="career_positions" name="career_positions" value="<?php echo esc_attr( $positions ); ?>" placeholder="2" />
				<span class="description"><?php esc_html_e( 'Displayed as "Positions : 2"', 'porto-child' ); ?></span>
			</div>

			<div class="ngd-meta-field">
				<label for="career_experience"><?php esc_html_e( 'Experience Required:', 'porto-child' ); ?></label>
				<input type="text" id="career_experience" name="career_experience" value="<?php echo esc_attr( $experience ); ?>" placeholder="2+ years" />
				<span class="description"><?php esc_html_e( 'Displayed as "Experience : 2+ years"', 'porto-child' ); ?></span>
			</div>
		</div>

		<div class="ngd-meta-section-title"><?php esc_html_e( 'Apply Button Settings', 'porto-child' ); ?></div>

		<div class="ngd-meta-grid">
			<div class="ngd-meta-field">
				<label for="career_button_text"><?php esc_html_e( 'Button Text:', 'porto-child' ); ?></label>
				<input type="text" id="career_button_text" name="career_button_text" value="<?php echo esc_attr( $button_text ); ?>" placeholder="Apply Now" />
			</div>

			<div class="ngd-meta-field">
				<label for="career_apply_type"><?php esc_html_e( 'Action on Click:', 'porto-child' ); ?></label>
				<select id="career_apply_type" name="career_apply_type" onchange="ngdToggleApplyFields(this.value)">
					<option value="popup" <?php selected( $apply_type, 'popup' ); ?>><?php esc_html_e( 'Open Elementor Popup (Application Form)', 'porto-child' ); ?></option>
					<option value="link" <?php selected( $apply_type, 'link' ); ?>><?php esc_html_e( 'Custom URL / External Link', 'porto-child' ); ?></option>
				</select>
			</div>

			<div class="ngd-meta-field" id="field_popup_id" style="<?php echo ( 'link' === $apply_type ) ? 'display:none;' : ''; ?>">
				<label for="career_popup_id"><?php esc_html_e( 'Elementor Popup Template ID:', 'porto-child' ); ?></label>
				<input type="text" id="career_popup_id" name="career_popup_id" value="<?php echo esc_attr( $popup_id ); ?>" placeholder="11487" />
				<span class="description"><?php esc_html_e( 'Default is 11487 (Application Details popup form).', 'porto-child' ); ?></span>
			</div>

			<div class="ngd-meta-field" id="field_custom_link" style="<?php echo ( 'popup' === $apply_type ) ? 'display:none;' : ''; ?>">
				<label for="career_custom_link"><?php esc_html_e( 'Custom Link / URL:', 'porto-child' ); ?></label>
				<input type="url" id="career_custom_link" name="career_custom_link" value="<?php echo esc_attr( $custom_link ); ?>" placeholder="https://..." />
				<span class="description"><?php esc_html_e( 'Where applicant is redirected when clicking button.', 'porto-child' ); ?></span>
			</div>
		</div>
	</div>

	<script>
		function ngdToggleApplyFields(val) {
			var popupField = document.getElementById('field_popup_id');
			var linkField  = document.getElementById('field_custom_link');
			if (val === 'popup') {
				popupField.style.display = 'flex';
				linkField.style.display  = 'none';
			} else {
				popupField.style.display = 'none';
				linkField.style.display  = 'flex';
			}
		}
	</script>
	<?php
}

function ngd_save_career_meta( $post_id ) {
	if ( ! isset( $_POST['ngd_career_meta_nonce'] ) || ! wp_verify_nonce( $_POST['ngd_career_meta_nonce'], 'ngd_save_career_meta_action' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['career_work'] ) ) {
		update_post_meta( $post_id, '_career_work', sanitize_text_field( wp_unslash( $_POST['career_work'] ) ) );
	}

	if ( isset( $_POST['career_positions'] ) ) {
		update_post_meta( $post_id, '_career_positions', sanitize_text_field( wp_unslash( $_POST['career_positions'] ) ) );
	}

	if ( isset( $_POST['career_experience'] ) ) {
		update_post_meta( $post_id, '_career_experience', sanitize_text_field( wp_unslash( $_POST['career_experience'] ) ) );
	}

	if ( isset( $_POST['career_button_text'] ) ) {
		update_post_meta( $post_id, '_career_button_text', sanitize_text_field( wp_unslash( $_POST['career_button_text'] ) ) );
	}

	if ( isset( $_POST['career_apply_type'] ) ) {
		update_post_meta( $post_id, '_career_apply_type', sanitize_text_field( wp_unslash( $_POST['career_apply_type'] ) ) );
	}

	if ( isset( $_POST['career_popup_id'] ) ) {
		update_post_meta( $post_id, '_career_popup_id', sanitize_text_field( wp_unslash( $_POST['career_popup_id'] ) ) );
	}

	if ( isset( $_POST['career_custom_link'] ) ) {
		update_post_meta( $post_id, '_career_custom_link', esc_url_raw( wp_unslash( $_POST['career_custom_link'] ) ) );
	}
}
add_action( 'save_post_career', 'ngd_save_career_meta' );


/*
|--------------------------------------------------------------------------
| 3. Custom Columns for Career Admin List Table
|--------------------------------------------------------------------------
*/
function ngd_career_admin_columns( $columns ) {
	$new_columns = array();
	$new_columns['cb']               = $columns['cb'];
	$new_columns['title']            = __( 'Job Title', 'porto-child' );
	$new_columns['career_work']       = __( 'Work Type', 'porto-child' );
	$new_columns['career_positions']  = __( 'Positions', 'porto-child' );
	$new_columns['career_experience'] = __( 'Experience', 'porto-child' );
	$new_columns['career_status']     = __( 'Status', 'porto-child' );
	$new_columns['menu_order']        = __( 'Order', 'porto-child' );
	$new_columns['date']             = $columns['date'];
	return $new_columns;
}
add_filter( 'manage_career_posts_columns', 'ngd_career_admin_columns' );

function ngd_career_admin_column_content( $column, $post_id ) {
	switch ( $column ) {
		case 'career_work':
			$work = get_post_meta( $post_id, '_career_work', true );
			echo esc_html( $work ? $work : '—' );
			break;

		case 'career_positions':
			$positions = get_post_meta( $post_id, '_career_positions', true );
			echo esc_html( $positions ? $positions : '—' );
			break;

		case 'career_experience':
			$exp = get_post_meta( $post_id, '_career_experience', true );
			echo esc_html( $exp ? $exp : '—' );
			break;

		case 'career_status':
			$status = get_post_status( $post_id );
			if ( 'publish' === $status ) {
				echo '<span style="color:#15803d; font-weight:600; background:#dcfce7; padding:2px 8px; border-radius:4px; font-size:12px;">' . esc_html__( 'Published', 'porto-child' ) . '</span>';
			} elseif ( 'draft' === $status ) {
				echo '<span style="color:#b45309; font-weight:600; background:#fef3c7; padding:2px 8px; border-radius:4px; font-size:12px;">' . esc_html__( 'Draft (Hidden)', 'porto-child' ) . '</span>';
			} else {
				echo esc_html( ucfirst( $status ) );
			}
			break;

		case 'menu_order':
			$order = get_post_field( 'menu_order', $post_id );
			echo esc_html( $order );
			break;
	}
}
add_action( 'manage_career_posts_custom_column', 'ngd_career_admin_column_content', 10, 2 );

function ngd_career_sortable_columns( $columns ) {
	$columns['career_positions'] = 'career_positions';
	$columns['menu_order']       = 'menu_order';
	return $columns;
}
add_filter( 'manage_edit-career_sortable_columns', 'ngd_career_sortable_columns' );


/*
|--------------------------------------------------------------------------
| 4. Frontend Shortcode [career_openings] & [careers]
|--------------------------------------------------------------------------
*/
function ngd_career_openings_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'limit'   => -1,
			'orderby' => 'menu_order',
			'order'   => 'ASC',
		),
		$atts,
		'career_openings'
	);

	$args = array(
		'post_type'      => 'career',
		'post_status'    => 'publish', // Only display published jobs; drafts are hidden!
		'posts_per_page' => intval( $atts['limit'] ),
		'orderby'        => array(
			'menu_order' => $atts['order'],
			'date'       => 'DESC',
		),
	);

	$query = new WP_Query( $args );

	if ( ! $query->have_posts() ) {
		return '<div class="ngd-no-careers"><p>' . esc_html__( 'Currently, there are no open positions. Please check back later!', 'porto-child' ) . '</p></div>';
	}

	ob_start();
	?>
	<style>
		.elementor-element.elementor-element-db4ad56,
		.elementor-widget-shortcode,
		.elementor-widget-shortcode .elementor-widget-container {
			width: 100% !important;
			max-width: 100% !important;
		}
		.career-openings-grid {
			display: grid !important;
			grid-template-columns: repeat(3, 1fr) !important;
			gap: 30px !important;
			width: 100% !important;
			margin-top: 20px !important;
			box-sizing: border-box !important;
		}
		.career-card {
			background: #ffffff !important;
			border-radius: 20px !important;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) !important;
			padding: 30px !important;
			display: flex !important;
			flex-direction: column !important;
			justify-content: space-between !important;
			transition: box-shadow 0.3s ease, transform 0.2s ease !important;
			position: relative !important;
			box-sizing: border-box !important;
		}
		.career-card:hover {
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15) !important;
			transform: translateY(-2px) !important;
		}
		.career-card-title {
			color: #0066ff !important;
			font-size: 24px !important;
			font-weight: 600 !important;
			line-height: 32px !important;
			margin: 0 0 12px 0 !important;
			padding: 0 !important;
		}
		.career-card-divider {
			width: 100% !important;
			height: 1px !important;
			background-color: #BCBCBC !important;
			margin: 0 0 16px 0 !important;
		}
		.career-card-work {
			font-size: 15px !important;
			margin-bottom: 12px !important;
			color: #475569 !important;
			text-align: left !important;
		}
		.career-card-work .career-label,
		.career-card-meta-row .career-label {
			font-weight: 700 !important;
			color: #1e293b !important;
			margin-right: 4px !important;
		}
		.career-card-work .career-val,
		.career-card-meta-row .career-val {
			color: #475569 !important;
			font-weight: 500 !important;
		}
		.career-card-meta-row {
			display: flex !important;
			align-items: center !important;
			justify-content: space-between !important;
			flex-wrap: wrap !important;
			gap: 12px !important;
			margin-bottom: 16px !important;
			font-size: 15px !important;
			text-align: left !important;
		}
		.career-meta-item {
			display: inline-flex !important;
			align-items: center !important;
		}
		.career-card-desc {
			font-size: 14.5px !important;
			line-height: 24px !important;
			color: #475569 !important;
			margin-bottom: 22px !important;
			flex-grow: 1 !important;
			text-align: left !important;
		}
		.career-card-desc p {
			margin: 0 !important;
			color: #475569 !important;
			line-height: 24px !important;
		}
		.career-card-footer {
			margin-top: auto !important;
			text-align: left !important;
		}
		.career-card-footer .careers-btn {
			display: inline-flex !important;
			align-items: center !important;
			gap: 8px !important;
			border: 2px solid #0066ff !important;
			color: #0066ff !important;
			background-color: transparent !important;
			border-radius: 25px !important;
			padding: 6px 18px !important;
			font-size: 15px !important;
			font-weight: 600 !important;
			text-decoration: none !important;
			transition: all 0.3s ease !important;
			cursor: pointer !important;
			line-height: 1.4 !important;
		}
		.career-card-footer .careers-btn:hover {
			background-color: #0066ff !important;
			color: #ffffff !important;
			border-color: #0066ff !important;
		}
		.career-card-footer .careers-btn i {
			font-size: 14px !important;
			transition: transform 0.2s ease !important;
		}
		.career-card-footer .careers-btn:hover i {
			transform: translateX(4px) !important;
		}
		@media (max-width: 991px) {
			.career-openings-grid {
				grid-template-columns: repeat(2, 1fr) !important;
				gap: 20px !important;
			}
			.career-card {
				padding: 24px !important;
			}
			.career-card-title {
				font-size: 20px !important;
				line-height: 28px !important;
			}
		}
		@media (max-width: 640px) {
			.career-openings-grid {
				grid-template-columns: 1fr !important;
				gap: 16px !important;
			}
			.career-card {
				padding: 20px !important;
			}
		}
	</style>
	<div class="career-openings-grid">
		<?php
		while ( $query->have_posts() ) :
			$query->the_post();
			$post_id     = get_the_ID();
			$work        = get_post_meta( $post_id, '_career_work', true );
			$positions   = get_post_meta( $post_id, '_career_positions', true );
			$experience  = get_post_meta( $post_id, '_career_experience', true );
			$apply_type  = get_post_meta( $post_id, '_career_apply_type', true );
			$popup_id    = get_post_meta( $post_id, '_career_popup_id', true );
			$custom_link = get_post_meta( $post_id, '_career_custom_link', true );
			$button_text = get_post_meta( $post_id, '_career_button_text', true );

			$work        = ! empty( $work ) ? $work : 'Full Time / On-site';
			$positions   = ! empty( $positions ) ? $positions : '1';
			$experience  = ! empty( $experience ) ? $experience : '2+ years';
			$popup_id    = ! empty( $popup_id ) ? $popup_id : '11487';
			$button_text = ! empty( $button_text ) ? $button_text : 'Apply Now';

			// Build action link
			if ( 'link' === $apply_type && ! empty( $custom_link ) ) {
				$btn_href   = esc_url( $custom_link );
				$btn_target = ' target="_blank" rel="noopener noreferrer"';
				$btn_class  = 'btn-glb careers-btn career-apply-btn';
				$data_attr  = '';
			} else {
				// Elementor Pro popup link
				$btn_href   = '#elementor-action:action=popup:open%26settings%3D' . base64_encode( json_encode( array( 'id' => (string) $popup_id, 'toggle' => false ) ) );
				$btn_target = '';
				$btn_class  = 'btn-glb careers-btn career-apply-btn ngd-trigger-popup';
				$data_attr  = ' data-popup-id="' . esc_attr( $popup_id ) . '" data-job-title="' . esc_attr( get_the_title() ) . '"';
			}
			?>
			<div class="career-card" id="career-job-<?php echo esc_attr( $post_id ); ?>">
				<h3 class="career-card-title"><?php the_title(); ?></h3>
				<div class="career-card-divider"></div>
				
				<div class="career-card-work">
					<span class="career-label"><?php esc_html_e( 'Work :', 'porto-child' ); ?></span>
					<span class="career-val"><?php echo esc_html( $work ); ?></span>
				</div>

				<div class="career-card-meta-row">
					<div class="career-meta-item">
						<span class="career-label"><?php esc_html_e( 'Positions :', 'porto-child' ); ?></span>
						<span class="career-val"><?php echo esc_html( $positions ); ?></span>
					</div>
					<div class="career-meta-item">
						<span class="career-label"><?php esc_html_e( 'Experience :', 'porto-child' ); ?></span>
						<span class="career-val"><?php echo esc_html( $experience ); ?></span>
					</div>
				</div>

				<div class="career-card-desc read-more-box">
					<?php the_content(); ?>
				</div>

				<div class="career-card-footer">
					<a href="<?php echo esc_attr( $btn_href ); ?>" class="<?php echo esc_attr( $btn_class ); ?>"<?php echo $btn_target . $data_attr; ?>>
						<span class="btn-text"><?php echo esc_html( $button_text ); ?></span>
						<i class="porto-icon-arrow-forward-right"></i>
					</a>
				</div>
			</div>
			<?php
		endwhile;
		wp_reset_postdata();
		?>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'career_openings', 'ngd_career_openings_shortcode' );
add_shortcode( 'careers', 'ngd_career_openings_shortcode' );


/*
|--------------------------------------------------------------------------
| 5. Front-end Script for Popup Trigger & Job Role Autofill
|--------------------------------------------------------------------------
*/
function ngd_career_popup_script() {
	?>
	<script>
	jQuery(document).ready(function($) {
		$(document).on('click', '.ngd-trigger-popup', function(e) {
			var popupId = $(this).data('popup-id') || 11487;
			var jobTitle = $(this).data('job-title') || '';

			if (typeof elementorProFrontend !== 'undefined' && elementorProFrontend.modules && elementorProFrontend.modules.popup) {
				e.preventDefault();
				elementorProFrontend.modules.popup.showPopup({ id: popupId });
			}

			// Wait for popup DOM to be ready and auto-fill role into message/job input if present
			if (jobTitle) {
				setTimeout(function() {
					var $popup = $('#elementor-popup-modal-' + popupId + ', .elementor-popup-modal');
					if ($popup.length) {
						var $msg = $popup.find('textarea[name*="message"], textarea[name*="5b4e9fe"]');
						if ($msg.length && !$msg.val()) {
							$msg.val('Applying for: ' + jobTitle + '\n');
						}
					}
				}, 400);
			}
		});
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'ngd_career_popup_script', 99 );
