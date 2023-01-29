<?php

/**
 *
 * @since  1.0.0
 */
if ( ! function_exists( 'aperitto_the_more_link' ) ) :
	function aperitto_the_more_link() {

		do_action( 'aperitto_before_more_link' );
		?>
		<p class="more-link-box">
			<a class="more-link" href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'Read more', 'aperitto' ); ?></a>
		</p>
		<?php
		do_action( 'aperitto_after_more_link' );

	}
endif;
add_action( 'aperitto_after_post_excerpt', 'aperitto_the_more_link' );


/**
 *
 * @since  1.0.0
 */
if ( ! function_exists( 'aperitto_the_custom_logo' ) ) :
	function aperitto_the_custom_logo() {

		$logo_pos    = get_theme_mod( 'display_logo_and_title' );
		$custom_logo = get_theme_mod( 'custom_logo', false );

		if ( function_exists( 'the_custom_logo' ) && ! empty( $custom_logo ) ) {
			$logo = get_custom_logo();

			$logo = preg_replace( '%<a[^>]+>(.*?)<\/a>%i', '$1', $logo );
			$logo = str_replace( 'custom-logo', 'custom-logo custom-logo-' . $logo_pos, $logo );
			echo $logo;
		}

	}
endif;

/**
 * add actions for logo show
 */
$logo_pos = get_theme_mod( 'display_logo_and_title' );

if ( 'image' == $logo_pos ) {
	add_action( 'aperitto_before_blogname_in_logo', 'aperitto_custom_logo_open_hideclass', 20 );
	add_action( 'aperitto_after_blogname_in_logo', 'aperitto_custom_logo_close_hideclass', 20 );
}
if ( 'bottom' == $logo_pos ) {
	add_action( 'aperitto_after_blogname_in_logo', 'aperitto_the_custom_logo' );
} else {
	add_action( 'aperitto_before_blogname_in_logo', 'aperitto_the_custom_logo' );
}

/**
 * hide sitetitle
 */
function aperitto_custom_logo_open_hideclass() {
	ob_start();
}

function aperitto_custom_logo_close_hideclass() {
	ob_clean();
}


/**
 * echo post meta information
 *  filter `aperitto_post_meta_list` accept values:  'date', 'category', 'comments', 'author'
 *
 * @since  1.0.0
 */
if ( ! function_exists( 'aperitto_get_postmeta' ) ) :
	function aperitto_get_postmeta() {

		$default_meta_list = get_theme_mod(
			'postmeta_list',
			apply_filters( 'aperitto_postmeta_list_defaults', array( 'date', 'category', 'comments' ) )
		);
		$default_meta_list = ! is_array( $default_meta_list ) ? explode( '_', $default_meta_list ) : $default_meta_list;

		$meta_list           = apply_filters( 'aperitto_post_meta_list', $default_meta_list );
		$displayed_meta_list = $meta_list;

		if ( is_customize_preview() ) {
			$all       = array_merge( $meta_list, array( 'date', 'category', 'comments', 'tags', 'author' ) );
			$meta_list = array_unique( $all );
		}

		if ( empty( $meta_list ) ) {
			return;
		}

		$meta_html = array();

		foreach ( $meta_list as $meta ) {
			$preview = ( ! in_array( $meta, $displayed_meta_list ) ) ? ' hide' : '';
			switch ( $meta ) {
				case 'date':
					$meta_html[ $meta ] = '<span class="date' . $preview . '">' . get_the_time( get_option( 'date_format' ) ) . '</span>';
					break;
				case 'author':
					$meta_html[ $meta ] = '<span class="author' . $preview . '">' . get_the_author() . '</span>';
					break;
				case 'category':
					$meta_html[ $meta ] = '<span class="category' . $preview . '">' . get_the_category_list( ', ' ) . '</span>';
					break;
				case 'comments':
					$meta_html[ $meta ] = '<span class="comments' . $preview . '"><a href="' . get_comments_link() . '">' . __( 'Comments', 'aperitto' ) . ': ' . get_comments_number() . '</a></span>';
					break;
				case 'tags':
					$meta_html[ $meta ] = '<span class="tags' . $preview . '">' . get_the_tag_list( __( 'Tags: ', 'aperitto' ), ', ' ) . '</span>';
					break;
			}
		}
		$meta_html = apply_filters( 'aperitto_post_meta_list_html', $meta_html );

		$html = '';
		foreach ( $meta_list as $meta ) {
			$html .= ( array_key_exists( $meta, $meta_html ) ) ? $meta_html[ $meta ] : '';
		}

		$html = apply_filters( 'aperitto_post_meta_html', $html );

		echo '<aside class="meta">';
		do_action( 'aperitto_post_meta_before_first' );

		echo $html;

		do_action( 'aperitto_post_meta_after_last' );
		echo '</aside>';
	}
endif;
add_action( 'aperitto_after_post_title', 'aperitto_get_postmeta', 10 );
