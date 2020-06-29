
//présentation du formulaire en front
public function output_shortcode() {
	ob_start();

	if ( ! function_exists( 'acf_form' ) ) {
		return ob_get_clean();
	}

	// User is currently filling the form, we display it.
	if ( ! $this->current_multiform_is_finished() ) {
		$this->output_acf_form( [
			'post_type' => $this->post_type,
		] );

	// Form has been filled entirely, we display a thanks message.
	} else {
		_e( 'Thanks for your submission, we will get back to you very soon!' );
	}

	return ob_get_clean();
}

private function output_acf_form( $args = [] ) {
	$requested_post_id = $this->get_request_post_id();
	$requested_step    = $this->get_request_step();

	$args = wp_parse_args(
		$args,
		[
			'post_id'     => $requested_post_id,
			'step'        => 'new_post' === $requested_post_id ? 1 : $requested_step,
			'post_type'   => 'post',
			'post_status' => 'publish',
		]
	);


//créer ou éditer un post

	$submit_label           = $args['step'] < count( $this->metabox_ids ) ? __( 'Next step' ) : __( 'Finish' );
	$current_step_metaboxes = ( $args['post_id'] !== 'new_post' && $args['step'] > 1 ) ? $this->metabox_ids[ (int) $args['step'] - 1 ] : $this->metabox_ids[0];

	acf_form(
		[
			'id' 				=> $this->id,
			'post_id'			=> $args['post_id'],
			'new_post'			=> [
				'post_type'		=> $args['post_type'],
				'post_status'	=> $args['post_status'],
			],
			'field_groups'      => $current_step_metaboxes,
			'submit_value'      => $submit_label,
			'html_after_fields' => $this->output_hidden_fields( $args ),
			'uploader'          => 'basic',
		]
	);
}


//token aléatoire qui sert de sécurité

public function process_acf_form( $post_id ) {
	if ( is_admin() || ! isset( $_POST['ame-multiform-id'] ) || $_POST['ame-multiform-id'] !== $this->id ) {
		return;
	}

	$current_step = $this->get_request_step();

	if ( $current_step === 1 ) {
		$token = wp_generate_password( rand( 10, 20 ), false, false );
		update_post_meta( (int) $post_id, 'secret_token', $token );
	}

	...
}