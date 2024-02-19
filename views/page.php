<?php do_action("get_header"); ?>

<?php while(have_posts()): the_post(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?php echo get_the_title(); ?></h1>
            <p><?php echo get_the_excerpt(); ?></p>

            <hr>

            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
            
            <hr>

            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>

<?php do_action("get_footer"); ?>
