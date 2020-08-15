<?php
/**
 * Fancy Squares includes
 *
 * The $fancySquares_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$fancySquares_includes = [
  'lib/timber.php',    // Timber setup
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/customizer.php', // Theme customizer
  'lib/extras/acf-options.php', // Theme customizer
  'lib/posts/general-enhancements.php' // WordPress / Theme ehancements
];

foreach ($fancySquares_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'fancysquares'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

// Timber::$cache = true;
add_filter('ai1wm_exclude_content_from_export', function($exclude_filters) {
	$exclude_filters[] = 'themes/rmh/node_modules';
	return $exclude_filters;
});
