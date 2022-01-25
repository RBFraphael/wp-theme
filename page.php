<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?= get_the_title(); ?></h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>