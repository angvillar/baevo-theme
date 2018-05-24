<?php

$context = Timber::get_context();
$context['cover'] = get_field('cover');

Timber::render( 'index.twig', $context );

?>