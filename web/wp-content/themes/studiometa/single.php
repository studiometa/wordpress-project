<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Timber\Timber;
use Timber\Post;

$context         = Timber::context();
$timber_post     = new Post();
$context['post'] = $timber_post;

if ( post_password_required( (int) $timber_post->id ) ) {
	Timber::render( 'pages/single-password.twig', $context );
} else {
	Timber::render( array( 'pages/single-' . $timber_post->id . '.twig', 'pages/single-' . $timber_post->type() . '.twig', 'pages/single.twig' ), $context );
}
