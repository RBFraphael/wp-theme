<?php // Template name: No template ?>

<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>

<?php the_content(); ?>

<?php endwhile; ?>

<?php get_footer(); ?>