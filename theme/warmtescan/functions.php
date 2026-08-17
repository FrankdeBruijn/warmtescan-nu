<?php
/**
 * Warmtescan-thema.
 *
 * Bewust klein gehouden: het meeste zit in theme.json. Hier staat alleen wat
 * daar niet kan.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/inc/formulier.php';

/**
 * Thema-stijl inladen, en dezelfde stijl in de blokeditor zodat wat Frank daar
 * ziet klopt met de site.
 */
add_action( 'after_setup_theme', function () {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'warmtescan',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
} );

/**
 * Mail versturen via de eigen mailbox bij TransIP in plaats van via de
 * PHP-mailfunctie van de server. Dan kloppen SPF en DKIM van het domein en
 * belandt een aanvraag niet in de spammap.
 *
 * De inloggegevens staan in wp-config.php op de server, niet in dit bestand en
 * niet in de repo.
 */
add_action( 'phpmailer_init', function ( $mailer ) {
	if ( ! defined( 'WARMTESCAN_SMTP_HOST' ) || ! defined( 'WARMTESCAN_SMTP_WACHTWOORD' ) ) {
		return;
	}

	$mailer->isSMTP();
	$mailer->Host       = WARMTESCAN_SMTP_HOST;
	$mailer->Port       = 465;
	$mailer->SMTPSecure = 'ssl';
	$mailer->SMTPAuth   = true;
	$mailer->Username   = WARMTESCAN_SMTP_GEBRUIKER;
	$mailer->Password   = WARMTESCAN_SMTP_WACHTWOORD;
	$mailer->setFrom( WARMTESCAN_SMTP_GEBRUIKER, 'Warmtescan.nu' );
} );

/**
 * Emoji-scripts van WordPress uitzetten. Ze laden op elke pagina een script dat
 * deze site niet gebruikt.
 */
add_action( 'init', function () {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
} );
