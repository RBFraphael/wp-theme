<?php // Template name: Full width without title ?>

<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>