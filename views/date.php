<?php do_action("get_header"); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?php echo __("Date"); ?></h1>
            <p><?php echo __("Date page"); ?></p>
            <hr>
        </div>
    </div>
    <div class="row">
        <?php while(have_posts()): the_post(); ?>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
            <div class="card">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php get_the_title(); ?>" class="img-fluid">
                <div class="card-body">
                    <h2 class="card-title"><?php echo get_the_title(); ?></h2>
                    <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                    <a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary"><?php echo __("Read more"); ?></a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php do_action("get_footer"); ?>
