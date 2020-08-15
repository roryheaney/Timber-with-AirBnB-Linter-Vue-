<?php
use RMH\FancySquares\Setup;

// Check if Timber is not activated
if ( ! class_exists( 'Timber' ) ) {

    add_action( 'admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
    } );
    return;

}

// Add the directory of templates in include path
Timber::$dirname = array('templates');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

/**
 * Extend TimberSite with site wide properties
 */
class FancySquaresTimberTheme extends TimberSite {

    function __construct() {
        add_filter( 'timber_context', array( $this, 'add_to_context' ) );
        parent::__construct();
    }

    function add_to_context( $context ) {

        /* Menu */
        $context['menu'] = new TimberMenu();

        /* Site info */
        $context['site'] = $this;

        /* Site info */
        $context['display_sidebar'] = Setup\display_sidebar();
        $context['sidebar_primary'] = Timber::get_widgets('sidebar-primary');

        return $context;
    }
}
new FancySquaresTimberTheme();
