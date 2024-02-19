<?php

/**
 * Template Name: Example Template
 * Description: An example template
 * Post Type: page
 */

do_action("get_header");
?>

<?php while(have_posts()): the_post(); ?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php echo get_the_title(); ?></h1>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>

<?php do_action("get_footer"); ?>