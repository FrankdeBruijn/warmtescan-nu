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

/**
 * Twee extra knopvormen, zoals ze op de oude site stonden: een omlijnde pill en
 * een gevulde olijfgroene. Zo zijn ze ook in de editor te kiezen.
 */
add_action( 'init', function () {
	register_block_style( 'core/button', array(
		'name'  => 'omlijnd',
		'label' => 'Omlijnd (pill)',
	) );
	register_block_style( 'core/button', array(
		'name'  => 'olijf',
		'label' => 'Olijfgroen (pill)',
	) );
} );

add_action( 'wp_enqueue_scripts', function () {
	// Versie op basis van de bestandsdatum: dan haalt een browser de stijl na
	// elke wijziging opnieuw op, in plaats van een oude versie uit de cache.
	$pad = get_stylesheet_directory() . '/style.css';

	wp_enqueue_style(
		'warmtescan',
		get_stylesheet_uri(),
		array(),
		file_exists( $pad ) ? (string) filemtime( $pad ) : wp_get_theme()->get( 'Version' )
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
