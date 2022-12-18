<?php
/**
 *
 * @package  Alfredo-Theme
 * @subpackage  Timber
 * @since   Timber 0.1
 */
use Timber\Post;
use Timber\Timber;

$context = Timber::context();
$context['page'] = new Post();
Timber::render('pages/index.twig', $context);
