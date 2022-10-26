<?php
/**
 * Template Name: Page builder
 *
 * @package Studiometa
 * @since 0.0.0
 */

use Timber\Timber;
use Timber\Post;

$context            = Timber::context();
$timber_post        = new Post();
$context['post']    = $timber_post;
$context['builder'] = $timber_post->meta( 'builder' );

Timber::render( array( 'pages/page-template-builder.twig' ), $context );
