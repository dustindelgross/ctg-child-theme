<?php 
/*
 * Here we have true facts about the CTG custom meta boxes
 * for the CTG Links extension
 * 
 * */

/*
 * Get that goofy ass block editor outta here
 * */
function new_post_args( $args, $post_type ) {
	if ( 'post' == $post_type ) {
		$args['show_in_rest'] = false;
		$args['register_meta_box_cb'] = 'ctg_links_add_post_meta_boxes';
	}
	return $args;
}
add_filter( 'register_post_type_args', 'new_post_args', 999, 2 );

function ctg_links_title_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>
	<p>
		<label for="ctg-links-title"><?php _e( "Add a job title, which will appear under the Success Partner's name.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="text" name="ctg-links-title" id="ctg-links-title" value="<?php echo esc_attr( get_post_meta( $post->ID, 'ctg_links_title', true ) ); ?>" size="30" />
	</p>

<?php }

function ctg_links_save_title_post_meta( $post_id, $post ) {

	if ( !isset( $_POST['ctg_links_nonce'] ) || !wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	$post_type = get_post_type_object( $post->post_type );

	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return $post_id;	
	}

	$new_meta_value = ( isset( $_POST['ctg-links-title'] ) ? trim( $_POST['ctg-links-title'] ) : '' );

	$meta_key = 'ctg_links_title';
	
	$meta_value = get_post_meta( $post_id, $meta_key, true );

	if ( $new_meta_value && '' == $meta_value ) {
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	} elseif ( '' == $new_meta_value && $meta_value ) {
		delete_post_meta( $post_id, $meta_key, $meta_value );
	}

}

function ctg_links_email_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>

	<p>
		<label for="ctg-links-email"><?php _e( "Add an email address, which will appear in the Success Partner's 'Contact Me' link.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="text" name="ctg-links-email" id="ctg-links-email" value="<?php echo esc_attr( get_post_meta( $post->ID, 'ctg_links_email', true ) ); ?>" size="30" />
  </p>
<?php }

function ctg_links_save_email_post_meta( $post_id, $post ) {

	if ( !isset( $_POST['ctg_links_nonce'] ) || !wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	$post_type = get_post_type_object( $post->post_type );

	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return $post_id;	
	}

	$new_meta_value = ( isset( $_POST['ctg-links-email'] ) ? trim( $_POST['ctg-links-email'] ) : '' );

	$meta_key = 'ctg_links_email';
	
	$meta_value = get_post_meta( $post_id, $meta_key, true );

	if ( $new_meta_value && '' == $meta_value ) {
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	} elseif ( '' == $new_meta_value && $meta_value ) {
		delete_post_meta( $post_id, $meta_key, $meta_value );
	}
}

function ctg_links_fb_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>

	<p>
		<label for="ctg-links-fb"><?php _e( "Add a Facebook URL, which will link to the Success Partner's personal Facebook page.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="text" name="ctg-links-fb" id="ctg-links-fb" value="<?php echo esc_attr( get_post_meta( $post->ID, 'ctg_links_fb', true ) ); ?>" size="30" />
  </p>
<?php }

function ctg_links_save_fb_post_meta( $post_id, $post ) {

	if ( !isset( $_POST['ctg_links_nonce'] ) || !wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	$post_type = get_post_type_object( $post->post_type );

	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return $post_id;	
	}

	$new_meta_value = ( isset( $_POST['ctg-links-fb'] ) ? trim( $_POST['ctg-links-fb'] ) : '' );

	if ( strstr( $new_meta_value, 'https://' ) === false && '' !== $new_meta_value ) {
		$new_meta_value = 'https://' . $new_meta_value;
	} else {
		$new_meta_value = $new_meta_value;
	}

	$meta_key = 'ctg_links_fb';
	
	$meta_value = get_post_meta( $post_id, $meta_key, true );

		if ( $new_meta_value && '' == $meta_value ) {
			add_post_meta( $post_id, $meta_key, $new_meta_value, true );
		} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
			update_post_meta( $post_id, $meta_key, $new_meta_value );
		} elseif ( '' == $new_meta_value && $meta_value ) {
			delete_post_meta( $post_id, $meta_key, $meta_value );
		}

}

function ctg_links_insta_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>

	<p>
		<label for="ctg-links-email"><?php _e( "Add an Instagram URL, which will link to the Success Partner's personal Instagram page.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="text" name="ctg-links-insta" id="ctg-links-insta" value="<?php echo esc_attr( get_post_meta( $post->ID, 'ctg_links_insta', true ) ); ?>" size="30" />
  </p>
<?php }


function ctg_links_save_insta_post_meta( $post_id, $post ) {

	if ( ! isset( $_POST['ctg_links_nonce'] ) || ! wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	$post_type = get_post_type_object( $post->post_type );

	if ( ! current_user_can ( $post_type->cap->edit_post, $post_id ) ) {
		return $post_id;
	}

	$new_meta_value = ( isset( $_POST['ctg-links-insta'] ) ? trim( $_POST['ctg-links-insta'] ) : '' );

		$meta_key = 'ctg_links_insta';
		
		if ( strstr( $new_meta_value, 'https://' ) === false && '' !== $new_meta_value ) {
			$new_meta_value = 'https://' . $new_meta_value;
		} else {
			$new_meta_value = $new_meta_value;
		}
		
		$meta_value = get_post_meta( $post_id, $meta_key, true );

		if ( $new_meta_value && '' == $meta_value ) {
			add_post_meta( $post_id, $meta_key, $new_meta_value, true );			
		} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
		    update_post_meta( $post_id, $meta_key, $new_meta_value );			
		} elseif ( '' == $new_meta_value && $meta_value ) {
		    delete_post_meta( $post_id, $meta_key, $meta_value );			
		}

}

function ctg_links_sms_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>

	<p>
		<label for="ctg-links-sms"><?php _e( "Add a textable phone number. This will appear in the Success Partner's 'Text Me' link. It could be their personal number or a number tied to a CRM.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="text" name="ctg-links-sms" id="ctg-links-sms" value="<?php echo esc_attr( get_post_meta( $post->ID, 'ctg_links_sms', true ) ); ?>" size="30" />
  </p>
<?php }

function ctg_links_save_sms_post_meta( $post_id, $post ) {


	if ( !isset( $_POST['ctg_links_nonce'] ) || !wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) )
    	return $post_id;


	$post_type = get_post_type_object( $post->post_type );

	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

	$new_meta_value = ( isset( $_POST['ctg-links-sms'] ) ? preg_replace('/[^0-9]/', '', $_POST['ctg-links-sms']) : '' );

	$meta_key = 'ctg_links_sms';
	
	$meta_value = get_post_meta( $post_id, $meta_key, true );

		$i = strlen( $new_meta_value );

		if ( $i == 10 || $i == 0 ) {
			if ( $new_meta_value && '' == $meta_value ) {
				add_post_meta( $post_id, $meta_key, $new_meta_value, true );	
			} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
				update_post_meta( $post_id, $meta_key, $new_meta_value );
			} elseif ( '' == $new_meta_value && $meta_value ) {
				delete_post_meta( $post_id, $meta_key, $meta_value );
			}
		} else {
			return false;
		}
}

function ctg_links_tel_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>

	<p>
		<label for="ctg-links-tel"><?php _e( "Add a callable phone number, which will appear in the Success Partner's 'Call Me' link. This could be their direct cell line, or a phone number tied to a CRM.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="text" name="ctg-links-tel" id="ctg-links-tel" value="<?php echo esc_attr( get_post_meta( $post->ID, 'ctg_links_tel', true ) ); ?>" size="30" />
  </p>
<?php }


function ctg_links_save_tel_post_meta( $post_id, $post ) {


	if ( !isset( $_POST['ctg_links_nonce'] ) || !wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) )
    	return $post_id;


	$post_type = get_post_type_object( $post->post_type );


	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;


	$new_meta_value = ( isset( $_POST['ctg-links-tel'] ) ? preg_replace('/[^0-9]/', '', $_POST['ctg-links-tel']) : '' );
	
	
	$meta_key = 'ctg_links_tel';
	
	

	$meta_value = get_post_meta( $post_id, $meta_key, true );

	$i = strlen( $new_meta_value );

		if ( $i == 10 || $i == 0 ) {
			if ( $new_meta_value && '' == $meta_value ) {
				add_post_meta( $post_id, $meta_key, $new_meta_value, true );	
			} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
				update_post_meta( $post_id, $meta_key, $new_meta_value );
			} elseif ( '' == $new_meta_value && $meta_value ) {
				delete_post_meta( $post_id, $meta_key, $meta_value );
			}
		} else {
			return false;
		}
}

function ctg_links_fname_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>

	<p>
		<label for="ctg-links-fname"><?php _e( "Enter the Success Partner's Last Name. This is going to help with finding their contact file for when someone wants to download their contact info.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="text" name="ctg-links-fname" id="ctg-links-fname" value="<?php echo esc_attr( get_post_meta( $post->ID, 'ctg_links_fname', true ) ); ?>" size="30" />
  </p>
<?php }


function ctg_links_save_fname_post_meta( $post_id, $post ) {


	if ( !isset( $_POST['ctg_links_nonce'] ) || !wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) )
    	return $post_id;


	$post_type = get_post_type_object( $post->post_type );


	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;


	$new_meta_value = ( isset( $_POST['ctg-links-fname'] ) ? trim( $_POST['ctg-links-fname'] ) : '' );


	$meta_key = 'ctg_links_fname';
	

	$meta_value = get_post_meta( $post_id, $meta_key, true );

	if ( $new_meta_value && '' == $meta_value ) {
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	} elseif ( '' == $new_meta_value && $meta_value ) {
		delete_post_meta( $post_id, $meta_key, $meta_value );
	}
}

function ctg_links_lname_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>

	<p>
		<label for="ctg-links-lname"><?php _e( "Enter the Success Partner's Last Name. This is going to help with finding their contact file for when someone wants to download their contact info.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="text" name="ctg-links-lname" id="ctg-links-lname" value="<?php echo esc_attr( get_post_meta( $post->ID, 'ctg_links_lname', true ) ); ?>" size="30" />
  </p>
<?php }


function ctg_links_save_lname_post_meta( $post_id, $post ) {


	if ( !isset( $_POST['ctg_links_nonce'] ) || !wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) )
    	return $post_id;


	$post_type = get_post_type_object( $post->post_type );


	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;


	$new_meta_value = ( isset( $_POST['ctg-links-lname'] ) ? trim( $_POST['ctg-links-lname'] ) : '' );


	$meta_key = 'ctg_links_lname';
	

	$meta_value = get_post_meta( $post_id, $meta_key, true );


	if ( $new_meta_value && '' == $meta_value ) {
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	} elseif ( '' == $new_meta_value && $meta_value ) {
		delete_post_meta( $post_id, $meta_key, $meta_value );
	}
}


function ctg_links_vcf_meta_box( $post ) { ?>

  <?php 
	$vcf_upload = get_post_meta( get_the_ID(), 'ctg_links_vcf', true );	
	wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>

	<p>
		<label for="ctg-links-vcf"><?php _e( "Upload the Success Partner's vCard File. This is going to allow their contact info to be downloadable.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="file" accept=".vcf" name="ctg-links-vcf" id="ctg-links-vcf" value="<?php if($vcf_upload != '' ) { echo $vcf_upload['url'];} ?>" size="30" />
  </p>
<?php }

function ctg_links_save_vcf_post_meta( $post_id, $post ) {

	if ( ! isset ( $_POST['ctg_links_nonce'] ) || !wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}    	

	$post_type = get_post_type_object( $post->post_type );

	if ( ! current_user_can ( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

    if( ! empty ( $_FILES['ctg-links-vcf']['name'] ) ) {

        $supported_types = array('text/vcard');

        $arr_file_type = wp_check_filetype(basename($_FILES['ctg-links-vcf']['name']));
        $uploaded_type = $arr_file_type['type'];

        if ( in_array ( $uploaded_type, $supported_types ) ) {

            $upload = wp_upload_bits($_FILES['ctg-links-vcf']['name'], null, file_get_contents($_FILES['ctg-links-vcf']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                add_post_meta($post_id, 'ctg_links_vcf', $upload);
                update_post_meta($post_id, 'ctg_links_vcf', $upload);     
            } 
 
        } else {
            wp_die("The file type that you've uploaded is not a valid vcf file.");
        } 
         
    }
	
}

function ctg_links_handle_meta_box( $post ) { ?>

  <?php 

	wp_nonce_field( basename( __FILE__ ), 'ctg_links_nonce' ); ?>

	<p>
		<label for="ctg-links-handle"><?php _e( "Type out the Success Partner's social media handle. This is going to be displayed below their link list.", 'ctg' ); ?></label>
		<br />
		<input class="ctg-meta-box" type="text" name="ctg-links-handle" id="ctg-links-handle" value="<?php echo esc_attr( get_post_meta( $post->ID, 'ctg_links_handle', true ) ); ?>" size="30" />
  </p>
<?php }

function ctg_links_save_handle_post_meta( $post_id, $post ) {


	if ( !isset( $_POST['ctg_links_nonce'] ) || !wp_verify_nonce( $_POST['ctg_links_nonce'], basename( __FILE__ ) ) )
    	return $post_id;


	$post_type = get_post_type_object( $post->post_type );


	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;


	$new_meta_value = ( isset( $_POST['ctg-links-handle'] ) ? trim( $_POST['ctg-links-handle'] ) : '' );

	$meta_key = 'ctg_links_handle';
	

	$meta_value = get_post_meta( $post_id, $meta_key, true );


	if ( $new_meta_value && '' == $meta_value ) {
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	} elseif ( '' == $new_meta_value && $meta_value ) {
		delete_post_meta( $post_id, $meta_key, $meta_value );
	}
	
}




function update_edit_form() {
    echo ' enctype="multipart/form-data"';
}

add_action('post_edit_form_tag', 'update_edit_form');

function ctg_links_meta_boxes_setup() {

	add_action( 'save_post', 'ctg_links_save_title_post_meta', 10, 2 );
	add_action( 'save_post', 'ctg_links_save_email_post_meta', 10, 2 );
	add_action( 'save_post', 'ctg_links_save_fb_post_meta', 10, 2 );
	add_action( 'save_post', 'ctg_links_save_insta_post_meta', 10, 2 );
	add_action( 'save_post', 'ctg_links_save_sms_post_meta', 10, 2 );
	add_action( 'save_post', 'ctg_links_save_tel_post_meta', 10, 2 );
	add_action( 'save_post', 'ctg_links_save_fname_post_meta', 10, 2 );
	add_action( 'save_post', 'ctg_links_save_lname_post_meta', 10, 2 );
	add_action( 'save_post', 'ctg_links_save_vcf_post_meta', 10, 2 );
	add_action( 'save_post', 'ctg_links_save_handle_post_meta', 10, 2 );
	
}

function ctg_links_add_post_meta_boxes() {
	
	add_meta_box(
		'ctg-links-title',
		esc_html__( 'Success Partner Title', 'ctg' ),
		'ctg_links_title_meta_box',
		'post',
		'advanced',
		'high'
	);
	
	add_meta_box(
		'ctg-links-email',
		esc_html__( 'Email Address', 'ctg' ),
		'ctg_links_email_meta_box',
		'post',
		'advanced',
		'high'
	);
	
	add_meta_box(
		'ctg-links-fb',
		esc_html__( 'Success Partner Facebook URL', 'ctg' ),
		'ctg_links_fb_meta_box',
		'post',
		'advanced',
		'high'
	);

	add_meta_box(
		'ctg-links-insta',
		esc_html__( 'Success Partner Instagram URL', 'ctg' ),
		'ctg_links_insta_meta_box',
		'post',
		'advanced',
		'high'
	);

	add_meta_box(
		'ctg-links-sms',
		esc_html__( 'Success Partner Text Line', 'ctg' ),
		'ctg_links_sms_meta_box',
		'post',
		'advanced',
		'high'
	);

	add_meta_box(
		'ctg-links-tel',
		esc_html__( 'Success Partner Cell Number', 'ctg' ),
		'ctg_links_tel_meta_box',
		'post',
		'advanced',
		'high'
	);
	
	add_meta_box(
		'ctg-links-fname',
		esc_html__( 'Success Partner First Name', 'ctg' ),
		'ctg_links_fname_meta_box',
		'post',
		'normal',
		'high'
	);
	
	add_meta_box(
		'ctg-links-lname',
		esc_html__( 'Success Partner Last Name', 'ctg' ),
		'ctg_links_lname_meta_box',
		'post',
		'normal',
		'high'
	);
	
	add_meta_box(
		'ctg-links-vcf',
		esc_html__( 'Success Partner vCard File', 'ctg' ),
		'ctg_links_vcf_meta_box',
		'post',
		'advanced',
		'high'
	);
	
	add_meta_box(
		'ctg-links-handle',
		esc_html__( 'Success Partner Social Media Handle', 'ctg' ),
		'ctg_links_handle_meta_box',
		'post',
		'advanced',
		'high'
	);

}

add_action( 'load-post.php', 'ctg_links_meta_boxes_setup' );
add_action( 'load-post-new.php', 'ctg_links_meta_boxes_setup' );











/*
 * 
 * This shit turned out horribly
 * 
 * 
function ctg_link_pages() {
    $labels = array(
        'name'                  => _x( 'Link Pages', 'Post type general name', 'ctg' ),
        'singular_name'         => _x( 'Link Page', 'Post type singular name', 'ctg' ),
        'menu_name'             => _x( 'Link Pages', 'Admin Menu text', 'ctg' ),
        'name_admin_bar'        => _x( 'Link Page', 'Add New on Toolbar', 'ctg' ),
        'add_new'               => __( 'Add New', 'ctg' ),
        'add_new_item'          => __( 'Add New Link Page', 'ctg' ),
        'new_item'              => __( 'New Link Page', 'ctg' ),
        'edit_item'             => __( 'Edit Link Page', 'ctg' ),
        'view_item'             => __( 'View Link Page', 'ctg' ),
        'all_items'             => __( 'All Link Pages', 'ctg' ),
        'search_items'          => __( 'Search Link Pages', 'ctg' ),
        'parent_item_colon'     => __( 'Parent Link Pages:', 'ctg' ),
        'not_found'             => __( 'No pages found.', 'ctg' ),
        'not_found_in_trash'    => __( 'No lages found in Trash.', 'ctg' ),
        'featured_image'        => _x( 'Headshot Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'ctg' ),
        'set_featured_image'    => _x( 'Set headshot', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'ctg' ),
        'remove_featured_image' => _x( 'Remove headshot', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'ctg' ),
        'use_featured_image'    => _x( 'Use as headshot image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'ctg' ),
        'archives'              => _x( 'Link Pages', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'ctg' ),
        'insert_into_item'      => _x( 'Insert into link page', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'ctg' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this page', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'ctg' ),
        'filter_items_list'     => _x( 'Filter link pages', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'ctg' ),
        'items_list_navigation' => _x( 'Link Page list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'ctg' ),
        'items_list'            => _x( 'Link Page list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'ctg' ),
    );
 
    $args = array(
        'labels'             => $labels,
		'description'		 => 'A custom post type for CTG Success Partner Link Pages',
        'public'             => true,
		'publicly_queryable'    => true,
		'query_var'             => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_in_admin_bar'     => true,		
        'capability_type'    => 'page',
        'has_archive'        => 'link-pages',
        'hierarchical'       => false,
		'exclude_from_search'   => false,
		'rewrite'               => null,
		'can_export'            => true,
		'delete_with_user'      => null,
        'menu_position'      => 4,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
		'register_meta_box_cb' => 'ctg_links_add_post_meta_boxes',
		'show_in_rest'          => false,
		'rest_base'             => false,
		'rest_namespace'        => false,
		'rest_controller_class' => false
        );
 
    register_post_type( 'linkpage', $args );
}
/*/