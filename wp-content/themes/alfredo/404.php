<?php
/**
 * @package  Kaedo-Theme
 * @subpackage  Timber
 * @since   Timber 0.1
 */

use Timber\Timber;
use Timber\Post;

$context          = Timber::context();
$context['page'] = Timber::get_post('404-template');
Timber::render( 'pages/404.twig' , $context );