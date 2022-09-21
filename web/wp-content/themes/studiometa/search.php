<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

use Timber\Timber;
use Timber\PostQuery;

$templates = array( 'pages/search.twig', 'pages/archive.twig', 'pages/index.twig' );

$context          = Timber::context();
$context['title'] = 'Search results for ' . get_search_query();
$context['posts'] = new PostQuery();

Timber::render( $templates, $context );
