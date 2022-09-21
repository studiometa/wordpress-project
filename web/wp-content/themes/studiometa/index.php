<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

use Timber\Timber;
use Studiometa\Repositories\PostRepository;

$context          = Timber::context();
$post_repo        = new PostRepository();
$context['posts'] = $post_repo->latest_posts( 10 )->get();
$templates        = array( 'pages/index.twig' );

if ( is_home() ) {
	array_unshift( $templates, 'pages/home.twig' );
}

Timber::render( $templates, $context );
