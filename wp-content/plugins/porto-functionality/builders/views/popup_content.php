<?php

$_post_types = get_post_types(
	array(
		'public'            => true,
		'show_in_nav_menus' => true,
	),
	'objects'
);
$post_types   = array();

foreach ( $_post_types as $post_type => $object ) {
	if ( ! in_array( $post_type, array( 'page', 'product', 'e-landing-page' ) ) ) {
		$post_types[ $post_type ] = $object->labels->singular_name;
	}
}
?>

<div id="porto-builders-input" class="mfp-hide mfp-fade">
<form method="POST" class="postoptions porto-setup-wizard" action="<?php echo esc_url( admin_url() ); ?>">
	<h2><?php printf( esc_html( 'New %s', 'porto-functionality' ), esc_html__( 'Porto Builder', 'porto-functionality' ) ); ?></h2>
	<div class="form-row">
		<label><?php esc_html_e( 'Builder Type', 'porto-functionality' ); ?></label>
		<select name="builder_type" style="max-width: none" required>
			<option value=""><?php esc_html_e( 'Select...', 'porto-functionality' ); ?></option>
		<?php foreach ( $this->builder_types as $type => $label ) : ?>
			<option value="<?php echo esc_attr( $type ); ?>" <?php selected( isset( $_GET[ PortoBuilders::BUILDER_TAXONOMY_SLUG ] ) && $type == $_GET[ PortoBuilders::BUILDER_TAXONOMY_SLUG ], true, true ); ?>><?php echo esc_html( $label ); ?></option>
		<?php endforeach; ?>
		</select>
	</div>
	<div class="form-row">
		<label><?php esc_html_e( 'Builder Name', 'porto-functionality' ); ?></label>
		<input type="text" name="builder_name" required />
	</div>
	<div class="form-row" data-value="single_archive">
		<label><?php esc_html_e( 'View Dynamic Content As', 'porto-functionality' ); ?></label>
		<select name="preview_type" style="max-width: none">
			<?php foreach ( $post_types as $type => $val ) : ?>
				<option value="<?php echo esc_attr( $type ); ?>"><?php echo esc_html( $val ); ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-row" data-value="header">
		<label><?php esc_html_e( 'Header Type', 'porto-functionality' ); ?></label>
		<select name="header_type" style="max-width: none">
			<option value="default"><?php esc_html_e( 'Default', 'porto-functionality' ); ?></option>
			<option value="absolute"><?php esc_html_e( 'Absolute(Fixed) Header', 'porto-functionality' ); ?></option>
			<option value="side"><?php esc_html_e( 'Side Header', 'porto-functionality' ); ?></option>
		</select>
	</div>
	<div class="form-row" data-value="side">
		<label><?php esc_html_e( 'Side Header Position', 'porto-functionality' ); ?></label>
		<select name="header_side_pos" style="max-width: none">
			<option value=""><?php esc_html_e( 'Left (Right on RTL)', 'porto-functionality' ); ?></option>
			<option value="right"><?php esc_html_e( 'Right (Left on RTL)', 'porto-functionality' ); ?></option>
		</select>
	</div>
	<div class="form-row" data-value="side">
		<label><?php esc_html_e( 'Side Header Width(px)', 'porto-functionality' ); ?></label>
		<input placeholder="255" type="number" name="header_side_width" />
	</div>
	<button type="submit" class="btn btn-primary"><?php esc_html_e( 'Create Builder', 'porto-functionality' ); ?></button>
	<input type="hidden" name="action" value="porto-new-builder">
	<?php wp_nonce_field( 'porto-builder' ); ?>
</form>
</div>