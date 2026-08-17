<?php
/**
 * Aanvraagformulier.
 *
 * Doet wat Wix hiervoor deed, maar dan in eigen beheer:
 * - de aanvraag mailen naar frank@warmtescan.nu
 * - de aanvraag ook opslaan in de database, zodat hij niet verloren gaat als de
 *   mail een keer misgaat. Bij Wix stonden inzendingen in het dashboard; dat
 *   vangnet willen we houden.
 *
 * Spam wordt tegengehouden zonder captcha: een verborgen veld dat een mens nooit
 * invult, plus een minimale invultijd. Dat scheelt de bezoeker geklik en de site
 * een externe verbinding met Google.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const WARMTESCAN_AANVRAAG_TYPE = 'warmtescan_aanvraag';

/** Waar een aanvraag over kan gaan. Slug => label zoals het op de site staat. */
function warmtescan_diensten(): array {
	return array(
		'buiten'       => 'Warmtescan buiten',
		'binnen'       => 'Warmtescan binnen',
		'drone'        => 'Warmtescan met drone',
		'zonnepanelen' => 'Zonnepanelen-inspectie',
		'mapping'      => 'Thermal mapping',
		'wildbeheer'   => 'Wildbeheer',
	);
}

/**
 * De aanvragen komen als eigen berichttype in het beheerscherm te staan. Niet
 * publiek opvraagbaar: dit is klantdata.
 */
add_action( 'init', function () {
	register_post_type(
		WARMTESCAN_AANVRAAG_TYPE,
		array(
			'labels'          => array(
				'name'          => 'Aanvragen',
				'singular_name' => 'Aanvraag',
				'menu_name'     => 'Aanvragen',
			),
			'public'          => false,
			'show_ui'         => true,
			'menu_icon'       => 'dashicons-email-alt',
			'supports'        => array( 'title' ),
			'capability_type' => 'post',
			'map_meta_cap'    => true,
		)
	);
} );

/**
 * De ingezonden gegevens tonen bij een aanvraag in het beheerscherm.
 */
add_action( 'add_meta_boxes', function () {
	add_meta_box(
		'warmtescan_aanvraag_gegevens',
		'Gegevens uit het formulier',
		function ( $post ) {
			$velden = get_post_meta( $post->ID );
			echo '<table class="widefat striped">';
			foreach ( $velden as $sleutel => $waarde ) {
				if ( str_starts_with( $sleutel, '_' ) ) {
					continue;
				}
				printf(
					'<tr><th style="width:14em">%s</th><td>%s</td></tr>',
					esc_html( ucfirst( str_replace( '_', ' ', $sleutel ) ) ),
					nl2br( esc_html( $waarde[0] ) )
				);
			}
			echo '</table>';
		},
		WARMTESCAN_AANVRAAG_TYPE,
		'normal'
	);
} );

/**
 * Het formulier verwerken. Draait vóór de pagina wordt opgebouwd, zodat er na
 * een geslaagde inzending doorverwezen kan worden. Dat voorkomt dat iemand met
 * F5 dezelfde aanvraag nog eens verstuurt.
 */
add_action( 'template_redirect', function () {
	if ( 'POST' !== ( $_SERVER['REQUEST_METHOD'] ?? '' ) || ! isset( $_POST['warmtescan_aanvraag'] ) ) {
		return;
	}

	$terug = remove_query_arg( array( 'verzonden', 'fout' ) );

	if ( ! isset( $_POST['warmtescan_nonce'] ) || ! wp_verify_nonce( $_POST['warmtescan_nonce'], 'warmtescan_aanvraag' ) ) {
		wp_safe_redirect( add_query_arg( 'fout', 'verlopen', $terug ) );
		exit;
	}

	// Verborgen veld dat alleen een bot invult, plus een ondergrens aan de
	// invultijd. Samen houdt dat het gros van de geautomatiseerde inzendingen
	// tegen, zonder dat een bezoeker iets merkt.
	$geopend = absint( $_POST['warmtescan_geopend'] ?? 0 );
	if ( ! empty( $_POST['warmtescan_website'] ) || ( time() - $geopend ) < 3 ) {
		wp_safe_redirect( add_query_arg( 'verzonden', '1', $terug ) );
		exit;
	}

	$gegevens = array(
		'voornaam'   => sanitize_text_field( $_POST['voornaam'] ?? '' ),
		'achternaam' => sanitize_text_field( $_POST['achternaam'] ?? '' ),
		'adres'      => sanitize_text_field( $_POST['adres'] ?? '' ),
		'woonplaats' => sanitize_text_field( $_POST['woonplaats'] ?? '' ),
		'telefoon'   => sanitize_text_field( $_POST['telefoon'] ?? '' ),
		'email'      => sanitize_email( $_POST['email'] ?? '' ),
		'opmerking'  => sanitize_textarea_field( $_POST['opmerking'] ?? '' ),
	);

	$gekozen = array();
	foreach ( (array) ( $_POST['interesse'] ?? array() ) as $slug ) {
		$slug = sanitize_key( $slug );
		if ( isset( warmtescan_diensten()[ $slug ] ) ) {
			$gekozen[] = warmtescan_diensten()[ $slug ];
		}
	}
	$gegevens['interesse'] = implode( ', ', $gekozen );

	$verplicht = array( 'voornaam', 'achternaam', 'adres', 'woonplaats', 'email' );
	foreach ( $verplicht as $veld ) {
		if ( '' === $gegevens[ $veld ] ) {
			wp_safe_redirect( add_query_arg( 'fout', 'onvolledig', $terug ) );
			exit;
		}
	}

	if ( ! is_email( $gegevens['email'] ) ) {
		wp_safe_redirect( add_query_arg( 'fout', 'email', $terug ) );
		exit;
	}

	// Eerst opslaan, dan pas mailen. Gaat het mailen mis, dan is de aanvraag
	// nog steeds binnen.
	$post_id = wp_insert_post(
		array(
			'post_type'   => WARMTESCAN_AANVRAAG_TYPE,
			'post_status' => 'publish',
			'post_title'  => sprintf(
				'%s %s, %s',
				$gegevens['voornaam'],
				$gegevens['achternaam'],
				$gegevens['woonplaats']
			),
			'meta_input'  => $gegevens,
		)
	);

	$regels = array( 'Nieuwe aanvraag via warmtescan.nu', '' );
	foreach ( $gegevens as $sleutel => $waarde ) {
		if ( '' !== $waarde ) {
			$regels[] = sprintf( '%s: %s', ucfirst( $sleutel ), $waarde );
		}
	}
	if ( ! is_wp_error( $post_id ) ) {
		$regels[] = '';
		$regels[] = 'In het beheerscherm: ' . get_edit_post_link( $post_id, '' );
	}

	wp_mail(
		'frank@warmtescan.nu',
		sprintf( 'Aanvraag warmtescan: %s %s', $gegevens['voornaam'], $gegevens['achternaam'] ),
		implode( "\n", $regels ),
		array( 'Reply-To: ' . $gegevens['email'] )
	);

	wp_safe_redirect( add_query_arg( 'verzonden', '1', $terug ) );
	exit;
} );

/**
 * Het formulier zelf, als shortcode zodat het in een gewone pagina past.
 */
add_shortcode( 'warmtescan_formulier', function () {
	if ( isset( $_GET['verzonden'] ) ) {
		return '<div class="warmtescan-melding warmtescan-melding--goed">'
			. '<p><strong>Je aanvraag is verstuurd.</strong> Je krijgt zo snel mogelijk een '
			. 'vrijblijvende prijsopgave per mail. Geen reactie binnen een paar dagen? '
			. 'Bel gerust op <a href="tel:+31612415418">06 12 41 54 18</a>.</p></div>';
	}

	$fouten = array(
		'onvolledig' => 'Niet alle verplichte velden zijn ingevuld.',
		'email'      => 'Dat e-mailadres klopt niet. Controleer het even.',
		'verlopen'   => 'Het formulier stond te lang open. Verstuur het opnieuw.',
	);

	ob_start();

	if ( isset( $_GET['fout'] ) && isset( $fouten[ $_GET['fout'] ] ) ) {
		printf(
			'<div class="warmtescan-melding warmtescan-melding--fout"><p>%s</p></div>',
			esc_html( $fouten[ $_GET['fout'] ] )
		);
	}
	?>
	<form class="warmtescan-formulier" method="post">
		<?php wp_nonce_field( 'warmtescan_aanvraag', 'warmtescan_nonce' ); ?>
		<input type="hidden" name="warmtescan_aanvraag" value="1">
		<input type="hidden" name="warmtescan_geopend" value="<?php echo esc_attr( time() ); ?>">

		<p class="warmtescan-vangveld" aria-hidden="true">
			<label for="warmtescan-website">Laat dit veld leeg</label>
			<input type="text" id="warmtescan-website" name="warmtescan_website" tabindex="-1" autocomplete="off">
		</p>

		<div class="warmtescan-rij">
			<p>
				<label for="voornaam">Voornaam <span aria-hidden="true">*</span></label>
				<input type="text" id="voornaam" name="voornaam" required autocomplete="given-name"
					value="<?php echo esc_attr( $_POST['voornaam'] ?? '' ); ?>">
			</p>
			<p>
				<label for="achternaam">Achternaam <span aria-hidden="true">*</span></label>
				<input type="text" id="achternaam" name="achternaam" required autocomplete="family-name"
					value="<?php echo esc_attr( $_POST['achternaam'] ?? '' ); ?>">
			</p>
		</div>

		<p>
			<label for="adres">Adres <span aria-hidden="true">*</span></label>
			<input type="text" id="adres" name="adres" required autocomplete="street-address"
				value="<?php echo esc_attr( $_POST['adres'] ?? '' ); ?>">
			<span class="warmtescan-hulp">Nodig om te bepalen of er op jouw locatie met een drone gevlogen mag worden.</span>
		</p>

		<div class="warmtescan-rij">
			<p>
				<label for="woonplaats">Woonplaats <span aria-hidden="true">*</span></label>
				<input type="text" id="woonplaats" name="woonplaats" required autocomplete="address-level2"
					value="<?php echo esc_attr( $_POST['woonplaats'] ?? '' ); ?>">
			</p>
			<p>
				<label for="telefoon">Telefoon</label>
				<input type="tel" id="telefoon" name="telefoon" autocomplete="tel"
					value="<?php echo esc_attr( $_POST['telefoon'] ?? '' ); ?>">
			</p>
		</div>

		<p>
			<label for="email">E-mailadres <span aria-hidden="true">*</span></label>
			<input type="email" id="email" name="email" required autocomplete="email"
				value="<?php echo esc_attr( $_POST['email'] ?? '' ); ?>">
		</p>

		<fieldset>
			<legend>Waar heb je belangstelling voor?</legend>
			<?php foreach ( warmtescan_diensten() as $slug => $label ) : ?>
				<label class="warmtescan-keuze">
					<input type="checkbox" name="interesse[]" value="<?php echo esc_attr( $slug ); ?>">
					<?php echo esc_html( $label ); ?>
				</label>
			<?php endforeach; ?>
		</fieldset>

		<p>
			<label for="opmerking">Opmerkingen</label>
			<textarea id="opmerking" name="opmerking" rows="5"><?php echo esc_textarea( $_POST['opmerking'] ?? '' ); ?></textarea>
		</p>

		<p class="warmtescan-privacy">
			Je gegevens worden alleen gebruikt om je een prijsopgave te sturen en de scan
			uit te voeren. Ze worden niet gedeeld. Zie de
			<a href="/warmtescan/privacy/">privacyverklaring</a>.
		</p>

		<p>
			<button type="submit" class="wp-element-button">Aanvraag versturen</button>
		</p>
	</form>
	<?php
	return ob_get_clean();
} );
