<?php

$context = Timber::get_context();
$context['section_cover'] = get_field('section_cover');
$context['section_portfolio'] = get_field('section_portfolio');
$context['portfolio'] = Timber::get_posts(array(
  'post_type' => 'portfolio',
  'post_status' => 'publish',
  'posts_per_page' => '10'
));

Timber::render( 'index.twig', $context );

?>